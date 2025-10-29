<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // utilisateur qui réserve
            $table->foreignId('residence_id')->constrained()->onDelete('cascade'); // résidence réservée
            $table->date('date_arrivee');
            $table->date('date_depart');
            $table->integer('personnes');
            $table->integer('total'); // prix total
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
