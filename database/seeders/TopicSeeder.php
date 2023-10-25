<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $topics=['front end','back end','mobile application'];
        foreach ($topics as $topic) {
            Topic::create([
                'name'=>$topic
                        ]);
        }
    }
}
