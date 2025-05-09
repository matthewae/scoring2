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
            $table->string('document_type_code')->after('project_id');
            $table->foreign('document_type_code')
                    ->references('code')
                    ->on('document_types')
                    ->onDelete('cascade');

            // Add status column back as it's being used in ProjectController
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project_documents', function (Blueprint $table) {
            $table->dropForeign(['document_type_code']);
            $table->dropColumn(['document_type_code', 'status']);
        });
    }
};