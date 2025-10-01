<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoris = [
            [
                'nama_kategori' => 'Pengumuman',
                'keterangan' => 'Surat-surat yang terkait dengan pengumuman'
            ],
            [
                'nama_kategori' => 'Undangan',
                'keterangan' => 'Undangan rapat, koordinasi, dlsb.'
            ],
            [
                'nama_kategori' => 'Nota Dinas',
                'keterangan' => 'Nota dinas resmi'
            ],
            [
                'nama_kategori' => 'Pemberitahuan',
                'keterangan' => 'Kategori ini digunakan untuk surat yang sifatnya berupa pengumuman atau menginformasikan suatu perihal.'
            ]
        ];
        
        foreach ($kategoris as $kategori) {
            Kategori::create($kategori);
        }
    }
}
