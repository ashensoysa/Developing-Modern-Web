<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Club;

class ClubSeeder extends Seeder
{
    public function run()
    {
        $clubs = [
            'Tech Titans',
            'Art Avengers',
            'Eco Guardians',
            'Lit Society',
            'Fit Warriors',
            'Music Mavericks',
            'Debate Dominion',
            'Code Crusaders',
            'Visionary Circle',
            'Culture Collective',
        ];

        foreach ($clubs as $name) {
            Club::create([
                'name' => $name,
                'description' => $name . ' club description.',
                'status' => 'active',
                'created_by' => 1, // Make sure user ID 1 exists
            ]);
        }
    }
}
