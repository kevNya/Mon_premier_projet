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
        Schema::create('materiel', function (Blueprint $table) {
            $table->id(); // ID auto-incrémentée
            $table->string('nom'); // Colonne nom acceptant NULL
            $table->integer('qtite_stock'); // Quantité en stock
            $table->date('date_achat'); // Date d'achat
            $table->date('date_peremption')->nullable(); // Date de péremption
            $table->integer('stock_critique'); // Niveau critique de stock
            $table->boolean('perime'); // Indique si le matériel est périmé
            $table->integer('qtite_Acommander')->nullable(); // Quantité à commander
            $table->timestamps(); // Colonnes created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiel');
    }
};
