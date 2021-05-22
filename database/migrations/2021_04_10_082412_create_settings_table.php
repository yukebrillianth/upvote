<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('nama_instansi')->default('SMP Negeri 1 UpVote')->nullable(false);
            $table->string('periode')->default('2021 - 2022')->nullable(true);
            $table->string('nama_kegiatan', 255)->default('Pemilihan Ketua Osis')->nullable(false);
            $table->timestamp('tanggal_mulai')->nullable(true);
            $table->timestamp('tanggal_selesai')->nullable(true);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });

        DB::table('settings')->insert(
            array(
                'nama_instansi' => 'SMP Negeri 1 UpVote',
                'periode' => '2021 - 2022',
                'nama_kegiatan' => 'Pemilihan Ketua Osis',
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
        Schema::dropIfExists('settings');
    }
}
