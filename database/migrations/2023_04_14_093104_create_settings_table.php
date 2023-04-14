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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('organization_name');
            $table->string('organization_slogan')->nullable();
            $table->string('organization_logo')->nullable();
            $table->string('voting_title');
            $table->string('voting_description');
            $table->string('voting_logo');
            $table->string('voting_active');
            $table->boolean('allow_user_registration')->default(false);
            $table->boolean('auto_attend')->default(true);
            $table->enum('theme', ['orange', 'green', 'blue'])->default('orange');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
