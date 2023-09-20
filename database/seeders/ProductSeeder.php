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
                'name' => 'Century Pear',
                'quantity' => 10,
                'price' => 370000,
                'unit' => 'dus',
                'size' => 48,
                'description' => 'Pear 370 ribu per dus',
                'image' => '/images/century_pear_48.jpg'
            ],
            [
                'name' => 'Century Pear',
                'quantity' => 10,
                'price' => 370000,
                'unit' => 'dus',
                'size' => 54,
                'description' => 'Pear 370 ribu per dus',
                'image' => '/images/century_pear_54.jpg'
            ],
            [
                'name' => 'Century Pear',
                'quantity' => 10,
                'price' => 370000,
                'unit' => 'dus',
                'size' => 60,
                'description' => 'Pear 370 ribu per dus',
                'image' => '/images/century_pear_60.jpg'
            ],
            [
                'name' => 'Blueberry',
                'quantity' => 10,
                'price' => 420000,
                'unit' => 'dus',
                'size' => 60,
                'description' => 'Blueberry 420 ribu per dus',
                'image' => '/images/blueberry.jpg'
            ],
            [
                'name' => 'Plum Hijau',
                'quantity' => 10,
                'price' => 500000,
                'unit' => 'dus',
                'size' => 60,
                'description' => 'Plum 500 ribu per dus',
                'image' => '/images/plum_hijau.jpg'
            ],
            [
                'name' => 'Forelle Pear',
                'quantity' => 10,
                'price' => 600000,
                'unit' => 'dus',
                'size' => 52,
                'description' => 'Forelle Pear 600 ribu per dus',
                'image' => '/images/forelle_pear_52.jpg'
            ],
            [
                'name' => 'Forelle Pear',
                'quantity' => 10,
                'price' => 600000,
                'unit' => 'dus',
                'size' => 60,
                'description' => 'Forelle Pear 600 ribu per dus',
                'image' => '/images/forelle_pear_60.jpg'
            ],
            [
                'name' => 'Forelle Pear',
                'quantity' => 10,
                'price' => 600000,
                'unit' => 'dus',
                'size' => 70,
                'description' => 'Forelle Pear 600 ribu per dus',
                'image' => '/images/forelle_pear_70.jpg'
            ],
            [
                'name' => 'Apel Merah',
                'quantity' => 10,
                'price' => 600000,
                'unit' => 'dus',
                'size' => 72,
                'description' => 'Apel Merah 600 ribu per dus',
                'image' => '/images/apel_merah_72.jpg'
            ],
            [
                'name' => 'Apel Merah',
                'quantity' => 10,
                'price' => 600000,
                'unit' => 'dus',
                'size' => 80,
                'description' => 'Apel Merah 600 ribu per dus',
                'image' => '/images/apel_merah_80.jpg'
            ],
            [
                'name' => 'Apel Merah',
                'quantity' => 10,
                'price' => 600000,
                'unit' => 'dus',
                'size' => 100,
                'description' => 'Apel Merah 600 ribu per dus',
                'image' => '/images/apel_merah_100.jpg'
            ],
            [
                'name' => 'Apel Hijau',
                'quantity' => 10,
                'price' => 550000,
                'size' => 120,
                'unit' => 'dus',
                'description' => 'Apel Hijau 550 ribu per dus',
                'image' => '/images/apel_hijau_120.jpg'
            ],
            [
                'name' => 'Apel Hijau',
                'quantity' => 10,
                'price' => 550000,
                'unit' => 'dus',
                'size' => 135,
                'description' => 'Apel Hijau 550 ribu per dus',
                'image' => '/images/apel_hijau_135.jpg'
            ],
            [
                'name' => 'Apel Hijau',
                'quantity' => 10,
                'price' => 550000,
                'unit' => 'dus',
                'size' => 150,
                'description' => 'Apel Hijau 550 ribu per dus',
                'image' => '/images/apel_hijau_150.jpg'
            ],
            [
                'name' => 'Packham',
                'quantity' => 10,
                'price' => 420000,
                'unit' => 'dus',
                'size' => 52,
                'description' => 'Packham 550 ribu per dus',
                'image' => '/images/packham_52.jpg'
            ],
            [
                'name' => 'Packham',
                'quantity' => 10,
                'price' => 420000,
                'unit' => 'dus',
                'size' => 60,
                'description' => 'Packham 550 ribu per dus',
                'image' => '/images/packham_60.jpg'
            ],
            [
                'name' => 'Packham',
                'quantity' => 10,
                'price' => 420000,
                'unit' => 'dus',
                'size' => 70,
                'description' => 'Packham 550 ribu per dus',
                'image' => '/images/packham_70.jpg'
            ],
            [
                'name' => 'Locsweet',
                'quantity' => 10,
                'price' => 610000,
                'unit' => 'dus',
                'size' => 72,
                'description' => 'Locsweet 610 ribu per dus',
                'image' => '/images/locsweet_72.jpg'
            ],
            [
                'name' => 'Locsweet',
                'quantity' => 10,
                'price' => 610000,
                'unit' => 'dus',
                'size' => 113,
                'description' => 'Locsweet 610 ribu per dus',
                'image' => '/images/locsweet_113.jpg'
            ],
            [
                'name' => 'Jeruk Nova',
                'quantity' => 10,
                'price' => 520000,
                'unit' => 'dus',
                'description' => 'Jeruk Nova 520 ribu per dus',
                'size' => 60,
                'image' => '/images/jeruk_nova.jpg'
            ],
            [
                'name' => 'Anggur Crimson',
                'quantity' => 10,
                'price' => 340000,
                'unit' => 'dus',
                'size' => 60,
                'description' => 'Anggur Crimson 340 ribu per dus',
                'image' => '/images/anggur_crimson.jpg'
            ],
            [
                'name' => 'Orange',
                'quantity' => 10,
                'price' => 360000,
                'unit' => 'dus',
                'description' => 'Orange 360 ribu per dus',
                'size' => 72,
                'image' => '/images/orange_72.jpg'
            ],
            [
                'name' => 'Orange',
                'quantity' => 10,
                'price' => 360000,
                'unit' => 'dus',
                'description' => 'Orange 360 ribu per dus',
                'size' => 88,
                'image' => '/images/orange_88.jpg'
            ],
            [
                'name' => 'Anggur Merah',
                'quantity' => 10,
                'price' => 360000,
                'unit' => 'dus',
                'description' => 'Orange 360 ribu per dus',
                'size' => 70,
                'image' => '/images/anggur_merah_rrc.jpg'
            ],
            [
                'name' => 'Anggur Hitam',
                'quantity' => 10,
                'price' => 320000,
                'unit' => 'dus',
                'description' => 'Orange 360 ribu per dus',
                'size' => 70,
                'image' => '/images/anggur_hitam.jpg'
            ],
        ]);
    }
}
