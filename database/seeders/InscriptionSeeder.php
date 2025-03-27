<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use App\Models\Inscription;
use Carbon\Carbon;

class InscriptionSeeder extends Seeder
{
    public function run(): void
    {
        Inscription::insert([
            [
                'user_id' => 1,
                'formation_id' => 1,
                // 'duree' => '5 jours',
                'status' => 'valid',
                'created_at' => Carbon::create(2024, 1, 10),
                'updated_at' => now(),
            ],
            
        ]);
    }
}
