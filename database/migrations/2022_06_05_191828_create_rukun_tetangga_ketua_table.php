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
        Schema::create('rukun_tetangga_ketua', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('rt_id', false, true)->nullable()->default(null);
            $table->bigInteger('penduduk_id', false, true)->nullable()->default(null);
            $table->timestamps();

            $table->foreign('rt_id')
                ->references('id')->on('rukun_tetangga_ketua')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('penduduk_id')
                ->references('id')->on('penduduks')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rukun_tetangga_ketua');
    }
};
