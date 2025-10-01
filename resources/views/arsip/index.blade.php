@extends('layouts.app')

@section('title', 'Arsip Surat')

@section('content')
<div class="page-header">
    <h2>Arsip Surat</h2>
    <p class="text-muted">Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.<br>
    Klik "Lihat" pada kolom aksi untuk menampilkan surat.</p>
</div>

<div class="row mb-4">
    <div class="col-md-8">
        <form method="GET" action="{{ route('arsip.index') }}" class="d-flex">
            <label for="search" class="form-label me-3 mt-2">Cari surat:</label>
            <input type="text" name="search" id="search" class="form-control me-2" 
                   placeholder="search" value="{{ request('search') }}">
            <button type="submit" class="btn btn-outline-primary">Cari!</button>
        </form>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nomor Surat</th>
                <th>Kategori</th>
                <th>Judul</th>
                <th>Waktu Pengarsipan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($arsipSurat as $surat)
            <tr>
                <td>{{ $surat->nomor_surat }}</td>
                <td>{{ $surat->kategori->nama_kategori }}</td>
                <td>{{ $surat->judul }}</td>
                <td>{{ $surat->waktu_pengarsipan->format('Y-m-d H:i') }}</td>
                <td>
                    <button class="btn btn-danger btn-sm btn-action" 
                            onclick="confirmDelete({{ $surat->id }})">Hapus</button>
                    <a href="{{ route('arsip.download', $surat->id) }}" 
                       class="btn btn-warning btn-sm btn-action">Unduh</a>
                    <a href="{{ route('arsip.show', $surat->id) }}" 
                       class="btn btn-primary btn-sm">Lihat >></a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Tidak ada data surat</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    <a href="{{ route('arsip.create') }}" class="btn btn-success">Arsipkan Surat..</a>
</div>

<!-- Form hidden untuk delete -->
@foreach($arsipSurat as $surat)
<form id="delete-form-{{ $surat->id }}" action="{{ route('arsip.destroy', $surat->id) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
@endforeach

@endsection

@section('scripts')
<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Alert',
        text: 'Apakah Anda yakin ingin menghapus arsip surat ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        }
    });
}
</script>
@endsection