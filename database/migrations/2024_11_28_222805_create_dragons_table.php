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
        Schema::create('dragons', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 200); //aqui sao as colunas da tabela, deve ter o tipo e o nome
            $table->integer('age');
            $table->string('element');
            $table->text('image');
            $table->foreignId('trainer_id')->references('id')->on('trainers')->nullable()->constrained();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dragons');
    }
};
