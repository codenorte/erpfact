<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');

            $table->rememberToken();

            $table->string('phone');
            $table->string('company_name')->nullable();
            $table->integer('role_id');

            $table->integer('biller_id')->nullable();
            $table->integer('warehouse_id')->nullable();
            
            $table->boolean('is_active');

            $table->boolean('is_deleted');


            
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
        Schema::dropIfExists('users');
    }
}
