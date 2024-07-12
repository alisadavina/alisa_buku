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
        Schema::create('bukus', function (Blueprint $table) {
            $table->id('id_buku');
            $table->unsignedBigInteger('id_penulis');
            $table->foreign('id_penulis')->references('id')->on('penulis')->onDelete('cascade')->onUpdate('cascade');
            $table->string('foto_buku');
            $table->string('judul_buku');
            $table->integer('tahun_terbit');
            $table->text('deskripsi');
            $table->bigInteger('harga');
            $table->integer('stok')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};

