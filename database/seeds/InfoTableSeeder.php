<?php

use Illuminate\Database\Seeder;

class InfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('info')->insert([
            'name' => 'University Of Puthisastra',
            'email' => 'up@school.edu.kh',
            'address' => 'Phnom Penh',
            'lat' => '104.91853065045099',
            'lon' => '11.562667247309607',
            'phone' => '0987654321'
        ]);
    }
}
