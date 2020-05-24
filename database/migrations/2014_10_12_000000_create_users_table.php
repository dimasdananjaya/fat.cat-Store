<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id_user');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('profile_image')->nullable();
            $table->string('status')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id_product');
            $table->string('name');
            $table->string('type');
            $table->decimal('price',10,2);
            $table->string('description');
            $table->rememberToken();
            $table->timestamps();
        });

        
        Schema::create('product_images', function (Blueprint $table) {
            $table->bigIncrements('id_product_images');
            $table->unsignedBigInteger('id_product');
            $table->string('images');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_product')->references('id_product')->on('products');
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id_order');
            $table->unsignedBigInteger('id_user');
            $table->string('nama_pembeli');
            $table->string('kontak_pembeli');

            $table->decimal('total_price',10,2);
            $table->string('status');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('users');
        });


        Schema::create('orders_product', function (Blueprint $table) {
            $table->unsignedBigInteger('id_order');
            $table->foreign('id_order')->references('id_order')->on('orders');
            $table->unsignedBigInteger('id_product');
            $table->foreign('id_product')->references('id_product')->on('products');
            $table->integer('quantity');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
