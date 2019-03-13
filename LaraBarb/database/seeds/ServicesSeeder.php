<?php

use App\Service;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Service::create([
            'name' => 'HAIR UP',
            'cost' => '159',
            'isMain' =>  '1',
        ]);
        Service::create([
            'name' => 'HOTTOWEL',
            'cost' => '259',
            'isMain' =>  '1',
        ]);
        Service::create([
            'name' => 'Messy Undercut',
            'cost' => '145',
            'isMain' =>  '1'
        ]);
        Service::create([
            'name' => 'TAPE UP',
            'cost' => '129',
            'isMain' =>  '1',
        ]);
        Service::create([
            'name' => 'BABY HAIRCUT',
            'cost' => '89',
            'isMain' =>  '0',
        ]);
        Service::create([
            'name' => 'High-Lo Fade',
            'cost' => '179',
            'isMain' =>  '0',
        ]);
         Service::create([
            'name' => 'Mohawk Bald',
            'cost' => '219',
            'isMain' =>  '0',
        ]);
    }
}
