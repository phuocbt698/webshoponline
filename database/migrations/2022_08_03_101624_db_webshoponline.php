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

        Schema::create('tbl_category', function(Blueprint $table){
            $table->increments('id');
            $table->string('name')->unique();
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
        Schema::drop('tbl_admin');
        Schema::drop('tbl_role');
        Schema::drop('tbl_category');
    }
};
