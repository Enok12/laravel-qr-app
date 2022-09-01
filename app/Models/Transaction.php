<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Transaction
 * @package App\Models
 * @version August 30, 2022, 4:10 am UTC
 *
 * @property integer $user_id
 * @property integer $qr_code_owner
 * @property integer $qr_code_id
 * @property string $payment_method
 * @property string $message
 * @property number $amount
 * @property string $status
 */
class Transaction extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'transactions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'qr_code_owner',
        'qr_code_id',
        'payment_method',
        'message',
        'amount',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'qr_code_owner' => 'integer',
        'qr_code_id' => 'integer',
        'payment_method' => 'string',
        'message' => 'string',
        'amount' => 'float',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required|integer',
        'qr_code_owner' => 'nullable|integer',
        'qr_code_id' => 'required|integer',
        'payment_method' => 'nullable|string|max:255',
        'message' => 'nullable|string',
        'amount' => 'required|numeric',
        'status' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    //Get the qrcode that owns the transaction
    // public function qrcode(){
    //     return $this->belongsTo('App\Models\Qrcode');
    // }

    /**
     * Get the qrcodes that owns the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function qrcode()
    {
        return $this->belongsTo(Qrcode::class, 'qr_code_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
