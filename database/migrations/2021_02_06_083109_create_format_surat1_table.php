<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormatSurat1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('format_surat1', function (Blueprint $table) {
            $table->id();
            // $table->BigInteger('id_kategori')->unsigned();
            $table->foreignId('id_kategori')->constrained('kategori')->onDelete('cascade')->onUpdate('cascade');
            $table->string('judul_format');
            $table->string('keterangan')->nullable();
            // $table->mediumtext ('isi_format')->nullable();
            $table->string('filename');
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
        Schema::dropIfExists('format_surat1');
    }
}
