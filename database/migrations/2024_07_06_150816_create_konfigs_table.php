<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konfigs', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun');
            $table->datetime('tgl_buka')->nullable();
            $table->datetime('tgl_tutup')->nullable();
            $table->integer('min_no_peserta')->default(21);
            $table->integer('aktif')->default(0);
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
        Schema::dropIfExists('konfigs');
    }
};
