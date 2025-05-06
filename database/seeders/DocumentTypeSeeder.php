<?php

namespace Database\Seeders;

use App\Models\DocumentType;
use Illuminate\Database\Seeder;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ===================================
        // 1. PRA-TENDER
        // ===================================
        
        // 1.a. Dokumen DED perencana
        $dedDoc = DocumentType::firstOrCreate(
            ['code' => 'PRA_TENDER_DED'],
            [
            'code' => 'PRA_TENDER_DED',
            'no' => '1.a',
            'tahapan' => 'Pra-tender',
            'uraian' => 'Dokumen DED perencana',
            'is_file_required' => false
        ]);

        // Sub-dokumen DED perencana
        $dedSubDocs = [
            ['no' => 'i', 'uraian' => 'Laporan Pendahuluan Penyusunan Masterplan dan DED'],
            ['no' => 'ii', 'uraian' => 'Laporan Antara Pengembangan Rancangan Penyusunan Masterplan dan DED'],
            ['no' => 'iii', 'uraian' => 'Laporan Akhir Master Plan'],
            ['no' => 'iv', 'uraian' => 'Laporan Akhir Master Plan dan Detail Engineering Design'],
            ['no' => 'v', 'uraian' => 'Rencana Kerja dan Syarat-Syarat (RKS)'],
            ['no' => 'vi', 'uraian' => 'Gambar Perencanaan']
        ];

        foreach ($dedSubDocs as $doc) {
            DocumentType::create([
                'code' => 'PRA_TENDER_DED_' . strtoupper(str_replace(' ', '_', $doc['no'])),
                'parent_code' => 'PRA_TENDER_DED',
                'no' => '1.a.' . $doc['no'],
                'tahapan' => 'Pra-tender',
                'uraian' => $doc['uraian']
            ]);
        }

        // 1.b. Notulensi hasil rapat
        DocumentType::create([
            'code' => 'PRA_TENDER_NOTULENSI',
            'no' => '1.b',
            'tahapan' => 'Pra-tender',
            'uraian' => 'Notulensi hasil rapat koordinasi proses review penyusunan DED'
        ]);

        // 1.c. Laporan review penyusunan DED
        $reviewDoc = DocumentType::create([
            'code' => 'PRA_TENDER_REVIEW',
            'no' => '1.c',
            'tahapan' => 'Pra-tender',
            'uraian' => 'Laporan review penyusunan DED',
            'is_file_required' => false
        ]);

        // Sub-dokumen laporan review
        $reviewSubDocs = [
            ['no' => 'i', 'uraian' => 'Kesesuaian Desain (DED) dengan standar teknis dan kondisi lapangan'],
            ['no' => 'ii', 'uraian' => 'Kesesuaian Gambar Desain dengan RKS dan RAB'],
            ['no' => 'iii', 'uraian' => 'Review kewajaran harga pada RAB'],
            ['no' => 'iv', 'uraian' => 'Kesesuaian rencana waktu pelaksanaan'],
            ['no' => 'v', 'uraian' => 'Hasil evaluasi yang telah diperbaiki atau dilengkapi oleh konsultan perencana'],
            ['no' => 'vi', 'uraian' => 'Hasil review dokumen KAK terhadap SMKK'],
            ['no' => 'vii', 'uraian' => 'Program mutu pengawasan'],
            ['no' => 'viii', 'uraian' => 'Dokumen Notulensi terkait kegiatan aanwijzing']
        ];

        foreach ($reviewSubDocs as $doc) {
            DocumentType::create([
                'code' => 'PRA_TENDER_REVIEW_' . strtoupper(str_replace(' ', '_', $doc['no'])),
                'parent_code' => 'PRA_TENDER_REVIEW',
                'no' => '1.c.' . $doc['no'],
                'tahapan' => 'Pra-tender',
                'uraian' => $doc['uraian']
            ]);
        }

        // ===================================
        // 2. TENDER
        // ===================================

        // 2.a. Tender Konsultan MK
        DocumentType::create([
            'code' => 'TENDER_MK',
            'no' => '2.a',
            'tahapan' => 'Tender',
            'uraian' => 'Tender Konsultan MK',
            'is_file_required' => false
        ]);

        // Sub-dokumen Tender Konsultan MK
        $mkDocs = [
            ['no' => 'i', 'uraian' => 'Dokumen KAK Konsultan MK'],
            ['no' => 'ii', 'uraian' => 'Dokumen Penawaran Konsultan MK'],
            ['no' => 'iii', 'uraian' => 'Cek Personil Konsultan MK', 'is_file_required' => false],
            ['no' => 'iv', 'uraian' => 'Tujuan adanya Konsultan MK', 'is_file_required' => false]
        ];

        foreach ($mkDocs as $doc) {
            DocumentType::create([
                'code' => 'TENDER_MK_' . strtoupper(str_replace(' ', '_', $doc['no'])),
                'parent_code' => 'TENDER_MK',
                'no' => '2.a.' . $doc['no'],
                'tahapan' => 'Tender',
                'uraian' => $doc['uraian'],
                'is_file_required' => $doc['is_file_required'] ?? true
            ]);
        }

        // Sub-dokumen Tujuan adanya Konsultan MK
        $tujuanMkDocs = [
            ['no' => '1', 'uraian' => 'BA Aanwjzing'],
            ['no' => '2', 'uraian' => 'Notulen Rapat Persiapan Pelaksanaan Kontrak'],
            ['no' => '3', 'uraian' => 'Kontrak Pelaksanaan Pekerjaan'],
            ['no' => '4', 'uraian' => 'Rencana Pre Construction Meeting'],
            ['no' => '5', 'uraian' => 'Rencana Pekerjaan Persiapan Konstruksi'],
            ['no' => '6', 'uraian' => 'Berita Acara Serah Terima Lahan'],
            ['no' => '7', 'uraian' => 'Berita Acara Pengukuran Kembali Lokasi Pekerjaan (Uitzet) dan Mutual Check']
        ];

        foreach ($tujuanMkDocs as $doc) {
            DocumentType::create([
                'code' => 'TENDER_MK_IV_' . $doc['no'],
                'parent_code' => 'TENDER_MK_IV',
                'no' => '2.a.iv.' . $doc['no'],
                'tahapan' => 'Tender',
                'uraian' => $doc['uraian']
            ]);
        }

        // 2.b. Hasil Review Pagu Anggaran Konstruksi
        DocumentType::create([
            'code' => 'TENDER_REVIEW_ANGGARAN',
            'no' => '2.b',
            'tahapan' => 'Tender',
            'uraian' => 'Hasil Review Pagu Anggaran Konstruksi'
        ]);

        // 2.c. Dokumen DED for Tender
        DocumentType::create([
            'code' => 'TENDER_DED',
            'no' => '2.c',
            'tahapan' => 'Tender',
            'uraian' => 'Dokumen DED for Tender'
        ]);

        // 2.d. Hasil Penilaian Calon Penyedia Jasa
        DocumentType::create([
            'code' => 'TENDER_PENILAIAN_PENYEDIA',
            'no' => '2.d',
            'tahapan' => 'Tender',
            'uraian' => 'Hasil Penilaian Calon Penyedia Jasa sebagai Rekomendasi kepada Pemberi Tugas'
        ]);

        // 2.e. Pengecekan kesanggupan supplier material
        DocumentType::create([
            'code' => 'TENDER_CEK_SUPPLIER',
            'no' => '2.e',
            'tahapan' => 'Tender',
            'uraian' => 'Pengecekan kesanggupan supplier material'
        ]);

        // 2.f. Reviu spesifikasi material
        DocumentType::create([
            'code' => 'TENDER_REVIU_SPESIFIKASI',
            'no' => '2.f',
            'tahapan' => 'Tender',
            'uraian' => 'Reviu spesifikasi material'
        ]);

        // ===================================
        // 3. PERSIAPAN PELAKSANAAN PEKERJAAN KONSTRUKSI
        // ===================================

        // a. Jaminan Pelaksanaan
        DocumentType::create([
            'code' => 'PERSIAPAN_JAMINAN',
            'no' => '3.a',
            'tahapan' => 'Persiapan',
            'uraian' => 'Jaminan Pelaksanaan (jika ada)'
        ]);

        // b. Pengelolaan K3
        DocumentType::create([
            'code' => 'PERSIAPAN_K3',
            'no' => '3.b',
            'tahapan' => 'Persiapan',
            'uraian' => 'Pengelolaan Kesehatan Kerja - Perlindungan Sosial Tenaga Kerja'
        ]);

        // c. Dokumen Kontrak
        DocumentType::create([
            'code' => 'PERSIAPAN_KONTRAK',
            'no' => '3.c',
            'tahapan' => 'Persiapan',
            'uraian' => 'Dokumen Kontrak Pelaksana Konstruksi'
        ]);

        // d. Berita Acara Penyerahan Lokasi
        DocumentType::create([
            'code' => 'PERSIAPAN_BA_LOKASI',
            'no' => '3.d',
            'tahapan' => 'Persiapan',
            'uraian' => 'Surat / Berita Acara Penyerahan Lokasi Pekerjaan dari PPK kepada Kontraktor Pelaksana beserta dokumentasi'
        ]);

        // e. SPMK
        DocumentType::create([
            'code' => 'PERSIAPAN_SPMK',
            'no' => '3.e',
            'tahapan' => 'Persiapan',
            'uraian' => 'Surat Perintah Mulai Kerja (SPMK) Kontraktor Pelaksana'
        ]);

        // f. PCM
        $pcm = DocumentType::create([
            'code' => 'PERSIAPAN_PCM',
            'no' => '3.f',
            'tahapan' => 'Persiapan',
            'uraian' => 'Kegiatan Rapat Persiapan Pelaksanaan Kontrak (Pre Construction Meeting (PCM))',
            'is_file_required' => false
        ]);

        // PCM Sub-documents
        $pcmDocs = [
            ['no' => 'i', 'uraian' => 'Berita Acara PCM'],
            ['no' => 'ii', 'uraian' => 'Struktur Organisasi Proyek', 'is_file_required' => false],
            ['no' => 'iii', 'uraian' => 'Pendelegasian Kewenangan'],
            ['no' => 'iv', 'uraian' => 'Alur Komunikasi dan Persetujuan'],
            ['no' => 'v', 'uraian' => 'Mekanisme Pengawasan'],
            ['no' => 'vi', 'uraian' => 'Jadwal Pelaksanaan'],
            ['no' => 'vii', 'uraian' => 'Mobilisasi personil inti, peralatan, dan material'],
            ['no' => 'viii', 'uraian' => 'Metode Pelaksanaan', 'is_file_required' => false],
            ['no' => 'ix', 'uraian' => 'Pembahasan Dokumen SMKK', 'is_file_required' => false],
            ['no' => 'x', 'uraian' => 'Rencana Pemeriksaan Lapangan Bersama'],
            ['no' => 'xi', 'uraian' => 'Tugas Konsultan MK', 'is_file_required' => false]
        ];

        foreach ($pcmDocs as $doc) {
            DocumentType::create([
                'code' => 'PERSIAPAN_PCM_' . strtoupper(str_replace(' ', '_', $doc['no'])),
                'parent_code' => 'PERSIAPAN_PCM',
                'no' => '3.f.' . $doc['no'],
                'tahapan' => 'Persiapan',
                'uraian' => $doc['uraian'],
                'is_file_required' => $doc['is_file_required'] ?? true
            ]);
        }

        // Struktur Organisasi sub-documents
        $orgDocs = [
            ['no' => '1', 'uraian' => 'Penanggung Jawab Kegiatan'],
            ['no' => '2', 'uraian' => 'Pengawas Pekerjaan'],
            ['no' => '3', 'uraian' => 'Penyedia Jasa Pekerjaan Konstruksi']
        ];

        foreach ($orgDocs as $doc) {
            DocumentType::create([
                'code' => 'PERSIAPAN_PCM_II_' . $doc['no'],
                'parent_code' => 'PERSIAPAN_PCM_II',
                'no' => '3.f.ii.' . $doc['no'],
                'tahapan' => 'Persiapan',
                'uraian' => $doc['uraian']
            ]);
        }

        // Metode Pelaksanaan sub-documents
        $metodeDocs = [
            ['no' => '1', 'uraian' => 'Gambaran umum tiap tahapan pelaksaan pekerjaan'],
            ['no' => '2', 'uraian' => 'Metode pelaksanaan pekerjaan tertentu yang beresiko besar']
        ];

        foreach ($metodeDocs as $doc) {
            DocumentType::create([
                'code' => 'PERSIAPAN_PCM_VIII_' . $doc['no'],
                'parent_code' => 'PERSIAPAN_PCM_VIII',
                'no' => '3.f.viii.' . $doc['no'],
                'tahapan' => 'Persiapan',
                'uraian' => $doc['uraian']
            ]);
        }

        // SMKK sub-documents
        $smkkDocs = [
            ['no' => '1', 'uraian' => 'Dokumen RKK'],
            ['no' => '2', 'uraian' => 'Dokumen RMPK'],
            ['no' => '3', 'uraian' => 'Dokumen RKPPL (Jika Ada)'],
            ['no' => '4', 'uraian' => 'Dokumen RMLLP (Jika Ada)']
        ];

        foreach ($smkkDocs as $doc) {
            DocumentType::create([
                'code' => 'PERSIAPAN_PCM_IX_' . $doc['no'],
                'parent_code' => 'PERSIAPAN_PCM_IX',
                'no' => '3.f.ix.' . $doc['no'],
                'tahapan' => 'Persiapan',
                'uraian' => $doc['uraian']
            ]);
        }

        // Tugas Konsultan MK sub-documents
        $tugasMkDocs = [
            ['no' => '1', 'uraian' => 'Mengecek kesanggupan suplier dan reviu spesifikasi material dengan konsultan perencana'],
            ['no' => '2', 'uraian' => 'Mengarahkan mutu pekerjaan dan spesifikasi material'],
            ['no' => '3', 'uraian' => 'Mengawasi terhadap aspek K3'],
            ['no' => '4', 'uraian' => 'Membantu proses koordinasi dan sosialisasi dengan aparat kewilayahan dan warga setempat'],
            ['no' => '5', 'uraian' => 'Menganalisa master schedule dan daftar tenaga kerja kontraktor pelaksana']
        ];

        foreach ($tugasMkDocs as $doc) {
            DocumentType::create([
                'code' => 'PERSIAPAN_PCM_XI_' . $doc['no'],
                'parent_code' => 'PERSIAPAN_PCM_XI',
                'no' => '3.f.xi.' . $doc['no'],
                'tahapan' => 'Persiapan',
                'uraian' => $doc['uraian']
            ]);
        }

        // g. Kelengkapan Dokumen Perizinan
        $perizinan = DocumentType::create([
            'code' => 'PERSIAPAN_PERIZINAN',
            'no' => '3.g',
            'tahapan' => 'Persiapan',
            'uraian' => 'Kelengkapan Dokumen Perizinan:',
            'is_file_required' => false
        ]);

        // Perizinan sub-documents
        $perizinanDocs = [
            ['no' => 'i', 'uraian' => 'Surat Keterangan Rencana Kota/Kab'],
            ['no' => 'ii', 'uraian' => 'Persetujuan Bangunan Gedung (PBG) (khususnya bangunan baru/perluasan)']
        ];

        foreach ($perizinanDocs as $doc) {
            DocumentType::create([
                'code' => 'PERSIAPAN_PERIZINAN_' . strtoupper(str_replace(' ', '_', $doc['no'])),
                'parent_code' => 'PERSIAPAN_PERIZINAN',
                'no' => '3.g.' . $doc['no'],
                'tahapan' => 'Persiapan',
                'uraian' => $doc['uraian']
            ]);
        }

        // i. Pembayaran Uang Muka
        $uangMuka = DocumentType::create([
            'code' => 'PERSIAPAN_UANG_MUKA',
            'no' => '3.i',
            'tahapan' => 'Persiapan',
            'uraian' => 'Pembayaran Uang Muka Berdasarkan SSKK',
            'is_file_required' => false
        ]);

        // Uang Muka sub-documents
        $uangMukaDocs = [
            ['no' => 'i', 'uraian' => 'Jaminan Uang Muka (Jika Ada)'],
            ['no' => 'ii', 'uraian' => 'Berita Acara Pembayaran Uang Muka']
        ];

        foreach ($uangMukaDocs as $doc) {
            DocumentType::create([
                'code' => 'PERSIAPAN_UANG_MUKA_' . strtoupper(str_replace(' ', '_', $doc['no'])),
                'parent_code' => 'PERSIAPAN_UANG_MUKA',
                'no' => '3.i.' . $doc['no'],
                'tahapan' => 'Persiapan',
                'uraian' => $doc['uraian']
            ]);
        }

        // j. Schedule
        $schedule = DocumentType::create([
            'code' => 'PERSIAPAN_SCHEDULE',
            'parent_code' => 'PERSIAPAN',
            'no' => '3.j',
            'tahapan' => 'Persiapan',
            'uraian' => 'Schedule',
            'is_file_required' => false
        ]);

        // Schedule sub-documents
        $scheduleDocs = [
            ['no' => 'i', 'uraian' => 'Peralatan'],
            ['no' => 'ii', 'uraian' => 'Personil Inti dan Pendukung'],
            ['no' => 'iii', 'uraian' => 'Material']
        ];

        foreach ($scheduleDocs as $doc) {
            DocumentType::create([
                'code' => 'PERSIAPAN_SCHEDULE_' . strtoupper(str_replace(' ', '_', $doc['no'])),
                'parent_code' => 'PERSIAPAN_SCHEDULE',
                'no' => '3.j.' . $doc['no'],
                'tahapan' => 'Persiapan',
                'uraian' => $doc['uraian']
            ]);
        }

        // 4.a. Kerangka Acuan Kerja Konsultan MK
        $kak = DocumentType::create([
            'code' => 'PELAKSANAAN_KAK_MK',
            'no' => '4.a',
            'tahapan' => 'Pelaksanaan',
            'uraian' => 'Kerangka Acuan Kerja Konsultan MK',
            'is_file_required' => false
        ]);

        // i. Masukan teknis kepada pengelola proyek
        $masukanTeknis = DocumentType::create([
            'code' => 'PELAKSANAAN_KAK_MK_MASUKAN',
            'parent_code' => 'PELAKSANAAN_KAK_MK',
            'no' => '4.a.i',
            'tahapan' => 'Pelaksanaan',
            'uraian' => 'Masukan teknis kepada pengelola proyek',
            'is_file_required' => false
        ]);

        // Sub-dokumen masukan teknis
        $masukanTeknisItems = [
            ['no' => '1', 'uraian' => 'Pengelola Administrasi dan Keuangan'],
            ['no' => '2', 'uraian' => 'Pengelola Teknis']
        ];

        foreach ($masukanTeknisItems as $item) {
            DocumentType::create([
                'code' => 'PELAKSANAAN_KAK_MK_MASUKAN_' . $item['no'],
                'parent_code' => 'PELAKSANAAN_KAK_MK_MASUKAN',
                'no' => '4.a.i.' . $item['no'],
                'tahapan' => 'Pelaksanaan',
                'uraian' => $item['uraian']
            ]);
        }

        // ii. Sasaran Kegiatan Konsultan MK
        $sasaranKegiatan = DocumentType::create([
            'code' => 'PELAKSANAAN_KAK_MK_SASARAN',
            'parent_code' => 'PELAKSANAAN_KAK_MK',
            'no' => '4.a.ii',
            'tahapan' => 'Pelaksanaan',
            'uraian' => 'Sasaran Kegiatan Konsultan MK',
            'is_file_required' => false
        ]);

        // Laporan berkala items
        $laporanBerkalaItems = [
            ['no' => '1', 'uraian' => 'Reviu perencanaan'],
            ['no' => '2', 'uraian' => 'Manajemen kontrak penyedia jasa konstruksi'],
            ['no' => '3', 'uraian' => 'Pelaksanaan pekerjaan'],
            ['no' => '4', 'uraian' => 'Pengawasan']
        ];

        foreach ($laporanBerkalaItems as $item) {
            DocumentType::create([
                'code' => 'PELAKSANAAN_KAK_MK_SASARAN_' . $item['no'],
                'parent_code' => 'PELAKSANAAN_KAK_MK_SASARAN',
                'no' => '4.a.ii.' . $item['no'],
                'tahapan' => 'Pelaksanaan',
                'uraian' => $item['uraian']
            ]);
        }

        // iii. Waktu Pelaksanaan Konstruksi
        DocumentType::create([
            'code' => 'PELAKSANAAN_KAK_MK_WAKTU',
            'parent_code' => 'PELAKSANAAN_KAK_MK',
            'no' => '4.a.iii',
            'tahapan' => 'Pelaksanaan',
            'uraian' => 'Waktu Pelaksanaan Konstruksi'
        ]);

        // iv. Tujuan adanya Konsultan MK
        $tujuanMK = DocumentType::create([
            'code' => 'PELAKSANAAN_KAK_MK_TUJUAN',
            'parent_code' => 'PELAKSANAAN_KAK_MK',
            'no' => '4.a.iv',
            'tahapan' => 'Pelaksanaan',
            'uraian' => 'Tujuan adanya Konsultan MK',
            'is_file_required' => false
        ]);

        // Tujuan MK items
        $tujuanMKItems = [
            ['no' => '1', 'uraian' => 'Melakukan pengelolaan/manajemen pelaksanaan konstruksi'],
            ['no' => '2', 'uraian' => 'Melakukan pengendalian'],
            ['no' => '3', 'uraian' => 'Monitoring'],
            ['no' => '4', 'uraian' => 'Evaluasi terhadap pelaksanaan konstruksi'],
            ['no' => '5', 'uraian' => 'Melakukan pengawasan']
        ];

        foreach ($tujuanMKItems as $item) {
            DocumentType::create([
                'code' => 'PELAKSANAAN_KAK_MK_TUJUAN_' . $item['no'],
                'parent_code' => 'PELAKSANAAN_KAK_MK_TUJUAN',
                'no' => '4.a.iv.' . $item['no'],
                'tahapan' => 'Pelaksanaan',
                'uraian' => $item['uraian']
            ]);
        }

        // Keluaran Konsultan MK
        $keluaranMK = DocumentType::create([
            'code' => 'PELAKSANAAN_KAK_MK_KELUARAN',
            'parent_code' => 'PELAKSANAAN_KAK_MK',
            'no' => '4.a.v',
            'tahapan' => 'Pelaksanaan',
            'uraian' => 'Keluaran Konsultan MK',
            'is_file_required' => false
        ]);

        // Keluaran MK items
        $keluaranMKItems = [
            ['no' => '1', 'uraian' => 'Laporan dan Berita Acara Persiapan Pelaksanaan'],
            ['no' => '2', 'uraian' => 'Buku harian, yang memuat semua kejadian, perintah/petunjuk yang penting dari Pemimpin Pelaksana Kegiatan, Kontraktor Pelaksana dan Konsultan MK'],
            ['no' => '3', 'uraian' => 'Laporan Harian'],
            ['no' => '4', 'uraian' => 'Laporan Mingguan dan bulanan sesuai resume laporan harian'],
            ['no' => '5', 'uraian' => 'Berita']
        ];

        foreach ($keluaranMKItems as $item) {
            DocumentType::create([
                'code' => 'PELAKSANAAN_KAK_MK_KELUARAN_' . $item['no'],
                'parent_code' => 'PELAKSANAAN_KAK_MK_KELUARAN',
                'no' => '4.a.v.' . $item['no'],
                'tahapan' => 'Pelaksanaan',
                'uraian' => $item['uraian']
            ]);
        }

        // 5. Dokumen Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)
        // a. Laporan Harian
        $laporanHarian = DocumentType::create([
            'code' => 'PENUNJANG_LAPORAN_HARIAN',
            'no' => '5.a',
            'tahapan' => 'Penunjang',
            'uraian' => 'Laporan Harian',
            'is_file_required' => false
        ]);

        $laporanHarianItems = [
            ['no' => 'i', 'uraian' => 'Jenis dan kuantitas bahan yang berada di lokasi pekerjaan'],
            ['no' => 'ii', 'uraian' => 'Penempatan tenaga kerja untuk tiap macam tugasnya'],
            ['no' => 'iii', 'uraian' => 'Jenis, jumlah, dan kondisi lapangan'],
            ['no' => 'iv', 'uraian' => 'Jenis dan kuantitas pekerjaan yang dilaksanakan'],
            ['no' => 'v', 'uraian' => 'Keadaan cuaca termasuk hujan, banjir, dan peristiwa alam lainnya yang berpengaruh terhadap kelancaran pekerjaan'],
            ['no' => 'vi', 'uraian' => 'Catatan-catatan lain yang berkenaan dengan pelaksanaan']
        ];

        foreach ($laporanHarianItems as $item) {
            DocumentType::create([
                'code' => 'PENUNJANG_LAPORAN_HARIAN_' . strtoupper(str_replace(' ', '_', $item['no'])),
                'parent_code' => 'PENUNJANG_LAPORAN_HARIAN',
                'no' => '5.a.' . $item['no'],
                'tahapan' => 'Penunjang',
                'uraian' => $item['uraian']
            ]);
        }

        // b. Laporan Mingguan
        $laporanMingguan = DocumentType::create([
            'code' => 'PENUNJANG_LAPORAN_MINGGUAN',
            'no' => '5.b',
            'tahapan' => 'Penunjang',
            'uraian' => 'Laporan Mingguan berisi rangkuman laporan harian dan hasil kemajuan fisik pekerjaan dalam periode satu minggu, serta hal-hal penting yang perlu ditonjolkan',
            'is_file_required' => false
        ]);

        $laporanMingguanItems = [
            ['no' => 'i', 'uraian' => 'Rangkuman capaian pekerjaan fisik berupa hasil pembandingan capaian minggu sebelumnya dengan capaian pada minggu berjalan dan sasaran capaian pada minggu berikutnya'],
            ['no' => 'ii', 'uraian' => 'Hambatan dan kendala yang dihadapi pada kurun waktu 1 (satu) minggu berserta tindakan penanggulangan yang telah dilakukan dan potensi kendala pada minggu berikutnya'],
            ['no' => 'iii', 'uraian' => 'Dukungan yang diperlukan dari Pemimpin unit kerja Pelaksana Kegiatan/Penanggung Jawa Kegiatan, Direksi Teknis/Konsultan Pengawas, dan pihak-pihak lain yang terkait'],
            ['no' => 'iv', 'uraian' => 'Ringkasan permohonan persetujuan atas usulan dan dokumen yang diajukan beserta statusnya'],
            ['no' => 'v', 'uraian' => 'Ringkasan kegiatan pemeriksaan dan pengujian yang dilakukan'],
            ['no' => 'vi', 'uraian' => 'Ringkasan aktivitas dan hasil pengendalian Keselamatan Konstruksi, termasuk kejadian kecelakaan kerja, catatan tentang kejadian nyaris terjadi kecelakaan kerja (nearmiss record), dan lain-lain']
        ];

        foreach ($laporanMingguanItems as $item) {
            DocumentType::create([
                'code' => 'PENUNJANG_LAPORAN_MINGGUAN_' . strtoupper(str_replace(' ', '_', $item['no'])),
                'parent_code' => 'PENUNJANG_LAPORAN_MINGGUAN',
                'no' => '5.b.' . $item['no'],
                'tahapan' => 'Penunjang',
                'uraian' => $item['uraian']
            ]);
        }

        // c. Laporan Bulanan
        $laporanBulanan = DocumentType::create([
            'code' => 'PENUNJANG_LAPORAN_BULANAN',
            'no' => '5.c',
            'tahapan' => 'Penunjang',
            'uraian' => 'Laporan Bulanan berisi hasil kemajuan fisik pekerjaan dalam periode satu bulan, serta hal-hal penting yang perlu ditonjolkan',
            'is_file_required' => false
        ]);

        $laporanBulananItems = [
            ['no' => 'i', 'uraian' => 'Capaian pekerjaan fisik, ringkasan status capaian pekerjaan fisik dengan membandingkan capaian di bulan sebelumnya, capaian pada bulan berjalan serta target capaian di bulan berikutnya'],
            ['no' => 'ii', 'uraian' => 'Foto dokumentasi pekerjaan'],
            ['no' => 'iii', 'uraian' => 'Ringkasan status kondisi keuangan Penyedia Jasa Pekerjaan Konstruksi, status pembayaran dari Pengguna jasa'],
            ['no' => 'iv', 'uraian' => 'Perubahan kontrak dan perubahan pekerjaan'],
            ['no' => 'v', 'uraian' => 'Masalah dan kendala yang dihadapi, termasuk statusnya, tindakan penanggulangan yang telah dilakukan dan rencana tindakan selanjutnya'],
            ['no' => 'vi', 'uraian' => 'Hambatan dan kendala yang dihadapi pada kurun waktu 1 (satu) minggu berserta tindakan penanggulangan yang telah dilakukan dan potensi kendala pada minggu berikutnya'],
            ['no' => 'vii', 'uraian' => 'Hambatan dan kendala yang berpotensi terjadi di bulan berikutnya, beserta rencana pencegahan atau penanggulangan yang akan dilakukan'],
            ['no' => 'viii', 'uraian' => 'Status persetujuan atas usulan dan permohonan dokumen'],
            ['no' => 'ix', 'uraian' => 'Ringkasan aktivitas dan hasil pengendalian Keselamatan Konstruksi, termasuk kejadian kecelakaan kerja, catatan tentang kejadian nyaris terjadi kecelakaan kerja (nearmiss record), dan lain-lain']
        ];

        foreach ($laporanBulananItems as $item) {
            DocumentType::create([
                'code' => 'PENUNJANG_LAPORAN_BULANAN_' . strtoupper(str_replace(' ', '_', $item['no'])),
                'parent_code' => 'PENUNJANG_LAPORAN_BULANAN',
                'no' => '5.c.' . $item['no'],
                'tahapan' => 'Penunjang',
                'uraian' => $item['uraian']
            ]);
        }

        // d. Data-data dukung dan pengujian untuk Kelengkapan Dokumen Sertifikat Laik Fungsi (SLF) Bangunan
        $dataDukungSLF = DocumentType::create([
            'code' => 'PENUNJANG_DATA_DUKUNG_SLF',
            'no' => '5.d',
            'tahapan' => 'Penunjang',
            'uraian' => 'Data-data dukung dan pengujian untuk Kelengkapan Dokumen Sertifikat Laik Fungsi (SLF) Bangunan',
            'is_file_required' => false
        ]);

        // i. Hasil uji mutu
        $hasilUjiMutu = DocumentType::create([
            'code' => 'PENUNJANG_DATA_DUKUNG_SLF_I',
            'parent_code' => 'PENUNJANG_DATA_DUKUNG_SLF',
            'no' => '5.d.i',
            'tahapan' => 'Penunjang',
            'uraian' => 'Hasil uji mutu',
            'is_file_required' => false
        ]);

        $hasilUjiMutuItems = [
            ['no' => '1', 'uraian' => 'Uji tarik besi'],
            ['no' => '2', 'uraian' => 'Uji tekan beton'],
            ['no' => '3', 'uraian' => 'Pembebanan pondasi dalam']
        ];

        foreach ($hasilUjiMutuItems as $item) {
            DocumentType::create([
                'code' => 'PENUNJANG_DATA_DUKUNG_SLF_I_' . $item['no'],
                'parent_code' => 'PENUNJANG_DATA_DUKUNG_SLF_I',
                'no' => '5.d.i.' . $item['no'],
                'tahapan' => 'Penunjang',
                'uraian' => $item['uraian']
            ]);
        }

        // Remaining SLF documents
        $remainingSLFDocs = [
            ['no' => 'ii', 'uraian' => 'Sertifikat mutu, brosur, katalog'],
            ['no' => 'iii', 'uraian' => 'Sertifikat garansi / surat jaminan peralatan dan perlengkapan mekanikal, elektrikal, dan perpipaan (plumbing)'],
            ['no' => 'iv', 'uraian' => 'Sertifikat Laik Operasi (SLO) Penyambungan Baru Instalasi Listrik'],
            ['no' => 'v', 'uraian' => 'Perijinan Sumur Dalam dari Dinas ESDM/Instansi Terkait'],
            ['no' => 'vi', 'uraian' => 'Uji Kualitas Air Sumur dari Dinas Kesehatan/Instansi Terkait'],
            ['no' => 'vii', 'uraian' => 'Pengujian Instalasi Pemadam Kebakaran (Hidran, APAR, dll) dari Dinas Pemadam Kebakaran/BPDB/Instansi Terkait'],
            ['no' => 'viii', 'uraian' => 'Pengujian K3 Instalasi Penyalur Petir dari Dinas Tenaga Kerja/Instansi Terkait'],
            ['no' => 'ix', 'uraian' => 'Hasil Test Commisioning Mekanikal Elektrikal'],
            ['no' => 'x', 'uraian' => 'Dokumen K3 atau SMK3'],
            ['no' => 'xi', 'uraian' => 'Sertifikat Bangunan Gedung Hijau (jika ada)'],
            ['no' => 'xii', 'uraian' => 'Gambar Kerja (Shop Drawing)'],
            ['no' => 'xiii', 'uraian' => 'Gambar Hasil Pelaksanaan (As Bulit Drawing)'],
            ['no' => 'xiv', 'uraian' => 'Pedoman/Manual pengoperasian dan perawatan/pemeliharaan Bangunan Gedung Negara, termasuk peralatan dan perlengkapan mekanikal, elektrikal, dan plumbing, yang disusun bersama konsultan perencana dan konsultan pengawas/MK'],
            ['no' => 'xv', 'uraian' => 'Surat Penjaminan atas Kegagalan Bangunan diTTD Penyedia Jasa Pelaksana dan Pengawas Konstruksi/MK']
        ];

        foreach ($remainingSLFDocs as $doc) {
            DocumentType::create([
                'code' => 'PENUNJANG_DATA_DUKUNG_SLF_' . strtoupper(str_replace(' ', '_', $doc['no'])),
                'parent_code' => 'PENUNJANG_DATA_DUKUNG_SLF',
                'no' => '5.d.' . $doc['no'],
                'tahapan' => 'Penunjang',
                'uraian' => $doc['uraian']
            ]);
        }

        // e. Berita Acara Hasil Perbaikan Cacat Mutu
        DocumentType::create([
            'code' => 'PENUNJANG_BA_PERBAIKAN_CACAT',
            'no' => '5.e',
            'tahapan' => 'Penunjang',
            'uraian' => 'Berita Acara Hasil Perbaikan Cacat Mutu (Jika Ada)'
        ]);

        // f. Laporan Dokumentasi Pelaksanaan Konstruksi
        $dokumentasiKonstruksi = DocumentType::create([
            'code' => 'PENUNJANG_DOKUMENTASI',
            'no' => '5.f',
            'tahapan' => 'Penunjang',
            'uraian' => 'Laporan Dokumentasi Pelaksanaan Konstruksi, Berupa foto dan/atau video sebagai berikut:',
            'is_file_required' => false
        ]);

        $dokumentasiItems = [
            ['no' => 'i', 'uraian' => 'Dokumentasi pelaksanaan pada saat progress 0%, 50%, 100% yang diambil dari sudut pandang'],
            ['no' => 'ii', 'uraian' => 'Dokumentasi pelaksanaan pada saat progress 0% dan progress pelaksanaan sesuai permintaan pembayaran = ........ % yang diambil dari satu sudut pandang']
        ];

        foreach ($dokumentasiItems as $item) {
            DocumentType::create([
                'code' => 'PENUNJANG_DOKUMENTASI_' . strtoupper(str_replace(' ', '_', $item['no'])),
                'parent_code' => 'PENUNJANG_DOKUMENTASI',
                'no' => '5.f.' . $item['no'],
                'tahapan' => 'Penunjang',
                'uraian' => $item['uraian']
            ]);
        }

        // g. Laporan Kemajuan Hasil Pekerjaan Pelaksanaan Konstruksi
        DocumentType::create([
            'code' => 'PENUNJANG_LAPORAN_KEMAJUAN',
            'no' => '5.g',
            'tahapan' => 'Penunjang',
            'uraian' => 'Laporan Kemajuan Hasil Pekerjaan Pelaksanaan Konstruksi\nUntuk pembayaran termin sesuai kontrak, maka prosentase progres pada laporan minimal sebesar prosentase termin.\nUntuk pembayaran sesuai progres dapat dilakukan beberapa kali termin, contohnya: Termin I, Termin II, Termin III, dan seterusnya hingga Termin terakhir pada saat Serah Terima Hasil Pekerjaan Pertama Pelaksanaan Konstruksi (ST 1) dengan progress pelaksanaan sebesar 100%'
        ]);

        // 6. PERUBAHAN KONTRAK (ADDENDUM)
        // a. Bentuk perubahan kontrak
        $bentukPerubahan = DocumentType::create([
            'code' => 'PERUBAHAN_BENTUK',
            'no' => '6.a',
            'tahapan' => 'Perubahan Kontrak',
            'uraian' => 'Bentuk perubahan kontrak',
            'is_file_required' => false
        ]);

        $bentukItems = [
            ['no' => 'i', 'uraian' => 'MC perubahan'],
            ['no' => 'ii', 'uraian' => 'CCO'],
            ['no' => 'iii', 'uraian' => 'Addendum']
        ];

        foreach ($bentukItems as $bentuk) {
            DocumentType::create([
                'code' => 'PERUBAHAN_BENTUK_' . strtoupper(str_replace(' ', '_', $bentuk['no'])),
                'parent_code' => 'PERUBAHAN_BENTUK',
                'no' => '6.a.' . $bentuk['no'],
                'tahapan' => 'Perubahan Kontrak',
                'uraian' => $bentuk['uraian']
            ]);
        }

        // b. Dokumen pendukung perubahan kontrak
        $dokumenPendukung = DocumentType::create([
            'code' => 'PERUBAHAN_PENDUKUNG',
            'no' => '6.b',
            'tahapan' => 'Perubahan Kontrak',
            'uraian' => 'Dokumen pendukung perubahan kontrak',
            'is_file_required' => false
        ]);

        $pendukungItems = [
            ['no' => 'i', 'uraian' => 'Berita Acara Rapat Lapangan'],
            ['no' => 'ii', 'uraian' => 'Usulan Perubahan dari Penyedia/Perintah tertulis perubahan kontrak oleh Pengguna Jasa (PA/KPA/PPK)'],
            ['no' => 'iii', 'uraian' => 'Kajian/Justifikasi Teknis Konsultan Pengawas/MK'],
            ['no' => 'iv', 'uraian' => 'Rekomendasi Konsultan Perencana']
        ];

        foreach ($pendukungItems as $item) {
            DocumentType::create([
                'code' => 'PERUBAHAN_PENDUKUNG_' . strtoupper(str_replace(' ', '_', $item['no'])),
                'parent_code' => 'PERUBAHAN_PENDUKUNG',
                'no' => '6.b.' . $item['no'],
                'tahapan' => 'Perubahan Kontrak',
                'uraian' => $item['uraian']
            ]);
        }

        // c. Dokumen negosiasi dan persetujuan
        $negosiasiDoc = DocumentType::create([
            'code' => 'PERUBAHAN_NEGOSIASI',
            'no' => '6.c',
            'tahapan' => 'Perubahan Kontrak',
            'uraian' => 'Dokumen negosiasi dan persetujuan',
            'is_file_required' => false
        ]);

        $negosiasiItems = [
            ['no' => 'i', 'uraian' => 'Berita Acara Negosiasi'],
            ['no' => 'ii', 'uraian' => 'Persetujuan Perubahan Kontrak']
        ];

        foreach ($negosiasiItems as $item) {
            DocumentType::create([
                'code' => 'PERUBAHAN_NEGOSIASI_' . strtoupper(str_replace(' ', '_', $item['no'])),
                'parent_code' => 'PERUBAHAN_NEGOSIASI',
                'no' => '6.c.' . $item['no'],
                'tahapan' => 'Perubahan Kontrak',
                'uraian' => $item['uraian']
            ]);
        };

        $keluaranMKItems = [
            ['no' => '1', 'uraian' => 'Laporan dan Berita Acara Persiapan Pelaksanaan'],
            ['no' => '2', 'uraian' => 'Buku harian, yang memuat semua kejadian, perintah/petunjuk yang penting dari Pemimpin Pelaksana Kegiatan, Kontraktor Pelaksana dan Konsultan MK'],
            ['no' => '3', 'uraian' => 'Laporan Harian'],
            ['no' => '4', 'uraian' => 'Laporan Mingguan dan bulanan sesuai resume laporan harian'],
            ['no' => '5', 'uraian' => 'Berita Acara Kemajuan Pekerjaan untuk pembayaran angsuran'],
            ['no' => '6', 'uraian' => 'Surat Perintah Perubahan Pekerjaan untuk pembayaran angsuran'],
            ['no' => '7', 'uraian' => 'Gambar-gambar sesuai dengan pelaksanaan (as-built drawing) dan manual peralatan-peralatan yang dibuat oleh kontraktor pelaksana'],
            ['no' => '8', 'uraian' => 'Laporan rapat di lapangan (site meeting)'],
            ['no' => '9', 'uraian' => 'Gambar rincian pelaksanaan (shop drawing) dan time schedule yang dibuat oleh kontraktor pelaksana'],
            ['no' => '10', 'uraian' => 'Foto dokumentasi (0%, 30%, 50%, 75%, 100%)'],
            ['no' => '11', 'uraian' => 'Laporan akhir pekerjaan manajemen']
        ];

        foreach ($keluaranMKItems as $item) {
            DocumentType::create([
                'code' => 'PELAKSANAAN_KAK_MK_KELUARAN_' . $item['no'],
                'parent_code' => 'PELAKSANAAN_KAK_MK_KELUARAN',
                'no' => '4.a.v.' . $item['no'],
                'tahapan' => 'Pelaksanaan',
                'uraian' => $item['uraian']
            ]);
        }

        // 4.b. Pemeriksaan Dokumen
        $pemeriksaanDokumen = DocumentType::create([
            'code' => 'PELAKSANAAN_PEMERIKSAAN_DOKUMEN',
            'no' => '4.b',
            'tahapan' => 'Pelaksanaan',
            'uraian' => 'Pemeriksaan Dokumen',
            'is_file_required' => false
        ]);

        // Pemeriksaan Dokumen items
        $pemeriksaanDokumenItems = [
            ['no' => 'i', 'uraian' => 'Gambar kerja'],
            ['no' => 'ii', 'uraian' => 'Metode kerja konstruksi'],
            ['no' => 'iii', 'uraian' => 'Rencana Pemeriksaan dan Pengujian']
        ];

        foreach ($pemeriksaanDokumenItems as $item) {
            DocumentType::create([
                'code' => 'PELAKSANAAN_PEMERIKSAAN_DOKUMEN_' . strtoupper(str_replace(' ', '_', $item['no'])),
                'parent_code' => 'PELAKSANAAN_PEMERIKSAAN_DOKUMEN',
                'no' => '4.b.' . $item['no'],
                'tahapan' => 'Pelaksanaan',
                'uraian' => $item['uraian']
            ]);
        }

        // 4.c. Pemeriksaan Bersama (Mutual Check/MC-0)
        $mc0 = DocumentType::create([
            'code' => 'PELAKSANAAN_MC0',
            'no' => '4.c',
            'tahapan' => 'Pelaksanaan',
            'uraian' => 'Pemeriksaan Bersama (Mutual Check/MC-0)',
            'is_file_required' => false
        ]);

        // MC-0 items
        $mc0Items = [
            ['no' => 'i', 'uraian' => 'Pemeriksaan terhadap desain awal'],
            ['no' => 'ii', 'uraian' => 'Penyesuaian desain/review desain (Jika Diperlukan)'],
            ['no' => 'iii', 'uraian' => 'Penyesuaian kuantitas (volume) berdasarkan review desain (Jika Diperlukan)'],
            ['no' => 'iv', 'uraian' => 'Berita Acara Hasil Pemeriksaan Bersama (Mutual Check/MC-0) beserta dokumentasi'],
            ['no' => 'v', 'uraian' => 'Perubahan/Addendum Kontrak (jika ada)', 'is_file_required' => false]
        ];

        foreach ($mc0Items as $item) {
            DocumentType::create([
                'code' => 'PELAKSANAAN_MC0_' . strtoupper(str_replace(' ', '_', $item['no'])),
                'parent_code' => 'PELAKSANAAN_MC0',
                'no' => '4.c.' . $item['no'],
                'tahapan' => 'Pelaksanaan',
                'uraian' => $item['uraian'],
                'is_file_required' => $item['is_file_required'] ?? true
            ]);
        }

        // Site Instruction
        DocumentType::create([
            'code' => 'PELAKSANAAN_MC0_V_SITE_INSTRUCTION',
            'parent_code' => 'PELAKSANAAN_MC0_V',
            'no' => '4.c.v.1',
            'tahapan' => 'Pelaksanaan',
            'uraian' => 'Site Instruction'
        ]);

        // d. Kaji ulang dan persetujuan pertama jadwal dan metodologi pelaksanaan pekerjaan
        DocumentType::create([
            'code' => 'PELAKSANAAN_KAJI_ULANG',
            'no' => '4.d',
            'tahapan' => 'Pelaksanaan',
            'uraian' => 'Kaji ulang dan persetujuan pertama jadwal dan metodologi pelaksanaan pekerjaan'
        ]);

        // e. Pengajuan Izin Mulai Kerja
        DocumentType::create([
            'code' => 'PELAKSANAAN_IZIN_KERJA',
            'parent_code' => 'PELAKSANAAN',
            'no' => '4.e',
            'tahapan' => 'Pelaksanaan',
            'uraian' => 'Pengajuan Izin Mulai Kerja',
            'is_file_required' => false
        ]);

        // i. Permohonan Izin Memulai Pekerjaan (Request of Work)
        DocumentType::create([
            'code' => 'PELAKSANAAN_IZIN_KERJA_PERMOHONAN',
            'parent_code' => 'PELAKSANAAN_IZIN_KERJA',
            'no' => '4.e.i',
            'tahapan' => 'Pelaksanaan',
            'uraian' => 'Permohonan Izin Memulai Pekerjaan (Request of Work)',
            'is_file_required' => false
        ]);

        // Prosedur Permohonan Izin items
        $prosedurItems = [
            ['no' => '1', 'uraian' => 'Gambar Kerja (Shop Drawing) mengacu pada Prosedur (P-03)'],
            ['no' => '2', 'uraian' => 'Rencana Pelaksanaan Pekerjaan (Work Method Statement)', 'is_file_required' => false],
            ['no' => '3', 'uraian' => 'Rencana Pemeriksaan dan Pengujian (Inspection and Test Plan/ ITP)']
        ];

        foreach ($prosedurItems as $item) {
            DocumentType::create([
                'code' => 'PELAKSANAAN_IZIN_KERJA_PERMOHONAN_' . $item['no'],
                'parent_code' => 'PELAKSANAAN_IZIN_KERJA_PERMOHONAN',
                'no' => '4.e.i.' . $item['no'],
                'tahapan' => 'Pelaksanaan',
                'uraian' => $item['uraian'],
                'is_file_required' => $item['is_file_required'] ?? true
            ]);
        }

        // Work Method Statement items
        $wmsItems = [
            ['no' => '1', 'uraian' => 'Metode Kerja'],
            ['no' => '2', 'uraian' => 'Tenaga Kerja yang Dibutuhkan'],
            ['no' => '3', 'uraian' => 'Peralatan yang Dibutuhkan'],
            ['no' => '4', 'uraian' => 'Material yang Digunakan, Pengajuan persetujuan material sesuai dengan Prosedur (P-02)'],
            ['no' => '5', 'uraian' => 'Aspek Keselamatan Konstruksi'],
            ['no' => '6', 'uraian' => 'Jadwal Mobilisasi tiap-tiap Sumber Daya']
        ];

        foreach ($wmsItems as $item) {
            DocumentType::create([
                'code' => 'PELAKSANAAN_IZIN_KERJA_PERMOHONAN_2_' . $item['no'],
                'parent_code' => 'PELAKSANAAN_IZIN_KERJA_PERMOHONAN_2',
                'no' => '4.e.i.2.' . $item['no'],
                'tahapan' => 'Pelaksanaan',
                'uraian' => $item['uraian']
            ]);
        }

        // ii. Pemeriksaan terhadap Permohonan Izin Memulai Pekerjaan
        DocumentType::create([
            'code' => 'PELAKSANAAN_IZIN_KERJA_PEMERIKSAAN',
            'parent_code' => 'PELAKSANAAN_IZIN_KERJA',
            'no' => '4.e.ii',
            'tahapan' => 'Pelaksanaan',
            'uraian' => 'Pemeriksaan terhadap Permohonan Izin Memulai Pekerjaan (Request of Work)'
        ]);

        // f. Surat Persetujuan Memulai Pekerjaan
        DocumentType::create([
            'code' => 'PELAKSANAAN_PERSETUJUAN_KERJA',
            'parent_code' => 'PELAKSANAAN',
            'no' => '4.f',
            'tahapan' => 'Pelaksanaan',
            'uraian' => 'Surat Persetujuan Memulai Pekerjaan (Approval of Work)'
        ]);

        // g. Pengawasan Mutu Pekerjaan
        DocumentType::create([
            'code' => 'PELAKSANAAN_PENGAWASAN_MUTU',
            'no' => '4.g',
            'tahapan' => 'Pelaksanaan',
            'uraian' => 'Pengawasan Mutu Pekerjaan',
            'is_file_required' => false
        ]);

        // h. Penerimaan dan Pembayaran Hasil Pekerjaan
        $penerimaanPembayaran = DocumentType::create([
            'code' => 'PELAKSANAAN_PENERIMAAN_PEMBAYARAN',
            'no' => '4.h',
            'tahapan' => 'Pelaksanaan',
            'uraian' => 'Penerimaan dan Pembayaran Hasil Pekerjaan',
            'is_file_required' => false
        ]);

        // Penerimaan dan Pembayaran items
        $penerimaanPembayaranItems = [
            ['no' => 'i', 'uraian' => 'Penerimaan hasil pekerjaan dilakukan setelah seluruh persyaratan mutu pekerjaan dalam kontrak dipenuhi'],
            ['no' => 'ii', 'uraian' => 'Persetujuan dokumen penagihan didahului dengan pemeriksaan mutu dan volume hasil pekerjaan yang telah selesai dikerjakan oleh pengawas pekerjaan'],
            ['no' => 'iii', 'uraian' => 'Penyedia Jasa Pekerjaan Konstruksi menyampaikan dokumen tagihan sesuai dalam kontrak'],
            ['no' => 'iv', 'uraian' => 'Jika hasil pemeriksaan menunjukkan ketidaksesuaian spesifikasi dan volume yang tertulis dalam dokumen penagihan, maka penanggung jawab kegiatan berhak untuk tidak menyetujui dokumen tersebut dan Penyedia Jasa Pekerjaan Konstruksi wajib melakukan perbaikan terhadap hasil pekerjaan maupun dokumen penagihannya'],
            ['no' => 'v', 'uraian' => 'Pembayaran dapat dilakukan setelah hasil pemeriksaan telah disetujui']
        ];

        foreach ($penerimaanPembayaranItems as $item) {
            DocumentType::create([
                'code' => 'PELAKSANAAN_PENERIMAAN_PEMBAYARAN_' . strtoupper(str_replace(' ', '_', $item['no'])),
                'parent_code' => 'PELAKSANAAN_PENERIMAAN_PEMBAYARAN',
                'no' => '4.h.' . $item['no'],
                'tahapan' => 'Pelaksanaan',
                'uraian' => $item['uraian']
            ]);
        }

        // i. Pengawasan Mutu Pekerjaan dilakukan melalui
        DocumentType::create([
            'code' => 'PELAKSANAAN_PENGAWASAN_MUTU_METODE',
            'parent_code' => 'PELAKSANAAN_PENGAWASAN_MUTU',
            'no' => '4.g.i',
            'tahapan' => 'Pelaksanaan',
            'uraian' => 'Pengawasan Mutu Pekerjaan dilakukan melalui:',
            'is_file_required' => false
        ]);

        $pengawasanMutuItems = [
            ['no' => '1', 'uraian' => 'Metode Kerja'],
            ['no' => '2', 'uraian' => 'Tenaga Kerja yang Terlibat'],
            ['no' => '3', 'uraian' => 'Peralatan yang Dibutuhkan, Pemeriksaan terkait ketersediaan SILO dan SIO'],
            ['no' => '4', 'uraian' => 'Material yang Digunakan, Pengawasan terkait spesifikasi dan jumlah material dasar dan material olahan sesuai dengan dokumen pengajuan material'],
            ['no' => '5', 'uraian' => 'Aspek Keselamatan Konstruksi, implementasi per pekerjaan pada IBPRP'],
            ['no' => '6', 'uraian' => 'Jadwal Mobilisasi tiap-tiap Sumber Daya'],
            ['no' => '7', 'uraian' => 'Rencana Pemeriksaan dan Pengujian (Inspection and Test Plan/ ITP)'],
            ['no' => '8', 'uraian' => 'Hasil Pekerjaan, Pengawasan terkait hasil tiap-tiap pekerjaan sesuai dengan persyaratan.']
        ];

        foreach ($pengawasanMutuItems as $item) {
            DocumentType::create([
                'code' => 'PELAKSANAAN_PENGAWASAN_MUTU_METODE_' . $item['no'],
                'parent_code' => 'PELAKSANAAN_PENGAWASAN_MUTU_METODE',
                'no' => '4.g.i.' . $item['no'],
                'tahapan' => 'Pelaksanaan',
                'uraian' => $item['uraian']
            ]);
        }

        // Additional Pengawasan Mutu items
        $additionalPengawasanItems = [
            ['no' => 'ii', 'uraian' => 'Pengawasan terhadap proses tiap-tiap kegiatan dilakukan berdasarkan spesifikasi dan metode kerja yang diajukan'],
            ['no' => 'iii', 'uraian' => 'Pengawasan terhadap hasil pekerjaaan dilakukan berdasarkan spesifikasi'],
            ['no' => 'iv', 'uraian' => 'Pemeriksaan material pada saat penerimaan dilakukan sesuai Prosedur (P-04)'],
            ['no' => 'v', 'uraian' => 'Pemeriksaan dan Pengujian berkala material dilaksanakan sesuai dengan rencana pengujian pada dokumen Pemeriksaan dan Pengujian (ITP) yang terkait dengan material tersebut dengan peraturan yang berlaku sesuai dengan Prosedur (P-05)'],
            ['no' => 'vi', 'uraian' => 'Pemeriksaan hasil pekerjaan dilakukan pada setiap pekerjaan maupun sub pekerjaan baik fisik maupun administrasi Jika hasil pekerjaan sudah sesuai spesfikasi, maka Penyedia Jasa Pekerjaan Konstruksi mengajukan permohonan pemeriksaan kepada penanggung jawab kegiatan sesuai dengan prosedur (P-06)'],
            ['no' => 'vii', 'uraian' => 'Jika dalam pelaksanaan pekerjaan diperlukan adanya penyesuaian atau perubahan di lapangan, maka perubahan di lapangan dilaksanakan sesuai Prosedur (P-07)'],
            ['no' => 'viii', 'uraian' => 'Pengendalian ketidaksesuaian hasil pekerjaan dilakukan oleh Penyedia Jasa Pekerjaan Konstruksi dan Pengawas Pekerjaan, dan membuat laporan ketidaksesuaian sesuai Prosedur (P-08) dan (P-09).']
        ];

        foreach ($additionalPengawasanItems as $item) {
            DocumentType::create([
                'code' => 'PELAKSANAAN_PENGAWASAN_MUTU_' . strtoupper(str_replace(' ', '_', $item['no'])),
                'parent_code' => 'PELAKSANAAN_PENGAWASAN_MUTU',
                'no' => '4.g.' . $item['no'],
                'tahapan' => 'Pelaksanaan',
                'uraian' => $item['uraian']
            ]);
        }

        // h. Penerimaan dan Pembayaran Hasil Pekerjaan
        DocumentType::create([
            'code' => 'PELAKSANAAN_PENERIMAAN',
            'parent_code' => 'PELAKSANAAN',
            'no' => '4.h',
            'tahapan' => 'Pelaksanaan',
            'uraian' => 'Penerimaan dan Pembayaran Hasil Pekerjaan',
            'is_file_required' => false
        ]);

        $penerimaanItems = [
            ['no' => 'i', 'uraian' => 'Penerimaan hasil pekerjaan dilakukan setelah seluruh persyaratan mutu pekerjaan dalam kontrak dipenuhi'],
            ['no' => 'ii', 'uraian' => 'Persetujuan dokumen penagihan didahului dengan pemeriksaan mutu dan volume hasil pekerjaan yang telah selesai dikerjakan oleh pengawas pekerjaan'],
            ['no' => 'iii', 'uraian' => 'Penyedia Jasa Pekerjaan Konstruksi menyampaikan dokumen tagihan sesuai dalam kontrak'],
            ['no' => 'iv', 'uraian' => 'Jika hasil pemeriksaan menunjukkan ketidaksesuaian spesifikasi dan volume yang tertulis dalam dokumen penagihan, maka penanggung jawab kegiatan berhak untuk tidak menyetujui dokumen tersebut dan Penyedia Jasa Pekerjaan Konstruksi wajib melakukan perbaikan terhadap hasil pekerjaan maupun dokumen penagihannya'],
            ['no' => 'v', 'uraian' => 'Pembayaran dapat dilakukan setelah hasil pemeriksaan telah disetujui']
        ];

        foreach ($penerimaanItems as $item) {
            DocumentType::create([
                'code' => 'PELAKSANAAN_PENERIMAAN_' . strtoupper(str_replace(' ', '_', $item['no'])),
                'parent_code' => 'PELAKSANAAN_PENERIMAAN',
                'no' => '4.h.' . $item['no'],
                'tahapan' => 'Pelaksanaan',
                'uraian' => $item['uraian']
            ]);
        }

        // Tenaga Ahli
        DocumentType::create([
            'code' => 'TENDER_MK_TENAGA_AHLI',
            'parent_code' => 'TENDER_MK_III',
            'no' => '2.a.iii.1',
            'tahapan' => 'Tender',
            'uraian' => 'Tenaga Ahli',
            'is_file_required' => false
        ]);

        $tenagaAhli = [
            ['no' => '1', 'uraian' => 'Team Leader'],
            ['no' => '2', 'uraian' => 'Tenaga Ahli Teknik Arsitektur'],
            ['no' => '3', 'uraian' => 'Tenaga Ahli Struktur/Sipil'],
            ['no' => '4', 'uraian' => 'Tenaga Ahli Mekanikal/Elektrikal'],
            ['no' => '5', 'uraian' => 'Tenaga Ahli K3 Konstruksi']
        ];

        foreach ($tenagaAhli as $ahli) {
            DocumentType::create([
                'code' => 'TENDER_MK_TENAGA_AHLI_' . $ahli['no'],
                'parent_code' => 'TENDER_MK_TENAGA_AHLI',
                'no' => '2.a.iii.1.' . $ahli['no'],
                'tahapan' => 'Tender',
                'uraian' => $ahli['uraian']
            ]);
        }


        

        // Tenaga Pengawas
        DocumentType::create([
            'code' => 'TENDER_MK_TENAGA_PENGAWAS',
            'parent_code' => 'TENDER_MK_III',
            'no' => '2.a.iii.2',
            'tahapan' => 'Tender',
            'uraian' => 'Tenaga Pengawas',
            'is_file_required' => false
        ]);

        $tenagaPengawas = [
            ['no' => '1', 'uraian' => 'Site Engineer'],
            ['no' => '2', 'uraian' => 'Pengawas Arsitektur'],
            ['no' => '3', 'uraian' => 'Pengawas Struktur'],
            ['no' => '4', 'uraian' => 'Pengawas MEP']
        ];

        foreach ($tenagaPengawas as $pengawas) {
            DocumentType::create([
                'code' => 'TENDER_MK_TENAGA_PENGAWAS_' . $pengawas['no'],
                'parent_code' => 'TENDER_MK_TENAGA_PENGAWAS',
                'no' => '2.a.iii.2.' . $pengawas['no'],
                'tahapan' => 'Tender',
                'uraian' => $pengawas['uraian']
            ]);
        }


        

        // Tenaga Pendukung
        DocumentType::create([
            'code' => 'TENDER_MK_TENAGA_PENDUKUNG',
            'parent_code' => 'TENDER_MK_III',
            'no' => '2.a.iii.3',
            'tahapan' => 'Tender',
            'uraian' => 'Tenaga Pendukung',
            'is_file_required' => false
        ]);

        $tenagaPendukung = [
            ['no' => '1', 'uraian' => 'Juru Gambar/Drafter BIM'],
            ['no' => '2', 'uraian' => 'Administrasi + Surveyor']
        ];

        foreach ($tenagaPendukung as $pendukung) {
            DocumentType::create([
                'code' => 'TENDER_MK_TENAGA_PENDUKUNG_' . $pendukung['no'],
                'parent_code' => 'TENDER_MK_TENAGA_PENDUKUNG',
                'no' => '2.a.iii.3.' . $pendukung['no'],
                'tahapan' => 'Tender',
                'uraian' => $pendukung['uraian']
            ]);
        }

        // ===================================
        // 6. PERUBAHAN KONTRAK (ADDENDUM)
        // ===================================

        // a. Bentuk Perubahan Kontrak/Addendum
        $bentukPerubahan = DocumentType::create([
            'code' => 'ADDENDUM_BENTUK',
            'no' => '6.a',
            'tahapan' => 'Addendum',
            'uraian' => 'Bentuk Perubahan Kontrak/Addendum',
            'is_file_required' => false
        ]);

        $bentukAddendum = [
            ['no' => 'i', 'uraian' => 'Mutual Check (MC) perubahan'],
            ['no' => 'ii', 'uraian' => 'Contract Change Order (CCO)'],
            ['no' => 'iii', 'uraian' => 'Addendum Kontrak']
        ];

        foreach ($bentukAddendum as $bentuk) {
            DocumentType::create([
                'code' => 'ADDENDUM_BENTUK_' . strtoupper(str_replace(' ', '_', $bentuk['no'])),
                'parent_code' => 'ADDENDUM_BENTUK',
                'no' => '6.a.' . $bentuk['no'],
                'tahapan' => 'Addendum',
                'uraian' => $bentuk['uraian']
            ]);
        }

        // b. Dokumen pendukung perubahan kontrak
        $dokumenPendukung = DocumentType::create([
            'code' => 'PERUBAHAN_PENDUKUNG',
            'no' => '6.b',
            'tahapan' => 'Perubahan Kontrak',
            'uraian' => 'Dokumen pendukung perubahan kontrak',
            'is_file_required' => false
        ]);

        $pendukungItems = [
            ['no' => 'i', 'uraian' => 'Berita Acara Rapat Lapangan'],
            ['no' => 'ii', 'uraian' => 'Usulan Perubahan dari Penyedia/Perintah tertulis perubahan kontrak oleh Pengguna Jasa (PA/KPA/PPK)'],
            ['no' => 'iii', 'uraian' => 'Kajian/Justifikasi Teknis Konsultan Pengawas/MK'],
            ['no' => 'iv', 'uraian' => 'Rekomendasi Konsultan Perencana']
        ];

        foreach ($pendukungItems as $item) {
            DocumentType::create([
                'code' => 'PERUBAHAN_PENDUKUNG_' . strtoupper(str_replace(' ', '_', $item['no'])),
                'parent_code' => 'PERUBAHAN_PENDUKUNG',
                'no' => '6.b.' . $item['no'],
                'tahapan' => 'Addendum',
                'uraian' => $item['uraian']
            ]);
        }

        // c. Berita Acara Negosiasi
        DocumentType::create([
            'code' => 'ADDENDUM_NEGOSIASI',
            'no' => '6.c',
            'tahapan' => 'Addendum',
            'uraian' => 'Berita Acara Negosiasi Teknis dan Harga (jika ada penambahan item pekerjaan baru)'
        ]);

        // d. Berita Acara Persetujuan
        DocumentType::create([
            'code' => 'ADDENDUM_PERSETUJUAN',
            'no' => '6.d',
            'tahapan' => 'Addendum',
            'uraian' => 'Berita Acara Persetujuan Perubahan'
        ]);

        // e. Persetujuan Program Mutu
        DocumentType::create([
            'code' => 'ADDENDUM_PROGRAM_MUTU',
            'no' => '6.e',
            'tahapan' => 'Addendum',
            'uraian' => 'Persetujuan Perubahan atau Permutakhiran Program Mutu oleh PPK (jika ada)'
        ]);

        // Bentuk perubahan kontrak
        $bentukPerubahan = [
            ['no' => 'i', 'uraian' => 'Perubahan spesifikasi teknis'],
            ['no' => 'ii', 'uraian' => 'Perubahan jadwal pelaksanaan'],
            ['no' => 'iii', 'uraian' => 'Perubahan harga kontrak']
        ];

        foreach ($bentukPerubahan as $bentuk) {
            DocumentType::create([
                'code' => 'ADDENDUM_BENTUK_' . strtoupper(str_replace(' ', '_', $bentuk['no'])),
                'parent_code' => 'ADDENDUM_PROGRAM_MUTU',
                'no' => '6.e.' . $bentuk['no'],
                'tahapan' => 'Addendum',
                'uraian' => $bentuk['uraian'],
                'is_file_required' => false
            ]);
        }

        // b. Dokumen pendukung perubahan kontrak
        DocumentType::create([
            'code' => 'ADDENDUM_DOKUMEN_PENDUKUNG',
            'no' => '6.b',
            'tahapan' => 'Addendum',
            'uraian' => 'Dokumen pendukung perubahan kontrak',
            'is_file_required' => false
        ]);

        $dokumenPendukung = [
            ['no' => 'i', 'uraian' => 'Berita Acara Rapat Lapangan'],
            ['no' => 'ii', 'uraian' => 'Usulan Perubahan dari Penyedia/Perintah tertulis perubahan kontrak oleh Pengguna Jasa (PA/KPA/PPK)'],
            ['no' => 'iii', 'uraian' => 'Kajian/Justifikasi Teknis Konsultan Pengawas/MK'],
            ['no' => 'iv', 'uraian' => 'Rekomendasi Konsultan Perencana']
        ];

        foreach ($dokumenPendukung as $dokumen) {
            DocumentType::create([
                'code' => 'ADDENDUM_DOKUMEN_PENDUKUNG_' . strtoupper(str_replace(' ', '_', $dokumen['no'])),
                'parent_code' => 'ADDENDUM_DOKUMEN_PENDUKUNG',
                'no' => '6.b.' . $dokumen['no'],
                'tahapan' => 'Addendum',
                'uraian' => $dokumen['uraian'],
                'is_file_required' => false
            ]);
        }

        // c. Berita Acara Negosiasi Teknis dan Harga
        DocumentType::create([
            'code' => 'ADDENDUM_BA_NEGOSIASI',
            'no' => '6.c',
            'tahapan' => 'Addendum',
            'uraian' => 'Berita Acara Negosiasi Teknis dan Harga (jika ada penambahan item pekerjaan baru)'
        ]);

        // d. Berita Acara Persetujuan Perubahan
        DocumentType::create([
            'code' => 'ADDENDUM_BA_PERSETUJUAN',
            'no' => '6.d',
            'tahapan' => 'Addendum',
            'uraian' => 'Berita Acara Persetujuan Perubahan'
        ]);

        // e. Persetujuan Perubahan atau Permutakhiran Program Mutu
        DocumentType::create([
            'code' => 'ADDENDUM_PERSETUJUAN_MUTU',
            'no' => '6.e',
            'tahapan' => 'Addendum',
            'uraian' => 'Persetujuan Perubahan atau Permutakhiran Program Mutu oleh PPK (jika ada)',
            'is_file_required' => false
        ]);

        // ===================================
        // 7. KONTRAK KRITIS
        // ===================================

        // a. Surat Teguran
        DocumentType::create([
            'code' => 'KONTRAK_KRITIS_TEGURAN',
            'no' => '7.a',
            'tahapan' => 'Kontrak Kritis',
            'uraian' => 'Surat Teguran'
        ]);

        // b. Berita Acara Show Cause Meeting (SCM)
        DocumentType::create([
            'code' => 'KONTRAK_KRITIS_SCM',
            'no' => '7.b',
            'tahapan' => 'Kontrak Kritis',
            'uraian' => 'Berita Acara Show Cause Meeting (SCM)',
            'is_file_required' => false
        ]);

        // Sub-dokumen SCM
        $scmDocs = [
            ['no' => 'i', 'uraian' => 'Berita Acara Show Cause Meeting (SCM) I'],
            ['no' => 'ii', 'uraian' => 'Berita Acara Show Cause Meeting (SCM) II'],
            ['no' => 'iii', 'uraian' => 'Berita Acara Show Cause Meeting (SCM) III']
        ];

        foreach ($scmDocs as $doc) {
            DocumentType::create([
                'code' => 'KONTRAK_KRITIS_SCM_' . strtoupper(str_replace(' ', '_', $doc['no'])),
                'parent_code' => 'KONTRAK_KRITIS_SCM',
                'no' => '7.b.' . $doc['no'],
                'tahapan' => 'Kontrak Kritis',
                'uraian' => $doc['uraian']
            ]);
        }

        // c. Surat Peringatan
        DocumentType::create([
            'code' => 'KONTRAK_KRITIS_PERINGATAN',
            'no' => '7.c',
            'tahapan' => 'Kontrak Kritis',
            'uraian' => 'Surat Peringatan',
            'is_file_required' => false
        ]);

        // ===================================
        // 8. PEMUTUSAN KONTRAK
        // ===================================

        // a. Berita Acara Pemeriksaan Lapangan
        DocumentType::create([
            'code' => 'PEMUTUSAN_BA_PEMERIKSAAN_LAPANGAN',
            'no' => '8.a',
            'tahapan' => 'Pemutusan Kontrak',
            'uraian' => 'Berita Acara Pemeriksaan Lapangan untuk melakukan Penilaian Progress Lapangan Kondisi Kritis oleh Penyedia Jasa, Konsultan Pengawas/MK, Pejabat Pembuat Komitmen (PPK), dan tim teknis/tim ahli (jika ada/diperlukan)'
        ]);

        // b. Berita Acara Pemeriksaan Administratif
        DocumentType::create([
            'code' => 'PEMUTUSAN_BA_PEMERIKSAAN_ADMIN',
            'no' => '8.b',
            'tahapan' => 'Pemutusan Kontrak',
            'uraian' => 'Berita Acara Pemeriksaan Administratif untuk melakukan Penelitian Dokumen Pelaksanaan Kontrak oleh Penyedia Jasa, Konsultan Pengawas/MK, Penjabat Pembuat Komitmen (PPK), dan tim teknis/tim ahli (jika ada, diperlukan)'
        ]);

        // c. Surat Penghentian Pekerjaan/Pemutusan Kontrak
        DocumentType::create([
            'code' => 'PEMUTUSAN_SURAT_PENGHENTIAN',
            'no' => '8.c',
            'tahapan' => 'Pemutusan Kontrak',
            'uraian' => 'Surat Penghentian Pekerjaan/Pemutusan Kontrak oleh PPK'
        ]);

        // d. Surat Usulan Penetapan Sanksi Daftar Hitam
        DocumentType::create([
            'code' => 'PEMUTUSAN_SURAT_USULAN_SANKSI',
            'no' => '8.d',
            'tahapan' => 'Pemutusan Kontrak',
            'uraian' => 'Surat Usulan Penetapan Sanksi Daftar Hitam dari PPK ke PA/KPA atau K/L/Pemerintah Daerah'
        ]);

        // e. Surat Pemberitahuan Usulan Penetapan Sanksi
        DocumentType::create([
            'code' => 'PEMUTUSAN_SURAT_PEMBERITAHUAN_SANKSI',
            'no' => '8.e',
            'tahapan' => 'Pemutusan Kontrak',
            'uraian' => 'Surat Pemberitahuan Usulan Penetapan Sanski Daftar Hitam dari PA/KPA atau K/L/Pemerintah Daerah'
        ]);

        // f. Surat Keberatan dari Penyedia Jasa
        DocumentType::create([
            'code' => 'PEMUTUSAN_SURAT_KEBERATAN',
            'no' => '8.f',
            'tahapan' => 'Pemutusan Kontrak',
            'uraian' => 'Surat Keberatan dari Penyedia Jasa (jika ada)'
        ]);

        // g. Surat Rekomendasi Penetapan Sanksi
        DocumentType::create([
            'code' => 'PEMUTUSAN_SURAT_REKOMENDASI_SANKSI',
            'no' => '8.g',
            'tahapan' => 'Pemutusan Kontrak',
            'uraian' => 'Surat Rekomendasi Penetapan Sanksi Daftar Hitam dari APIP'
        ]);

        // h. Surat Keputusan Penetapan Sanksi
        DocumentType::create([
            'code' => 'PEMUTUSAN_SURAT_KEPUTUSAN_SANKSI',
            'no' => '8.h',
            'tahapan' => 'Pemutusan Kontrak',
            'uraian' => 'Surat Keputusan Penetapan Sanksi Daftar Hitam dari PA/KPA atau K/L/Pemerintah Daerah'
        ]);

        // Sub-dokumen Surat Peringatan
        $peringatanDocs = [
            ['no' => 'i', 'uraian' => 'Surat Peringatan I'],
            ['no' => 'ii', 'uraian' => 'Surat Peringatan II'],
            ['no' => 'iii', 'uraian' => 'Surat Peringatan III']
        ];

        foreach ($peringatanDocs as $doc) {
            DocumentType::create([
                'code' => 'KONTRAK_KRITIS_PERINGATAN_' . strtoupper(str_replace(' ', '_', $doc['no'])),
                'parent_code' => 'KONTRAK_KRITIS_PERINGATAN',
                'no' => '7.c.' . $doc['no'],
                'tahapan' => 'Kontrak Kritis',
                'uraian' => $doc['uraian']
            ]);
        }

        // Keluaran Konsultan MK
        DocumentType::create([
            'code' => 'PELAKSANAAN_KELUARAN_MK',
            'parent_code' => 'PELAKSANAAN',
            'no' => '4.a',
            'tahapan' => 'Pelaksanaan',
            'uraian' => 'Keluaran Konsultan MK',
            'is_file_required' => false
        ]);

        $keluaranMK = [
            ['no' => 'i', 'uraian' => 'Laporan dan Berita Acara Persiapan Pelaksanaan'],
            ['no' => 'ii', 'uraian' => 'Buku harian, yang memuat semua kejadian, perintah/petunjuk yang penting dari Pemimpin Pelaksana Kegiatan, Kontraktor Pelaksana dan Konsultan MK'],
            ['no' => 'iii', 'uraian' => 'Laporan Harian'],
            ['no' => 'iv', 'uraian' => 'Laporan Mingguan dan bulanan sesuai resume laporan harian'],
            ['no' => 'v', 'uraian' => 'Berita Acara Kemajuan Pekerjaan untuk pembayaran angsuran'],
            ['no' => 'vi', 'uraian' => 'Surat Perintah Perubahan Pekerjaan untuk pembayaran angsuran'],
            ['no' => 'vii', 'uraian' => 'Gambar-gambar sesuai dengan pelaksanaan (as-built drawing) dan manual peralatan-peralatan yang dibuat oleh kontraktor pelaksana'],
            ['no' => 'viii', 'uraian' => 'Laporan rapat di lapangan (site meeting)'],
            ['no' => 'ix', 'uraian' => 'Gambar rincian pelaksanaan (shop drawing) dan time schedule yang dibuat oleh kontraktor pelaksana'],
            ['no' => 'x', 'uraian' => 'Foto dokumentasi (0%, 30%, 50%, 75%, 100%)'],
            ['no' => 'xi', 'uraian' => 'Laporan akhir pekerjaan manajemen']
        ];

        foreach ($keluaranMK as $keluaran) {
            DocumentType::create([
                'code' => 'PELAKSANAAN_KELUARAN_MK_' . strtoupper(str_replace(' ', '_', $keluaran['no'])),
                'parent_code' => 'PELAKSANAAN_KELUARAN_MK',
                'no' => '4.a.' . $keluaran['no'],
                'tahapan' => 'Pelaksanaan',
                'uraian' => $keluaran['uraian']
            ]);
        }


        

        // Tujuan adanya Konsultan MK
        DocumentType::create([
            'code' => 'TENDER_MK_TUJUAN',
            'parent_code' => 'TENDER_MK_III',
            'no' => '2.a.iv',
            'tahapan' => 'Tender',
            'uraian' => 'Tujuan adanya Konsultan MK',
            'is_file_required' => false
        ]);

        $tujuanMK = [
            ['no' => '1', 'uraian' => 'BA Aanwjzing'],
            ['no' => '2', 'uraian' => 'Notulen Rapat Persiapan Pelaksanaan Kontrak'],
            ['no' => '3', 'uraian' => 'Kontrak Pelaksanaan Pekerjaan'],
            ['no' => '4', 'uraian' => 'Rencana Pre Construction Meeting'],
            ['no' => '5', 'uraian' => 'Rencana Pekerjaan Persiapan Konstruksi'],
            ['no' => '6', 'uraian' => 'Berita Acara Serah Terima Lahan'],
            ['no' => '7', 'uraian' => 'Berita Acara Pengukuran Kembali Lokasi Pekerjaan (Uitzet) dan Mutual Check']
        ];

        foreach ($tujuanMK as $tujuan) {
            DocumentType::create([
                'code' => 'TENDER_MK_TUJUAN_' . $tujuan['no'],
                'parent_code' => 'TENDER_MK_TUJUAN',
                'no' => '2.a.iv.' . $tujuan['no'],
                'tahapan' => 'Tender',
                'uraian' => $tujuan['uraian']
            ]);
        }


        



        // ===================================
        // 5. PENUNJANG TAHAPAN PELAKSANAAN KONSTRUKSI (PELAPORAN)
        // ===================================

        // a. Laporan Harian
        DocumentType::create([
            'code' => 'PELAPORAN_HARIAN',
            'no' => '5.a',
            'tahapan' => 'Pelaporan',
            'uraian' => 'Laporan Harian',
            'is_file_required' => false
        ]);

        $laporanHarianItems = [
            ['no' => 'i', 'uraian' => 'jenis dan kuantitas bahan yang berada di lokasi pekerjaan'],
            ['no' => 'ii', 'uraian' => 'penempatan tenaga kerja untuk tiap macam tugasnya'],
            ['no' => 'iii', 'uraian' => 'jenis, jumlah, dan kondisi lapangan'],
            ['no' => 'iv', 'uraian' => 'jenis dan kuantitas pekerjaan yang dilaksanakan'],
            ['no' => 'v', 'uraian' => 'keadaan cuaca termasuk hujan, banjir, dan peristiwa alam lainnya yang berpengaruh terhadap kelancaran pekerjaan'],
            ['no' => 'vi', 'uraian' => 'catatan-catatan lain yang berkenaan dengan pelaksanaan']
        ];

        foreach ($laporanHarianItems as $item) {
            DocumentType::create([
                'code' => 'PELAPORAN_HARIAN_' . strtoupper(str_replace(' ', '_', $item['no'])),
                'parent_code' => 'PELAPORAN_HARIAN',
                'no' => '5.a.' . $item['no'],
                'tahapan' => 'Pelaporan',
                'uraian' => $item['uraian']
            ]);
        }

        // b. Laporan Mingguan
        DocumentType::create([
            'code' => 'PELAPORAN_MINGGUAN',
            'no' => '5.b',
            'tahapan' => 'Pelaporan',
            'uraian' => 'Laporan Mingguan',
            'is_file_required' => false
        ]);

        $laporanMingguanItems = [
            ['no' => 'i', 'uraian' => 'rangkuman capaian pekerjaan fisik berupa hasil pembandingan capaian minggu sebelumnya dengan capaian pada minggu berjalan dan sasaran capaian pada minggu berikutnya'],
            ['no' => 'ii', 'uraian' => 'hambatan dan kendala yang dihadapi pada kurun waktu 1 (satu) minggu berserta tindakan penanggulangan yang telah dilakukan dan potensi kendala pada minggu berikutnya'],
            ['no' => 'iii', 'uraian' => 'dukungan yang diperlukan dari Pemimpin unit kerja Pelaksana Kegiatan/Penanggung Jawa Kegiatan, Direksi Teknis/Konsultan Pengawas, dan pihak-pihka lain yang terkait'],
            ['no' => 'iv', 'uraian' => 'ringkasan permohonan persetujuan atas usulan dan dokumen yang diajukan beserta statusnya'],
            ['no' => 'v', 'uraian' => 'ringkasan kegiatan pemeriksaan dan pengujian yang dilakukan'],
            ['no' => 'vi', 'uraian' => 'ringkasan aktivitas dan hasil pengendalian Keselamatan Konstruksi, termasuk kejadian kecelakaan kerja, catatan tentang kejadian nyaris terjadi kecelakaan kerja (nearmiss record), dan lain-lain']
        ];

        foreach ($laporanMingguanItems as $item) {
            DocumentType::create([
                'code' => 'PELAPORAN_MINGGUAN_' . strtoupper(str_replace(' ', '_', $item['no'])),
                'parent_code' => 'PELAPORAN_MINGGUAN',
                'no' => '5.b.' . $item['no'],
                'tahapan' => 'Pelaporan',
                'uraian' => $item['uraian']
            ]);
        }

        // c. Laporan Bulanan
        DocumentType::create([
            'code' => 'PELAPORAN_BULANAN',
            'no' => '5.c',
            'tahapan' => 'Pelaporan',
            'uraian' => 'Laporan Bulanan',
            'is_file_required' => false
        ]);

        $laporanBulananItems = [
            ['no' => 'i', 'uraian' => 'capaian pekerjaan fisik, ringkasan status capaian pekerjaan fisik dengan membandingkan capaian di bulan sebelumnya, capaian pada bulan berjalan serta target capaian di bulan berikutnya'],
            ['no' => 'ii', 'uraian' => 'foto dokumentasi pekerjaan'],
            ['no' => 'iii', 'uraian' => 'ringkasan status kondisi keuangan Penyedia Jasa Pekerjaan Konstruksi, status pembayaran dari Pengguna jasa'],
            ['no' => 'iv', 'uraian' => 'perubahan kontrak dan perubahan pekerjaan'],
            ['no' => 'v', 'uraian' => 'masalah dan kendala yang dihadapi, termasuk statusnya, tindakan penanggulangan yang telah dilakukan dan rencana tindakan selanjutnya'],
            ['no' => 'vi', 'uraian' => 'hambatan dan kendala yang dihadapi pada kurun waktu 1 (satu) minggu berserta tindakan penanggulangan yang telah dilakukan dan potensi kendala pada minggu berikutnya'],
            ['no' => 'vii', 'uraian' => 'hambatan dan kendala yang berpotensi terjadi di bulan berikutnya, beserta rencana pencegahan atau penanggulangan yang akan dilakukan'],
            ['no' => 'viii', 'uraian' => 'status persetujuan atas usulan dan permohonan dokumen'],
            ['no' => 'ix', 'uraian' => 'ringkasan aktivitas dan hasil pengendalian Keselamatan Konstruksi, termasuk kejadian kecelakaan kerja, catatan tentang kejadian nyaris terjadi kecelakaan kerja (nearmiss record), dan lain-lain']
        ];

        foreach ($laporanBulananItems as $item) {
            DocumentType::create([
                'code' => 'PELAPORAN_BULANAN_' . strtoupper(str_replace(' ', '_', $item['no'])),
                'parent_code' => 'PELAPORAN_BULANAN',
                'no' => '5.c.' . $item['no'],
                'tahapan' => 'Pelaporan',
                'uraian' => $item['uraian']
            ]);
        }

        // d. Data-data dukung dan pengujian untuk Kelengkapan Dokumen SLF
        DocumentType::create([
            'code' => 'PELAPORAN_SLF',
            'no' => '5.d',
            'tahapan' => 'Pelaporan',
            'uraian' => 'Data-data dukung dan pengujian untuk Kelengkapan Dokumen Sertifikat Laik Fungsi (SLF) Bangunan',
            'is_file_required' => false
        ]);

        // i. Hasil uji mutu
        DocumentType::create([
            'code' => 'PELAPORAN_SLF_UJI_MUTU',
            'parent_code' => 'PELAPORAN_SLF',
            'no' => '5.d.i',
            'tahapan' => 'Pelaporan',
            'uraian' => 'Hasil uji mutu',
            'is_file_required' => false
        ]);

        $ujiMutuItems = [
            ['no' => '1', 'uraian' => 'Uji tarik besi'],
            ['no' => '2', 'uraian' => 'Uji tekan beton'],
            ['no' => '3', 'uraian' => 'Pembebanan pondasi dalam']
        ];

        foreach ($ujiMutuItems as $item) {
            DocumentType::create([
                'code' => 'PELAPORAN_SLF_UJI_MUTU_' . $item['no'],
                'parent_code' => 'PELAPORAN_SLF_UJI_MUTU',
                'no' => '5.d.i.' . $item['no'],
                'tahapan' => 'Pelaporan',
                'uraian' => $item['uraian']
            ]);
        }

        $slfItems = [
            ['no' => 'ii', 'uraian' => 'Sertifikat mutu, brosur, katalog'],
            ['no' => 'iii', 'uraian' => 'Sertifikat garansi / surat jaminan peralatan dan perlengkapan mekanikal, elektrikal, dan perpipaan (plumbing)'],
            ['no' => 'iv', 'uraian' => 'Sertifikat Laik Operasi (SLO) Penyambungan Baru Instalasi Listrik'],
            ['no' => 'v', 'uraian' => 'Perijinan Sumur Dalam dari Dinas ESDM/Instansi Terkait'],
            ['no' => 'vi', 'uraian' => 'Uji Kualitas Air Sumur dari Dinas Kesehatan/Instansi Terkait'],
            ['no' => 'vii', 'uraian' => 'Pengujian Instalasi Pemadam Kebakaran (Hidran, APAR, dll) dari Dinas Pemadam Kebakaran/BPDB/Instansi Terkait'],
            ['no' => 'viii', 'uraian' => 'Pengujian K3 Instalasi Penyalur Petir dari Dinas Tenaga Kerja/Instansi Terkait'],
            ['no' => 'ix', 'uraian' => 'Hasil Test Commisioning Mekanikal Elektrikal'],
            ['no' => 'x', 'uraian' => 'Dokumen K3 atau SMK3'],
            ['no' => 'xi', 'uraian' => 'Sertifikat Bangunan Gedung Hijau (jika ada)'],
            ['no' => 'xii', 'uraian' => 'Gambar Kerja (Shop Drawing)'],
            ['no' => 'xiii', 'uraian' => 'Gambar Hasil Pelaksanaan (As Bulit Drawing)'],
            ['no' => 'xiv', 'uraian' => 'Pedoman/Manual pengoperasian dan perawatan/pemeliharaan Bangunan Gedung Negara, termasuk peralatan dan perlengkapan mekanikal, elektrikal, dan plumbing, yang disusun bersama konsultan perencana dan konsultan pengawas/MK'],
            ['no' => 'xv', 'uraian' => 'Surat Penjaminan atas Kegagalan Bangunan diTTD Penyedia Jasa Pelaksana dan Pengawas Konstruksi/MK']
        ];

        foreach ($slfItems as $item) {
            DocumentType::create([
                'code' => 'PELAPORAN_SLF_' . strtoupper(str_replace(' ', '_', $item['no'])),
                'parent_code' => 'PELAPORAN_SLF',
                'no' => '5.d.' . $item['no'],
                'tahapan' => 'Pelaporan',
                'uraian' => $item['uraian']
            ]);
        }

        // e. Berita Acara Hasil Perbaikan Cacat Mutu
        DocumentType::create([
            'code' => 'PELAPORAN_PERBAIKAN_CACAT',
            'no' => '5.e',
            'tahapan' => 'Pelaporan',
            'uraian' => 'Berita Acara Hasil Perbaikan Cacat Mutu (Jika Ada)'
        ]);

        // f. Laporan Dokumentasi Pelaksanaan Konstruksi
        DocumentType::create([
            'code' => 'PELAPORAN_DOKUMENTASI',
            'no' => '5.f',
            'tahapan' => 'Pelaporan',
            'uraian' => 'Laporan Dokumentasi Pelaksanaan Konstruksi',
            'is_file_required' => false
        ]);

        $dokumentasiItems = [
            ['no' => 'i', 'uraian' => 'Dokumentasi pelaksanaan pada saat progress 0%, 50%, 100% yang diambil dari sudut pandang'],
            ['no' => 'ii', 'uraian' => 'Dokumentasi pelaksanaan pada saat progress 0% dan progress pelaksanaan sesuai permintaan pembayaran = ........ % yang diambil dari satu sudut pandang']
        ];

        foreach ($dokumentasiItems as $item) {
            DocumentType::create([
                'code' => 'PELAPORAN_DOKUMENTASI_' . strtoupper(str_replace(' ', '_', $item['no'])),
                'parent_code' => 'PELAPORAN_DOKUMENTASI',
                'no' => '5.f.' . $item['no'],
                'tahapan' => 'Pelaporan',
                'uraian' => $item['uraian']
            ]);
        }

        // g. Laporan Kemajuan Hasil Pekerjaan
        DocumentType::create([
            'code' => 'PELAPORAN_KEMAJUAN',
            'no' => '5.g',
            'tahapan' => 'Pelaporan',
            'uraian' => 'Laporan Kemajuan Hasil Pekerjaan Pelaksanaan Konstruksi',
            'is_file_required' => false
        ]);

        // Dokumen tambahan tender
        $additionalDocs = [
            ['code' => 'TENDER_REVIEW_PAGU', 'no' => '2.b', 'uraian' => 'Hasil Review Pagu Anggaran Konstruksi'],
            ['code' => 'TENDER_DED_FOR_TENDER', 'no' => '2.c', 'uraian' => 'Dokumen DED for Tender'],
            ['code' => 'TENDER_PENILAIAN_PENYEDIA', 'no' => '2.d', 'uraian' => 'Hasil Penilaian Calon Penyedia Jasa sebagai Rekomendasi kepada Pemberi Tugas'],
            ['code' => 'TENDER_SUPPLIER_CHECK', 'no' => '2.e', 'uraian' => 'Pengecekan kesanggupan supplier material'],
            ['code' => 'TENDER_SPESIFIKASI_REVIEW', 'no' => '2.f', 'uraian' => 'Reviu spesifikasi material']
        ];

        foreach ($additionalDocs as $doc) {
            DocumentType::create([
                'code' => $doc['code'],
                'no' => $doc['no'],
                'tahapan' => 'Tender',
                'uraian' => $doc['uraian']
            ]);
        }


        

        // 3. Persiapan Pelaksanaan Pekerjaan Konstruksi
        DocumentType::create([
            'code' => 'PERSIAPAN',
            'no' => '3',
            'tahapan' => 'Persiapan',
            'uraian' => 'Persiapan Pelaksanaan Pekerjaan Konstruksi',
            'is_file_required' => false
        ]);

        // a. Jaminan Pelaksanaan
        DocumentType::create([
            'code' => 'PERSIAPAN_JAMINAN',
            'parent_code' => 'PERSIAPAN',
            'no' => '3.a',
            'tahapan' => 'Persiapan',
            'uraian' => 'Jaminan Pelaksanaan (jika ada)'
        ]);

        // b. Pengelolaan Kesehatan Kerja
        DocumentType::create([
            'code' => 'PERSIAPAN_K3',
            'parent_code' => 'PERSIAPAN',
            'no' => '3.b',
            'tahapan' => 'Persiapan',
            'uraian' => 'Pengelolaan Kesehatan Kerja - Perlindungan Sosial Tenaga Kerja'
        ]);

        // c. Dokumen Kontrak
        DocumentType::create([
            'code' => 'PERSIAPAN_KONTRAK',
            'parent_code' => 'PERSIAPAN',
            'no' => '3.c',
            'tahapan' => 'Persiapan',
            'uraian' => 'Dokumen Kontrak Pelaksana Konstruksi'
        ]);

        // d. Berita Acara Penyerahan Lokasi
        DocumentType::create([
            'code' => 'PERSIAPAN_BA_LOKASI',
            'parent_code' => 'PERSIAPAN',
            'no' => '3.d',
            'tahapan' => 'Persiapan',
            'uraian' => 'Surat / Berita Acara Penyerahan Lokasi Pekerjaan dari PPK kepada Kontraktor Pelaksana beserta dokumentasi'
        ]);

        // ===================================
        // 4. PELAKSANAAN PEKERJAAN
        // ===================================

        // 4.a. SPMK
        DocumentType::create([
            'code' => 'PERSIAPAN_SPMK',
            'parent_code' => 'PERSIAPAN', 
            'no' => '3.e',
            'tahapan' => 'Persiapan',
            'uraian' => 'Surat Perintah Mulai Kerja (SPMK) Kontraktor Pelaksana'
        ]);

        // f. PCM
        DocumentType::create([
            'code' => 'PERSIAPAN_PCM',
            'parent_code' => 'PERSIAPAN',
            'no' => '3.f',
            'tahapan' => 'Persiapan',
            'uraian' => 'Kegiatan Rapat Persiapan Pelaksanaan Kontrak (Pre Construction Meeting (PCM))',
            'is_file_required' => false
        ]);

        // PCM Sub-documents
        $pcmDocs = [
            ['no' => 'i', 'uraian' => 'Berita Acara PCM'],
            ['no' => 'ii', 'uraian' => 'Struktur Organisasi Proyek', 'is_file_required' => false],
            ['no' => 'iii', 'uraian' => 'Pendelegasian Kewenangan'],
            ['no' => 'iv', 'uraian' => 'Alur Komunikasi dan Persetujuan'],
            ['no' => 'v', 'uraian' => 'Mekanisme Pengawasan'],
            ['no' => 'vi', 'uraian' => 'Jadwal Pelaksanaan'],
            ['no' => 'vii', 'uraian' => 'Mobilisasi personil inti, peralatan, dan material'],
            ['no' => 'viii', 'uraian' => 'Metode Pelaksanaan', 'is_file_required' => false],
            ['no' => 'ix', 'uraian' => 'Pembahasan Dokumen SMKK', 'is_file_required' => false],
            ['no' => 'x', 'uraian' => 'Rencana Pemeriksaan Lapangan Bersama'],
            ['no' => 'xi', 'uraian' => 'Tugas Konsultan MK', 'is_file_required' => false]
        ];

        foreach ($pcmDocs as $doc) {
            DocumentType::create([
                'code' => 'PERSIAPAN_PCM_' . strtoupper(str_replace(' ', '_', $doc['no'])),
                'parent_code' => 'PERSIAPAN_PCM',
                'no' => '3.f.' . $doc['no'],
                'tahapan' => 'Persiapan',
                'uraian' => $doc['uraian'],
                'is_file_required' => $doc['is_file_required'] ?? true
            ]);
        }


        

        // Struktur Organisasi sub-items
        $orgItems = [
            ['no' => '1', 'uraian' => 'Penanggung Jawab Kegiatan'],
            ['no' => '2', 'uraian' => 'Pengawas Pekerjaan'],
            ['no' => '3', 'uraian' => 'Penyedia Jasa Pekerjaan Konstruksi']
        ];

        foreach ($orgItems as $item) {
            DocumentType::create([
                'code' => 'PERSIAPAN_PCM_II_' . $item['no'],
                'parent_code' => 'PERSIAPAN_PCM_II',
                'no' => '3.f.ii.' . $item['no'],
                'tahapan' => 'Persiapan',
                'uraian' => $item['uraian']
            ]);
        }


        

        // Metode Pelaksanaan sub-items
        $metodeItems = [
            ['no' => '1', 'uraian' => 'Gambaran umum tiap tahapan pelaksaan pekerjaan'],
            ['no' => '2', 'uraian' => 'Metode pelaksanaan pekerjaan tertentu yang beresiko besar']
        ];

        foreach ($metodeItems as $item) {
            DocumentType::create([
                'code' => 'PERSIAPAN_PCM_VIII_' . $item['no'],
                'parent_code' => 'PERSIAPAN_PCM_VIII',
                'no' => '3.f.viii.' . $item['no'],
                'tahapan' => 'Persiapan',
                'uraian' => $item['uraian']
            ]);
        }


        

        // SMKK sub-items
        $smkkItems = [
            ['no' => '1', 'uraian' => 'Dokumen RKK'],
            ['no' => '2', 'uraian' => 'Dokumen RMPK'],
            ['no' => '3', 'uraian' => 'Dokumen RKPPL (Jika Ada)'],
            ['no' => '4', 'uraian' => 'Dokumen RMLLP (Jika Ada)']
        ];

        foreach ($smkkItems as $item) {
            DocumentType::create([
                'code' => 'PERSIAPAN_PCM_IX_' . $item['no'],
                'parent_code' => 'PERSIAPAN_PCM_IX',
                'no' => '3.f.ix.' . $item['no'],
                'tahapan' => 'Persiapan',
                'uraian' => $item['uraian']
            ]);
        }


        

        // Tugas Konsultan MK sub-items
        $tugasMKItems = [
            ['no' => '1', 'uraian' => 'Mengecek kesanggupan suplier dan reviu spesifikasi material dengan konsultan perencana'],
            ['no' => '2', 'uraian' => 'Mengarahkan mutu pekerjaan dan spesifikasi material'],
            ['no' => '3', 'uraian' => 'Mengawasi terhadap aspek K3'],
            ['no' => '4', 'uraian' => 'Membantu proses koordinasi dan sosialisasi dengan aparat kewilayahan dan warga setempat'],
            ['no' => '5', 'uraian' => 'Menganalisa master schedule dan daftar tenaga kerja kontraktor pelaksana']
        ];

        foreach ($tugasMKItems as $item) {
            DocumentType::create([
                'code' => 'PERSIAPAN_PCM_XI_' . $item['no'],
                'parent_code' => 'PERSIAPAN_PCM_XI',
                'no' => '3.f.xi.' . $item['no'],
                'tahapan' => 'Persiapan',
                'uraian' => $item['uraian']
            ]);
        }

        // Pemeriksaan Dokumen
        DocumentType::create([
            'code' => 'PELAKSANAAN_PEMERIKSAAN_DOKUMEN',
            'parent_code' => 'PELAKSANAAN',
            'no' => '4.b',
            'tahapan' => 'Pelaksanaan',
            'uraian' => 'Pemeriksaan Dokumen',
            'is_file_required' => false
        ]);

        $pemeriksaanDokumen = [
            ['no' => 'i', 'uraian' => 'Gambar kerja'],
            ['no' => 'ii', 'uraian' => 'Metode kerja konstruksi'],
            ['no' => 'iii', 'uraian' => 'Rencana Pemeriksaan dan Pengujian']
        ];

        foreach ($pemeriksaanDokumen as $dokumen) {
            DocumentType::create([
                'code' => 'PELAKSANAAN_PEMERIKSAAN_DOKUMEN_' . strtoupper(str_replace(' ', '_', $dokumen['no'])),
                'parent_code' => 'PELAKSANAAN_PEMERIKSAAN_DOKUMEN',
                'no' => '4.b.' . $dokumen['no'],
                'tahapan' => 'Pelaksanaan',
                'uraian' => $dokumen['uraian']
            ]);
        }

        // Pemeriksaan Bersama (Mutual Check/MC-0)
        DocumentType::create([
            'code' => 'PELAKSANAAN_PEMERIKSAAN_BERSAMA',
            'parent_code' => 'PELAKSANAAN',
            'no' => '4.c',
            'tahapan' => 'Pelaksanaan',
            'uraian' => 'Pemeriksaan Bersama (Mutual Check/MC-0)',
            'is_file_required' => false
        ]);

        $pemeriksaanBersama = [
            ['no' => 'i', 'uraian' => 'Pemeriksaan terhadap desain awal'],
            ['no' => 'ii', 'uraian' => 'Penyesuaian desain/review desain (Jika Diperlukan)'],
            ['no' => 'iii', 'uraian' => 'Penyesuaian kuantitas (volume) berdasarkan review desain (Jika Diperlukan)'],
            ['no' => 'iv', 'uraian' => 'Berita Acara Hasil Pemeriksaan Bersama (Mutual Check/MC-0) beserta dokumentasi'],
            ['no' => 'v', 'uraian' => 'Perubahan/Addendum Kontrak (jika ada)', 'is_file_required' => false]
        ];

        foreach ($pemeriksaanBersama as $pemeriksaan) {
            DocumentType::create([
                'code' => 'PELAKSANAAN_PEMERIKSAAN_BERSAMA_' . strtoupper(str_replace(' ', '_', $pemeriksaan['no'])),
                'parent_code' => 'PELAKSANAAN_PEMERIKSAAN_BERSAMA',
                'no' => '4.c.' . $pemeriksaan['no'],
                'tahapan' => 'Pelaksanaan',
                'uraian' => $pemeriksaan['uraian'],
                'is_file_required' => $pemeriksaan['is_file_required'] ?? true
            ]);
        }

        // Site Instruction
        DocumentType::create([
            'code' => 'PELAKSANAAN_PEMERIKSAAN_BERSAMA_SITE_INSTRUCTION',
            'parent_code' => 'PELAKSANAAN_PEMERIKSAAN_BERSAMA_V',
            'no' => '4.c.v.1',
            'tahapan' => 'Pelaksanaan',
            'uraian' => 'Site Instruction'
        ]);

        

        // g. Kelengkapan Dokumen Perizinan
        DocumentType::create([
            'code' => 'PERSIAPAN_PERIZINAN',
            'parent_code' => 'PERSIAPAN',
            'no' => '3.g',
            'tahapan' => 'Persiapan',
            'uraian' => 'Kelengkapan Dokumen Perizinan:',
            'is_file_required' => false
        ]);

        $perizinanItems = [
            ['no' => 'i', 'uraian' => 'Surat Keterangan Rencana Kota/Kab'],
            ['no' => 'ii', 'uraian' => 'Persetujuan Bangunan Gedung (PBG) (khususnya bangunan baru/perluasan)']
        ];

        foreach ($perizinanItems as $item) {
            DocumentType::create([
                'code' => 'PERSIAPAN_PERIZINAN_' . strtoupper(str_replace(' ', '_', $item['no'])),
                'parent_code' => 'PERSIAPAN_PERIZINAN',
                'no' => '3.g.' . $item['no'],
                'tahapan' => 'Persiapan',
                'uraian' => $item['uraian']
            ]);
        }


        

        // i. Pembayaran Uang Muka
        DocumentType::create([
            'code' => 'PERSIAPAN_UANG_MUKA',
            'parent_code' => 'PERSIAPAN',
            'no' => '3.i',
            'tahapan' => 'Persiapan',
            'uraian' => 'Pembayaran Uang Muka Berdasarkan SSKK',
            'is_file_required' => false
        ]);

        $uangMukaItems = [
            ['no' => 'i', 'uraian' => 'Jaminan Uang Muka (Jika Ada)'],
            ['no' => 'ii', 'uraian' => 'Berita Acara Pembayaran Uang Muka']
        ];

        foreach ($uangMukaItems as $item) {
            DocumentType::create([
                'code' => 'PERSIAPAN_UANG_MUKA_' . strtoupper(str_replace(' ', '_', $item['no'])),
                'parent_code' => 'PERSIAPAN_UANG_MUKA',
                'no' => '3.i.' . $item['no'],
                'tahapan' => 'Persiapan',
                'uraian' => $item['uraian']
            ]);
        }


        

        // j. Schedule
        $schedule = DocumentType::create([
            'code' => 'PERSIAPAN_SCHEDULE',
            'parent_code' => 'PERSIAPAN',
            'no' => '3.j',
            'tahapan' => 'Persiapan',
            'uraian' => 'Schedule',
            'is_file_required' => false
        ]);

        $scheduleItems = [
            ['no' => 'i', 'uraian' => 'Peralatan'],
            ['no' => 'ii', 'uraian' => 'Personil Inti dan Pendukung'],
            ['no' => 'iii', 'uraian' => 'Material']
        ];

        foreach ($scheduleItems as $item) {
            DocumentType::create([
                'code' => 'PERSIAPAN_SCHEDULE_' . strtoupper(str_replace(' ', '_', $item['no'])),
                'parent_code' => 'PERSIAPAN_SCHEDULE',
                'no' => '3.j.' . $item['no'],
                'tahapan' => 'Persiapan',
                'uraian' => $item['uraian']
            ]);
        }


        

        // 4. Pelaksanaan Pekerjaan Konstruksi
        DocumentType::create([
            'code' => 'PELAKSANAAN',
            'no' => '4',
            'tahapan' => 'Pelaksanaan',
            'uraian' => 'Pelaksanaan Pekerjaan Konstruksi',
            'is_file_required' => false
        ]);

        // a. Kerangka Acuan Kerja Konsultan MK
        DocumentType::create([
            'code' => 'PELAKSANAAN_KAK_MK',
            'parent_code' => 'PELAKSANAAN',
            'no' => '4.a',
            'tahapan' => 'Pelaksanaan',
            'uraian' => 'Kerangka Acuan Kerja Konsultan MK',
            'is_file_required' => false
        ]);

        // i. Masukan teknis kepada pengelola proyek
        DocumentType::create([
            'code' => 'PELAKSANAAN_KAK_MK_MASUKAN',
            'parent_code' => 'PELAKSANAAN_KAK_MK',
            'no' => '4.a.i',
            'tahapan' => 'Pelaksanaan',
            'uraian' => 'Masukan teknis kepada pengelola proyek',
            'is_file_required' => false
        ]);

        $masukanItems = [
            ['no' => '1', 'uraian' => 'Pengelola Administrasi dan Keuangan'],
            ['no' => '2', 'uraian' => 'Pengelola Teknis']
        ];

        foreach ($masukanItems as $item) {
            DocumentType::create([
                'code' => 'PELAKSANAAN_KAK_MK_MASUKAN_' . $item['no'],
                'parent_code' => 'PELAKSANAAN_KAK_MK_MASUKAN',
                'no' => '4.a.i.' . $item['no'],
                'tahapan' => 'Pelaksanaan',
                'uraian' => $item['uraian']
            ]);
        }


        

        // ii. Sasaran Kegiatan Konsultan MK
        DocumentType::create([
            'code' => 'PELAKSANAAN_KAK_MK_SASARAN',
            'parent_code' => 'PELAKSANAAN_KAK_MK',
            'no' => '4.a.ii',
            'tahapan' => 'Pelaksanaan',
            'uraian' => 'Sasaran Kegiatan Konsultan MK',
            'is_file_required' => false
        ]);

        $sasaranItems = [
            ['no' => '1', 'uraian' => 'Reviu perencanaan'],
            ['no' => '2', 'uraian' => 'Manajemen kontrak penyedia jasa konstruksi'],
            ['no' => '3', 'uraian' => 'Pelaksanaan pekerjaan'],
            ['no' => '4', 'uraian' => 'Pengawasan']
        ];

        foreach ($sasaranItems as $item) {
            DocumentType::create([
                'code' => 'PELAKSANAAN_KAK_MK_SASARAN_' . $item['no'],
                'parent_code' => 'PELAKSANAAN_KAK_MK_SASARAN',
                'no' => '4.a.ii.' . $item['no'],
                'tahapan' => 'Pelaksanaan',
                'uraian' => $item['uraian']
            ]);
        }


        

        // iii. Waktu Pelaksanaan Konstruksi
        DocumentType::create([
            'code' => 'PELAKSANAAN_KAK_MK_WAKTU',
            'parent_code' => 'PELAKSANAAN_KAK_MK',
            'no' => '4.a.iii',
            'tahapan' => 'Pelaksanaan',
            'uraian' => 'Waktu Pelaksanaan Konstruksi'
        ]);

        // iv. Tujuan adanya Konsultan MK
        DocumentType::create([
            'code' => 'PELAKSANAAN_KAK_MK_TUJUAN',
            'parent_code' => 'PELAKSANAAN_KAK_MK',
            'no' => '4.a.iv',
            'tahapan' => 'Pelaksanaan',
            'uraian' => 'Tujuan adanya Konsultan MK',
            'is_file_required' => false
        ]);

        $tujuanItems = [
            ['no' => '1', 'uraian' => 'Melakukan pengelolaan/manajemen pelaksanaan konstruksi'],
            ['no' => '2', 'uraian' => 'Melakukan pengendalian'],
            ['no' => '3', 'uraian' => 'Monitoring'],
            ['no' => '4', 'uraian' => 'Evaluasi terhadap pelaksanaan konstruksi'],
            ['no' => '5', 'uraian' => 'Melakukan pengawasan']
        ];

        foreach ($tujuanItems as $item) {
            DocumentType::create([
                'code' => 'PELAKSANAAN_KAK_MK_TUJUAN_' . $item['no'],
                'parent_code' => 'PELAKSANAAN_KAK_MK_TUJUAN',
                'no' => '4.a.iv.' . $item['no'],
                'tahapan' => 'Pelaksanaan',
                'uraian' => $item['uraian']
            ]);
        }


        
    }
}