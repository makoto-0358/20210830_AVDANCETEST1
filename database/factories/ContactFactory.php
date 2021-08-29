<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lastName' => $this->faker->lastName(255),
            'firstName' => $this->faker->firstName(255),
            'gender' => $this->faker->randomElement($array=['男性', '女性']),
            'email' => $this->faker->safeEmail(255),
            'postcode' => $this->faker->regexify('[0-9]{3}[-][0-9]{4}'),
            'address' => $this->faker->address(255),
            'building_name' => $this->faker->secondaryAddress(255),
            'opinion' => $this->faker->realText(255),
        ];
    }
}
