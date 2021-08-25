<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaketToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paket_tours', function (Blueprint $table) {
            $table->id();
            $table->string('namapaket');
            $table->string('daftardestinasi');
            $table->string('hargapaket');
            $table->string('deskripsi');
            $table->string('id_travel');
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
        Schema::dropIfExists('paket_tours');
    }
}
