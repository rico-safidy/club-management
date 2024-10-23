<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RefreshSingleTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:refresh-single {table}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh a single table';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $table = $this->argument('table');

        // Trouver la migration associée à la table
        $migrationFiles = $this->getMigrationFiles($table);
        if (empty($migrationFiles)) {
            $this->error("No migration files found for table: {$table}");
            return;
        }

        // Annuler les migrations
        foreach ($migrationFiles as $file) {
            $this->callSilent('migrate:rollback', [
                '--path' => $file,
                '--step' => 1,
            ]);
        }

        //Réexecuter les migrations
        foreach ($migrationFiles as $file) {
            $this->callSilently('migrate', [
                '--path' => $file,
            ]);
        }

        $this->info("Table {$table} has been refreshed.");
    }
    protected function getMigrationFiles($table)
    {
        $migrationPath = database_path('migrations');
        $files = glob($migrationPath . '/*.php');
        return array_filter($files, function ($file) use ($table) {
            return strpos(file_get_contents($file), "Schema::create('{$table}')") !== false;
        });
    }
}
