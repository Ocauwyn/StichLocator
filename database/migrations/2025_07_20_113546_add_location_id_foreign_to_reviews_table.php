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
        Schema::table('reviews', function (Blueprint $table) {
            // Hapus kolom location_id yang lama (integer)
            $table->dropColumn('location_id');
            // Tambahkan kembali sebagai foreignId dengan constraint
            $table->foreignId('location_id')->nullable()->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            // Hapus foreign key constraint
            $table->dropConstrainedForeignId('location_id');
            // Tambahkan kembali kolom location_id sebagai integer
            $table->integer('location_id');
        });
    }
};
