<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sock;
use App\Models\User;

class SockSeeder extends Seeder
{
    public function run(): void
    {
    
        $users = [
            ['name' => 'Laura López', 'email' => 'laura@example.com'],
            ['name' => 'Pedro Jiménez', 'email' => 'pedro@example.com'],
            ['name' => 'Sofía Ruiz', 'email' => 'sofia@example.com'],
        ];

        foreach ($users as &$user) {
            $user = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => bcrypt('123456'),
            ]);
        }


        $socks = [
            ['Guy' => 'Blue Striped',     'URL' => 'https://example.com/sock1.jpg'],
            ['Guy' => 'Red Dotted',       'URL' => 'https://example.com/sock2.jpg'],
            ['Guy' => 'Green Plain',      'URL' => 'https://example.com/sock3.jpg'],
            ['Guy' => 'Yellow Classic',   'URL' => 'https://example.com/sock4.jpg'],
            ['Guy' => 'Purple Modern',    'URL' => 'https://example.com/sock5.jpg'],
            ['Guy' => 'Black Casual',     'URL' => 'https://example.com/sock6.jpg'],
            ['Guy' => 'White Sport',      'URL' => 'https://example.com/sock7.jpg'],
            ['Guy' => 'Orange Neon',      'URL' => 'https://example.com/sock8.jpg'],
            ['Guy' => 'Gray Business',    'URL' => 'https://example.com/sock9.jpg'],
            ['Guy' => 'Pink Hearts',      'URL' => 'https://example.com/sock10.jpg'],
        ];

        foreach ($socks as $sock) {
            Sock::create([
                'Guy' => $sock['Guy'],
                'URL' => $sock['URL'],
                'Upload_Date' => now()->subDays(rand(0, 15)),
                'users_id' => $users[array_rand($users)]->id,
            ]);
        }
    }
}
