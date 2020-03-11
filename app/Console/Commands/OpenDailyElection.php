<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Election;
use App\Holiday;
use Carbon\Carbon;


class OpenDailyElection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kotl:election:open:daily';

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
        if(!(
            (env('ELECTION_SKIP_SUNDAYS') && $today->isSunday()) ||
            (env('ELECTION_SKIP_SATURDAY') && $today->isSaturday()) ||
            (env('ELECTION_SKIP_HOLIDAYS') && (Holiday::where('date',$today->toDateString())->count() > 0) )
            )){

            $election = Election::daily()->where('available_at',$today->toDateString())->first();
            if(is_null($election)){
                echo "\n\nNo election set for today.\n\n";
            }else{
                $election->status = "OPEN";
                $election->started_at = Carbon::now();
                if($election->save()){
                    echo "\nElection for day {$today->toDateString()} is now open!";
                }else{
                    echo "\nCouldn't open election for {$today->toDateString()}!";
                    echo "\nContact Admin!";
                }
            }
        }else{
            echo "\n\nNo election today!\n\n";
        }
    }
}
