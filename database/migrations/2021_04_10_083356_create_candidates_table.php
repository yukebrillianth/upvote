<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kandidat')->nullable(false);
            $table->longText('visi');
            $table->longText('misi');
            $table->longText('program_kerja');
            $table->string('image');
            $table->unsignedBigInteger('class_id')->nullable();
            $table->foreign('class_id')
                ->references('id')
                ->on('class')
                ->onCascade('delete');
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
        Schema::dropIfExists('candidates');
    }
}
