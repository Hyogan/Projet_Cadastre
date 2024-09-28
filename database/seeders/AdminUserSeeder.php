<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => "Mbida",
            'email' => "mbida@gmail.com",
            'password' => Hash::make("123"),
            'type_personne' => "personne_physique",
            'telephone' => "651858890",
            'quartier' => "awae",
            'birthplace' => "",
            'nationalite' => 'Camerounais',
            'birthdate' => '1990-01-01',
            'role' => 'admin'
        ]);
    }
}
