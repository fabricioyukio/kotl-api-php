<? //namespace App\Helpers;


if (! function_exists('ruler_title')) {
    function ruler_title($gender="MALE")
    {
        $all_titles = [
            "FEMALE"=>[
                "A quebradora das dietas",
                "A devoradora das coxinhas",
                "O terror dos selfie services",
                "Domadora dos apetites",
                "Libertadora dos Carboidratos",
                "Sobrevivente do Churrasco Grego da Sé",
                "Organizadora do Happy Hour",
                "Cativa das Churrascarias",
                "Nascida na tempestade",
                "Musa dos Chef's",
                "Mãe das Receitas"
            ],
            "MALE"=>[
                "O primeiro de seu nome",
                "O terror dos Selfie Services",
                "O vândalo da mesa de frios",
                "Governante do Momos",
                "Devorador d'entre os devoradores",
                "Amigo dos garçons",
                "O Leão dos espetinhos de gato",
                "Sobrevivente do Churrasco Grego da Sé",
                "Gourmet entre gourmets",
                "Protetor dos reinos"
            ]
        ];
        $titles = $all_titles[$gender];
        return $titles[array_rand($titles)];
    }
}
