<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class Make20ActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20; $i++) { 
            Activity::create([
                'title' => 'wertyui',
                'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Et suspendisse phasellus lacinia risus ornare nisl consectetur. Id dignissim dignissim nibh accumsan, bibendum eleifend aliquet porttitor laoreet. Facilisis accumsan diam id morbi eu pharetra, ut. Sed eu, condimentum sed a laoreet. Iaculis porta aliquet vitae quis.</p><p>Auctor neque ut nam accumsan aliquet ornare morbi neque facilisis. Et ridiculus mattis ullamcorper donec vivamus eros, in. Adipiscing ut sed sollicitudin vivamus at.</p>'
            ]);
        }
    }
}
