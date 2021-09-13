<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = [
            [
                'uuid' => 'hero.bg',
                'label' => 'Hero image'
            ],
            [
                'uuid' => 'home.accueil',
                'label' => 'accueil decription'
            ]
        ];

        foreach ($images as $img) {
            Image::firstOrCreate(['uuid' => $img['uuid']], $img);
        }
    }
}
