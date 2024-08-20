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
        Schema::create('objek_pajaks', function (Blueprint $table) {
            $table->id();
            $table->string('op_nama');
            $table->string('op_pengelola');
            $table->string('nohp_pengelola');
            $table->text('op_alamat');
            $table->integer('op_status')->default(1);
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('jp_id')->constrained('jenis_pajaks')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('objek_pajaks');
    }
};
