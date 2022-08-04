<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Company::factory(60)->create();

        $profiles = ['Administrateur', 'Chef de gare', 'Convoyeur'];
        
        foreach ($profiles as $profile) {
            \App\Models\Profile::create([
                'name' => $profile
            ]);
        }
        
        \App\Models\User::factory(20)->create();

        \App\Models\Pack::factory(150)->create();

    }
}
