<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;
use App\Contender;
use App\Election;
use App\Vote;
use App\Reign;
use App\Jobs\NotifyDailyRulerJob;
use App\Jobs\ElectWeeklyRulerJob;

class ElectDailyRulerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $election_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        echo "\n\nCounting election votes...\n";
        $election = Election::where('status','CLOSED')->orderBy('ended_at','desc')->first();
        if(is_null($election)){
            echo "Election not ready for votes count.";
        }else{
            $winners = Vote::getQuery()->selectRaw('contender_id as id, count(id) as votes')
                    ->where('election_id',$election->id)
                    ->groupBy('contender_id')
                    ->orderBy('votes','desc')
                    ->get();

            foreach($winners as $winner){
                $ruler = Contender::find($winner->id);
                if(! is_null($ruler)){
                    $title = ruler_title($ruler->gender);
                    $reign = Reign::create([
                        'election_id'=> $election->id,
                        'ruler_id'=> $ruler->id,
                        'title' => $title,
                        'type'=>'DAY',
                        'from'=>now(),
                        'to'=>now()->addDay()
                    ]);
                    echo "\n\n Elected {$ruler->name}, '{$reign->title}' with {$winner->votes} votes \n\n";
                    dispatch(new NotifyDailyRulerJob($reign->id));
                    echo "\nCongratulating email dispatched\n";
                    break;
                }else{
                    echo "\n\nContender with ID={$winner['id']} not found \n\n";
                }
            }
            $weekly_election_day = intval(env('ELECTION_COUNTS_WEEKLY_AT'));
            $now = Carbon::now();
            if($weekly_election_day==$now->dayOfWeek){
                dispatch(new ElectWeeklyRulerJob());
            }
        }
    }
}
