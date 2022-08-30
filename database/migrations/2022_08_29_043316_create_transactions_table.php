<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('id');
            $table->integer('user_id'); // User adding transaciton
            $table->integer('qr_code_owner')->nullable();
            $table->integer('qr_code_id');
            $table->string('payment_method')->nullable(); //Paypal, Stripe, Paystack
            $table->longText('message')->nullable()->default('initiated');
            $table->float('amount',10,4);
            $table->string('status');
            $table->softDeletes();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
