<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Topic;
use Carbon\Carbon;

class TopicSeeder extends Seeder
{
    public function run(): void
    {
        $topics = [
            [
                'title' => 'cuidado de caninos',
                'creation_date' => Carbon::parse('2023-12-10'),
            ],
            [
                'title' => 'cuidado de felinos',
                'creation_date' => Carbon::parse('2024-06-12'),
            ],
        ];

        foreach ($topics as $topic) {
            Topic::create($topic);
        }
    }
}
