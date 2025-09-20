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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            // Ryšys su istorija (kiekviena auka priklauso vienai istorijai)
            $table->foreignId('story_id')
                  ->constrained('stories')
                  ->cascadeOnDelete();
            $table->string('donor_full_name')->nullable();
            $table->boolean('is_anonymous')->default(false);
            $table->decimal('donated_amount', 10, 2)->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
