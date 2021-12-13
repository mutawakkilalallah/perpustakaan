<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->bigInteger('niup');
            $table->string('photo', 255);
            $table->string('nama', 255);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->enum('status', ['siswa', 'pengurus', 'alumni']);
            $table->string('tempat_lahir', 255);
            $table->date('tanggal_lahir');
            $table->integer('id_kelas');
            $table->integer('id_kamar');
            $table->string('alamat', 255);
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
        Schema::dropIfExists('anggota');
    }
}
