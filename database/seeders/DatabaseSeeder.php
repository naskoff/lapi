<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $users = [];
        for($i=0; $i<250_000; $i++){
            $users[] = [
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' => fake()->password(),
            ];
        }

        DB::disableQueryLog();

        foreach (array_chunk($users, 10_000) as $chunk) {
            echo "Run chunk users ..." . PHP_EOL;
            DB::table('users')->insert($chunk);
        }
    }
}
