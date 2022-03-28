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
        Schema::create('knights', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->integer('health');
            $table->integer('courage');
            $table->integer('justice');
            $table->integer('mercy');
            $table->integer('generosity');
            $table->integer('faith');
            $table->integer('nobility');
            $table->integer('hope');
            $table->integer('strength');
            $table->integer('defence');
            $table->integer('battle');
            $table->string('picture');
            $table->integer('virtues')->default(0);
            $table->integer('excluded_from_battle')->default(0);
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
        Schema::dropIfExists('knights');
    }
};

