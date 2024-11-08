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
        Schema::create('additive_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('additive_id');
            $table->string('lang', 2);  // Código de idioma (e.g., 'en', 'es', 'fr')
            $table->string('additive_name')->nullable();
            
            $table->text('food_category_desc')->nullable();
            $table->text('description')->nullable();
            $table->text('option_process')->nullable();
            $table->text('food_uses')->nullable();
            $table->text('industrial_uses')->nullable();
            $table->text('beneficial_properties')->nullable();
            $table->text('side_effects')->nullable();
            //Afegim els camps que es poden traduir
            $table->timestamps();

            $table->unique(['additive_id', 'lang']);  // Evitar duplicados por idioma
    $table->foreign('additive_id')->references('id')->on('additives')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('additive_translations');
    }
};
