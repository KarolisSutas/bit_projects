<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
{
    Schema::create('employers', function (Blueprint $table) {
        $table->id(); // BIGINT UNSIGNED
        $table->string('company_name');
        $table->foreignIdFor(\App\Models\User::class)
            ->nullable()
            ->constrained()
            ->nullOnDelete();
        $table->timestamps();
    });

    // 1) stulpelis
    Schema::table('job_posts', function (Blueprint $table) {
        if (!Schema::hasColumn('job_posts', 'employer_id')) {
            $table->unsignedBigInteger('employer_id')->nullable();
        }
    });

    // 2) FK (fiksuotas vardas)
    Schema::table('job_posts', function (Blueprint $table) {
        $table->foreign('employer_id', 'fk_job_posts_employer')
            ->references('id')->on('employers')
            ->cascadeOnDelete();
    });
}

public function down(): void
{
    Schema::disableForeignKeyConstraints();

    if (Schema::hasTable('job_posts') && Schema::hasColumn('job_posts', 'employer_id')) {
        Schema::table('job_posts', function (Blueprint $table) {
            try { $table->dropForeign('fk_job_posts_employer'); } catch (\Throwable $e) {}
            try { $table->dropColumn('employer_id'); } catch (\Throwable $e) {}
        });
    }

    Schema::dropIfExists('employers');

    Schema::enableForeignKeyConstraints();
}
};
