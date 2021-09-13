<?php

namespace Database\Seeders;

use App\Models\Resource;
use Illuminate\Database\Seeder;

class Make20ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20; $i++) { 
            Resource::create([
                'title' => 'Resource '.$i,
                'lesson_id' => 2,
                'user_id' => 1,
                'type' => $i%4,
                'description' => 'test123'
            ]);
        }
    }
}
