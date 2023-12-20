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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->integer('is_verified')->default(0);  //ici on veut que la colonne ait une valeur ZERO et de type integer

            $table->string('activation_code',255)->nullable(); //champ "activation-code de type varchar 255 et à defaut null (bien différrent du défaut à chiffre zéro)

            $table->string('activation_token',255)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //




        });
    }
};
