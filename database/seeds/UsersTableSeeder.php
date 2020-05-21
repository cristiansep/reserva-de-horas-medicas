<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([

            'name' => 'Cristian Admin',
            'email' => 'cristiansepulvedamendez@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), 
            'rut' => '123456789',
            'role' => 'admin',
        ]);

        User::create([

            'name' => 'Cristian Doctor',
            'email' => 'cristiansep@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), 
            'rut' => '123456789',
            'role' => 'doctor',
        ]);

        User::create([

            'name' => 'Cristian Paciente',
            'email' => 'cristian@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), 
            'rut' => '123456789',
            'role' => 'patient',
        ]);

        factory(App\User::class, 50)->states('patient')->create();
    }
}
