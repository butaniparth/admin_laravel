<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->integer('id');
            $table->string('name');
            $table->string('sortname');
            $table->string('phonecode');
            $table->timestamps();

            
        });
        Schema::create('states', function (Blueprint $table) {
            $table->integer('id');
            $table->string('name');
            $table->increments('country_id');
            $table->foreign('id')
                ->references('id')->on('countries');
            //->onDelete('cascade');
            $table->timestamps();

            
        });
        Schema::create('cities', function (Blueprint $table) {
            $table->integer('id');
            $table->string('name');
            $table->increments('state_id');      
            $table->foreign('country_id')
                ->references('id')->on('states');
            //->onDelete('cascade');      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('countries');
        Schema::drop('states');
        Schema::drop('cities');
    }
};