<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname'=>$this->faker->firstName,
            'lastname'=>$this->faker->lastName,
            'middlename'=>$this->faker->firstName,
            'address_1'=>$this->faker->address,
            'address_2'=>$this->faker->address,
            'phone'=>$this->faker->phoneNumber,
            'postcode'=>$this->faker->postcode,
            'country_id'=> rand(1,100),
            'state_id'=>rand(1,1000),
            'city_id'=>rand(1,10000)
        ];
    }
}
