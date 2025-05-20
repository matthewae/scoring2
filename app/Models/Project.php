<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'location',
        'ministry_institution',
        'guest_id',
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
     * Get the document types associated with this project.
     */
    public function documentTypes(): BelongsToMany
    {
        return $this->belongsToMany(DocumentType::class, 'project_document_types', 'project_id', 'document_type_code')
                    ->withPivot(['custom_code', 'description', 'is_required'])
                    ->withTimestamps();
    }

    /**
     * Get all project document types.
     */
    public function projectDocumentTypes(): HasMany
    {
        return $this->hasMany(ProjectDocumentType::class);
    }

    /**
     * Get the user that owns the project.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the guest user associated with the project.
     */
    public function guest(): BelongsTo
    {
        return $this->belongsTo(User::class, 'guest_id', 'id');
    }

    /**
     * Get the project documents for the project.
     */
    public function projectDocuments(): HasMany
    {
        return $this->hasMany(ProjectDocument::class);
    }

    /**
     * Calculate the total score of the project based on document scores.
     */
    public function getTotalScore(): float
    {
        return $this->documentTypes()
                    ->wherePivotNotNull('score')
                    ->get()
                    ->sum(function ($documentType) {
                        return ($documentType->pivot->score * $documentType->weight) / 100;
                    });
    }

    /**
     * Get the completion status of required documents.
     */
    public function getCompletionStatus(): array
    {
        $requiredTypes = $this->documentTypes()
                            ->where('is_required', true)
                            ->get();

        $completedRequired = $requiredTypes
                            ->where('pivot.status', 'approved')
                            ->count();

        return [
            'total_required' => $requiredTypes->count(),
            'completed_required' => $completedRequired,
            'is_complete' => $completedRequired === $requiredTypes->count()
        ];
    }

    /**
     * Get the documents for the project.
     */
    public function documents(): HasMany
    {
        return $this->hasMany(ProjectDocument::class);
    }
}