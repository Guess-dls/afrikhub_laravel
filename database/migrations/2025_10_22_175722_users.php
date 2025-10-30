<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email', 191)->unique();
            $table->string('password');
            $table->string('contact')->nullable();
            $table->string('type_compte')->nullable();
            $table->string('token', 64)->nullable();
            $table->string('statut')->default('inactif');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken(); // pour la session "remember me"
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
