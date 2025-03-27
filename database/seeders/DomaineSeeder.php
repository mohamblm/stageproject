<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DomaineSeeder extends Seeder
{
    public function run()
    {
        $domaines = [
            [
                'nom' => 'Communication',
                'description' => 'Formations axées sur les stratégies de communication, la prise de parole en public et les relations interpersonnelles.',
                'image' => 'communication.png',
                'icon' => 'fa-solid fa-comments',
            ],
            [
                'nom' => 'Informatique et systèmes d’information',
                'description' => 'Formations sur les réseaux, l\'administration de systèmes, le développement et les outils informatiques.',
                'image' => 'informatique.png',
                'icon' => 'fa-solid fa-laptop',
            ],
            [
                'nom' => 'Langues',
                'description' => 'Formations générales et techniques pour l\'apprentissage et le perfectionnement des langues étrangères.',
                'image' => 'langue.png',
                'icon' => 'fa-solid fa-language',
            ],
            [
                'nom' => 'Logistique',
                'description' => 'Formations dédiées à la gestion des stocks, des approvisionnements, des entrepôts et de la chaîne logistique.',
                'image' => 'logistique.png',
                'icon' => 'fa-solid fa-truck-fast',
            ],
            [
                'nom' => 'Management',
                'description' => 'Formations sur la stratégie d\'entreprise, l\'organisation du travail et la gestion des équipes.',
                'image' => 'management.png',
                'icon' => 'fa-solid fa-users-gear',
            ],
        ];

        DB::table('domaines')->insert($domaines);
    }
}
