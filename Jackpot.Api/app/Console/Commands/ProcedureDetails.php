<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Procedures\Procedure;
use Illuminate\Support\Collection;

class ProcedureDetails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'proc:details {procedureName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Displays details of a specific stored procedure';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get the procedure name from the command argument
        $procedureName = $this->argument('procedureName');

        $details = Procedure::getProcedureDetails($procedureName);

        // Check if the result is a string (error message)
        if (is_string($details)) {
            $this->error($details);
            return;
        }

        // Display procedure details
        $this->newLine();
        $this->alert("{$details['Procedure Name']}");
        $this->info("Author: {$details['Author']}");
        $this->info("Description: {$details['Description']}");
        $this->info("Created At: {$details['Created At']}");
        $this->info("Modified At: {$details['Modified At']}");

        // Convert Parameters array to Collection and display in a table
        $parameters = collect($details['Parameters']); // Convert array to collection

        if ($parameters->isEmpty()) {
            $this->info("No parameters found.");
        } else {
            $this->table(
                ['Parameter Name', 'Data Type', 'Length'], // Table headers
                $parameters->map(function ($param) {
                    return [
                        $param->parameter_name,
                        $param->data_type,
                        $param->max_length,
                    ];
                })
            );
        }
    }
}
