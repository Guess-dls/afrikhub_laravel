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
        Schema::create('residences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proprietaire_id');
            $table->string('nom');
            $table->text('description')->nullable();
            $table->integer('nombre_salons')->default(1);
            $table->integer('nombre_chambres')->default(1);
            $table->decimal('prix_journalier', 10, 2);
            $table->string('statut')->default('disponible');
            $table->boolean('disponible')->default(true);
            $table->string('ville');
            $table->string('pays');
            $table->string('quartier')->nullable();
            $table->string('adresse')->nullable();
            $table->date('date_disponible_apres')->nullable();
            $table->string('img')->nullable();
            $table->string('geolocalisation')->nullable();
            $table->timestamps();

            // Clé étrangère vers users
            $table->foreign('proprietaire_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residences');
    }
};
