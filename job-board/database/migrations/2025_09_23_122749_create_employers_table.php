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
        Schema::create('employers', function (Blueprint $table) {
            $table->id();

            $table->string('company_name');
            $table->foreignIdFor(\App\Models\User::class)->nullable()->constrained();

            $table->timestamps();
        });

        Schema::table('job_posts', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Employer::class)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
    
        if (Schema::hasTable('job_posts') && Schema::hasColumn('job_posts', 'employer_id')) {
            Schema::table('job_posts', function (Blueprint $table) {
                // bandome numesti FK vardu, jei egzistuoja
                try { $table->dropForeign('job_posts_employer_id_foreign'); } catch (\Throwable $e) {}
                // arba „universalus“ kelias (Laravel 8+)
                try { $table->dropConstrainedForeignId('employer_id'); } catch (\Throwable $e) {}
                // jei dar liko – numetam patį stulpelį
                if (Schema::hasColumn('job_posts', 'employer_id')) {
                    try { $table->dropColumn('employer_id'); } catch (\Throwable $e) {}
                }
            });
        }
    
        Schema::dropIfExists('employers');
    
        Schema::enableForeignKeyConstraints();
    }
    
};
