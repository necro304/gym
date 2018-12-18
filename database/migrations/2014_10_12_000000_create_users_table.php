<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;

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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('verified')->default(User::USUARIO_NO_VERIFICADO);
            $table->string('verified_token')->nullable();
            $table->string('admin')->default(User::USARIO_REGULAR);
            $table->string('password');
            $table->date('birthdate');
            $table->integer('height');
            $table->string('type_document');
            $table->integer('document');
            $table->unsignedInteger('plan_id');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('plan_id')->references('id')->on('plans');
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
