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
        Schema::create('document_types', function (Blueprint $table) {
            $table->string('code')->primary();
            $table->string('D_ID')->unique()->after('code');
            $table->string('parent_code')->nullable();
            $table->string('no')->nullable();
            $table->string('tahapan');
            $table->unsignedInteger('tahapan_order')->default(0);
            $table->text('uraian');
            $table->boolean('is_file_required')->default(true);
            $table->timestamps();

            // Menambahkan indeks untuk pengurutan
            $table->index(['tahapan', 'tahapan_order']);

            $table->foreign('parent_code')
                ->references('code')
                ->on('document_types')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_types');
    }
};