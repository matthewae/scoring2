<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'no',
        'tahapan',
        'uraian',
        'kelengkapan',
        'catatan',
        'sumber',
        'file_path'
    ];

    protected $casts = [
        'kelengkapan' => 'boolean'
    ];

    /**
     * Get the project that owns the document.
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}