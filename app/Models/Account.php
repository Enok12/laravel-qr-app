<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Account
 * @package App\Models
 * @version September 3, 2022, 5:36 am UTC
 *
 * @property integer $user_id
 * @property number $balance
 * @property number $total_credit
 * @property number $total_debit
 * @property string $withdrawal_method
 * @property string $payment_email
 * @property string $bank_name
 * @property string $bank_branch
 * @property string $bank_account
 * @property string $country
 * @property string $other_details
 */
class Account extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'accounts';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'balance',
        'total_credit',
        'total_debit',
        'withdrawal_method',
        'payment_email',
        'bank_name',
        'bank_branch',
        'bank_account',
        'country',
        'other_details'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'balance' => 'float',
        'total_credit' => 'float',
        'total_debit' => 'float',
        'withdrawal_method' => 'string',
        'payment_email' => 'string',
        'bank_name' => 'string',
        'bank_branch' => 'string',
        'bank_account' => 'string',
        'country' => 'string',
        'other_details' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required|integer',
        'balance' => 'required|numeric',
        'total_credit' => 'required|numeric',
        'total_debit' => 'required|numeric',
        'withdrawal_method' => 'required|string|max:255',
        'payment_email' => 'nullable|string|max:255',
        'bank_name' => 'nullable|string|max:255',
        'bank_branch' => 'nullable|string|max:255',
        'bank_account' => 'nullable|string|max:255',
        'country' => 'nullable|string|max:255',
        'other_details' => 'nullable|string',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
