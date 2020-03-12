<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use \Mail;
use App\Mail\NotifyDailyRulerMail;

use App\Election;
use App\Vote;
use App\Contender;
use App\Reign;
use Carbon\Carbon;


class NotifyDailyRulerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $ruler_id = 0;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($reign_id)
    {
        $reign = Reign::find($reign_id);
        if(!(is_null($reign))){
            $this->ruler_id = $reign->ruler_id;
            echo "\nRuler ID is {$this->ruler_id}\n";
        }
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if($this->ruler_id > 0){
            /* A Contender, now Crowned king or queen, is a ruler. */
            $ruler = Contender::where('id',$this->ruler_id)->first();
            if(!(is_null($ruler))){
                echo "\n\nDaemon will notify {$ruler->name} at {$ruler->email} \n\n";
                $email = new NotifyDailyRulerMail($ruler);
                if(\Mail::to($ruler->email)->send($email)){
                    echo  "\n\nEmail have just been sent!\n\n";
                }
            }else{
                echo "\nNo ruler found with id {$this->ruler_id}\n";
            }
        }else{
            echo "\nNo propper ruler id given\n";
        }
    }
}
