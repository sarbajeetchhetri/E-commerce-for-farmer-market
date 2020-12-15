<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id');
            $table->string('users_email',100);
            $table->string('name',100);
            $table->string('address');
            $table->string('city',100);
            $table->string('state',100);
            $table->string('pincode',100);
            $table->string('country',100);
            $table->string('mobile',100);
            $table->string('product_name',100);
            $table->integer('quantity');
            $table->float('shipping_charges');
            $table->string('coupon_code',100);
            $table->string('coupon_amount',100);
            $table->string('order_status',100);
            $table->string('payment_method',100);
            $table->string('grand_total',100);
            $table->integer('farmer_id');
            $table->integer('products_id');
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
        Schema::dropIfExists('orders');
    }
}
