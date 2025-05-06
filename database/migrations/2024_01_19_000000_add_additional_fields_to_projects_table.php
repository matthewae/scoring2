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
            // Drop existing columns that will be replaced
            $table->dropColumn(['estimated_cost', 'start_date', 'end_date']);
            // Update status enum
            $table->enum('status', ['active', 'pending', 'completed'])->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->decimal('estimated_cost', 15, 2);
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['planning', 'in_progress', 'completed', 'on_hold'])->change();
        });
    }
};