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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('position_id'); // Relation avec Position
            $table->unsignedBigInteger('domain_id'); // Relation avec Domain
            $table->string('name');
            $table->text('description');
            $table->enum('status', ['open', 'closed', 'important'])->default('open'); // Statut de l'offre
            $table->timestamps();

            // Clés étrangères
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
            $table->foreign('domain_id')->references('id')->on('domains')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('offers');
    }
};
