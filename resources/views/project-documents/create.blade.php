@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pengajuan Dokumen Project</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('project-documents.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="project_id" class="form-label">Pilih Project</label>
                            <select class="form-select @error('project_id') is-invalid @enderror" id="project_id" name="project_id" required>
                                <option value="">Pilih Project</option>
                                @foreach($projects as $project)
                                    <option value="{{ $project->id }}" {{ old('project_id') == $project->id ? 'selected' : '' }}>
                                        {{ $project->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('project_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="document_type_id" class="form-label">Tipe Dokumen</label>
                            <select class="form-select @error('document_type_id') is-invalid @enderror" id="document_type_id" name="document_type_id" required>
                                <option value="">Pilih Tipe Dokumen</option>
                                @foreach($documentTypes as $type)
                                    <option value="{{ $type->id }}" {{ old('document_type_id') == $type->id ? 'selected' : '' }}>
                                        {{ $type->no }} - {{ $type->uraian }}
                                    </option>
                                @endforeach
                            </select>
                            @error('document_type_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="file" class="form-label">Upload File</label>
                            <input type="file" class="form-control @error('file') is-invalid @enderror" id="file" name="file" required>
                            @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-text">Max file size: 10MB</div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Upload Dokumen</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection