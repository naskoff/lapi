<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class GenerateRedisData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-redis-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $competitions = [1, 3, 5];

        $totalUsers = User::count();

        foreach ($competitions as $competition) {
            $competitionKey = "$competition:competition";

            $countUsers = fake()->numberBetween(0, $totalUsers);

            $users = User::inRandomOrder()->limit($countUsers)->get()->pluck('email')->toArray();

            \Cache::delete($competitionKey);
            \Cache::set($competitionKey, $users);
        }

        $competitors = [1, 3, 5, 7, 9, 10];

        foreach ($competitors as $competitor) {
            $competitorKey = "$competitor:competitor";

            $countUsers = fake()->numberBetween(0, $totalUsers / 3);

            $users = User::inRandomOrder()->limit($countUsers)->get()->pluck('email')->toArray();

            \Cache::delete($competitorKey);
            \Cache::set($competitorKey, $users);
        }

        $matches = [1, 3, 5, 7, 9, 10];

        foreach ($matches as $match) {
            $matchKey = "$match:match";

            $countUsers = fake()->numberBetween(0, $totalUsers / 3);

            $users = User::inRandomOrder()->limit($countUsers)->get()->pluck('email')->toArray();

            \Cache::delete($matchKey);
            \Cache::set($matchKey, $users);
        }
    }
}
