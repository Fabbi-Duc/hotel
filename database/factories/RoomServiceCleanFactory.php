<?php

namespace Database\Factories;

use App\Models\RoomServiceClean;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomServiceCleanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RoomServiceClean::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'room_id' => random_int(1,10),
            'clean_id' => random_int(1,10),
            'start_time' => '2021-04-29',
            'end_time' => '2021-05-01',
            'cost' => '100000',
            'status' => random_int(1,2),
        ];
    }
}
