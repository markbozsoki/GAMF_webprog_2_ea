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
        Schema::create('masolas', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('hallgato_id');
            $table->string('datum');
            $table->unsignedInteger('lap');
            $table->unsignedInteger('oldal')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('masolas');
    }
};
