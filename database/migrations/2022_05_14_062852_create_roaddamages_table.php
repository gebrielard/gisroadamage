<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $connection = 'pgsql';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roaddamages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('kota');
            $table->string('kabupaten');
            $table->integer('lebar_jalan');
            $table->integer('riwayat_banjir');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roaddamages');
    }
};
