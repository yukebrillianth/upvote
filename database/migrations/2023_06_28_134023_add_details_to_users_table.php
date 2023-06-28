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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['email', 'email_verified_at']);
            $table->bigInteger('identity_number')->nullable(false)->unique();
            $table->integer('age')->nullable(true);
            $table->mediumText('address')->nullable(true);
            $table->boolean('has_blacklisted')->default(false);
            $table->boolean('has_voted')->default(false);
            $table->boolean('is_present')->default(false);
            $table->foreignId('group_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->dropColumn('identity_number');
            $table->dropColumn('age');
            $table->dropColumn('address');
            $table->dropColumn('has_blacklisted');
            $table->dropColumn('has_voted');
            $table->dropColumn('is_present');
            $table->dropColumn('group_id');
        });
    }
};
