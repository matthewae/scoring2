<?php

namespace App\Http\Controllers;

use App\Models\AssessmentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssessmentRequestController extends Controller
{
    public function index(Request $request)
    {
        $query = AssessmentRequest::with(['project.documentTypes', 'guest', 'project.projectDocuments'])
            ->orderBy('created_at', 'desc');

        if ($request->has('status')) {
            if ($request->status !== 'all') {
                $query->where('status', $request->status);
            }
        }

        $assessmentRequests = $query->paginate(10);

        return view('dashboard.user.assessment-requests.index', compact('assessmentRequests'));
    }

    public function show(AssessmentRequest $assessmentRequest)
    {
        return view('dashboard.user.assessment-requests.show', compact('assessmentRequest'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'description' => 'nullable|string|max:1000'
        ]);

        $assessmentRequest = AssessmentRequest::create([
            'guest_id' => Auth::id(),
            'project_id' => $request->project_id,
            'description' => $request->description,
            'status' => 'pending'
        ]);

        return redirect()->back()->with('success', 'Pengajuan penilaian berhasil dikirim.');
    }

    public function approve($id)
    {
        $assessmentRequest = AssessmentRequest::findOrFail($id);
        $assessmentRequest->update(['status' => 'approved']);

        return redirect()->back()->with('success', 'Pengajuan penilaian berhasil disetujui.');
    }

    public function reject($id)
    {
        $assessmentRequest = AssessmentRequest::findOrFail($id);
        $assessmentRequest->update(['status' => 'rejected']);

        return redirect()->back()->with('success', 'Pengajuan penilaian berhasil ditolak.');
    }
}