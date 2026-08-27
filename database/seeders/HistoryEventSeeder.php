<?php

namespace Database\Seeders;

use App\Models\HistoryEvent;
use Illuminate\Database\Seeder;

class HistoryEventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            [
                'title' => 'Início da história',
                'description' => 'A história da Pedra Rica começou ligada à infância do fundador Wilson Domingos da Conceição Armando. Aos 12 anos, em 2005, ele já participava como jogador e treinador.',
                'event_date' => '2005',
                'year' => 2005,
                'sort_order' => 1,
            ],
            [
                'title' => 'Fundação Oficial',
                'description' => 'A Pedra Rica foi fundada oficialmente por Wilson Domingos da Conceição Armando, com o objetivo de ajudar as crianças dos bairros São João, Cuca e Hoji Ya Henda.',
                'event_date' => '25 de Maio de 2009',
                'year' => 2009,
                'sort_order' => 2,
            ],
            [
                'title' => 'Mony e Keny no Projeto',
                'description' => 'Mony passou a fazer parte do projeto em 2009, trazendo sua dedicação e maneira de trabalhar. O irmão Keny também foi acolhido no projeto.',
                'event_date' => '2009',
                'year' => 2009,
                'sort_order' => 3,
            ],
            [
                'title' => 'Entrada no Inter Campus',
                'description' => 'No final de 2009, o projeto entrou no Inter Campus, marcando um momento importante com novas perspectivas para o futuro.',
                'event_date' => 'Final de 2009',
                'year' => 2009,
                'sort_order' => 4,
            ],
            [
                'title' => 'Expansão do Projeto',
                'description' => 'A Pedra Rica cresceu e expandiu suas atividades, alcançando mais crianças e adolescentes da comunidade.',
                'event_date' => 'Anos seguintes',
                'year' => null,
                'sort_order' => 5,
            ],
            [
                'title' => 'Mais de 100 Crianças',
                'description' => 'O projeto conta atualmente com mais de 100 crianças e adolescentes envolvidos em atividades desportivas, educativas e de evangelização.',
                'event_date' => 'Atualidade',
                'year' => null,
                'sort_order' => 6,
            ],
            [
                'title' => 'Campeonato Provincial de Luanda',
                'description' => 'Um dos grandes objetivos foi alcançado: competir no Campeonato Provincial de Luanda em Futsal.',
                'event_date' => 'Atualidade',
                'year' => null,
                'sort_order' => 7,
            ],
        ];

        foreach ($events as $event) {
            HistoryEvent::create($event);
        }
    }
}
