<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;




class UserFactory extends Factory
{
   
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $PasswordHash = Hash::make('Enok1020');
        $remembertoken = Str::random(10);

        return [
            'name' => $this->faker->name,
        'role_id' => $this->faker->numberBetween(1,4),
        'email' => $this->faker->unique()->safeEmail,
        'email_verified_at' => $this->faker->date('Y-m-d H:i:s'),
        'password' => $PasswordHash ,
        'remember_token' => $remembertoken ,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
