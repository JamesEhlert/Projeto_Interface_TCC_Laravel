<?php

// database/migrations/xxxx_xx_xx_create_sensors_table.php
// database/migrations/2024_08_28_212143_create_sensors_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSensorsTable extends Migration
{
    public function up()
    {
        Schema::create('sensors', function (Blueprint $table) {
            $table->id();
            $table->string('descricao'); // Campo para a descrição do sensor
            $table->decimal('umidade_minima', 5, 2);
            $table->decimal('umidade_maxima', 5, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sensors');
    }
}

