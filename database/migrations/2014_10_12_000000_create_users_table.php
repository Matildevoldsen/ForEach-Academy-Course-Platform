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
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('subscription_type', ['member', 'premium', 'premium_plus']);
            $table->string('subscription_id');
            $table->string('phone');
            $table->string('address_street');
            $table->string('address_region');
            $table->string('address_zipcode');
            $table->string('address_country');
            $table->dateTime('trial_start');
            $table->dateTime('trial_end');
            $table->tinyInteger('is_active');
            $table->integer('is_admin');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
 php     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
