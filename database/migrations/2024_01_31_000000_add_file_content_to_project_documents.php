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
            // Add new BLOB column for storing file content
            $table->binary('file_content')->after('file_path');
            $table->string('file_name')->after('file_path');
            $table->string('file_type')->after('file_name');
            $table->integer('file_size')->after('file_type');
            
            // Drop the old file_path column since we'll store files in DB
            $table->dropColumn('file_path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project_documents', function (Blueprint $table) {
            // Restore the original file_path column
            $table->string('file_path')->after('document_date');
            
            // Remove the new columns
            $table->dropColumn(['file_content', 'file_name', 'file_type', 'file_size']);
        });
    }
};