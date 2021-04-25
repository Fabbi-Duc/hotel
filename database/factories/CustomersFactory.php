<?php

namespace Database\Factories;

use App\Models\Customers;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CustomersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customers::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lastname' => $this->faker->name,
            'firstname' => $this->faker->name,
            'phone' => '0833910940',
            'gender' => random_int(0,1),
            'identity_card' => '152229678',
            'email' => strtolower($this->faker->unique()->lastName) . "@gmail.com",
            'image_user' => 'https://image.shutterstock.com/image-photo/poster-above-white-cabinet-plant-260nw-1173139144.jpg',
            'password' => bcrypt(123456), // password
            'birthday' => '2021-04-29',
            'remember_token' => Str::random(10),
        ];
    }
}
