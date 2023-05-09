@extends('home.layout')

@section('main')
    <h3>Hallo, {{ auth()->user()->nama }}</h3>
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header text-center  pt-3">
                    <h4 id="cekk">Tabel data pendaftar</h4>
                </div>
                <div class="card-body table-responsive">
                    @if (session()->has('gagal'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <b><i class="bi bi-exclamation-triangle-fill"></i></b> {{ session('gagal') }}
                        </div>
                    @endif
                    <a class="btn btn-primary mb-3" title="Tambah data" href="/daftar/create" role="button"><i
                            class="bi bi-bookmark-plus"></i> Tambah</a>
                    <table id="cekTabel" class="table table-nowrap table-centered rounded table-bordered border-dark">
                        <thead class="bg-primary">
                            <tr>
                                <th class="text-white">No</th>
                                <th class="text-white">tanggal</th>
                                <th class="text-white">ID</th>
                                <th class="text-white">Nama</th>
                                <th class="text-white">Telp</th>
                                <th class="text-white">Pendaftar</th>
                                <th class="text-white">Keterangan</th>
                                <th class="text-white">Pilihan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->updated_at }}</td>
                                    <td>{{ $p->ID }}</td>
                                    <td>{{ $p->nama }}</td>
                                    <td>{{ $p->telp }}</td>
                                    <td>{{ $p->user->username }}</td>
                                    <td>{{ $p->ket }}</td>
                                    <td>
                                        <a href="/print/{{ $p->id_daftar }}" title="Print data" target="_blank"
                                            class="btn btn-success "><i class="bi bi-printer-fill"></i></a>
                                        @can('admin')
                                            <a href="/checkIn/{{ $p->id_daftar }}" title="Check in" class="btn btn-warning "><i
                                                    class="bi bi-check-square"></i></a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
@endsection
