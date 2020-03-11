<?php
use Illuminate\Database\Seeder;

class HolidaysTableSeeder extends Seeder
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
                "date" => "2020-01-01",
                "name" => "Ano Novo",
                "public" => true,
            ],
            [
                "date" => "2020-02-24",
                "name" => "Carnaval",
                "public" => true,
            ],
            [
                "date" => "2020-02-25",
                "name" => "Carnaval",
                "public" => true,
            ],
            [
                "date" => "2020-02-26",
                "name" => "Quarta-feira de cinzas",
                "public" => true,
            ],
            [
                "date" => "2020-04-10",
                "name" => "Sexta-Feira Santa",
                "public" => true,
            ],
            [
                "date" => "2020-04-12",
                "name" => "Páscoa",
                "public" => false,
            ],
            [
                "date" => "2020-04-21",
                "name" => "Dia de Tiradentes",
                "public" => true,
            ],
            [
                "date" => "2020-05-01",
                "name" => "Dia do trabalhador",
                "public" => true,
            ],
            [
                "date" => "2020-05-10",
                "name" => "Dia das Mães",
                "public" => false,
                ],
                [
                "date" => "2020-06-12",
                "name" => "Dia dos Namorados",
                "public" => true,
            ],
            [
                "date" => "2020-08-09",
                "name" => "Dia dos Pais",
                "public" => false,
            ],
            [
                "date" => "2020-09-07",
                "name" => "Dia da Independência",
                "public" => true,
            ],
            [
                "date" => "2020-10-04",
                "name" => "Dia de Eleição",
                "public" => true,
            ],
            [
                "date" => "2020-10-12",
                "name" => "Nossa Senhora Aparecida",
                "public" => true,
            ],
            [
                "date" => "2020-10-25",
                "name" => "Dia de Eleição",
                "public" => true,
            ],
            [
                "date" => "2020-11-02",
                "name" => "Dia de Finados",
                "public" => true,
            ],
            [
                "date" => "2020-11-15",
                "name" => "Proclamação da República",
                "public" => true,
            ],
            [
                "date" => "2020-12-25",
                "name" => "Natal",
                "public" => true,
            ],
            [
                "date" => "2021-01-01",
                "name" => "Ano Novo",
                "public" => true,
            ],
            [
                "date" => "2021-02-15",
                "name" => "Carnaval",
                "public" => true,
            ],
            [
                "date" => "2021-02-16",
                "name" => "Carnaval",
                "public" => true,
            ],
            [
                "date" => "2021-02-17",
                "name" => "Quarta-feira de cinzas",
                "public" => true,
            ],
            [
                "date" => "2021-04-02",
                "name" => "Sexta-Feira Santa",
                "public" => true,
            ],
            [
                "date" => "2021-04-04",
                "name" => "Páscoa",
                "public" => false,
            ],
            [
                "date" => "2021-04-21",
                "name" => "Dia de Tiradentes",
                "public" => true,
            ],
            [
                "date" => "2021-05-01",
                "name" => "Dia do trabalhador",
                "public" => true,
            ],
            [
                "date" => "2021-05-09",
                "name" => "Dia das Mães",
                "public" => false,
            ],
            [
                "date" => "2021-06-12",
                "name" => "Dia dos Namorados",
                "public" => true,
            ],
            [
                "date" => "2021-08-08",
                "name" => "Dia dos Pais",
                "public" => false,
            ],
            [
                "date" => "2021-09-07",
                "name" => "Dia da Independência",
                "public" => true,
            ],
            [
                "date" => "2021-10-12",
                "name" => "Nossa Senhora Aparecida",
                "public" => true,
            ],
            [
                "date" => "2021-11-02",
                "name" => "Dia de Finados",
                "public" => true,
            ],
            [
                "date" => "2021-11-15",
                "name" => "Proclamação da República",
                "public" => true,
            ],
            [
                "date" => "2021-12-25",
                "name" => "Natal",
                "public" => true,
            ]
        ];
        foreach ($seeds as $seed) {
            DB::table('holidays')->insert($seed);
        }
    }
}
