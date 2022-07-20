<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ticket_no' => uniqid('TIC-'),
            'name' => fake()->name(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->safeEmail(),
            'wait_time' => now(),
            'call_in_time' => now(),
            'status' => fake()->randomElement(['PENDING', 'PROCESSING', 'COMPLETED ']),
            'department_id' => fake()->randomElement(['DEPARTMENT 1', 'DEPARTMENT 2', 'DEPARTMENT 3', 'DEPARTMENT 4']),
        ];
    }
}
