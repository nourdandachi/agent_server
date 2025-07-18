<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agent>
 */
class AgentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->words(2, true),
            'type' => $this->faker->randomElement(['chatbot', 'image-classifier', 'recommender', 'nlp', 'voice-assistant']),
            'model' => $this->faker->randomElement(['GPT-3.5', 'GPT-4', 'BERT', 'ResNet50', 'LLaMA', 'Custom-CNN']),
            'accuracy' => $this->faker->randomFloat(2, 70, 99.9),
            'status' => $this->faker->randomElement(['active', 'inactive', 'training']),
            'deployed_at' => $this->faker->date(),
            'version' => 'v' . $this->faker->randomFloat(1, 1.0, 3.5),
        ];
    }
}
