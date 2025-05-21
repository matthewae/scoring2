<?php

namespace Database\Seeders;

use App\Models\DocumentType;
use Illuminate\Database\Seeder;

class DocumentTypeSeeder extends Seeder
{
    public function run(): void
    {
        $documentTypes = [
            // Tahap Persiapan
            [
                'code' => 'P1',
                'parent_code' => null,
                'no' => 1,
                'tahapan' => 'Tahap Persiapan',
                'tahapan_order' => 1,
                'uraian' => 'Dokumen Perencanaan',
                'is_file_required' => true
            ],
            [
                'code' => 'P2',
                'parent_code' => null,
                'no' => 2,
                'tahapan' => 'Tahap Persiapan',
                'tahapan_order' => 1,
                'uraian' => 'Dokumen Anggaran',
                'is_file_required' => true
            ],
            
            // Tahap Pengadaan
            [
                'code' => 'PG1',
                'parent_code' => null,
                'no' => 1,
                'tahapan' => 'Tahap Pengadaan',
                'tahapan_order' => 2,
                'uraian' => 'Dokumen Pemilihan',
                'is_file_required' => true
            ],
            [
                'code' => 'PG2',
                'parent_code' => null,
                'no' => 2,
                'tahapan' => 'Tahap Pengadaan',
                'tahapan_order' => 2,
                'uraian' => 'Dokumen Kontrak',
                'is_file_required' => true
            ],
            
            // Tahap Pelaksanaan
            [
                'code' => 'PL1',
                'parent_code' => null,
                'no' => 1,
                'tahapan' => 'Tahap Pelaksanaan',
                'tahapan_order' => 3,
                'uraian' => 'Laporan Harian',
                'is_file_required' => true
            ],
            [
                'code' => 'PL2',
                'parent_code' => null,
                'no' => 2,
                'tahapan' => 'Tahap Pelaksanaan',
                'tahapan_order' => 3,
                'uraian' => 'Laporan Mingguan',
                'is_file_required' => true
            ],
            [
                'code' => 'PL3',
                'parent_code' => null,
                'no' => 3,
                'tahapan' => 'Tahap Pelaksanaan',
                'tahapan_order' => 3,
                'uraian' => 'Laporan Bulanan',
                'is_file_required' => true
            ],
            
            // Tahap Serah Terima
            [
                'code' => 'ST1',
                'parent_code' => null,
                'no' => 1,
                'tahapan' => 'Tahap Serah Terima',
                'tahapan_order' => 4,
                'uraian' => 'Berita Acara Serah Terima',
                'is_file_required' => true
            ],
            [
                'code' => 'ST2',
                'parent_code' => null,
                'no' => 2,
                'tahapan' => 'Tahap Serah Terima',
                'tahapan_order' => 4,
                'uraian' => 'Dokumentasi',
                'is_file_required' => true
            ]
        ];

        foreach ($documentTypes as $type) {
            DocumentType::create($type);
        }
    }
}