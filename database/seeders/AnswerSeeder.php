<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Topic;
use App\Models\Answer;

class AnswerSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['name' => 'Ana Gómez', 'email' => 'ana@example.com'],
            ['name' => 'Luis Torres', 'email' => 'luis@example.com'],
            ['name' => 'Carla Mendoza', 'email' => 'carla@example.com'],
            ['name' => 'Diego Ruiz', 'email' => 'diego@example.com'],
            ['name' => 'Elena Ríos', 'email' => 'elena@example.com'],
        ];

        foreach ($users as &$user) {
            $user = User::firstOrCreate(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'password' => bcrypt('123456'),
                ]
            );
        }

        $topics = [
            ['title' => 'Cuidados de perros', 'description' => 'Consejos básicos para el cuidado canino.'],
            ['title' => 'Alimentación de gatos', 'description' => 'Qué deben comer los gatos.'],
            ['title' => 'Vacunas obligatorias', 'description' => 'Vacunas que deben recibir las mascotas.'],
            ['title' => 'Cómo bañar a tu perro', 'description' => 'Técnicas y frecuencia recomendadas.'],
            ['title' => 'Cepillado de gatos', 'description' => 'Frecuencia y herramientas para cepillar.'],
        ];

        foreach ($topics as &$topic) {
            $topic = Topic::create($topic);
        }

        $respuestas = [
            'Es importante cepillar a tu gato al menos 2 veces por semana.',
            'Los perros deben vacunarse anualmente para prevenir enfermedades.',
            'No todos los alimentos humanos son seguros para mascotas.',
            'Bañar al perro una vez al mes suele ser suficiente.',
            'Los gatos prefieren comida húmeda, pero también deben comer pienso seco.',
            'Vacuna a tu cachorro desde las 6 semanas de edad.',
            'El cepillado previene bolas de pelo en gatos.',
            'Alimenta a tu mascota con productos específicos para su especie.',
            'Evita bañar a los gatos, ellos se asean solos, salvo casos extremos.',
            'Lleva a tu mascota al veterinario cada 6 meses para revisión.',
        ];

        for ($i = 0; $i < 10; $i++) {
            Answer::create([
                'content' => $respuestas[$i],
                'creation_date' => now()->subDays(rand(0, 30)),
                'topic_id' => $topics[array_rand($topics)]->id,
                'users_id' => $users[array_rand($users)]->id,
            ]);
        }
    }
}
