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
        'name',
        'description',
        'weight',
        'is_required'
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
        return $this->belongsToMany(Project::class, 'project_documents')
                    ->withPivot(['file_path', 'status', 'score', 'remarks'])
                    ->withTimestamps();
    }
}