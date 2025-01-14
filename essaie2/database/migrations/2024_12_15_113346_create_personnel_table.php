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
        Schema::create('personnel', function (Blueprint $table) {
            $table->id(); // Clé primaire auto-incrémentée
            $table->string('name', 255)->nullable(); // Nom, nullable
            $table->integer('age')->nullable(); // Âge, nullable
            $table->char('sexe', 1)->nullable(); // Sexe, nullable
            $table->unsignedBigInteger('telephone')->nullable(); // Téléphone (19 chiffres), nullable
            $table->string('email', 255)->nullable(); // Email, nullable
            $table->string('photo', 255)->nullable(); // Email, nullable
            $table->timestamps(); // Colonnes created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnel');
    }
};
