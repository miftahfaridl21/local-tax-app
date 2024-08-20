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
        Schema::create('lapor_pajaks', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_lapor');
            $table->foreignId('objek_id')->constrained('objek_pajaks');
            $table->foreignId('jenis_id')->constrained('jenis_pajaks');
            $table->integer('omset_harian')->default(0);
            $table->integer('pajak')->default(0);
            $table->text('keterangan')->nullable();
            $table->bigInteger('userinput');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lapor_pajaks');
    }
};
