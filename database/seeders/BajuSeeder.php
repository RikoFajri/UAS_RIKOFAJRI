<?php

namespace Database\Seeders;

use App\Models\Baju;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BajuSeeder extends Seeder
{
    public function run(): void
    {
        $bajus =  [
            [
                'id' => 'clothes1',
                'type' => 'HODDIE JUMPER',
                'price' => 'Rp.270.000',
                'fabric' => 2023,
                'category_id' => 1,
                'color' => 'BLACK',
                'foto_sampul' => 'post1.jpg',
            ],
            [
                'id' => 'clothes2',
                'type' => 'HODDIE JUMPER',
                'price' => 'Ethannds.',
                'fabric' => 2023,
                'category_id' => 2,
                'color' => 'BLACK',
                'foto_sampul' => 'post3.jpg',
            ],
            [
                'id' => 'clothes3',
                'type' => 'HODDIE ZIPPER',
                'price' => 'Rp.270.000',
                'fabric' => 2023,
                'category_id' => 1,
                'color' => 'BLACK',
                'foto_sampul' => 'post2.jpg',
            ],
            
        ];
        foreach ($bajus as $baju) {
            Baju::create($baju);
        }
    }
}
