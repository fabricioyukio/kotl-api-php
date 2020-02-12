<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CountVotes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kotl:count';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Counts votes given to applicants';

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
