<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nom de l'équipe
            $table->text('description'); // Description de l'équipe
            $table->string('image')->nullable(); // Image de l'équipe
            $table->foreignId('domain_id')->constrained()->onDelete('cascade'); // Clé étrangère vers le domaine
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
