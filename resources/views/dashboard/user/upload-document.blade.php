@extends('layouts.app-with-sidebar')

@section('content')
<div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl shadow-lg p-8 backdrop-blur-sm backdrop-filter">
    <h2 class="text-2xl font-bold mb-4 text-indigo-900">Upload Dokumen</h2>
    <p class="text-indigo-600 mb-6">Pilih jenis dokumen dan upload file sesuai dengan tahapan yang tersedia.</p>

    <form action="{{ route('dashboard.user.documents.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Tahapan Dokumen -->
        <div>
            <label for="tahapan" class="block text-sm font-medium text-indigo-700 mb-2">Tahapan</label>
            <select id="tahapan" name="tahapan" class="w-full rounded-lg border-indigo-200 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 bg-white/80 backdrop-blur-sm" required>
                <option value="">Pilih Tahapan</option>
                <option value="Pra-tender">Pra-tender</option>
                <option value="Tender">Tender</option>
                <option value="Persiapan">Persiapan</option>
                <option value="Pelaksanaan">Pelaksanaan</option>
            </select>
        </div>

        <!-- Jenis Dokumen -->
        <div>
            <label for="document_type_id" class="block text-sm font-medium text-indigo-700 mb-2">Jenis Dokumen</label>
            <select id="document_type_id" name="document_type_id" class="w-full rounded-lg border-indigo-200 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 bg-white/80 backdrop-blur-sm" required disabled>
                <option value="">Pilih Jenis Dokumen</option>
            </select>
        </div>

        <!-- Sub Dokumen -->
        <div>
            <label for="sub_document_type_id" class="block text-sm font-medium text-indigo-700 mb-2">Sub Dokumen (Opsional)</label>
            <select id="sub_document_type_id" name="sub_document_type_id" class="w-full rounded-lg border-indigo-200 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 bg-white/80 backdrop-blur-sm" disabled>
                <option value="">Pilih Sub Dokumen</option>
            </select>
        </div>

        <!-- Upload File -->
        <div>
            <label for="file" class="block text-sm font-medium text-indigo-700 mb-2">File Dokumen</label>
            <input type="file" id="file" name="file" class="w-full border border-indigo-200 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-white/80 backdrop-blur-sm" required accept=".pdf,.doc,.docx,.xls,.xlsx">
            <p class="text-sm text-indigo-500 mt-1">Format yang diizinkan: PDF, DOC, DOCX, XLS, XLSX (Maks. 10MB)</p>
        </div>

        <!-- Sumber Dokumen -->
        <div>
            <label for="source" class="block text-sm font-medium text-indigo-700 mb-2">Sumber Dokumen</label>
            <input type="text" id="source" name="source" class="w-full rounded-lg border-indigo-200 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 bg-white/80 backdrop-blur-sm" placeholder="Contoh: Departemen Teknik, Konsultan, dll" required>
        </div>

        <!-- Catatan -->
        <div>
            <label for="notes" class="block text-sm font-medium text-indigo-700 mb-2">Catatan (Opsional)</label>
            <textarea id="notes" name="notes" rows="3" class="w-full rounded-lg border-indigo-200 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 bg-white/80 backdrop-blur-sm" placeholder="Tambahkan catatan atau keterangan tambahan"></textarea>
        </div>

        <!-- Tombol Submit -->
        <div class="flex justify-end">
            <button type="submit" class="bg-gradient-to-r from-indigo-500 to-blue-600 text-white px-6 py-2 rounded-lg hover:from-indigo-600 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transform transition-all duration-200 hover:scale-105">
                <i class="fas fa-upload mr-2"></i>Upload Dokumen
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tahapanSelect = document.getElementById('tahapan');
        const documentTypeSelect = document.getElementById('document_type_id');
        const subDocumentTypeSelect = document.getElementById('sub_document_type_id');

        tahapanSelect.addEventListener('change', function() {
            const tahapan = this.value;
            documentTypeSelect.disabled = !tahapan;
            documentTypeSelect.innerHTML = '<option value="">Pilih Jenis Dokumen</option>';
            subDocumentTypeSelect.innerHTML = '<option value="">Pilih Sub Dokumen</option>';
            subDocumentTypeSelect.disabled = true;

            if (tahapan) {
                fetch(`/api/document-types?tahapan=${tahapan}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(type => {
                            if (!type.parent_code) {
                                const option = new Option(type.uraian, type.id);
                                documentTypeSelect.add(option);
                            }
                        });
                    });
            }
        });

        documentTypeSelect.addEventListener('change', function() {
            const documentTypeId = this.value;
            subDocumentTypeSelect.innerHTML = '<option value="">Pilih Sub Dokumen</option>';
            subDocumentTypeSelect.disabled = !documentTypeId;

            if (documentTypeId) {
                fetch(`/api/document-types/${documentTypeId}/sub-types`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.length > 0) {
                            data.forEach(type => {
                                const option = new Option(type.uraian, type.id);
                                subDocumentTypeSelect.add(option);
                            });
                            subDocumentTypeSelect.disabled = false;
                        }
                    });
            }
        });
    });
</script>
@endpush
@endsection