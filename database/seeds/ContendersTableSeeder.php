<?php
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;
use App\Contender;
use App\Election;
use App\Vote;

class ContendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = [];
        for($i=0; $i < intval(env('ELECTION_CREATE_FAKE_CANDIDATES')); $i++){
            $fake = Faker\Factory::create('pt_BR');
            $fake->addProvider(new Faker\Provider\Base($fake));
            $fake->addProvider(new Faker\Provider\Internet($fake));
            $fake->addProvider(new Faker\Provider\pt_BR\Person($fake));

            $gender= $fake->randomElement(['MALE','FEMALE']);
            $name = $fake->name(strtolower($gender));
            $slug = Str::slug($name, '-');
            $seeds[] = [
                'name'=>$name,
                'email'=> "{$slug}@{$fake->freeEmailDomain()}",
                'gender'=> $gender,
                'status'=> 'ACTIVE'
            ];
        }

        $contenders = [];
        foreach ($seeds as $seed) {
            $contenders[] = Contender::create($seed);
        }

        if(env('ELECTION_CREATE_FAKE_ELECTION')){
            $now = now();
            echo "\nSample election {$now->format('Y-m-d')}";
            $props = [
                'status'        => 'OPEN',
                'type'          =>'DAILY',
                'available_at'  => now()->toDateString(),
                'started_at'    => now(),
                'ended_at'      =>NULL
            ];
            $election = @Election::create($props);
            if(!(is_null($election))){
                echo " added successfully!\n";
                for($i=0; $i<intval(env('ELECTION_CREATE_FAKE_VOTES')); $i++){
                    $contender = $fake->randomElement($contenders);
                    $name = Str::slug($fake->name, '-');
                    $vote = @Vote::create([
                        'election_id'=>$election->id,
                        'contender_id'=>$contender->id,
                        'voter_email'=>"{$name}@{$fake->freeEmailDomain()}",
                        'status'=>'CONFIRMED'
                    ]);
                }
                echo "\n\nWhen you'll want to check the sample election results, run:";
                echo "\n$ php artisan kotl:election:close:daily";
                echo "\nor, if it's running on docker:";
                echo "\n$ docker exec -it api php artisan kotl:election:close:daily\n\n";
            }
        }
    }
}
