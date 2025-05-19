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
        $projectScore = Project::with(['documents.documentType', 'assessmentRequests'])
            ->findOrFail($id);

        return view('dashboard.user.project-scores.show', compact('projectScore'));
    }
}