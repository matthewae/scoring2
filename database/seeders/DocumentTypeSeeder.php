<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DocumentType;
use PhpParser\Comment\Doc;

class DocumentTypeSeeder extends Seeder
{
    public function run()
    {
        // 1. Pra-Tender
        // a. Dokumen DED perencana
        $dedPerencana = DocumentType::firstOrCreate(['code' => 'PT-A'], [
            'code' => 'PT-A',
            'no' => '1.a',
            'tahapan' => 'Pra-Tender',
            'uraian' => 'Dokumen DED perencana',
            'is_file_required' => false,
            'parent_code' => null
        ]);

        // Sub-dokumen DED perencana
        DocumentType::firstOrCreate(['code' => 'PT-A-1'], [
            'code' => 'PT-A-1',
            'no' => '1.a.i',
            'tahapan' => 'Pra-Tender',
            'uraian' => 'Laporan Pendahuluan Penyusunan Masterplan dan DED',
            'is_file_required' => true,
            'parent_code' => 'PT-A'
        ]);

        DocumentType::firstOrCreate(['code' => 'PT-A-2'], [
            'code' => 'PT-A-2',
            'no' => '1.a.ii',
            'tahapan' => 'Pra-Tender',
            'uraian' => 'Laporan Antara Pengembangan Rancangan Penyusunan Masterplan dan DED',
            'is_file_required' => true,
            'parent_code' => 'PT-A'
        ]);

        DocumentType::firstOrCreate(['code' => 'PT-A-3'], [
            'code' => 'PT-A-3',
            'no' => '1.a.iii',
            'tahapan' => 'Pra-Tender',
            'uraian' => 'Laporan Akhir Master Plan',
            'is_file_required' => true,
            'parent_code' => 'PT-A'
        ]);

        DocumentType::firstOrCreate(['code' => 'PT-A-4'], [
            'code' => 'PT-A-4',
            'no' => '1.a.iv',
            'tahapan' => 'Pra-Tender',
            'uraian' => 'Laporan Akhir Master Plan dan Detail Engineering Design',
            'is_file_required' => true,
            'parent_code' => 'PT-A'
        ]);

        DocumentType::firstOrCreate(['code' => 'PT-A-5'], [
            'code' => 'PT-A-5',
            'no' => '1.a.v',
            'tahapan' => 'Pra-Tender',
            'uraian' => 'Rencana Kerja dan Syarat-Syarat (RKS)',
            'is_file_required' => true,
            'parent_code' => 'PT-A'
        ]);

        DocumentType::firstOrCreate(['code' => 'PT-A-6'], [
            'code' => 'PT-A-6',
            'no' => '1.a.vi',
            'tahapan' => 'Pra-Tender',
            'uraian' => 'Gambar Perencanaan',
            'is_file_required' => true,
            'parent_code' => 'PT-A'
        ]);

        // b. Notulensi hasil rapat koordinasi
        DocumentType::firstOrCreate(['code' => 'PT-B'], [
            'code' => 'PT-B',
            'no' => '1.b',
            'tahapan' => 'Pra-Tender',
            'uraian' => 'Notulensi hasil rapat koordinasi proses review penyusunan DED',
            'is_file_required' => true,
            'parent_code' => null
        ]);

        // c. Laporan review penyusunan DED
        $reviewDed = DocumentType::firstOrCreate(['code' => 'PT-C'], [
            'code' => 'PT-C',
            'no' => '1.c',
            'tahapan' => 'Pra-Tender',
            'uraian' => 'Laporan review penyusunan DED',
            'is_file_required' => false,
            'parent_code' => null
        ]);

        // Sub-dokumen Laporan review
        DocumentType::firstOrCreate(['code' => 'PT-C-1'], [
            'code' => 'PT-C-1',
            'no' => '1.c.i',
            'tahapan' => 'Pra-Tender',
            'uraian' => 'Kesesuaian Desain (DED) dengan standar teknis dan kondisi lapangan',
            'is_file_required' => true,
            'parent_code' => 'PT-C'
        ]);

        DocumentType::firstOrCreate(['code' => 'PT-C-2'], [
            'code' => 'PT-C-2',
            'no' => '1.c.ii',
            'tahapan' => 'Pra-Tender',
            'uraian' => 'Kesesuaian Gambar Desain dengan RKS dan RAB',
            'is_file_required' => true,
            'parent_code' => 'PT-C'
        ]);

        DocumentType::firstOrCreate(['code' => 'PT-C-3'], [
            'code' => 'PT-C-3',
            'no' => '1.c.iii',
            'tahapan' => 'Pra-Tender',
            'uraian' => 'Review kewajaran harga pada RAB',
            'is_file_required' => true,
            'parent_code' => 'PT-C'
        ]);

        DocumentType::firstOrCreate(['code' => 'PT-C-4'], [
            'code' => 'PT-C-4',
            'no' => '1.c.iv',
            'tahapan' => 'Pra-Tender',
            'uraian' => 'Kesesuaian rencana waktu pelaksanaan',
            'is_file_required' => true,
            'parent_code' => 'PT-C'
        ]);

        DocumentType::firstOrCreate(['code' => 'PT-C-5'], [
            'code' => 'PT-C-5',
            'no' => '1.c.v',
            'tahapan' => 'Pra-Tender',
            'uraian' => 'Hasil evaluasi yang telah diperbaiki atau dilengkapi oleh konsultan perencana',
            'is_file_required' => true,
            'parent_code' => 'PT-C'
        ]);

        DocumentType::firstOrCreate(['code' => 'PT-C-6'], [
            'code' => 'PT-C-6',
            'no' => '1.c.vi',
            'tahapan' => 'Pra-Tender',
            'uraian' => 'Hasil review dokumen KAK terhadap SMKK',
            'is_file_required' => true,
            'parent_code' => 'PT-C'
        ]);

        DocumentType::firstOrCreate(['code' => 'PT-C-7'], [
            'code' => 'PT-C-7',
            'no' => '1.c.vii',
            'tahapan' => 'Pra-Tender',
            'uraian' => 'Program mutu pengawasan',
            'is_file_required' => true,
            'parent_code' => 'PT-C'
        ]);

        DocumentType::firstOrCreate(['code' => 'PT-C-8'], [
            'code' => 'PT-C-8',
            'no' => '1.c.viii',
            'tahapan' => 'Pra-Tender',
            'uraian' => 'Dokumen Notulensi terkait kegiatan aanwijzing',
            'is_file_required' => true,
            'parent_code' => 'PT-C'
        ]);
        // 2. Tender
        // a. Tender Konsultan MK
        $tenderKonsultanMK = DocumentType::firstOrCreate(['code' => 'T-A'], [
            'code' => 'T-A',
            'no' => '2.a',
            'tahapan' => 'Tender',
            'uraian' => 'Tender Konsultan MK',
            'is_file_required' => false,
            'parent_code' => null
        ]);

        // i. Dokumen KAK Konsultan MK
        DocumentType::firstOrCreate(['code' => 'T-A-1'], [
            'code' => 'T-A-1',
            'no' => '2.a.i',
            'tahapan' => 'Tender',
            'uraian' => 'Dokumen KAK Konsultan MK',
            'is_file_required' => true,
            'parent_code' => 'T-A'
        ]);

        // ii. Dokumen Penawaran Konsultan MK
        DocumentType::firstOrCreate(['code' => 'T-A-2'], [
            'code' => 'T-A-2',
            'no' => '2.a.ii',
            'tahapan' => 'Tender',
            'uraian' => 'Dokumen Penawaran Konsultan MK',
            'is_file_required' => true,
            'parent_code' => 'T-A'
        ]);

        // iii. Cek Personil Konsultan MK
        $cekPersonil = DocumentType::firstOrCreate(['code' => 'T-A-3'], [
            'code' => 'T-A-3',
            'no' => '2.a.iii',
            'tahapan' => 'Tender',
            'uraian' => 'Cek Personil Konsultan MK',
            'is_file_required' => false,
            'parent_code' => 'T-A'
        ]);

        // Tenaga Ahli
        $tenagaAhli = DocumentType::firstOrCreate(['code' => 'T-A-3-1'], [
            'code' => 'T-A-3-1',
            'no' => '2.a.iii.1',
            'tahapan' => 'Tender',
            'uraian' => 'Tenaga Ahli',
            'is_file_required' => false,
            'parent_code' => 'T-A-3'
        ]);

        // Sub-dokumen Tenaga Ahli
        DocumentType::firstOrCreate(['code' => 'T-A-3-1-1'], [
            'code' => 'T-A-3-1-1',
            'no' => '2.a.iii.1.1',
            'tahapan' => 'Tender',
            'uraian' => 'Team Leader',
            'is_file_required' => true,
            'parent_code' => 'T-A-3-1'
        ]);

        DocumentType::firstOrCreate(['code' => 'T-A-3-1-2'], [
            'code' => 'T-A-3-1-2',
            'no' => '2.a.iii.1.2',
            'tahapan' => 'Tender',
            'uraian' => 'Tenaga Ahli Teknik Arsitektur',
            'is_file_required' => true,
            'parent_code' => 'T-A-3-1'
        ]);

        DocumentType::firstOrCreate(['code' => 'T-A-3-1-3'], [
            'code' => 'T-A-3-1-3',
            'no' => '2.a.iii.1.3',
            'tahapan' => 'Tender',
            'uraian' => 'Tenaga Ahli Struktur/Sipil',
            'is_file_required' => true,
            'parent_code' => 'T-A-3-1'
        ]);

        DocumentType::firstOrCreate(['code' => 'T-A-3-1-4'], [
            'code' => 'T-A-3-1-4',
            'no' => '2.a.iii.1.4',
            'tahapan' => 'Tender',
            'uraian' => 'Tenaga Ahli Mekanikal/Elektrikal',
            'is_file_required' => true,
            'parent_code' => 'T-A-3-1'
        ]);

        DocumentType::firstOrCreate(['code' => 'T-A-3-1-5'], [
            'code' => 'T-A-3-1-5',
            'no' => '2.a.iii.1.5',
            'tahapan' => 'Tender',
            'uraian' => 'Tenaga Ahli K3 Konstruksi',
            'is_file_required' => true,
            'parent_code' => 'T-A-3-1'
        ]);

        // Tenaga Pengawas
        $tenagaPengawas = DocumentType::firstOrCreate(['code' => 'T-A-3-2'], [
            'code' => 'T-A-3-2',
            'no' => '2.a.iii.2',
            'tahapan' => 'Tender',
            'uraian' => 'Tenaga Pengawas',
            'is_file_required' => false,
            'parent_code' => 'T-A-3'
        ]);

        // Sub-dokumen Tenaga Pengawas
        DocumentType::firstOrCreate(['code' => 'T-A-3-2-1'], [
            'code' => 'T-A-3-2-1',
            'no' => '2.a.iii.2.1',
            'tahapan' => 'Tender',
            'uraian' => 'Site Engineer',
            'is_file_required' => true,
            'parent_code' => 'T-A-3-2'
        ]);

        DocumentType::firstOrCreate(['code' => 'T-A-3-2-2'], [
            'code' => 'T-A-3-2-2',
            'no' => '2.a.iii.2.2',
            'tahapan' => 'Tender',
            'uraian' => 'Pengawas Arsitektur',
            'is_file_required' => true,
            'parent_code' => 'T-A-3-2'
        ]);

        DocumentType::firstOrCreate(['code' => 'T-A-3-2-3'], [
            'code' => 'T-A-3-2-3',
            'no' => '2.a.iii.2.3',
            'tahapan' => 'Tender',
            'uraian' => 'Pengawas Struktur',
            'is_file_required' => true,
            'parent_code' => 'T-A-3-2'
        ]);

        DocumentType::firstOrCreate(['code' => 'T-A-3-2-4'], [
            'code' => 'T-A-3-2-4',
            'no' => '2.a.iii.2.4',
            'tahapan' => 'Tender',
            'uraian' => 'Pengawas MEP',
            'is_file_required' => true,
            'parent_code' => 'T-A-3-2'
        ]);

        // Tenaga Pendukung
        $tenagaPendukung = DocumentType::firstOrCreate(['code' => 'T-A-3-3'], [
            'code' => 'T-A-3-3',
            'no' => '2.a.iii.3',
            'tahapan' => 'Tender',
            'uraian' => 'Tenaga Pendukung',
            'is_file_required' => false,
            'parent_code' => 'T-A-3'
        ]);

        // Sub-dokumen Tenaga Pendukung
        DocumentType::firstOrCreate(['code' => 'T-A-3-3-1'], [
            'code' => 'T-A-3-3-1',
            'no' => '2.a.iii.3.1',
            'tahapan' => 'Tender',
            'uraian' => 'Juru Gambar/Drafter BIM',
            'is_file_required' => true,
            'parent_code' => 'T-A-3-3'
        ]);

        DocumentType::firstOrCreate(['code' => 'T-A-3-3-2'], [
            'code' => 'T-A-3-3-2',
            'no' => '2.a.iii.3.2',
            'tahapan' => 'Tender',
            'uraian' => 'Administrasi + Surveyor',
            'is_file_required' => true,
            'parent_code' => 'T-A-3-3'
        ]);

        // iv. Tujuan adanya Konsultan MK
        $tujuanKonsultanMK = DocumentType::firstOrCreate(['code' => 'T-A-4'], [
            'code' => 'T-A-4',
            'no' => '2.a.iv',
            'tahapan' => 'Tender',
            'uraian' => 'Tujuan adanya Konsultan MK',
            'is_file_required' => false,
            'parent_code' => 'T-A'
        ]);

        // Sub-dokumen Tujuan Konsultan MK
        DocumentType::firstOrCreate(['code' => 'T-A-4-1'], [
            'code' => 'T-A-4-1',
            'no' => '2.a.iv.1',
            'tahapan' => 'Tender',
            'uraian' => 'BA Aanwjzing',
            'is_file_required' => true,
            'parent_code' => 'T-A-4'
        ]);

        DocumentType::firstOrCreate(['code' => 'T-A-4-2'], [
            'code' => 'T-A-4-2',
            'no' => '2.a.iv.2',
            'tahapan' => 'Tender',
            'uraian' => 'Notulen Rapat Persiapan Pelaksanaan Kontrak',
            'is_file_required' => true,
            'parent_code' => 'T-A-4'
        ]);

        DocumentType::firstOrCreate(['code' => 'T-A-4-3'], [
            'code' => 'T-A-4-3',
            'no' => '2.a.iv.3',
            'tahapan' => 'Tender',
            'uraian' => 'Kontrak Pelaksanaan Pekerjaan',
            'is_file_required' => true,
            'parent_code' => 'T-A-4'
        ]);

        DocumentType::firstOrCreate(['code' => 'T-A-4-4'], [
            'code' => 'T-A-4-4',
            'no' => '2.a.iv.4',
            'tahapan' => 'Tender',
            'uraian' => 'Rencana Pre Construction Meeting',
            'is_file_required' => true,
            'parent_code' => 'T-A-4'
        ]);

        DocumentType::firstOrCreate(['code' => 'T-A-4-5'], [
            'code' => 'T-A-4-5',
            'no' => '2.a.iv.5',
            'tahapan' => 'Tender',
            'uraian' => 'Rencana Pekerjaan Persiapan Konstruksi',
            'is_file_required' => true,
            'parent_code' => 'T-A-4'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'T-A-4-6',
            'no' => '2.a.iv.6',
            'tahapan' => 'Tender',
            'uraian' => 'Berita Acara Serah Terima Lahan',
            'is_file_required' => true,
            'parent_code' => 'T-A-4'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'T-A-4-7',
            'no' => '2.a.iv.7',
            'tahapan' => 'Tender',
            'uraian' => 'Berita Acara Pengukuran Kembali Lokasi Pekerjaan (Uitzet) dan Mutual Check',
            'is_file_required' => true,
            'parent_code' => 'T-A-4'
        ]);

        // b. Hasil Review Pagu Anggaran Konstruksi
        DocumentType::firstOrCreate(['code' => 'T-B'], [
            'code' => 'T-B',
            'no' => '2.b',
            'tahapan' => 'Tender',
            'uraian' => 'Hasil Review Pagu Anggaran Konstruksi',
            'is_file_required' => true,
            'parent_code' => null
        ]);

        // c. Dokumen DED for Tender
        DocumentType::firstOrCreate(['code' => 'T-C'], [
            'code' => 'T-C',
            'no' => '2.c',
            'tahapan' => 'Tender',
            'uraian' => 'Dokumen DED for Tender',
            'is_file_required' => true,
            'parent_code' => null
        ]);

        // d. Hasil Penilaian Calon Penyedia Jasa
        DocumentType::firstOrCreate(['code' => 'T-D'], [
            'code' => 'T-D',
            'no' => '2.d',
            'tahapan' => 'Tender',
            'uraian' => 'Hasil Penilaian Calon Penyedia Jasa sebagai Rekomendasi kepada Pemberi Tugas',
            'is_file_required' => true,
            'parent_code' => null
        ]);

        // e. Pengecekan kesanggupan supplier material
        DocumentType::firstOrCreate(['code' => 'T-E'], [
            'code' => 'T-E',
            'no' => '2.e',
            'tahapan' => 'Tender',
            'uraian' => 'Pengecekan kesanggupan supplier material',
            'is_file_required' => true,
            'parent_code' => null
        ]);

        // f. Reviu spesifikasi material
        DocumentType::firstOrCreate(['code' => 'T-F'], [
            'code' => 'T-F',
            'no' => '2.f',
            'tahapan' => 'Tender',
            'uraian' => 'Reviu spesifikasi material',
            'is_file_required' => true,
            'parent_code' => null
        ]);

        // 3. Persiapan Pelaksanaan Pekerjaan Konstruksi
        // a. Jaminan Pelaksanaan
        DocumentType::firstOrCreate(['code' => 'PPK-A'], [
            'code' => 'PPK-A',
            'no' => '3.a',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Jaminan Pelaksanaan (jika ada)',
            'is_file_required' => true,
            'parent_code' => null
        ]);

        // b. Pengelolaan Kesehatan Kerja
        DocumentType::firstOrCreate(['code' => 'PPK-B'], [
            'code' => 'PPK-B',
            'no' => '3.b',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Pengelolaan Kesehatan Kerja - Perlindungan Sosial Tenaga Kerja',
            'is_file_required' => true,
            'parent_code' => null
        ]);

        // c. Dokumen Kontrak Pelaksana Konstruksi
        DocumentType::firstOrCreate(['code' => 'PPK-C'], [
            'code' => 'PPK-C',
            'no' => '3.c',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Dokumen Kontrak Pelaksana Konstruksi',
            'is_file_required' => true,
            'parent_code' => null
        ]);

        // d. Berita Acara Penyerahan Lokasi
        DocumentType::firstOrCreate(['code' => 'PPK-D'], [
            'code' => 'PPK-D',
            'no' => '3.d',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Surat / Berita Acara Penyerahan Lokasi Pekerjaan dari PPK kepada Kontraktor Pelaksana beserta dokumentasi',
            'is_file_required' => true,
            'parent_code' => null
        ]);

        // e. SPMK
        DocumentType::firstOrCreate(['code' => 'PPK-E'], [
            'code' => 'PPK-E',
            'no' => '3.e',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Surat Perintah Mulai Kerja (SPMK) Kontraktor Pelaksana',
            'is_file_required' => true,
            'parent_code' => null
        ]);

        // f. PCM
        $pcm = DocumentType::firstOrCreate(['code' => 'PPK-F'], [
            'code' => 'PPK-F',
            'no' => '3.f',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Kegiatan Rapat Persiapan Pelaksanaan Kontrak (Pre Construction Meeting (PCM))',
            'is_file_required' => false,
            'parent_code' => null
        ]);

        // i. Berita Acara PCM
        DocumentType::firstOrCreate(['code' => 'PPK-F-1'], [
            'code' => 'PPK-F-1',
            'no' => '3.f.i',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Berita Acara PCM',
            'is_file_required' => true,
            'parent_code' => 'PPK-F'
        ]);

        // ii. Struktur Organisasi Proyek
        $strukturOrganisasi = DocumentType::firstOrCreate(['code' => 'PPK-F-2'], [
            'code' => 'PPK-F-2',
            'no' => '3.f.ii',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Struktur Organisasi Proyek',
            'is_file_required' => false,
            'parent_code' => 'PPK-F'
        ]);

        // Sub-dokumen Struktur Organisasi
        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PPK-F-2-1',
            'no' => '3.f.ii.1',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Penanggung Jawab Kegiatan',
            'is_file_required' => true,
            'parent_code' => 'PPK-F-2'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-2'], [
            'code' => 'PPK-F-2-2',
            'no' => '3.f.ii.2',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Pengawas Pekerjaan',
            'is_file_required' => true,
            'parent_code' => 'PPK-F-2'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-3'], [
            'code' => 'PPK-F-2-3',
            'no' => '3.f.ii.3',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Penyedia Jasa Pekerjaan Konstruksi',
            'is_file_required' => true,
            'parent_code' => 'PPK-F-2'
        ]);

        // iii. Pendelegasian Kewenangan
        DocumentType::firstOrCreate(['code' => 'PPK-F-3'], [
            'code' => 'PPK-F-3',
            'no' => '3.f.iii',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Pendelegasian Kewenangan',
            'is_file_required' => true,
            'parent_code' => 'PPK-F'
        ]);

        // iv. Alur Komunikasi
        DocumentType::firstOrCreate(['code' => 'PPK-F-4'], [
            'code' => 'PPK-F-4',
            'no' => '3.f.iv',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Alur Komunikasi dan Persetujuan',
            'is_file_required' => true,
            'parent_code' => 'PPK-F'
        ]);

        // v. Mekanisme Pengawasan
        DocumentType::firstOrCreate(['code' => 'PPK-F-5'], [
            'code' => 'PPK-F-5',
            'no' => '3.f.v',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Mekanisme Pengawasan',
            'is_file_required' => true,
            'parent_code' => 'PPK-F'
        ]);

        // vi. Jadwal Pelaksanaan
        DocumentType::firstOrCreate(['code' => 'PPK-F-6'], [
            'code' => 'PPK-F-6',
            'no' => '3.f.vi',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Jadwal Pelaksanaan',
            'is_file_required' => true,
            'parent_code' => 'PPK-F'
        ]);

        // vii. Mobilisasi
        DocumentType::firstOrCreate(['code' => 'PPK-F-7'], [
            'code' => 'PPK-F-7',
            'no' => '3.f.vii',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Mobilisasi personil inti, peralatan, dan material',
            'is_file_required' => true,
            'parent_code' => 'PPK-F'
        ]);

        // viii. Metode Pelaksanaan
        $metodePelaksanaan = DocumentType::firstOrCreate(['code' => 'PPK-F-8'], [
            'code' => 'PPK-F-8',
            'no' => '3.f.viii',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Metode Pelaksanaan',
            'is_file_required' => false,
            'parent_code' => 'PPK-F'
        ]);

        // Sub-dokumen Metode Pelaksanaan
        DocumentType::firstOrCreate(['code' => 'PPK-F-8-1'], [
            'code' => 'PPK-F-8-1',
            'no' => '3.f.viii.1',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Gambaran umum tiap tahapan pelaksaan pekerjaan',
            'is_file_required' => true,
            'parent_code' => 'PPK-F-8'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-8-2'], [
            'code' => 'PPK-F-8-2',
            'no' => '3.f.viii.2',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Metode pelaksanaan pekerjaan tertentu yang beresiko besar',
            'is_file_required' => true,
            'parent_code' => 'PPK-F-8'
        ]);

        // ix. Pembahasan Dokumen SMKK
        $smkk = DocumentType::firstOrCreate(['code' => 'PPK-F-9'], [
            'code' => 'PPK-F-9',
            'no' => '3.f.ix',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Pembahasan Dokumen SMKK',
            'is_file_required' => false,
            'parent_code' => 'PPK-F'
        ]);

        // Sub-dokumen SMKK
        DocumentType::firstOrCreate(['code' => 'PPK-F-9-1'], [
            'code' => 'PPK-F-9-1',
            'no' => '3.f.ix.1',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Dokumen RKK',
            'is_file_required' => true,
            'parent_code' => 'PPK-F-9'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-9-2'], [
            'code' => 'PPK-F-9-2',
            'no' => '3.f.ix.2',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Dokumen RMPK',
            'is_file_required' => true,
            'parent_code' => 'PPK-F-9'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-9-3'], [
            'code' => 'PPK-F-9-3',
            'no' => '3.f.ix.3',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Dokumen RKPPL (Jika Ada)',
            'is_file_required' => true,
            'parent_code' => 'PPK-F-9'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-9-4'], [
            'code' => 'PPK-F-9-4',
            'no' => '3.f.ix.4',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Dokumen RMLLP (Jika Ada)',
            'is_file_required' => true,
            'parent_code' => 'PPK-F-9'
        ]);

        // x. Rencana Pemeriksaan
        DocumentType::firstOrCreate(['code' => 'PPK-F-10'], [
            'code' => 'PPK-F-10',
            'no' => '3.f.x',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Rencana Pemeriksaan Lapangan Bersama',
            'is_file_required' => true,
            'parent_code' => 'PPK-F'
        ]);

        // xi. Tugas Konsultan MK
        $tugasMK = DocumentType::create([
            'code' => 'PPK-F-11',
            'no' => '3.f.xi',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Tugas Konsultan MK',
            'is_file_required' => false,
            'parent_code' => 'PPK-F'
        ]);

        // Sub-dokumen Tugas MK
        DocumentType::firstOrCreate(['code' => 'PPK-F-11-1'], [
            'code' => 'PPK-F-11-1',
            'no' => '3.f.xi.1',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Mengecek kesanggupan suplier dan reviu spesifikasi material dengan konsultan perencana',
            'is_file_required' => true,
            'parent_code' => 'PPK-F-11'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-11-2'], [
            'code' => 'PPK-F-11-2',
            'no' => '3.f.xi.2',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Mengarahkan mutu pekerjaan dan spesifikasi material',
            'is_file_required' => true,
            'parent_code' => 'PPK-F-11'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-11-3'], [
            'code' => 'PPK-F-11-3',
            'no' => '3.f.xi.3',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Mengawasi terhadap aspek K3',
            'is_file_required' => true,
            'parent_code' => 'PPK-F-11'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-11-4'], [
            'code' => 'PPK-F-11-4',
            'no' => '3.f.xi.4',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Membantu proses koordinasi dan sosialisasi dengan aparat kewilayahan dan warga setempat',
            'is_file_required' => true,
            'parent_code' => 'PPK-F-11'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-11-5'], [
            'code' => 'PPK-F-11-5',
            'no' => '3.f.xi.5',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Menganalisa master schedule dan daftar tenaga kerja kontraktor pelaksana',
            'is_file_required' => true,
            'parent_code' => 'PPK-F-11'
        ]);

        // g. Kelengkapan Dokumen Perizinan
        $perizinan = DocumentType::create([
            'code' => 'PPK-G',
            'no' => '3.g',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Kelengkapan Dokumen Perizinan',
            'is_file_required' => false,
            'parent_code' => null
        ]);

        // Sub-dokumen Perizinan
        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PPK-G-1',
            'no' => '3.g.i',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Surat Keterangan Rencana Kota/Kab',
            'is_file_required' => true,
            'parent_code' => 'PPK-G'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PPK-G-2',
            'no' => '3.g.ii',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Persetujuan Bangunan Gedung (PBG) (khususnya bangunan baru/perluasan)',
            'is_file_required' => true,
            'parent_code' => 'PPK-G'
        ]);

        // i. Pembayaran Uang Muka
        $uangMuka = DocumentType::create([
            'code' => 'PPK-H',
            'no' => '3.i',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Pembayaran Uang Muka Berdasarkan SSKK',
            'is_file_required' => false,
            'parent_code' => null
        ]);

        // Sub-dokumen Uang Muka
        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PPK-H-1',
            'no' => '3.i.i',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Jaminan Uang Muka (Jika Ada)',
            'is_file_required' => true,
            'parent_code' => 'PPK-H'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PPK-H-2',
            'no' => '3.i.ii',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Berita Acara Pembayaran Uang Muka',
            'is_file_required' => true,
            'parent_code' => 'PPK-H'
        ]);

        // j. Schedule
        $schedule = DocumentType::create([
            'code' => 'PPK-I',
            'no' => '3.j',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Schedule',
            'is_file_required' => false,
            'parent_code' => null
        ]);

        // Sub-dokumen Schedule
        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PPK-I-1',
            'no' => '3.j.i',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Peralatan',
            'is_file_required' => true,
            'parent_code' => 'PPK-I'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PPK-I-2',
            'no' => '3.j.ii',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Personil Inti dan Pendukung',
            'is_file_required' => true,
            'parent_code' => 'PPK-I'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PPK-I-3',
            'no' => '3.j.iii',
            'tahapan' => 'Persiapan Pelaksanaan Konstruksi',
            'uraian' => 'Material',
            'is_file_required' => true,
            'parent_code' => 'PPK-I'
        ]);
        // 4. Pelaksanaan Pekerjaan Konstruksi
        // a. Kerangka Acuan Kerja Konsultan MK
        $kak = DocumentType::create([
            'code' => 'PK-A',
            'no' => '4.a',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Kerangka Acuan Kerja Konsultan MK',
            'is_file_required' => false,
            'parent_code' => null
        ]);

        // i. Masukan teknis kepada pengelola proyek
        $masukanTeknis = DocumentType::create([
            'code' => 'PK-A-1',
            'no' => '4.a.i',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Masukan teknis kepada pengelola proyek',
            'is_file_required' => false,
            'parent_code' => 'PK-A'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-A-1-1',
            'no' => '4.a.i.1',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Pengelola Administrasi dan Keuangan',
            'is_file_required' => true,
            'parent_code' => 'PK-A-1'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-A-1-2',
            'no' => '4.a.i.2',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Pengelola Teknis',
            'is_file_required' => true,
            'parent_code' => 'PK-A-1'
        ]);

        // ii. Sasaran Kegiatan Konsultan MK
        $sasaranKegiatan = DocumentType::create([
            'code' => 'PK-A-2',
            'no' => '4.a.ii',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Sasaran Kegiatan Konsultan MK',
            'is_file_required' => false,
            'parent_code' => 'PK-A'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-A-2-1',
            'no' => '4.a.ii.1',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Reviu perencanaan',
            'is_file_required' => true,
            'parent_code' => 'PK-A-2'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-A-2-2',
            'no' => '4.a.ii.2',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Manajemen kontrak penyedia jasa konstruksi',
            'is_file_required' => true,
            'parent_code' => 'PK-A-2'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-A-2-3',
            'no' => '4.a.ii.3',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Pelaksanaan pekerjaan',
            'is_file_required' => true,
            'parent_code' => 'PK-A-2'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-A-2-4',
            'no' => '4.a.ii.4',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Pengawasan',
            'is_file_required' => true,
            'parent_code' => 'PK-A-2'
        ]);

        // iii. Waktu Pelaksanaan Konstruksi
        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-A-3',
            'no' => '4.a.iii',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Waktu Pelaksanaan Konstruksi',
            'is_file_required' => true,
            'parent_code' => 'PK-A'
        ]);

        // iv. Tujuan adanya Konsultan MK
        $tujuanKonsultanMK = DocumentType::create([
            'code' => 'PK-A-4',
            'no' => '4.a.iv',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Tujuan adanya Konsultan MK',
            'is_file_required' => false,
            'parent_code' => 'PK-A'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-A-4-1',
            'no' => '4.a.iv.1',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Melakukan pengelolaan/manajemen pelaksanaan konstruksi',
            'is_file_required' => true,
            'parent_code' => 'PK-A-4'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-A-4-2',
            'no' => '4.a.iv.2',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Melakukan pengendalian',
            'is_file_required' => true,
            'parent_code' => 'PK-A-4'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-A-4-3',
            'no' => '4.a.iv.3',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Monitoring',
            'is_file_required' => true,
            'parent_code' => 'PK-A-4'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-A-4-4',
            'no' => '4.a.iv.4',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Evaluasi terhadap pelaksanaan konstruksi',
            'is_file_required' => true,
            'parent_code' => 'PK-A-4'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-A-4-5',
            'no' => '4.a.iv.5',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Melakukan pengawasan',
            'is_file_required' => true,
            'parent_code' => 'PK-A-4'
        ]);

        // Keluaran Konsultan MK
        $keluaranKonsultanMK = DocumentType::create([
            'code' => 'PK-A-5',
            'no' => '4.a.v',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Keluaran Konsultan MK',
            'is_file_required' => false,
            'parent_code' => 'PK-A'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-A-5-1',
            'no' => '4.a.v.1',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Laporan dan Berita Acara Persiapan Pelaksanaan',
            'is_file_required' => true,
            'parent_code' => 'PK-A-5'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-A-5-2',
            'no' => '4.a.v.2',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Buku harian, yang memuat semua kejadian, perintah/petunjuk yang penting dari Pemimpin Pelaksana Kegiatan, Kontraktor Pelaksana dan Konsultan MK',
            'is_file_required' => true,
            'parent_code' => 'PK-A-5'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-A-5-3',
            'no' => '4.a.v.3',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Laporan Harian',
            'is_file_required' => true,
            'parent_code' => 'PK-A-5'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-A-5-4',
            'no' => '4.a.v.4',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Laporan Mingguan dan bulanan sesuai resume laporan harian',
            'is_file_required' => true,
            'parent_code' => 'PK-A-5'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-A-5-5',
            'no' => '4.a.v.5',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Berita Acara Kemajuan Pekerjaan untuk pembayaran angsuran',
            'is_file_required' => true,
            'parent_code' => 'PK-A-5'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-A-5-6',
            'no' => '4.a.v.6',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Surat Perintah Perubahan Pekerjaan untuk pembayaran angsuran',
            'is_file_required' => true,
            'parent_code' => 'PK-A-5'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-A-5-7',
            'no' => '4.a.v.7',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Gambar-gambar sesuai dengan pelaksanaan (as-built drawing) dan manual peralatan-peralatan yang dibuat oleh kontraktor pelaksana',
            'is_file_required' => true,
            'parent_code' => 'PK-A-5'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-A-5-8',
            'no' => '4.a.v.8',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Laporan rapat di lapangan (site meeting)',
            'is_file_required' => true,
            'parent_code' => 'PK-A-5'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-A-5-9',
            'no' => '4.a.v.9',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Gambar rincian pelaksanaan (shop drawing) dan time schedule yang dibuat oleh kontraktor pelaksana',
            'is_file_required' => true,
            'parent_code' => 'PK-A-5'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-A-5-10',
            'no' => '4.a.v.10',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Foto dokumentasi (0%, 30%, 50%, 75%, 100%)',
            'is_file_required' => true,
            'parent_code' => 'PK-A-5'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-A-5-11',
            'no' => '4.a.v.11',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Laporan akhir pekerjaan manajemen',
            'is_file_required' => true,
            'parent_code' => 'PK-A-5'
        ]);

        // b. Pemeriksaan Dokumen
        $pemeriksaanDokumen = DocumentType::create([
            'code' => 'PK-B',
            'no' => '4.b',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Pemeriksaan Dokumen',
            'is_file_required' => false,
            'parent_code' => null
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-B-1',
            'no' => '4.b.i',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Gambar kerja',
            'is_file_required' => true,
            'parent_code' => 'PK-B'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-B-2',
            'no' => '4.b.ii',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Metode kerja konstruksi',
            'is_file_required' => true,
            'parent_code' => 'PK-B'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-B-3',
            'no' => '4.b.iii',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Rencana Pemeriksaan dan Pengujian',
            'is_file_required' => true,
            'parent_code' => 'PK-B'
        ]);

        // c. Pemeriksaan Bersama (Mutual Check/MC-0)
        $pemeriksaanBersama = DocumentType::create([
            'code' => 'PK-C',
            'no' => '4.c',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Pemeriksaan Bersama (Mutual Check/MC-0)',
            'is_file_required' => false,
            'parent_code' => null
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-C-1',
            'no' => '4.c.i',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Pemeriksaan terhadap desain awal',
            'is_file_required' => true,
            'parent_code' => 'PK-C'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-C-2',
            'no' => '4.c.ii',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Penyesuaian desain/review desain (Jika Diperlukan)',
            'is_file_required' => true,
            'parent_code' => 'PK-C'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-C-3',
            'no' => '4.c.iii',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Penyesuaian kuantitas (volume) berdasarkan review desain (Jika Diperlukan)',
            'is_file_required' => true,
            'parent_code' => 'PK-C'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-C-4',
            'no' => '4.c.iv',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Berita Acara Hasil Pemeriksaan Bersama (Mutual Check/MC-0) beserta dokumentasi',
            'is_file_required' => true,
            'parent_code' => 'PK-C'
        ]);

        // v. Perubahan/Addendum Kontrak (jika ada)
        $perubahanKontrak = DocumentType::create([
            'code' => 'PK-C-5',
            'no' => '4.c.v',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Perubahan/Addendum Kontrak (jika ada)',
            'is_file_required' => false,
            'parent_code' => 'PK-C'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-C-5-1',
            'no' => '4.c.v.1',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Site Instruction',
            'is_file_required' => true,
            'parent_code' => 'PK-C-5'
        ]);

        // d. Kaji ulang dan persetujuan pertama jadwal dan metodologi pelaksanaan pekerjaan
        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-D',
            'no' => '4.d',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Kaji ulang dan persetujuan pertama jadwal dan metodologi pelaksanaan pekerjaan',
            'is_file_required' => false,
            'parent_code' => null
        ]);

        // e. Pengajuan Izin Mulai Kerja
        $pengajuanIzin = DocumentType::create([
            'code' => 'PK-E',
            'no' => '4.e',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Pengajuan Izin Mulai Kerja',
            'is_file_required' => false,
            'parent_code' => null
        ]);

        // i. Permohonan Izin Memulai Pekerjaan (Request of Work)
        $permohonanIzin = DocumentType::create([
            'code' => 'PK-E-1',
            'no' => '4.e.i',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Permohonan Izin Memulai Pekerjaan (Request of Work)',
            'is_file_required' => true,
            'parent_code' => 'PK-E'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-E-1-1',
            'no' => '4.e.i.1',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Gambar Kerja (Shop Drawing) mengacu pada Prosedur (P-03)',
            'is_file_required' => true,
            'parent_code' => 'PK-E-1'
        ]);

        // Rencana Pelaksanaan Pekerjaan (Work Method Statement)
        $rencanaPelaksanaan = DocumentType::create([
            'code' => 'PK-E-1-2',
            'no' => '4.e.i.2',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Rencana Pelaksanaan Pekerjaan (Work Method Statement)',
            'is_file_required' => false,
            'parent_code' => 'PK-E-1'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-E-1-2-1',
            'no' => '4.e.i.2.1',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Metode Kerja',
            'is_file_required' => true,
            'parent_code' => 'PK-E-1-2'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-E-1-2-2',
            'no' => '4.e.i.2.2',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Tenaga Kerja yang Dibutuhkan',
            'is_file_required' => true,
            'parent_code' => 'PK-E-1-2'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-E-1-2-3',
            'no' => '4.e.i.2.3',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Peralatan yang Dibutuhkan',
            'is_file_required' => true,
            'parent_code' => 'PK-E-1-2'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-E-1-2-4',
            'no' => '4.e.i.2.4',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Material yang Digunakan, Pengajuan persetujuan material sesuai dengan Prosedur (P-02)',
            'is_file_required' => true,
            'parent_code' => 'PK-E-1-2'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-E-1-2-5',
            'no' => '4.e.i.2.5',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Aspek Keselamatan Konstruksi',
            'is_file_required' => true,
            'parent_code' => 'PK-E-1-2'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-E-1-2-6',
            'no' => '4.e.i.2.6',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Jadwal Mobilisasi tiap-tiap Sumber Daya',
            'is_file_required' => true,
            'parent_code' => 'PK-E-1-2'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-E-1-3',
            'no' => '4.e.i.3',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Rencana Pemeriksaan dan Pengujian (Inspection and Test Plan/ ITP)',
            'is_file_required' => true,
            'parent_code' => 'PK-E-1'
        ]);

        // ii. Pemeriksaan terhadap Permohonan Izin Memulai Pekerjaan
        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-E-2',
            'no' => '4.e.ii',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Pemeriksaan terhadap Permohonan Izin Memulai Pekerjaan (Request of Work)',
            'is_file_required' => true,
            'parent_code' => 'PK-E'
        ]);

        // f. Surat Persetujuan Memulai Pekerjaan
        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-F',
            'no' => '4.f',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Surat Persetujuan Memulai Pekerjaan (Approval of Work)',
            'is_file_required' => true,
            'parent_code' => null
        ]);

        // g. Pengawasan Mutu Pekerjaan
        $pengawasanMutu = DocumentType::create([
            'code' => 'PK-G',
            'no' => '4.g',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Pengawasan Mutu Pekerjaan',
            'is_file_required' => false,
            'parent_code' => null
        ]);

        // i. Pengawasan Mutu Pekerjaan dilakukan melalui pemeriksaan pengujian
        $pengawasanMutuPekerjaan = DocumentType::create([
            'code' => 'PK-G-1',
            'no' => '4.g.i',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Pengawasan Mutu Pekerjaan dilakukan melalui pemeriksaan pengujian',
            'is_file_required' => false,
            'parent_code' => 'PK-G'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-G-1-1',
            'no' => '4.g.i.1',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Metode Kerja',
            'is_file_required' => true,
            'parent_code' => 'PK-G-1'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-G-1-2',
            'no' => '4.g.i.2',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Tenaga Kerja yang Terlibat',
            'is_file_required' => true,
            'parent_code' => 'PK-G-1'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-G-1-3',
            'no' => '4.g.i.3',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Peralatan yang Dibutuhkan, Pemeriksaan terkait ketersediaan SILO dan SIO',
            'is_file_required' => true,
            'parent_code' => 'PK-G-1'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-G-1-4',
            'no' => '4.g.i.4',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Material yang Digunakan, Pengawasan terkait spesifikasi dan jumlah material dasar dan material olahan sesuai dengan dokumen pengajuan material',
            'is_file_required' => true,
            'parent_code' => 'PK-G-1'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-G-1-5',
            'no' => '4.g.i.5',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Aspek Keselamatan Konstruksi, implementasi per pekerjaan pada IBPRP',
            'is_file_required' => true,
            'parent_code' => 'PK-G-1'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-G-1-6',
            'no' => '4.g.i.6',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Jadwal Mobilisasi tiap-tiap Sumber Daya',
            'is_file_required' => true,
            'parent_code' => 'PK-G-1'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-G-1-7',
            'no' => '4.g.i.7',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Rencana Pemeriksaan dan Pengujian (Inspection and Test Plan/ ITP)',
            'is_file_required' => true,
            'parent_code' => 'PK-G-1'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-G-1-8',
            'no' => '4.g.i.8',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Hasil Pekerjaan, Pengawasan terkait hasil tiap-tiap pekerjaan sesuai dengan persyaratan',
            'is_file_required' => true,
            'parent_code' => 'PK-G-1'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-G-2',
            'no' => '4.g.ii',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Pengawasan terhadap proses tiap-tiap kegiatan dilakukan berdasarkan spesifikasi dan metode kerja yang diajukan',
            'is_file_required' => true,
            'parent_code' => 'PK-G'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-G-3',
            'no' => '4.g.iii',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Pengawasan terhadap hasil pekerjaaan dilakukan berdasarkan spesifikasi',
            'is_file_required' => true,
            'parent_code' => 'PK-G'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-G-4',
            'no' => '4.g.iv',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Pemeriksaan material pada saat penerimaan dilakukan sesuai Prosedur (P-04)',
            'is_file_required' => true,
            'parent_code' => 'PK-G'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-G-5',
            'no' => '4.g.v',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Pemeriksaan dan Pengujian berkala material dilaksanakan sesuai dengan rencana pengujian pada dokumen Pemeriksaan dan Pengujian (ITP) yang terkait dengan material tersebut dengan peraturan yang berlaku sesuai dengan Prosedur (P-05)',
            'is_file_required' => true,
            'parent_code' => 'PK-G'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-G-6',
            'no' => '4.g.vi',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Pemeriksaan hasil pekerjaan dilakukan pada setiap pekerjaan maupun sub pekerjaan baik fisik maupun administrasi Jika hasil pekerjaan sudah sesuai spesfikasi, maka Penyedia Jasa Pekerjaan Konstruksi mengajukan permohonan pemeriksaan kepada penanggung jawab kegiatan sesuai dengan prosedur (P-06)',
            'is_file_required' => true,
            'parent_code' => 'PK-G'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-G-7',
            'no' => '4.g.vii',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Jika dalam pelaksanaan pekerjaan diperlukan adanya penyesuaian atau perubahan di lapangan, maka perubahan di lapangan dilaksanakan sesuai Prosedur (P-07)',
            'is_file_required' => true,
            'parent_code' => 'PK-G'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-G-8',
            'no' => '4.g.viii',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Pengendalian ketidaksesuaian hasil pekerjaan dilakukan oleh Penyedia Jasa Pekerjaan Konstruksi dan Pengawas Pekerjaan, dan membuat laporan ketidaksesuaian sesuai Prosedur (P-08) dan (P-09)',
            'is_file_required' => true,
            'parent_code' => 'PK-G'
        ]);

        // h. Penerimaan dan Pembayaran Hasil Pekerjaan
        $penerimaanPembayaran = DocumentType::create([
            'code' => 'PK-H',
            'no' => '4.h',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Penerimaan dan Pembayaran Hasil Pekerjaan',
            'is_file_required' => false,
            'parent_code' => null
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-H-1',
            'no' => '4.h.i',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Penerimaan hasil pekerjaan dilakukan setelah seluruh persyaratan mutu pekerjaan dalam kontrak dipenuhi',
            'is_file_required' => false,
            'parent_code' => 'PK-H'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-H-2',
            'no' => '4.h.ii',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Persetujuan dokumen penagihan didahului dengan pemeriksaan mutu dan volume hasil pekerjaan yang telah selesai dikerjakan oleh pengawas pekerjaan',
            'is_file_required' => false,
            'parent_code' => 'PK-H'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-H-3',
            'no' => '4.h.iii',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Penyedia Jasa Pekerjaan Konstruksi menyampaikan dokumen tagihan sesuai dalam kontrak',
            'is_file_required' => false,
            'parent_code' => 'PK-H'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-H-4',
            'no' => '4.h.iv',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Jika hasil pemeriksaan menunjukkan ketidaksesuaian spesifikasi dan volume yang tertulis dalam dokumen penagihan, maka penanggung jawab kegiatan berhak untuk tidak menyetujui dokumen tersebut dan Penyedia Jasa Pekerjaan Konstruksi wajib melakukan perbaikan terhadap hasil pekerjaan maupun dokumen penagihannya',
            'is_file_required' => false,
            'parent_code' => 'PK-H'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PK-H-5',
            'no' => '4.h.v',
            'tahapan' => 'Pelaksanaan Pekerjaan Konstruksi',
            'uraian' => 'Pembayaran dapat dilakukan setelah hasil pemeriksaan telah disetujui',
            'is_file_required' => false,
            'parent_code' => 'PK-H'
        ]);

        // 5. Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)
        // a. Laporan Harian
        $laporanHarian = DocumentType::create([
            'code' => 'PTP-A',
            'no' => '5.a',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Laporan Harian',
            'is_file_required' => false,
            'parent_code' => null
        ]);

        // Sub-dokumen Laporan Harian
        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-A-1',
            'no' => '5.a.i',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Jenis dan kuantitas bahan yang berada di lokasi pekerjaan',
            'is_file_required' => true,
            'parent_code' => 'PTP-A'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-A-2',
            'no' => '5.a.ii',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Penempatan tenaga kerja untuk tiap macam tugasnya',
            'is_file_required' => true,
            'parent_code' => 'PTP-A'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-A-3',
            'no' => '5.a.iii',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Jenis, jumlah, dan kondisi lapangan',
            'is_file_required' => true,
            'parent_code' => 'PTP-A'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-A-4',
            'no' => '5.a.iv',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Jenis dan kuantitas pekerjaan yang dilaksanakan',
            'is_file_required' => true,
            'parent_code' => 'PTP-A'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-A-5',
            'no' => '5.a.v',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Keadaan cuaca termasuk hujan, banjir, dan peristiwa alam lainnya yang berpengaruh terhadap kelancaran pekerjaan',
            'is_file_required' => true,
            'parent_code' => 'PTP-A'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-A-6',
            'no' => '5.a.vi',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Catatan-catatan lain yang berkenaan dengan pelaksanaan',
            'is_file_required' => true,
            'parent_code' => 'PTP-A'
        ]);

        // b. Laporan Mingguan
        $laporanMingguan = DocumentType::create([
            'code' => 'PTP-B',
            'no' => '5.b',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Laporan Mingguan',
            'is_file_required' => false,
            'parent_code' => null
        ]);

        // Sub-dokumen Laporan Mingguan
        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-B-1',
            'no' => '5.b.i',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Rangkuman capaian pekerjaan fisik berupa hasil pembandingan capaian minggu sebelumnya dengan capaian pada minggu berjalan dan sasaran capaian pada minggu berikutnya',
            'is_file_required' => true,
            'parent_code' => 'PTP-B'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-B-2',
            'no' => '5.b.ii',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Hambatan dan kendala yang dihadapi pada kurun waktu 1 (satu) minggu berserta tindakan penanggulangan yang telah dilakukan dan potensi kendala pada minggu berikutnya',
            'is_file_required' => true,
            'parent_code' => 'PTP-B'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-B-3',
            'no' => '5.b.iii',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Dukungan yang diperlukan dari Pemimpin unit kerja Pelaksana Kegiatan/Penanggung Jawa Kegiatan, Direksi Teknis/Konsultan Pengawas, dan pihak-pihka lain yang terkait',
            'is_file_required' => true,
            'parent_code' => 'PTP-B'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-B-4',
            'no' => '5.b.iv',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Ringkasan permohonan persetujuan atas usulan dan dokumen yang diajukan beserta statusnya',
            'is_file_required' => true,
            'parent_code' => 'PTP-B'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-B-5',
            'no' => '5.b.v',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Ringkasan kegiatan pemeriksaan dan pengujian yang dilakukan',
            'is_file_required' => true,
            'parent_code' => 'PTP-B'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-B-6',
            'no' => '5.b.vi',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Ringkasan aktivitas dan hasil pengendalian Keselamatan Konstruksi, termasuk kejadian kecelakaan kerja, catatan tentang kejadian nyaris terjadi kecelakaan kerja (nearmiss record), dan lain-lain',
            'is_file_required' => true,
            'parent_code' => 'PTP-B'
        ]);

        // c. Laporan Bulanan
        $laporanBulanan = DocumentType::create([
            'code' => 'PTP-C',
            'no' => '5.c',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Laporan Bulanan',
            'is_file_required' => false,
            'parent_code' => null
        ]);

        // Sub-dokumen Laporan Bulanan
        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-C-1',
            'no' => '5.c.i',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Capaian pekerjaan fisik, ringkasan status capaian pekerjaan fisik dengan membandingkan capaian di bulan sebelumnya, capaian pada bulan berjalan serta target capaian di bulan berikutnya',
            'is_file_required' => true,
            'parent_code' => 'PTP-C'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-C-2',
            'no' => '5.c.ii',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Foto dokumentasi pekerjaan',
            'is_file_required' => true,
            'parent_code' => 'PTP-C'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-C-3',
            'no' => '5.c.iii',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Ringkasan status kondisi keuangan Penyedia Jasa Pekerjaan Konstruksi, status pembayaran dari Pengguna jasa',
            'is_file_required' => true,
            'parent_code' => 'PTP-C'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-C-4',
            'no' => '5.c.iv',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Perubahan kontrak dan perubahan pekerjaan',
            'is_file_required' => true,
            'parent_code' => 'PTP-C'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-C-5',
            'no' => '5.c.v',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Masalah dan kendala yang dihadapi, termasuk statusnya, tindakan penanggulangan yang telah dilakukan dan rencana tindakan selanjutnya',
            'is_file_required' => true,
            'parent_code' => 'PTP-C'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-C-6',
            'no' => '5.c.vi',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Hambatan dan kendala yang dihadapi pada kurun waktu 1 (satu) minggu berserta tindakan penanggulangan yang telah dilakukan dan potensi kendala pada minggu berikutnya',
            'is_file_required' => true,
            'parent_code' => 'PTP-C'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-C-7',
            'no' => '5.c.vii',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Hambatan dan kendala yang berpotensi terjadi di bulan berikutnya, beserta rencana pencegahan atau penanggulangan yang akan dilakukan',
            'is_file_required' => true,
            'parent_code' => 'PTP-C'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-C-8',
            'no' => '5.c.viii',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Status persetujuan atas usulan dan permohonan dokumen',
            'is_file_required' => true,
            'parent_code' => 'PTP-C'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-C-9',
            'no' => '5.c.ix',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Ringkasan aktivitas dan hasil pengendalian Keselamatan Konstruksi, termasuk kejadian kecelakaan kerja, catatan tentang kejadian nyaris terjadi kecelakaan kerja (nearmiss record), dan lain-lain',
            'is_file_required' => true,
            'parent_code' => 'PTP-C'
        ]);

        // d. Data-data dukung dan pengujian untuk Kelengkapan Dokumen Sertifikat Laik Fungsi (SLF) Bangunan
        $dataDukungSLF = DocumentType::create([
            'code' => 'PTP-D',
            'no' => '5.d',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Data-data dukung dan pengujian untuk Kelengkapan Dokumen Sertifikat Laik Fungsi (SLF) Bangunan',
            'is_file_required' => false,
            'parent_code' => null
        ]);

        // i. Hasil uji mutu
        $hasilUjiMutu = DocumentType::create([
            'code' => 'PTP-D-1',
            'no' => '5.d.i',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Hasil uji mutu',
            'is_file_required' => false,
            'parent_code' => 'PTP-D'
        ]);

        // Sub-dokumen Hasil uji mutu
        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-D-1-1',
            'no' => '5.d.i.1',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Uji tarik besi',
            'is_file_required' => true,
            'parent_code' => 'PTP-D-1'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-D-1-2',
            'no' => '5.d.i.2',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Uji tekan beton',
            'is_file_required' => true,
            'parent_code' => 'PTP-D-1'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-D-1-3',
            'no' => '5.d.i.3',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Pembebanan pondasi dalam',
            'is_file_required' => true,
            'parent_code' => 'PTP-D-1'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-D-2',
            'no' => '5.d.ii',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Sertifikat mutu, brosur, katalog',
            'is_file_required' => true,
            'parent_code' => 'PTP-D'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-D-3',
            'no' => '5.d.iii',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Sertifikat garansi / surat jaminan peralatan dan perlengkapan mekanikal, elektrikal, dan perpipaan (plumbing)',
            'is_file_required' => true,
            'parent_code' => 'PTP-D'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-D-4',
            'no' => '5.d.iv',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Sertifikat Laik Operasi (SLO) Penyambungan Baru Instalasi Listrik',
            'is_file_required' => true,
            'parent_code' => 'PTP-D'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-D-5',
            'no' => '5.d.v',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Perijinan Sumur Dalam dari Dinas ESDM/Instansi Terkait',
            'is_file_required' => true,
            'parent_code' => 'PTP-D'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-D-6',
            'no' => '5.d.vi',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Uji Kualitas Air Sumur dari Dinas Kesehatan/Instansi Terkait',
            'is_file_required' => true,
            'parent_code' => 'PTP-D'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-D-7',
            'no' => '5.d.vii',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Pengujian Instalasi Pemadam Kebakaran (Hidran, APAR, dll) dari Dinas Pemadam Kebakaran/BPDB/Instansi Terkait',
            'is_file_required' => true,
            'parent_code' => 'PTP-D'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-D-8',
            'no' => '5.d.viii',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Pengujian K3 Instalasi Penyalur Petir dari Dinas Tenaga Kerja/Instansi Terkait',
            'is_file_required' => true,
            'parent_code' => 'PTP-D'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-D-9',
            'no' => '5.d.ix',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Hasil Test Commisioning Mekanikal Elektrikal',
            'is_file_required' => true,
            'parent_code' => 'PTP-D'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-D-10',
            'no' => '5.d.x',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Dokumen K3 atau SMK3',
            'is_file_required' => true,
            'parent_code' => 'PTP-D'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-D-11',
            'no' => '5.d.xi',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Sertifikat Bangunan Gedung Hijau (jika ada)',
            'is_file_required' => true,
            'parent_code' => 'PTP-D'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-D-12',
            'no' => '5.d.xii',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Gambar Kerja (Shop Drawing)',
            'is_file_required' => true,
            'parent_code' => 'PTP-D'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-D-13',
            'no' => '5.d.xiii',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Gambar Hasil Pelaksanaan (As Bulit Drawing)',
            'is_file_required' => true,
            'parent_code' => 'PTP-D'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-D-14',
            'no' => '5.d.xiv',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Pedoman/Manual pengoperasian dan perawatan/pemeliharaan Bangunan Gedung Negara, termasuk peralatan dan perlengkapan mekanikal, elektrikal, dan plumbing, yang disusun bersama konsultan perencana dan konsultan pengawas/MK',
            'is_file_required' => false,
            'parent_code' => 'PTP-D'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-D-15',
            'no' => '5.d.xv',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Surat Penjaminan atas Kegagalan Bangunan diTTD Penyedia Jasa Pelaksana dan Pengawas Konstruksi/MK',
            'is_file_required' => false,
            'parent_code' => 'PTP-D'
        ]);

        // e. Berita Acara Hasil Perbaikan Cacat Mutu
        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-E',
            'no' => '5.e',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Berita Acara Hasil Perbaikan Cacat Mutu (Jika Ada)',
            'is_file_required' => true,
            'parent_code' => null
        ]);

        // f. Laporan Dokumentasi Pelaksanaan Konstruksi
        $laporanDokumentasi = DocumentType::create([
            'code' => 'PTP-F',
            'no' => '5.f',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Laporan Dokumentasi Pelaksanaan Konstruksi',
            'is_file_required' => false,
            'parent_code' => null
        ]);

        // Sub-dokumen Laporan Dokumentasi
        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-F-1',
            'no' => '5.f.i',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Dokumentasi pelaksanaan pada saat progress 0%, 50%, 100% yang diambil dari sudut pandang',
            'is_file_required' => true,
            'parent_code' => 'PTP-F'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-F-2',
            'no' => '5.f.ii',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Dokumentasi pelaksanaan pada saat progress 0% dan progress pelaksanaan sesuai permintaan pembayaran = ........ % yang diambil dari satu sudut pandang',
            'is_file_required' => true,
            'parent_code' => 'PTP-F'
        ]);

        // g. Laporan Kemajuan Hasil Pekerjaan Pelaksanaan Konstruksi
        $laporanKemajuan = DocumentType::create([
            'code' => 'PTP-G',
            'no' => '5.g',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Laporan Kemajuan Hasil Pekerjaan Pelaksanaan Konstruksi',
            'is_file_required' => true,
            'parent_code' => null
        ]);

        // Sub-dokumen Laporan Kemajuan
        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-G-1',
            'no' => '5.g.i',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Untuk pembayaran termin sesuai kontrak, maka prosentase progres pada laporan minimal sebesar prosentase termin',
            'is_file_required' => false,
            'parent_code' => 'PTP-G'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PTP-G-2',
            'no' => '5.g.ii',
            'tahapan' => 'Penunjang Tahapan Pelaksanaan Konstruksi (PELAPORAN)',
            'uraian' => 'Untuk pembayaran sesuai progres dapat dilakukan beberapa kali termin, contohnya: Termin I, Termin II, Termin III, dan seterusnya hingga Termin terakhir pada saat Serah Terima Hasil Pekerjaan Pertama Pelaksanaan Konstruksi (ST 1) dengan progress pelaksanaan sebesar 100%',
            'is_file_required' => false,
            'parent_code' => 'PTP-G'
        ]);

        // 6. Perubahan Kontrak (Addendum)
        // a. Bentuk Perubahan Kontrak/Addendum
        $bentukPerubahan = DocumentType::create([
            'code' => 'PKA-A',
            'no' => '6.a',
            'tahapan' => 'Perubahan Kontrak (Addendum)',
            'uraian' => 'Bentuk Perubahan Kontrak/Addendum',
            'is_file_required' => false,
            'parent_code' => null
        ]);

        // Sub-dokumen Bentuk Perubahan
        DocumentType::firstOrCreate(['code' => 'PKA-A-1'], [
            'code' => 'PKA-A-1',
            'no' => '6.a.i',
            'tahapan' => 'Perubahan Kontrak (Addendum)',
            'uraian' => 'Mutual Check (MC) perubahan',
            'is_file_required' => true,
            'parent_code' => 'PKA-A'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PKA-A-2',
            'no' => '6.a.ii',
            'tahapan' => 'Perubahan Kontrak (Addendum)',
            'uraian' => 'Contract Change Order (CCO)',
            'is_file_required' => true,
            'parent_code' => 'PKA-A'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PKA-A-3',
            'no' => '6.a.iii',
            'tahapan' => 'Perubahan Kontrak (Addendum)',
            'uraian' => 'Addendum Kontrak',
            'is_file_required' => true,
            'parent_code' => 'PKA-A'
        ]);

        // b. Dokumen pendukung perubahan kontrak
        $dokumenPendukung = DocumentType::create([
            'code' => 'PKA-B',
            'no' => '6.b',
            'tahapan' => 'Perubahan Kontrak (Addendum)',
            'uraian' => 'Dokumen pendukung perubahan kontrak',
            'is_file_required' => false,
            'parent_code' => null
        ]);

        // Sub-dokumen pendukung
        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PKA-B-1',
            'no' => '6.b.i',
            'tahapan' => 'Perubahan Kontrak (Addendum)',
            'uraian' => 'Berita Acara Rapat Lapangan',
            'is_file_required' => true,
            'parent_code' => 'PKA-B'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PKA-B-2',
            'no' => '6.b.ii',
            'tahapan' => 'Perubahan Kontrak (Addendum)',
            'uraian' => 'Usulan Perubahan dari Penyedia/Perintah tertulis perubahan kontrak oleh Pengguna Jasa (PA/KPA/PPK)',
            'is_file_required' => true,
            'parent_code' => 'PKA-B'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PKA-B-3',
            'no' => '6.b.iii',
            'tahapan' => 'Perubahan Kontrak (Addendum)',
            'uraian' => 'Kajian/Justifikasi Teknis Konsultan Pengawas/MK',
            'is_file_required' => true,
            'parent_code' => 'PKA-B'
        ]);

        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PKA-B-4',
            'no' => '6.b.iv',
            'tahapan' => 'Perubahan Kontrak (Addendum)',
            'uraian' => 'Rekomendasi Konsultan Perencana',
            'is_file_required' => true,
            'parent_code' => 'PKA-B'
        ]);

        // c. Berita Acara Negosiasi
        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PKA-C',
            'no' => '6.c',
            'tahapan' => 'Perubahan Kontrak (Addendum)',
            'uraian' => 'Berita Acara Negosiasi Teknis dan Harga (jika ada penambahan item pekerjaan baru)',
            'is_file_required' => true,
            'parent_code' => null
        ]);

        // d. Berita Acara Persetujuan
        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PKA-D',
            'no' => '6.d',
            'tahapan' => 'Perubahan Kontrak (Addendum)',
            'uraian' => 'Berita Acara Persetujuan Perubahan',
            'is_file_required' => true,
            'parent_code' => null
        ]);

        // e. Persetujuan Program Mutu
        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PKA-E',
            'no' => '6.e',
            'tahapan' => 'Perubahan Kontrak (Addendum)',
            'uraian' => 'Persetujuan Perubahan atau Permutakhiran Program Mutu oleh PPK (jika ada)',
            'is_file_required' => false,
            'parent_code' => null
        ]);

        // 7. Kontrak Kritis
        // a. Surat Teguran
        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'KK-A',
            'no' => '7.a',
            'tahapan' => 'Kontrak Kritis',
            'uraian' => 'Surat Teguran',
            'is_file_required' => true,
            'parent_code' => null
        ]);

        // b. Berita Acara SCM
        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'KK-B',
            'no' => '7.b',
            'tahapan' => 'Kontrak Kritis',
            'uraian' => 'Berita Acara Show Cause Meeting (SCM) I, II, dan III',
            'is_file_required' => true,
            'parent_code' => null
        ]);

        // c. Surat Peringatan
        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'KK-C',
            'no' => '7.c',
            'tahapan' => 'Kontrak Kritis',
            'uraian' => 'Surat Peringatan I, II, dan III',
            'is_file_required' => true,
            'parent_code' => null
        ]);

        // 8. Pemutusan Kontrak sampai dengan Penetapan Sanksi Daftar Hitam
        // a. Berita Acara Pemeriksaan Lapangan
        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PKS-A',
            'no' => '8.a',
            'tahapan' => 'Pemutusan Kontrak dan Sanksi',
            'uraian' => 'Berita Acara Pemeriksaan Lapangan untuk melakukan Penilaian Progress Lapangan Kondisi Kritis oleh Penyedia Jasa, Konsultan Pengawas/MK, Pejabat Pembuat Komitmen (PPK), dan tim teknis/tim ahli (jika ada/diperlukan)',
            'is_file_required' => true,
            'parent_code' => null
        ]);

        // b. Berita Acara Pemeriksaan Administratif
        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PKS-B',
            'no' => '8.b',
            'tahapan' => 'Pemutusan Kontrak dan Sanksi',
            'uraian' => 'Berita Acara Pemeriksaan Administratif untuk melakukan Penelitian Dokumen Pelaksanaan Kontrak oleh Penyedia Jasa, Konsultan Pengawas/MK, Penjabat Pembuat Komitmen (PPK), dan tim teknis/tim ahli (jika ada, diperlukan)',
            'is_file_required' => true,
            'parent_code' => null
        ]);

        // c. Surat Penghentian Pekerjaan/Pemutusan Kontrak
        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PKS-C',
            'no' => '8.c',
            'tahapan' => 'Pemutusan Kontrak dan Sanksi',
            'uraian' => 'Surat Penghentian Pekerjaan/Pemutusan Kontrak oleh PPK',
            'is_file_required' => true,
            'parent_code' => null
        ]);

        // d. Surat Usulan Penetapan Sanksi
        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PKS-D',
            'no' => '8.d',
            'tahapan' => 'Pemutusan Kontrak dan Sanksi',
            'uraian' => 'Surat Usulan Penetapan Sanksi Daftar Hitam dari PPK ke PA/KPA atau K/L/Pemerintah Daerah',
            'is_file_required' => true,
            'parent_code' => null
        ]);

        // e. Surat Pemberitahuan Usulan Penetapan Sanksi
        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PKS-E',
            'no' => '8.e',
            'tahapan' => 'Pemutusan Kontrak dan Sanksi',
            'uraian' => 'Surat Pemberitahuan Usulan Penetapan Sanski Daftar Hitam dari PA/KPA atau K/L/Pemerintah Daerah',
            'is_file_required' => true,
            'parent_code' => null
        ]);

        // f. Surat Keberatan
        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PKS-F',
            'no' => '8.f',
            'tahapan' => 'Pemutusan Kontrak dan Sanksi',
            'uraian' => 'Surat Keberatan dari Penyedia Jasa (jika ada)',
            'is_file_required' => true,
            'parent_code' => null
        ]);

        // g. Surat Rekomendasi Penetapan Sanksi
        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PKS-G',
            'no' => '8.g',
            'tahapan' => 'Pemutusan Kontrak dan Sanksi',
            'uraian' => 'Surat Rekomendasi Penetapan Sanksi Daftar Hitam dari APIP',
            'is_file_required' => true,
            'parent_code' => null
        ]);

        // h. Surat Keputusan Penetapan Sanksi
        DocumentType::firstOrCreate(['code' => 'PPK-F-2-1'], [
            'code' => 'PKS-H',
            'no' => '8.h',
            'tahapan' => 'Pemutusan Kontrak dan Sanksi',
            'uraian' => 'Surat Keputusan Penetapan Sanksi Daftar Hitam dari PA/KPA atau K/L/Pemerintah Daerah',
            'is_file_required' => true,
            'parent_code' => null
        ]);
    }
}