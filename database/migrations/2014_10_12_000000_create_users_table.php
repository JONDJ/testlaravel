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
            $table->id();
            $table->string('name',100);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            /*
                Code added by Jonathan Ortega
                2021-04-27
                Modified to add columns by testCI
            */
            $table->string('cell_phone',10);
            $table->string('document',11);
            $table->date('birth_date');
            $table->string('city_id',15);
            $table->rememberToken();
            $table->timestamps();
            // End Jonathan Ortega
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
