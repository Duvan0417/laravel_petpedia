<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Schedule;
use Carbon\Carbon;

class ScheduleSeeder extends Seeder
{
    public function run(): void
    {
        $schedules = [
            [
                'date' => Carbon::parse('2021-07-01'),
                'hour' => 9,
                'location' => 'calle 7 #7-3',
            ],
            [
                'date' => Carbon::parse('2024-07-03'),
                'hour' => 15,
                'location' => 'carrera 48#85',
            ],
        ];

        foreach ($schedules as $schedule) {
            Schedule::create($schedule);
        }
    }
}
