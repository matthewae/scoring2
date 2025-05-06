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
        Schema::table('project_documents', function (Blueprint $table) {
            // First rename notes to catatan
            $table->renameColumn('notes', 'catatan');

            // Drop existing columns that will be replaced
            $table->dropColumn([
                'document_type',
                'document_number',
                'document_date',
                'status'
            ]);

            // Add new columns
            $table->string('no');
            $table->string('tahapan');
            $table->text('uraian');
            $table->boolean('kelengkapan')->default(false);
            $table->string('sumber')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project_documents', function (Blueprint $table) {
            $table->string('document_type');
            $table->string('document_number')->nullable();
            $table->date('document_date')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');

            $table->dropColumn([
                'no',
                'tahapan',
                'uraian',
                'kelengkapan',
                'sumber'
            ]);
        });
    }
};