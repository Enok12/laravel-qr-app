<?php

namespace Database\Factories;

use App\Models\Transaction;
use App\Models\User;
use App\Models\Qrcode;
use Illuminate\Database\Eloquent\Factories\Factory;


class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = array('Completed','Iniated','Failed');

        return [
            'user_id' => function(){
                return User::all()->random();
            },
            'qr_code_owner' => function(){
                return User::all()->random();
            },
            'qr_code_id' => function(){
                return Qrcode::all()->random();
            },
        'payment_method' =>'paystack/card',
        'message' => $this->faker->text,
        'amount' => $this->faker->numberBetween(200,4000),
        'status' => $status[rand(0,2)],
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
