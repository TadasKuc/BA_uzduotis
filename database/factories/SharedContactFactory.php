<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\SharedContact;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SharedContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SharedContact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_from_id' => User::all()->random()->id,
            'user_to_id' => User::all()->random()->id,
            'contact_id' => Contact::all()->random()->id
        ];
    }
}
