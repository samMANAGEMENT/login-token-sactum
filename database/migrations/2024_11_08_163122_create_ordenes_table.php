<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenesTable extends Migration
{
    public function up()
    {
        Schema::create('ordenes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('mesa_id')->constrained('mesas')->onDelete('cascade');
            $table->enum('estado', ['pendiente', 'procesando', 'servido']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ordenes');
    }
}

