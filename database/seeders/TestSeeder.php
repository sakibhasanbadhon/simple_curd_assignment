<?php

namespace Database\Seeders;

use App\Models\TestModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allData =[
            [
                'name'   => 'Lacey Moreno',
                'email'  => 'laceymoreno@gmail.com',
                'gender' => 'Male',
                'Skills' => json_encode(['Laravel','Codeiniter','Ajax','MySQL']),
                'image'  => '1082060797167998590664228cf29c451.png',
            ],

            [
                'name'   => 'Eaton Pugh',
                'email'  => 'eatonpugh@gmail.com',
                'gender' => 'Male',
                'Skills' => json_encode(['Codeiniter','Ajax','MySQL','API']),
                'image'  => '570150293167998598564228d418c31f.jpg',
            ],

            [
                'name'   => 'Jesse Kirby',
                'email'  => 'jessekirby@gmail.com',
                'gender' => 'Female',
                'Skills' => json_encode(['Laravel','Codeiniter','Ajax','MySQL']),
                'image'  => '966487426167998592864228d0877510.jpg',
            ],

            [
                'name'   => 'Kendall Barr',
                'email'  => 'Kendallbarr@gmail.com',
                'gender' => 'Male',
                'Skills' => json_encode(['Laravel','Codeiniter','Ajax','MySQL']),
                'image'  => '1222423445167998595964228d270a2d1.jpg',
            ]
        ];

        TestModel::insert($allData);
    }
}
