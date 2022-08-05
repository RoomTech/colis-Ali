<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Profile;
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


     

        $profiles = [
            Profile::SUPER_ADMIN => 'Administrateur', 
            Profile::MANAGER => 'Chef de gare',
            Profile::CONVOYOR => 'Convoyeur'
        ];
        
        foreach ($profiles as $key => $profile) {
            \App\Models\Profile::create([
                'id' => $key,
                'name' => $profile
            ]);
        }
        
        $this->call([
            UserSeeder::class,
        ]);

    }
}
