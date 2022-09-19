<?php

namespace Database\Factories;

use App\Models\Qrcode;
use Illuminate\Database\Eloquent\Factories\Factory;

class QrcodeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Qrcode::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => function(){
                return App\Models\User::all()->random();
            },
        'website' => $this->faker->url,
        'company_name' => $this->faker->name,
        'product_name' => $this->faker->sentence(rand(4,8),true),
        'product_url' => $this->faker->url,
        'callback_url' => $this->faker->url,
        'qrcode_path' => $this->faker->url,
        'amount' => $this->faker->randomDigitNotNull,
        'status' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
