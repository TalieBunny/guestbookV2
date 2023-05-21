<?php

namespace Database\Factories;

use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB as FacadesDB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MessageFactory extends Factory
{
    protected $model = Message::class;

    public function definition(): array
    {
        $userIDs = FacadesDB::table('users')->pluck('id');

        return [
            'user_id' => $this->faker->randomElement($userIDs),
            'message' => fake()->text(100),
            'reply' => fake()->text(30)
        ];
    }
}
