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
        Schema::table('document_types', function (Blueprint $table) {
            if (!Schema::hasColumn('document_types', 'tahapan_order')) {
                $table->unsignedInteger('tahapan_order')->default(0)->after('tahapan');
                $table->index(['tahapan', 'tahapan_order']);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('document_types', function (Blueprint $table) {
            if (Schema::hasColumn('document_types', 'tahapan_order')) {
                $table->dropIndex(['tahapan', 'tahapan_order']);
                $table->dropColumn('tahapan_order');
            }
        });
    }
};