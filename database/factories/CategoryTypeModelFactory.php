<?php

namespace Database\Factories;
use App\Models\CategoryTypeModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CategoryTypeModel>
 */
class CategoryTypeModelFactory extends Factory
{
    protected $model = CategoryTypeModel::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'typename' => $this->faker->unique()->sentence,
            'status' => 'Active'
        ];
    }
}
