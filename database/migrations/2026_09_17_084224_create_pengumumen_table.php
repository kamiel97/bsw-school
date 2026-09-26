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
        Schema::create('pengumumen', function (Blueprint $table) {
            $table->increments('id_pengumuman');
            $table->string('judul', 50);
            $table->text('isi');
            $table->date('tanggal');
            $table->enum('status', ["Publish", "Draft"]);
         // Relasi ke tabel users
            $table->foreignId('id_user')->constrained('users', 'id_user');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengumumen');
    }
};
