<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['peserta', 'super-admin'])->default('peserta')->nullable(false);
            $table->boolean('has_voted')->default(false);
            $table->boolean('has_blacklisted')->default(false);
            $table->unsignedBigInteger('class_id')->nullable(true);
            $table->foreign('class_id')
                ->references('id')
                ->on('class')
                ->onCascade('restrict');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert(
            array(
                'name' => 'Mimin',
                'email' => 'mimin@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'super admin'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
