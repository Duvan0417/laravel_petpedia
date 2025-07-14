<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Topic;

class TopicSeeder extends Seeder
{
    public function run(): void
    {
        $topics = [
            ['title' => 'Cuidados de perros', 'description' => 'Consejos básicos para el cuidado canino.'],
            ['title' => 'Alimentación de gatos', 'description' => 'Qué deben comer los gatos.'],
            ['title' => 'Vacunas obligatorias', 'description' => 'Vacunas que deben recibir las mascotas.'],
            ['title' => 'Cómo bañar a tu perro', 'description' => 'Técnicas y frecuencia recomendadas.'],
            ['title' => 'Cepillado de gatos', 'description' => 'Frecuencia y herramientas para cepillar.'],
        ];

        foreach ($topics as $topic) {
            Topic::create($topic);
        }
    }
}
