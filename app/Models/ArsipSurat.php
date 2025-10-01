<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArsipSurat extends Model
{
    protected $fillable = ['nomor_surat', 'kategori_id', 'judul', 'file_path', 'waktu_pengarsipan'];
    
    protected $casts = [
        'waktu_pengarsipan' => 'datetime',
    ];
    
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
