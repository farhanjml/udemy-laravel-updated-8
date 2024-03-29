<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'api_token' => Str::random(80),
            'remember_token' => Str::random(10),
            'is_admin' => false
        ];
    }

    public function farhan ()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Farhan',
                'email' => 'farhan@laravel.test',
                'email_verified_at' => now(),
                'password' => '$2y$10$QHh5p2YeDz1JQT/gUpghZOaQQPnwq1dWbCTJzfM4SSINOiUDj13lW', // password
                'api_token' => Str::random(80),
                'remember_token' => Str::random(10),
                'is_admin' => true
            ];

        });

    }
}
