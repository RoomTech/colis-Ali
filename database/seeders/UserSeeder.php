<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'serialNumber' => 'OPJKK',
            'firstName' => 'dada',
            'lastName' => 'room',
            'email' => 'admin@manager.com',
            'contact' => '00000000000',
            'profile_id' => Profile::SUPER_ADMIN,
            'email_verified_at' => now(),
            'password' =>
                '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        \App\Models\User::factory(10)
            ->sequence([
                'company_id' => Company::all()->random()->id,
                'profile_id' => Profile::MANAGER,
            ])
            ->create()
            ->each(function ($user) {
                $user
                    ->managerPacks()
                    ->saveMany(\App\Models\Pack::factory(5)->make());
                \App\Models\User::factory(2)
                    ->sequence([
                        'company_id' => $user->company_id,
                        'profile_id' => Profile::CONVOYOR,
                    ])
                    ->create();
            });
    }
}
