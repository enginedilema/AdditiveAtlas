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
        Schema::create('additive_detail_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('additive_detail_id');
            $table->string('lang', 2);
            $table->string('additive_e_code')->nullable()->index();

            $table->integer('display_order')->nullable();
            $table->string('food_category_level')->nullable();
            $table->string('food_category')->nullable();
            $table->text('food_category_desc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('additive_detail_translations');
    }
};
