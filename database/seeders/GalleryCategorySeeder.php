<?php

namespace Database\Seeders;

use App\Models\GalleryCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GalleryCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Jogos',
            'Treinos',
            'Crianças',
            'Treinadores',
            'Eventos',
            'Inter Campus',
            'Competições',
            'Títulos',
            'História',
        ];

        foreach ($categories as $name) {
            GalleryCategory::create([
                'name' => $name,
                'slug' => Str::slug($name),
            ]);
        }
    }
}
