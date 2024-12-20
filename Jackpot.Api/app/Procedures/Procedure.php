<?php

namespace App\Procedures;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class Procedure
{
    /**
     * Execute a procedure by checking in database. Includes checking procedure name, number of parameters.
     * @param string $procedureName
     * @param array $values
     * @return string|Collection
     */
    static public function ExecuteProcedure($procedureName, $values = [])
    {
        // Check if the values array is associative
        if (!is_array($values) || empty($values)) {
            return "Invalid or empty values provided.";
        }

        // Build parameter placeholders with named parameters
        $placeholders = [];
        foreach ($values as $key => $value) {
            $placeholders[] = "@{$key} = ?";
        }
        $placeholdersString = implode(', ', $placeholders);

        // Build the EXEC statement
        $execStatement = "EXEC {$procedureName} {$placeholdersString}";

        // Extract the values to pass to the query
        $params = array_values($values);

        // Execute the procedure with the values
        try {
            $results = DB::select($execStatement, $params);
            return collect($results);
        } catch (\Exception $e) {
            return "Error executing procedure: " . $e->getMessage();
        }
    }

    static public function getProcedureDetails($procedureName)
    {
        try {
            // Fetch the procedure details and definition
            $procedure = DB::selectOne("
            SELECT
                p.name AS procedure_name,
                p.create_date,
                p.modify_date,
                m.definition AS procedure_definition
            FROM
                sys.procedures p
            INNER JOIN
                sys.sql_modules m ON p.object_id = m.object_id
            WHERE
                p.name = ?
        ", [$procedureName]);

            // Check if the procedure exists
            if (!$procedure) {
                return "Procedure '{$procedureName}' not found.";
            }

            // Extract metadata (author and description) from the definition
            $metadata = self::extractMetadata($procedure->procedure_definition);

            // Fetch the parameters of the procedure
            $parameters = DB::select("
            SELECT
                p.name AS parameter_name,
                t.name AS data_type,
                p.max_length
            FROM
                sys.parameters p
            INNER JOIN
                sys.types t ON p.user_type_id = t.user_type_id
            WHERE
                p.object_id = OBJECT_ID(?)
            ORDER BY
                p.parameter_id
        ", [$procedureName]);

            // Format the procedure details
            $details = [
                'Procedure Name' => $procedure->procedure_name,
                'Author' => $metadata['author'],
                'Description' => $metadata['description'],
                'Created At' => $procedure->create_date,
                'Modified At' => $procedure->modify_date,
                'Parameters' => $parameters,
            ];

            return $details;
        } catch (\Exception $e) {
            return "Error fetching procedure details: " . $e->getMessage();
        }
    }

    /**
     * List all the procedures
     * @return array|string
     */
    static public function listAllProcedures()
    {
        try {
            // Query to fetch all stored procedures and their definitions
            $procedures = DB::select("
            SELECT
                p.name AS procedure_name,
                p.create_date,
                p.modify_date,
                m.definition AS procedure_definition
            FROM
                sys.procedures p
            INNER JOIN
                sys.sql_modules m ON p.object_id = m.object_id
            ORDER BY
                p.name
        ");

            // Check if any procedures are found
            if (empty($procedures)) {
                return "No stored procedures found in the database.";
            }

            $result = [];
            foreach ($procedures as $procedure) {
                $metadata = self::extractMetadata($procedure->procedure_definition);

                $result[] = [
                    'procedure_name' => $procedure->procedure_name,
                    'create_date' => $procedure->create_date,
                    'modify_date' => $procedure->modify_date,
                    'author' => $metadata['author'],
                    'description' => $metadata['description'],
                ];
            }

            return $result;
        } catch (\Exception $e) {
            return "Error fetching procedures: " . $e->getMessage();
        }
    }

    static public function extractMetadata($definition)
    {
        $author = 'Unknown';
        $description = 'No description';

        // Match the line containing 'Author:' in the comments
        if (preg_match('/--\s*Author:\s*(.*)/i', $definition, $matches)) {
            $author = trim($matches[1]);
        }

        // Match the line containing 'Description:' in the comments
        if (preg_match('/--\s*Description:\s*(.*)/i', $definition, $matches)) {
            $description = trim($matches[1]);
        }

        return [
            'author' => $author,
            'description' => $description,
        ];
    }
}
