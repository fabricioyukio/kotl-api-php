<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class NotifyKing extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kotl:notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends email to new crowned king and rejected arrogator';

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
