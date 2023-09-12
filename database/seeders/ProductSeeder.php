<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('products')->insert([
            [
                'name' => 'Apel',
                'quantity' => 15,
                'price' => 20000,
                'unit' => 'dus',
                'description' => 'Apel yang dipetik dari tiongkok',
                'image' => '/images/apple.jpg'
            ],
            [
                'name' => 'Anggur',
                'quantity' => 10,
                'price' => 20000,
                'unit' => 'dus',
                'description' => 'Anggur yang dipetik dari tiongkok',
                'image' => '/images/apple.jpg'
            ],
            [
                'name' => 'Anggur',
                'quantity' => 10,
                'price' => 20000,
                'unit' => 'dus',
                'description' => 'Anggur yang dipetik dari tiongkok',
                'image' => '/images/apple.jpg'
            ],
            [
                'name' => 'Anggur',
                'quantity' => 10,
                'price' => 20000,
                'unit' => 'dus',
                'description' => 'Anggur yang dipetik dari tiongkok',
                'image' => '/images/apple.jpg'
            ],
            [
                'name' => 'Anggur',
                'quantity' => 10,
                'price' => 20000,
                'unit' => 'dus',
                'description' => 'Anggur yang dipetik dari tiongkok',
                'image' => '/images/apple.jpg'
            ],
        ]);
    }
}
