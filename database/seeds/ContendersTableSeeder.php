<?php
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class ContendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = [
            [
                'name'=>'João Neves',
                'email'=>'fabricioyukio+kotl-seed-contender-001@gmail.com',
                'gender'=>'MALE',
                'status'=>'ACTIVE',
                'token' => Uuid::uuid4()
            ],[
                'name'=>'Luís Novededos',
                'email'=>'fabricioyukio+kotl-seed-contender-002@gmail.com',
                'gender'=>'MALE',
                'status'=>'ACTIVE',
                'token' => Uuid::uuid4()
            ],[
                'name'=>'Maria Silva',
                'email'=>'fabricioyukio+kotl-seed-contender-003@gmail.com',
                'gender'=>'FEMALE',
                'status'=>'ACTIVE',
                'token' => Uuid::uuid4()
            ],[
                'name'=>'Ana Fulana Souza',
                'email'=>'fabricioyukio+kotl-seed-contender-004@gmail.com',
                'gender'=>'FEMALE',
                'status'=>'ACTIVE',
                'token' => Uuid::uuid4()
            ],[
                'name'=>'Jean da Silva',
                'email'=>'fabricioyukio+kotl-seed-contender-005@gmail.com',
                'gender'=>'NOT GIVEN',
                'status'=>'ACTIVE',
                'token' => Uuid::uuid4()
            ]
        ];
        foreach ($seeds as $seed) {
            DB::table('contenders')->insert($seed);
        }
    }
}
