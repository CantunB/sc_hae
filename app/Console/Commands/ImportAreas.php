<?php

namespace Smapac\Console\Commands;

use Illuminate\Console\Command;
use DB;

class ImportAreas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:areas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command import areas with foreign coordinations and departments';

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
        DB::unprepared(file_get_contents('database/migrations/assigned_areas.sql'));
        //DB::unprepared(file_get_contents('database/migrations/LN.sql'));
    }
}
