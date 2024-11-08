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
        Schema::create('additives', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('policy_item_id');
            $table->string('policy_item_code')->nullable();
            $table->string('additive_e_code')->nullable();
            $table->string('additive_inss_code')->nullable();
            $table->string('additive_name')->nullable();
            $table->string('additive_type');
            $table->string('fip_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('additives');
    }
};
