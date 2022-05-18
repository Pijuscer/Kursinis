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
        Schema::create('dog_cares', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('vardas');
            $table->string('pavarde');
            $table->string('telefono_numeris');
            $table->string('adresas');
            $table->string('suns_veisle');
            $table->string('suns_amzius');
            $table->integer('suns_svoris');
            $table->string('draugiskas');
            $table->string('alergiskas');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dog_cares');

    }
};
