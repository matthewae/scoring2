<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AssessmentRequest extends Model
{
    protected $fillable = [
        'guest_id',
        'project_id',
        'description',
        'status'
    ];

    protected $casts = [
        'status' => 'string',
    ];

    public function guest(): BelongsTo
    {
        return $this->belongsTo(User::class, 'guest_id');
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}