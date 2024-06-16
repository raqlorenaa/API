<?php

namespace Database\Factories;

use App\Models\Eventos;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventosFactory extends Factory
{
    protected $model = Eventos::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'orcamento' => $this->faker->randomFloat(2, 100, 10000),
            'nome_evento' => $this->faker->sentence,
            'desc_evento' => $this->faker->paragraph,
            'data_evento' => $this->faker->dateTimeBetween('+1 week', '+1 month'),
            'local_evento' => $this->faker->address,
            'info_contato' => $this->faker->email,
            'status_proposta' => 'pendente',
        ];
    }
}

