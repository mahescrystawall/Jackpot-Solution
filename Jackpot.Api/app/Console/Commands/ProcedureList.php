<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Procedures\Procedure;

class ProcedureList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'proc:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $procedures = Procedure::listAllProcedures();

        // Check if the result is a string (an error message or no procedures found)
        if (is_string($procedures)) {
            $this->error($procedures);
            return;
        }

        // Loop through each procedure and display the details
        foreach ($procedures as $procedure) {
            $this->info("Procedure Name: {$procedure['procedure_name']}");
            $this->info("Author: {$procedure['author']}");
            $this->info("Description: {$procedure['description']}");
            $this->info("Created At: {}");
            $this->info("Modified At: {$procedure['modify_date']}");
            $this->warn('------------------------');
        }
    }
}
