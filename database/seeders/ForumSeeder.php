<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Forum;
use Carbon\Carbon;

class ForumSeeder extends Seeder
{
    public function run(): void
    {
        $forums = [
            [
                'name' => 'foro de caninos',
                'description' => 'hablaremos osbre todo lo que tiene que ver con nuestros perritos',
                'date' => Carbon::parse('2021-12-01'),
            ],
            [
                'name' => 'Foro de peluditos felinos',
                'description' => 'charlas para el cuidado de nuestros gatitos',
                'date' => Carbon::parse('2024-06-10'),
            ],
        ];

        foreach ($forums as $forum) {
            Forum::create($forum);
        }
    }
}