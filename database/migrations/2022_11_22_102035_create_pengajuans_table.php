<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->string('nama_karyawan');
            $table->string('jabatan_karyawan');
            $table->enum('jenis_izin',['0', '1','2','3'])->default('0');
            $table->string('attachment')->nullable();
            $table->string('tgl_izin');
            $table->string('lama_izin');
            $table->string('alasan')->nullable();
            $table->string('selesai_lembur')->nullable();
            $table->enum('status',['1', '2', '3'])->default('1');
            $table->enum('draft',['0', '1'])->default('0');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuans');
    }
}
