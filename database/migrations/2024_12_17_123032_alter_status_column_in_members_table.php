<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // Dans la migration (database/migrations/xxxx_xx_xx_create_members_table.php)

    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');               // Nom du membre
            $table->string('prenom');             // Prénom du membre
            $table->foreignId('position_id')      // Position associée au membre
                  ->constrained('positions')   // Assure que position existe dans la table positions
                  ->onDelete('cascade');
            $table->string('image')->nullable();  // Image du membre
            $table->enum('status', ['signé', 'non signé'])->default('non signé'); // Status (signé ou non signé)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('members');
    }
};
