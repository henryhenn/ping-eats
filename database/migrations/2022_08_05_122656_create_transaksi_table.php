<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produk_dagang_id')->constrained('produk_dagang');
            $table->foreignId('user_id');
            $table->enum('jenis_transaksi', ['PING', 'Pembelian']);
            $table->enum('status', ['Sudah Dikonfirmasi Gerobakan','Sedang Diproses Gerobakan', 'Sedang Diantarkan', 'Belum Dikonfirmasi Gerobakan', 'Sudah Selesai']);
            $table->integer('kuantitas_beli');
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
        Schema::dropIfExists('transaksis');
    }
};
