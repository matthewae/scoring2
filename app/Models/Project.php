<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'location',
        'ministry_institution',
        'planning_consultant',
        'mk_consultant',
        'contractor',
        'selection_method',
        'contract_value',
        'spmk_date',
        'duration_days',
        'estimated_cost',
        'start_date',
        'end_date',
        'status',
        'user_id'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'spmk_date' => 'date',
        'estimated_cost' => 'decimal:2',
        'contract_value' => 'decimal:2',
        'duration_days' => 'integer'
    ];

    /**
     * Get the assessment requests for the project.
     */
    public function assessmentRequests(): HasMany
    {
        return $this->hasMany(AssessmentRequest::class);
    }

    /**
     * Get the user that owns the project.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the documents for the project.
     */
    public function documents(): HasMany
    {
        return $this->hasMany(ProjectDocument::class);
    }
}