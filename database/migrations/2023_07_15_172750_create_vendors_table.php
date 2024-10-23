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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->string('name_of_firm_company');
            $table->string('commission');
            $table->string('type_of_the_firm')->nullable();
            $table->string('status_of_company')->nullable();
            $table->string('address');
            $table->string('country')->nullable();
            $table->string('state');
            $table->string('city');
            $table->string('file');
            $table->string('categorie')->nullable();
            $table->string('description');
            $table->string('password');
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
        Schema::dropIfExists('vendors');
    }
};
