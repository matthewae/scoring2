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
        'uraian',
        'is_file_required'
    ];

    protected $casts = [
        'is_file_required' => 'boolean'
    ];

    /**
     * Get the documents associated with this document type.
     */
    public function documents(): HasMany
    {
        return $this->hasMany(ProjectDocument::class, 'document_type_code', 'code');
    }

    /**
     * Get the parent document type.
     */
    public function parent()
    {
        return $this->belongsTo(DocumentType::class, 'parent_code', 'code');
    }

    /**
     * Get the child document types.
     */
    public function children()
    {
        return $this->hasMany(DocumentType::class, 'parent_code', 'code');
    }
}