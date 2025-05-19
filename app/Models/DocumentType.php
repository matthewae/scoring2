<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DocumentType extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $primaryKey = 'code';
    protected $keyType = 'string';

    protected $fillable = [
        'code',
        'parent_code',
        'no',
        'tahapan',
        'tahapan_order',
        'uraian',
        'is_file_required'
    ];

    protected $casts = [
        'is_required' => 'boolean',
        'weight' => 'decimal:2'
    ];

    /**
     * Get the projects associated with this document type.
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_document_types', 'document_type_code', 'project_id')
                    ->withPivot(['custom_code', 'description', 'is_required'])
                    ->withTimestamps();
    }

    /**
     * Get all project document types using this document type.
     */
    public function projectDocumentTypes()
    {
        return $this->hasMany(ProjectDocumentType::class, 'document_type_code', 'code');
    }
}