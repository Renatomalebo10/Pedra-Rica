<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $general = [
            'site_name' => 'Pedra Rica Oficial',
            'site_tagline' => 'Desporto. Educação. Fé. Transformação.',
            'site_description' => 'Projeto social, desportivo, educativo e de evangelização para crianças e adolescentes.',
            'founder_name' => 'Wilson Domingos da Conceição Armando',
            'founded_year' => '2009',
            'contact_email' => 'contato@pedrarica.com',
            'contact_phone' => '',
            'contact_address' => 'Bairro São João, Hoji Ya Henda, Luanda',
            'about_project' => 'A Pedra Rica é um projeto social, desportivo, educativo e de evangelização, criado oficialmente em 25 de maio de 2009 por Wilson Domingos da Conceição Armando.',
            'mission' => 'Utilizar o desporto como instrumento de transformação social, evangelização e educação de crianças e adolescentes.',
            'vision' => 'Uma Angola com mais oportunidades para crianças e jovens, onde o desporto e a fé transformam vidas.',
            'founder_quote' => 'Esse projeto existe para me lembrar que o poder de Deus está em todo lado e é só deixar Deus trabalhar.',
            'website_developer_name' => 'Desenvolvedor Full Stack',
            'website_developer_bio' => 'Desenvolvedor apaixonado por tecnologia e impacto social.',
            'children_count' => '100',
            'coaches_count' => '3',
        ];

        $social = [
            'facebook' => '',
            'instagram' => '',
            'youtube' => '',
        ];

        foreach ($general as $key => $value) {
            Setting::set($key, $value, 'general');
        }

        foreach ($social as $key => $value) {
            Setting::set($key, $value, 'social');
        }
    }
}
