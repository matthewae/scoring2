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
        Schema::table('projects', function (Blueprint $table) {
            $table->string('ministry_institution')->after('location');
            $table->string('planning_consultant')->after('ministry_institution');
            $table->string('mk_consultant')->after('planning_consultant');
            $table->string('contractor')->after('mk_consultant');
            $table->string('selection_method')->after('contractor');
            $table->decimal('contract_value', 15, 2)->after('selection_method');
            $table->date('spmk_date')->after('contract_value');
            $table->integer('duration_days')->after('spmk_date');
            $table->date('start_date')->nullable()->after('duration_days');
            $table->date('end_date')->nullable()->after('start_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn([
                'ministry_institution',
                'planning_consultant',
                'mk_consultant',
                'contractor',
                'selection_method',
                'contract_value',
                'spmk_date',
                'duration_days',
                'start_date',
                'end_date'
            ]);
        });
    }
};