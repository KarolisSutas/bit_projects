<?php

use App\Models\Story;
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
        Schema::create('stories', function (Blueprint $table) {
            $table->id();
            $table->string('full_name'); // vardas ir pavardė
            $table->string('story_title'); // istorijos/aukos pavadinimas
            $table->text('description'); 
            $table->decimal('required_amount', 12, 2)->unsigned(); // reikalinga suma
            $table->decimal('collected_amount', 12, 2)->default(0)->unsigned(); // jau surinkta suma
            $table->enum('category', ['health', 'education', 'hobbies', 'travel']); // kategorija (health, education, hobbies, travel)
            $table->boolean('is_completed')->default(false);
            $table->boolean('is_approved')->default(false);
            $table->string('cover_image')->nullable();
            $table->string('avatar_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stories');

    }
};
