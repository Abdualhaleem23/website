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
        Schema::create('asking_students', function (Blueprint $table) {
            $table->id();
            $table->string('ask');
            $table->integer('show_hide');
            $table->integer('classes');
            $table->integer('type_ask');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asking_students');
    }
};
