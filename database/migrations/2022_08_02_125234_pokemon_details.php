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
        Schema::create('pokemon_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pokemon_id');
            $table->foreign('pokemon_id')
                ->references('id')
                ->on('pokemon')
                ->onDelete('cascade');
            $table->string('name');
            $table->json('sprites');
            $table->json('types');
            $table->decimal('height');
//            $table->decimal('weight');
//            $table->json('moves');
//            $table->decimal('order');
//            $table->string('species');
//            $table->json('stats');
//            $table->json('abilities');
//            $table->string('form');
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
        Schema::dropIfExists('pokemon_details');
    }
};
