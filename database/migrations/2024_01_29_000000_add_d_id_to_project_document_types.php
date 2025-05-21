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
        Schema::table('project_document_types', function (Blueprint $table) {
            $table->string('D_ID')->after('document_type_code');
            $table->foreign('D_ID')
                  ->references('D_ID')
                  ->on('document_types')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project_document_types', function (Blueprint $table) {
            $table->dropForeign(['D_ID']);
            $table->dropColumn('D_ID');
        });
    }
};