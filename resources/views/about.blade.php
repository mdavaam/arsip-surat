@extends('layouts.app')

@section('title', 'About')

@section('content')
<div class="page-header">
    <h2>About</h2>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <div class="bg-dark rounded d-flex align-items-center justify-content-center"
                             style="width: 150px; height: 150px; margin: 0 auto;">
                            <i class="fas fa-user fa-5x text-white"></i>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h5>Aplikasi ini dibuat oleh:</h5>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Nama</strong></td>
                                <td>:</td>
                                <td>Muhammad Dava</td>
                            </tr>
                            <tr>
                                <td><strong>Prodi</strong></td>
                                <td>:</td>
                                <td>D3-MI PSDKU Pamekasan</td>
                            </tr>
                            <tr>
                                <td><strong>NIM</strong></td>
                                <td>:</td>
                                <td>2231750011</td>
                            </tr>
                            <tr>
                                <td><strong>Tanggal</strong></td>
                                <td>:</td>
                                <td>{{ now()->format('d F Y') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
