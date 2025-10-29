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
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // ID de session
            $table->foreignId('user_id')->nullable()->index(); // ID utilisateur (optionnel)
            $table->string('ip_address', 45)->nullable(); // IP de l'utilisateur
            $table->text('user_agent')->nullable(); // User agent (navigateur)
            $table->longText('payload'); // Données stockées dans la session
            $table->integer('last_activity')->index(); // Timestamp de dernière activité
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
