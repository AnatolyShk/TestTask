<?php

use App\Place;
use Illuminate\Database\Seeder;

class PlacesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Place::create([
            'city' => 'Odessa',
            'address' => 'Avant-garde st',
            'phone' =>  '0504987648',
        ]);
        Place::create([
            'city' => 'Odessa',
            'address' => 'Volodya Dubinina st',
            'phone' =>  '0524938648',
        ]);
        Place::create([
            'city' => 'Odessa',
            'address' => 'Deribasovskaya st',
            'phone' =>  '0504427518',
        ]);
        Place::create([
            'city' => 'Lviv',
            'address' => 'Galitskaya st',
            'phone' =>  '0504987648',
        ]);
        Place::create([
            'city' => 'Kiev',
            'address' => 'Aleksandrovskaya st',
            'phone' =>  '0504987648',
        ]);
    }
}
