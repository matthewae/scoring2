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
            // Add file_path column for storing file location
            $table->string('file_path')->after('file_size')->nullable();
            
            // Drop the BLOB column since we'll store files on disk
            $table->dropColumn('file_content');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project_documents', function (Blueprint $table) {
            // Restore the BLOB column
            $table->binary('file_content')->after('file_size');
            
            // Remove the file_path column
            $table->dropColumn('file_path');
        });
    }
};