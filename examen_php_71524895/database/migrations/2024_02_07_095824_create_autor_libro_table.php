<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutorLibroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autor_libro', function (Blueprint $table) {
            $table->id();
            $table->foreignId('autor_id')->constrained()->onDelete('cascade');
            $table->foreignId('libro_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->boolean('isActive')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('autor_libro');
    }
}
