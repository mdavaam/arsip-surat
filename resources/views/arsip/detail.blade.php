@extends('layouts.app')

@section('title', 'Detail Surat')

@section('content')
<div class="page-header">
    <h2>Arsip Surat >> Lihat</h2>
    <div class="mt-3">
        <p><strong>Nomor:</strong> {{ $arsipSurat->nomor_surat }}</p>
        <p><strong>Kategori:</strong> {{ $arsipSurat->kategori->nama_kategori }}</p>
        <p><strong>Judul:</strong> {{ $arsipSurat->judul }}</p>
        <p><strong>Waktu Unggah:</strong> {{ $arsipSurat->waktu_pengarsipan->format('Y-m-d H:i') }}</p>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="border p-3 bg-light" style="height: 600px;">
            <iframe src="{{ asset('storage/' . $arsipSurat->file_path) }}" 
                    width="100%" height="100%" frameborder="0">
                <p>Browser Anda tidak mendukung preview PDF. 
                   <a href="{{ route('arsip.download', $arsipSurat->id) }}">Unduh file</a> untuk melihatnya.</p>
            </iframe>
        </div>
    </div>
</div>

<div class="mt-4">
    <a href="{{ route('arsip.index') }}" class="btn btn-secondary"><< Kembali</a>
    <a href="{{ route('arsip.download', $arsipSurat->id) }}" class="btn btn-warning">Unduh</a>
    <button class="btn btn-primary" onclick="editFile()">Edit/Ganti File</button>
</div>

@endsection

@section('scripts')
<script>
function editFile() {
    Swal.fire({
        title: 'Info',
        text: 'Fitur edit/ganti file akan dikembangkan di versi selanjutnya.',
        icon: 'info',
        confirmButtonText: 'OK'
    });
}
</script>
@endsection