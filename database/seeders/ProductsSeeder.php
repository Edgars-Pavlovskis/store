<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $images = ["1709109027_ezgif.com-webp-to-jpg-converter.jpg","1710325687_WhatsApp attēls 2024-02-29 plkst. 09.26.24_95d2d267.jpg","1710325764_WhatsApp attēls 2024-02-29 plkst. 09.26.38_c7894dfa.jpg"];

        for ($i=0; $i < 100; $i++) {
            $lastInsertedId = DB::table('products')->insertGetId([
                'title' => 'Produkts '.Str::random(5),
                'description' => 'Apraksts '.Str::random(8),
                'details' => 'Detaļas '.Str::random(10),
                'image' => $images[array_rand($images)],
                'code' => 'product_'.Str::random(16),
                'price' => round(mt_rand((int) (2 * MT_GETRANDMAX()), (int) (250 * MT_GETRANDMAX())) / MT_GETRANDMAX(), 2),
                'parent' => 'kancelejas-preces',
                'stock' => rand(0,30)
            ]);
            $colors = ["k6P1709109042","kNy1709109042","kR51709109043"];
            $size = ["kU51711112394","kmL1711112382","kuj1711112381"];

            DB::table('products_attributes')->insert([
                'products_id' => $lastInsertedId,
                'attributes_id' => 1,
                'value' => $colors[array_rand($colors)],
            ]);
            DB::table('products_attributes')->insert([
                'products_id' => $lastInsertedId,
                'attributes_id' => 2,
                'value' => $size[array_rand($size)],
            ]);
        }

    }
}

