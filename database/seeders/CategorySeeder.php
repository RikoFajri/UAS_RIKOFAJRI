<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'nama_kategori' => 'S',
                'keterangan' => 'S'
            ],
            [
                'nama_kategori' => 'M',
                'keterangan' => 'M'
            ],
            [
                'nama_kategori' => 'L',
                'keterangan' => 'L'
            ],
            
             [
                'nama_kategori' => 'XL',
                'keterangan' => 'XL'
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
