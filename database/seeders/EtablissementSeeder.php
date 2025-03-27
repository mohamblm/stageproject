<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Etablissement;

class EtablissementSeeder extends Seeder
{
    public function run()
    {
        Etablissement::create([
            'nom'         => 'ISTA NTIC',
            'adresse'     => '123 Rue Exemple, Béni Mellal',
            'telephone'   => '+212 123456789',
            'localisation' => 'Béni Mellal, Maroc',
            'logo'        => 'OFPPT.png',
            'image'       => 'ista ntic.jpg',
            'description' => 'Institut Spécialisé de Technologie Appliquée - Nouvelles Technologies de l\'Information et de la Communication.',
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);

        Etablissement::create([
            'nom'         => 'IFMSAS',
            'adresse'     => '456 Rue Exemple, Béni Mellal',
            'telephone'   => '+212 987654321',
            'localisation' => 'Béni Mellal, Maroc',
            'logo'        => 'OFPPT.png',
            'image'       => 'ifmsas.jpg',
            'description' => 'Institut de Formation aux Métiers de la Santé.',
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);
        Etablissement::create([
            'nom'         => 'CMC',
            'adresse'     => '1290 Rue 12, Béni Mellal',
            'telephone'   => '+212 555123456',
            'localisation' => 'Béni Mellal, Maroc',
            'logo'        => 'OFPPT.png',
            'image'       => 'cmc.png',
            'description' => 'Centre de Maintenance et de Construction.',
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);
        Etablissement::create([
            'nom'         => 'Autre Etablissement', // Added a fourth establishment
            'adresse'     => '789 Avenue Z, Autre Ville',
            'telephone'   => '+212 666987456',
            'localisation' => 'Autre Ville, Maroc',
            'logo'        => 'default.png',
            'image'       => 'default.png',
            'description' => 'Description de cet autre établissement.',
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);
    }
}
