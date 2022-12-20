<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('unit')->nullable();
            $table->string('cellphone2');
            $table->text('lastaddress')->nullable();

            $table->string('title');
            $table->text('address');
            $table->string('postal_code');

            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();

            $table->bigInteger('province_id');
            $table->bigInteger('city_id');
            $table->string('cellphone');

            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();

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
        Schema::dropIfExists('user_addresses');
    }
}
