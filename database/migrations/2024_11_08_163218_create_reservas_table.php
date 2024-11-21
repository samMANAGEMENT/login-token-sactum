<?php

// database/migrations/xxxx_xx_xx_create_reservas_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('mesa_id')->constrained('mesas')->onDelete('cascade');
            $table->timestamp('fecha_reserva');
            $table->enum('estado', ['pendiente', 'confirmada', 'cancelada']);
            $table->string('canal');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservas');
    }
}
