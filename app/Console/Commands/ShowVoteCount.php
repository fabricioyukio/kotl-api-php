<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ShowVoteCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kotl:pushvotes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Broadcasts votes for current Election';

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
