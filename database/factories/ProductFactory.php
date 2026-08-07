public function definition(): array
{
    return [
        'name' => fake()->words(3, true),
        'price' => fake()->numberBetween(10000, 500000),
        'description' => fake()->paragraph(),
        'stock' => fake()->numberBetween(1, 100),
    ];
}