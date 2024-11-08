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
        Schema::create('additive_details', function (Blueprint $table) {
            $table->id();
            $table->integer('policy_item_id');
            $table->string('policy_item_code');
            $table->string('additive_e_code')->nullable()->index();
            $table->string('additive_inss_code')->nullable();
            $table->text('additive_note')->nullable();
            $table->string('additive_name');
            $table->boolean('additive_is_a_group');
            $table->string('fip_url')->nullable();
            $table->text('group_members')->nullable();
            $table->text('member_of_groups')->nullable();
            $table->text('additive_message')->nullable();
            $table->text('additive_synonyms')->nullable();
            $table->integer('display_order')->nullable();
            $table->string('food_category_level')->nullable();
            $table->string('food_category')->nullable();
            $table->text('food_category_desc')->nullable();
            $table->string('restriction_type')->nullable();
            $table->decimal('restriction_value', 10, 2)->nullable();
            $table->string('restriction_unit')->nullable();
            $table->text('restriction_comment')->nullable();
            $table->text('restriction_note')->nullable();
            $table->text('legislation_reference')->nullable();
            $table->string('legislation_short')->nullable();
            $table->string('legislation_oj_ref')->nullable();
            $table->date('legislation_pub_date')->nullable();
            $table->date('legislation_entry_into_force_date')->nullable();
            $table->date('legislation_application_date')->nullable();
            $table->string('legislation_url')->nullable();
            //$table->string('hash_column');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('additive_details');
    }
};
