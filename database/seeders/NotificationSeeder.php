<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Notification;
use App\Models\Trainer;

class NotificationSeeder extends Seeder
{
    public function run(): void
    {
        $trainers = [
            ['name' => 'Carlos Pérez', 'email' => 'carlos@example.com'],
            ['name' => 'Lucía Martínez', 'email' => 'lucia@example.com'],
            ['name' => 'Andrés Gómez', 'email' => 'andres@example.com'],
            ['name' => 'Marta Ríos', 'email' => 'marta@example.com'],
            ['name' => 'Juan Torres', 'email' => 'juan@example.com'],
        ];

        foreach ($trainers as &$trainer) {
            $trainer = Trainer::firstOrCreate(
                ['email' => $trainer['email']],
                [
                    'name' => $trainer['name'],
                    'password' => bcrypt('123456'),
                ]
            );
        }

        foreach ($trainers as $trainer) {
            Notification::create([
                'Trainer_id'  => $trainer->id,
                'Title'       => 'Primera notificación para ' . $trainer->name,
                'Description' => 'Esta es la primera notificación de prueba para el entrenador ' . $trainer->name,
            ]);

            Notification::create([
                'Trainer_id'  => $trainer->id,
                'Title'       => 'Segunda notificación para ' . $trainer->name,
                'Description' => 'Esta es la segunda notificación de prueba para el entrenador ' . $trainer->name,
            ]);
        }
    }
}
