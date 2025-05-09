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
            ->where('user_id', auth()->id())
            ->get();

        return view('dashboard.user.project-scores.index', compact('projectScores'));
    }

    public function show($id)
    {
        $project = Project::with(['documents', 'assessmentRequests'])
            ->where('user_id', auth()->id())
            ->findOrFail($id);

        return view('dashboard.user.project-scores.show', compact('project'));
    }
}