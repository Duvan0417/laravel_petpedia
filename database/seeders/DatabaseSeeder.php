<?php

namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Forum;
use App\Models\Schedule;
use App\Models\Topic;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
   
    public function run(): void
    {
        
         $this->call([
        ForumSeeder::class,
        ScheduleSeeder::class,
        TopicSeeder::class,
    ]);
    }
}
