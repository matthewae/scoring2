<?php

namespace App\Http\Controllers\Dashboard\Guest;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\DocumentType;
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
        $query = Project::with(['projectDocuments.documentType', 'assessmentRequests', 'guest']);

        // Filter by search term
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where('name', 'like', '%' . $searchTerm . '%');
        }

        // Filter by status
        if ($request->has('status') && !empty($request->status)) {
            $status = $request->status;
            if (in_array($status, ['planning', 'in_progress', 'completed', 'on_hold'])) {
                $query->where('status', $status);
            }
        }

        $projects = $query->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('dashboard.guest.project-scores.index', compact('projects'));
    }

    /**
     * Display the specified project score.
     *
     * @param  \App\Models\Project  $projectScore
     * @return \Illuminate\View\View
     */
    public function showNew(Project $projectScore)
    {
        $project = $projectScore->load(['projectDocuments', 'assessmentRequests']);

        // Get document types associated with this project through project_document_types
        $documentTypes = $project->documentTypes;
        $groupedDocuments = $documentTypes->groupBy('tahapan');
        
        $tahapanData = [];
        foreach($project->projectDocuments as $doc) {
            $tahapan = $doc->documentType->tahapan;
            if (!isset($tahapanData[$tahapan])) {
                $tahapanData[$tahapan] = ['approved' => 0, 'pending' => 0];
            }
            $doc->score >= 60 ? $tahapanData[$tahapan]['approved']++ : $tahapanData[$tahapan]['pending']++;
        }

        // Calculate total documents per tahapan for percentage
        $tahapanPercentages = [];
        foreach($tahapanData as $tahapan => $data) {
            $total = $data['approved'] + $data['pending'];
            $tahapanPercentages[$tahapan] = [
                'approved' => $total > 0 ? round(($data['approved'] / $total) * 100) : 0,
                'pending' => $total > 0 ? round(($data['pending'] / $total) * 100) : 0
            ];
        }
        
        return view('dashboard.guest.project-scores.show-new', compact('project', 'documentTypes', 'groupedDocuments', 'tahapanData', 'tahapanPercentages'));
    }


}