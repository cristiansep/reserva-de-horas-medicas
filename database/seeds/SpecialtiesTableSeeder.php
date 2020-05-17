<?php

use App\Specialty;
use Illuminate\Database\Seeder;

class SpecialtiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialties = [
            'Oftalmologia', 'Pediatria' , 'Neurologia'
        ];
        foreach ($specialties as $specialty) {
              Specialty::create([
                'name' => $specialty
            ]);
        }
    }
      
}
