<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Servidor>
 */
class ServidorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'avatar' => $this->faker->imageUrl(200, 200, 'people'),
            'nome' => $this->faker->name,
            'matricula' => $this->faker->numberBetween(100000, 999999),
            'cargo' => $this->faker->randomElement(['Professor', 'Técnico Administrativo', 'Coordenador', 'Diretor']),
            'email' => $this->faker->unique()->safeEmail,
            'telefone' => $this->faker->phoneNumber,
            'endereco' => $this->faker->address,
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(),
        ];
    }
}
