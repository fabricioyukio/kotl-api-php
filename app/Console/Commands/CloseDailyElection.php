<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Election;
use App\Vote;
use App\Contender;
use App\Reign;
use Carbon\Carbon;
use App\Jobs\ElectDailyRulerJob;

class CloseDailyElection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kotl:election:close:daily';

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
        $today = Carbon::now();
        $election = Election::daily()->where('status','OPEN')->first();
        if(is_null($election)){
            echo "\n\nNo open elections found";
        }else{
            $election->status = 'CLOSED';
            $election->ended_at = Carbon::now();
            if($election->save()){
                echo "\n\nElection for {$today->toDateString()} is now closed!\n\n";
                dispatch(new ElectDailyRulerJob($election->id));
                echo "\nDispatched ElectDailyRulerJob";
            }
        }
    }
}
