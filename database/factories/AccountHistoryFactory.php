<?php

namespace Database\Factories;

use App\Models\AccountHistory;
use App\Models\User;
use App\Models\Account;
use App\Repositories\AccountRepository;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountHistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AccountHistory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    

    public function definition()
    {
        $users = User::pluck('id')->all();
        
        return [
        'account_id' => $this->faker->numberBetween(1,10),
        'user_id' => $this->faker->randomElement($users), 
        'message' => $this->faker->paragraphs(1,true),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
