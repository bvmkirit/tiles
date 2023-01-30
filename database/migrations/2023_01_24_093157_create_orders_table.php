<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('order_no');
            $table->bigInteger('user_id');
            $table->text('address');
            $table->integer('state_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('phone')->nullable();
            $table->text('ordernote')->nullable();
            $table->enum('status',['Order Placed','Accepted','Completed','On the way','Delivered'])->default('Order Placed');
            $table->double('total',9,2);
            $table->date('order_date');
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
