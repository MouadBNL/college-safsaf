<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            [
                'title' => 'Accueil'
            ],
            [
                'title' => 'Activités'
            ],
            [
                'title' => 'Resources'
            ],
        ];

        foreach ($pages as $page) {
            Page::firstOrCreate($page);
        }
    }
}
