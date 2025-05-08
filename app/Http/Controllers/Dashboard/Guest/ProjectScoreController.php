<?php

namespace App\Http\Controllers\Dashboard\Guest;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectScoreController extends Controller
{
    /**
     * Display a listing of the project scores.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $projects = Project::where('guest_id', auth()->id())
            ->with(['projectDocuments', 'assessmentRequests'])
            ->latest()
            ->paginate(10);

        return view('dashboard.guest.project-scores.index', compact('projects'));
    }

    /**
     * Display the specified project score.
     *
     * @param  \App\Models\Project  $projectScore
     * @return \Illuminate\View\View
     */
    public function show(Project $projectScore)
    {
        $project = $projectScore->load(['projectDocuments', 'assessmentRequests']);
        
        return view('dashboard.guest.project-scores.show', compact('project'));
    }
}