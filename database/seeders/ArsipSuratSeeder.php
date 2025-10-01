<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ArsipSurat;

class ArsipSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ArsipSurat::create([
            'nomor_surat' => '2022/PD3/TU/001',
            'kategori_id' => 1, // Pengumuman
            'judul' => 'Nota Dinas WFH',
            'file_path' => 'surat_pdf/sample.pdf', // File sample akan dibuat
            'waktu_pengarsipan' => '2023-06-21 17:23:00'
        ]);
        
        ArsipSurat::create([
            'nomor_surat' => '2022/PD2/TU/022',
            'kategori_id' => 2, // Undangan
            'judul' => 'Undangan Halal Bi Halal',
            'file_path' => 'surat_pdf/sample2.pdf', // File sample akan dibuat
            'waktu_pengarsipan' => '2023-04-21 18:23:00'
        ]);
    }
}
