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
        if (!Schema::hasColumn('document_types', 'D_ID')) {
            // First add the column without unique constraint
            Schema::table('document_types', function (Blueprint $table) {
                $table->string('D_ID')->nullable()->after('code');
            });
        }

        // Update existing records with unique D_ID values based on code
        DB::table('document_types')->whereNull('D_ID')->orWhere('D_ID', '')->update([
            'D_ID' => DB::raw('CONCAT("DOC_", code)')
        ]);

        // Now add unique constraint
        Schema::table('document_types', function (Blueprint $table) {
            $table->unique('D_ID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('document_types', function (Blueprint $table) {
            $table->dropColumn('D_ID');
        });
    }
};