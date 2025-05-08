@extends('layouts.app-with-sidebar')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">
            <i class="fas fa-tasks text-blue-500 mr-2"></i>
            Daftar Pengajuan Penilaian
        </h2>
        <div class="flex space-x-2">
            <button onclick="filterStatus('all')" class="px-4 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium transition-colors duration-200">
                Semua
            </button>
            <button onclick="filterStatus('pending')" class="px-4 py-2 rounded-lg bg-yellow-100 hover:bg-yellow-200 text-yellow-800 font-medium transition-colors duration-200">
                Pending
            </button>
            <button onclick="filterStatus('completed')" class="px-4 py-2 rounded-lg bg-green-100 hover:bg-green-200 text-green-800 font-medium transition-colors duration-200">
                Selesai
            </button>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-lg overflow-hidden">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Project</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pengaju</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tahap</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipe Dokumen</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Pengajuan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($assessmentRequests as $request)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $request->project->name }}</div>
                            <div class="text-sm text-gray-500">{{ Str::limit($request->project->description, 50) }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $request->guest->name }}</div>
                            <div class="text-sm text-gray-500">{{ $request->guest->email }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $request->project->stage }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $request->project->document_type->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $request->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                                {{ ucfirst($request->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $request->created_at->format('d M Y H:i') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('dashboard.user.assessment-requests.show', $request->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                <i class="fas fa-eye"></i> Detail
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                            Tidak ada pengajuan penilaian saat ini.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $assessmentRequests->links() }}
    </div>
</div>

@push('scripts')
<script>
    function filterStatus(status) {
        const url = new URL(window.location.href);
        url.searchParams.set('status', status);
        window.location.href = url.toString();
    }
</script>
@endpush
@endsection