<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Portaria>
 */
class PortariaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'numero' => $this->faker->randomNumber(4, true),
            'ano' => $this->faker->year(),
            'visibilidade' => $this->faker->randomElement(['Pública', 'Privada']),
            'publicacao' => $this->faker->date(),
            'validade' => $this->faker->randomElement(['Temporária', 'Permanente']),
            'data_validade' => $this->faker->date(),
            'descricao' => $this->faker->text,
            'arquivo' => $this->faker->word,
            'integrantes_nao_servidores' => $this->faker->randomElement(["", $this->faker->name]),
            'ativa' => $this->faker->boolean,
        ];
    }
}
