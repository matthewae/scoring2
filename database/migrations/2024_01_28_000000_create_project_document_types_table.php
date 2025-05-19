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
        Schema::create('project_document_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->string('document_type_code');
            $table->string('custom_code')->nullable(); // Untuk kode spesifik project jika diperlukan
            $table->text('description')->nullable();
            $table->boolean('is_required')->default(true);
            $table->timestamps();

            $table->foreign('project_id')
                  ->references('id')
                  ->on('projects')
                  ->onDelete('cascade');

            $table->foreign('document_type_code')
                  ->references('code')
                  ->on('document_types')
                  ->onDelete('cascade');

            // Memastikan kombinasi project_id dan document_type_code unik
            $table->unique(['project_id', 'document_type_code']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_document_types');
    }
};