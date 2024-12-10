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
        // Tabla usuarios
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 150);
            $table->string('apellido', 150);
            $table->string('telefono', 20);
            $table->string('correo', 255)->unique(); // Clave única para correos
            $table->string('contrasena', 255);
            $table->enum('role', ['usuario', 'administrador'])->default('usuario'); // Rol del usuario
            $table->timestamp('fecha_registro')->useCurrent(); // Fecha por defecto
            $table->timestamps();
        });

        // Tabla destinos
        Schema::create('destinos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 150)->unique(); // Nombres únicos para destinos
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });

        // Tabla tipos_vuelo
        Schema::create('tipos_vuelo', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50)->unique(); // Nombre único para tipo de vuelo
            $table->timestamps();
        });

        // Tabla vuelos
        Schema::create('vuelos', function (Blueprint $table) {
            $table->id();
            $table->string('origen', 150);
            $table->foreignId('id_destino')->constrained('destinos')->onDelete('cascade');
            $table->dateTime('fecha_salida');
            $table->dateTime('fecha_llegada');
            $table->decimal('precio', 10, 2);
            $table->string('aerolinea', 100);
            $table->integer('duracion'); // Duración en minutos
            $table->foreignId('id_tipo_vuelo')->constrained('tipos_vuelo')->onDelete('cascade');
            $table->integer('capacidad_max');
            $table->string('estado_vuelo', 50)->default('activo'); // Ejemplo: activo, cancelado
            $table->timestamps();
        });

        // Tabla tipos_habitacion
        Schema::create('tipos_habitacion', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100)->unique();
            $table->timestamps();
        });

        // Tabla hoteles
        Schema::create('hoteles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 150)->unique(); // Evitar nombres duplicados
            $table->foreignId('id_destino')->constrained('destinos')->onDelete('cascade');
            $table->integer('habitaciones_disponibles')->unsigned();
            $table->decimal('precio', 10, 2);
            $table->decimal('calificacion', 3, 2)->nullable(); // Ejemplo: rango de 1.00 a 5.00
            $table->foreignId('id_tipo_habitacion')->constrained('tipos_habitacion')->onDelete('cascade');
            $table->text('descripcion');
            $table->timestamps();
        });

        // Tabla reservas
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('estado', 50)->default('pendiente'); // Ejemplo: pendiente, confirmada
            $table->integer('personas')->unsigned();
            $table->foreignId('id_cliente')->constrained('usuarios')->onDelete('cascade');
            $table->timestamps();
        });

        // Tabla pagos
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_reserva')->constrained('reservas')->onDelete('cascade');
            $table->decimal('precio', 10, 2);
            $table->string('metodo', 50); // Ejemplo: tarjeta, PayPal
            $table->string('estado', 50)->default('pendiente'); // Ejemplo: pendiente, realizado
            $table->timestamp('fecha')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Eliminar tablas en orden inverso para evitar conflictos con claves foráneas
        Schema::dropIfExists('pagos');
        Schema::dropIfExists('reservas');
        Schema::dropIfExists('hoteles');
        Schema::dropIfExists('tipos_habitacion');
        Schema::dropIfExists('vuelos');
        Schema::dropIfExists('tipos_vuelo');
        Schema::dropIfExists('destinos');
        Schema::dropIfExists('usuarios');
    }
};
