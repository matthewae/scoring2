<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectDocumentType extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'document_type_code',
        'D_ID',
        'custom_code',
        'description',
        'is_required'
    ];

    protected $casts = [
        'is_required' => 'boolean'
    ];

    /**
     * Get the project that owns this document type.
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get the document type associated with this project document type.
     */
    public function documentType(): BelongsTo
    {
        return $this->belongsTo(DocumentType::class, 'document_type_code', 'code');
    }
}