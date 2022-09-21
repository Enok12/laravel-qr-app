<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class AccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Account::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $withdrawal_method = array('Bank','Paypal','Stripe');
        $users = User::pluck('id')->all();

        return [
            'user_id' => $this->faker->unique()->randomElement($users),
        'balance' => $this->faker->randomDigitNotNull,
        'total_credit' => $this->faker->randomDigitNotNull,
        'total_debit' => $this->faker->randomDigitNotNull,
        'withdrawal_method' => $withdrawal_method[rand(0,2)],
        'payment_email' => $this->faker->email,
        'bank_name' => $this->faker->word,
        'bank_branch' => $this->faker->state,
        'bank_account' => $this->faker->bankAccountNumber ,
        'applied_for_payout' => $this->faker->numberBetween(0,1) ,
        'paid' => $this->faker->numberBetween(0,1) ,
        'country' => $this->faker->country,
        'other_details' => $this->faker->paragraphs(4,true),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
