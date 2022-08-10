<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_role', function(Blueprint $table){
            $table->increments('id');
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('tbl_admin', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('id_role')->nullable(true);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')->unique();
            $table->string('path_image');
            $table->string('id_city');
            $table->string('id_district');
            $table->string('id_ward');
            $table->timestamps();
            $table->foreign('id_role')
                    ->references('id')
                    ->on('tbl_role')
                    ->onDelete('SET NULL');
        });

        Schema::create('tbl_customer', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')->unique();
            $table->string('path_image');
            $table->string('id_city');
            $table->string('id_district');
            $table->string('id_ward');
            $table->timestamps();
        });

        Schema::create('tbl_category', function(Blueprint $table){
            $table->increments('id');
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('tbl_product', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('id_category')->nullable(true);
            $table->longText('description');
            $table->string('path_image');
            $table->integer('price');
            $table->integer('quantity');
            $table->timestamps();
            $table->foreign('id_category')
                    ->references('id')
                    ->on('tbl_category')
                    ->onDelete('SET NULL');
        });

        Schema::create('tbl_order', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('id_customer');
            $table->unsignedInteger('id_admin')->nullable(true);
            $table->Integer('status');
            $table->string('id_city');
            $table->string('id_district');
            $table->string('id_ward');
            $table->bigInteger('total_price');
            $table->timestamps();
            $table->foreign('id_customer')
                    ->references('id')
                    ->on('tbl_customer');
            $table->foreign('id_admin')
                    ->references('id')
                    ->on('tbl_admin');
        });

        Schema::create('tbl_order_detail', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('id_order');
            $table->unsignedInteger('id_product');
            $table->integer('quantity');
            $table->bigInteger('total_price');
            $table->timestamps();
            $table->foreign('id_order')
                    ->references('id')
                    ->on('tbl_order');
            $table->foreign('id_product')
                    ->references('id')
                    ->on('tbl_product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_order_detail');
        Schema::drop('tbl_order');
        Schema::drop('tbl_customer');
        Schema::drop('tbl_admin');
        Schema::drop('tbl_role');
        Schema::drop('tbl_product');
        Schema::drop('tbl_category');
    }
};
