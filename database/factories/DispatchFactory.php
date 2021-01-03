<?php

namespace Database\Factories;

use App\Models\Dispatch;
use Illuminate\Database\Eloquent\Factories\Factory;

class DispatchFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dispatch::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'track_code' => $this->faker->md5,
            'status' => "expects",
            'city_dispatch' => $this->faker->city,
            'city_destination' => $this->faker->city,
            'price' => random_int(1, 1000000),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];
    }
}
