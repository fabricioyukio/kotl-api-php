<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Election;
use App\Holiday;

class CreateDailyElection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kotl:election:create:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates daily elections for a week';

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
        $election_date = Carbon::now()->startOfDay();
        for( $i=0 ; $i<7 ; $i++){
            $this->createElectionAt($election_date);
            $election_date = $election_date->addDay();
        }
    }

    private function createElectionAt(Carbon $day){
        /* Prevent to create an Election at a non elective day */
        if(!(
            (env('ELECTION_SKIP_SUNDAYS') && $day->isSunday()) ||
            (env('ELECTION_SKIP_SATURDAY') && $day->isSaturday()) ||
            (env('ELECTION_SKIP_HOLIDAYS') && (Holiday::where('date',$day->toDateString())->count()> 0) )
            )){
            $previously_inserted = Election::where('available_at',$day->toDateString())
                                            ->where('type','DAILY')->count();
            if($previously_inserted==0){

                echo "\nNew election at $day";
                $props = [
                    'status'        => 'CREATED',
                    'type'          =>'DAILY',
                    'available_at'  => $day->toDateString(),
                    'started_at'    =>NULL,
                    'ended_at'      =>NULL
                ];
                if(@Election::create($props)->save()){
                    echo " added successfully!";
                }
            }else{
                echo "\nAt {$day->toDateString()} already have a daily election!";
            }
        }
    }
}
