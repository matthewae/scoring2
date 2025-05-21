<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectScoreController extends Controller
{
    public function index()
    {
        $projectScores = Project::with(['documents', 'assessmentRequests'])
            ->get();

        return view('dashboard.user.project-scores.index', compact('projectScores'));
    }

    public function show($id)
    {
        $projectScore = Project::with([
            'documents.documentType',
            'assessmentRequests',
            'documentTypes' => function($query) {
                $query->select('document_types.*')
                        ->orderBy('document_types.tahapan')
                        ->orderBy('document_types.no');
            },
            'projectDocuments' => function($query) {
                $query->with('documentType');
            }
        ])->findOrFail($id);

        $documentsByTahapan = $projectScore->documentTypes
            ->sortBy('tahapan_order')
            ->groupBy('tahapan');

        return view('dashboard.user.project-scores.show', compact('projectScore', 'documentsByTahapan'));
    }
}