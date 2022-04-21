<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'nrk' => '1',
            'name'=>'Admin',
            'name_gelar'=> 'Admin',
            'email'=>'admin@gmail.com',
            'password'=> Hash::make('admin'),
            'role_id'=>'1',
            'foto' => '12'
        ]);
        $user = User::create([
            'nrk' => '2',
            'name'=>'Benazheer',
            'name_gelar'=> 'Benazheer S. A,md',
            'email'=>'bena@gmail.com',
            'password'=> Hash::make('benazheer14'),
            'role_id'=>'3',
            'foto' => '12'
        ]);
        $user = User::create([
            'nrk' => '3',
            'name'=>'Luthfi',
            'name_gelar'=> 'Luthfi . A,md',
            'email'=>'luthfi@gmail.com',
            'password'=> Hash::make('benazheer14'),
            'role_id'=>'2',
            'foto' => '12'
        ]);
    }
}
