<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateDatabaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:database {dbname} {connection?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try{
            $dbname = $this->argument('dbname');
            $connection = $this->argument('connection') ?: config("database.default");
            $charset = config("database.connections.". $connection . ".charset",'utf8');
            $collation = config("database.connections.". $connection . ".collation",'utf8_unicode_ci');

            config(["database.connections.". $connection . ".database" => null]);

            $hasDb = DB::connection($connection)->select("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = "."'".$dbname."'");
            if(empty($hasDb)) {
                $query = "CREATE DATABASE $dbname CHARACTER SET $charset COLLATE $collation;";
                DB::statement($query);
                $this->info("Database '$dbname' created for '$connection' connection");
            }
            else {
                $this->info("Database $dbname already exists for $connection connection");
            }
            config(["database.connections.". $connection . ".database" => $dbname]);
        }
        catch (\Exception $e){
            $this->error($e->getMessage());
        }
    }
}
