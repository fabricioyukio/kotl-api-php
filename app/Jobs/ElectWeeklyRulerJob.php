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

class ElectWeeklyRulerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

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
        echo "\n THE RULER OF THE WEEK!\n";
        $now = Carbon::now();
        $ending = $now->copy()->endOfDay();
        $begining = $now->copy()->subDays(6)->startOfDay();
        $results = Reign::getQuery()->selectRaw('ruler_id as id, count(id) as reigns')
                    ->where('type','DAY')
                    ->where('from','>=',$begining)
                    ->where('from','<=',$ending)
                    ->groupBy('ruler_id')
                    ->orderBy('reigns','desc')
                    ->orderBy('ruler_id','asc')
                    ->get();
        foreach($results as $res){
            $ruler = Contender::find($res->id);
            if(!(is_null($ruler))){
                echo "\n{$ruler->name} won {$res->reigns} reigns";
                $election = Election::create([
                    'status'        => 'CLOSED',
                    'type'          => 'WEEKLY',
                    'available_at'  => $now->toDateString(),
                    'started_at'    => $begining,
                    'ended_at'      => $ending
                ]);
                $title = ruler_title($ruler->gender);
                $reign = Reign::create([
                    'election_id'=> $election->id,
                    'ruler_id'=> $ruler->id,
                    'title' => $title,
                    'type'=>'WEEK',
                    'from'=>$now,
                    'to'=>$now->addDays(7)
                ]);
                echo "\n\n Elected {$ruler->name}, '{$reign->title}' with {$res->reigns} reigns \n\n";
                dispatch(new NotifyWeeklyRulerJob($reign->id));
                break;
            }
        }
        echo "\n";
    }
}
