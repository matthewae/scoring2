<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update D_ID values from document_types table
        DB::table('project_documents')
            ->join('document_types', 'project_documents.document_type_code', '=', 'document_types.code')
            ->update(['project_documents.D_ID' => DB::raw('document_types.D_ID')]);

        // Add the foreign key constraint
        Schema::table('project_documents', function (Blueprint $table) {
            $table->foreign('D_ID')
                  ->references('D_ID')
                  ->on('document_types')
                  ->onDelete('cascade');
            
            // Make the column required
            $table->string('D_ID')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project_documents', function (Blueprint $table) {
            $table->dropForeign(['D_ID']);
            $table->dropColumn('D_ID');
        });
    }
};