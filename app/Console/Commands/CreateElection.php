<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateElection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kotl:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates election for a new King';

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
        //
    }
}
