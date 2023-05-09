@extends('home.layout')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header text-center  pt-3">
                    <h4 id="cekk">Tabel data admin</h4>
                </div>
                <div class="card-body table-responsive">
                    @if (session()->has('gagal'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <b><i class="bi bi-exclamation-triangle-fill"></i></b> {{ session('gagal') }}
                        </div>
                    @endif
                    <a class="btn btn-primary mb-3" title="Tambah data" href="/pengguna/create" role="button"><i
                            class="bi bi-bookmark-plus"></i> Tambah</a>
                    <table id="cekTabel" class="table table-nowrap table-centered rounded table-bordered border-dark">
                        <thead class="bg-primary">
                            <tr>
                                <th class="text-white">No</th>
                                <th class="text-white">Nama</th>
                                <th class="text-white">Username</th>
                                <th class="text-white">Password</th>
                                <th class="text-white">Telepon</th>
                                <th class="text-white">Status</th>
                                <th class="text-white">Pilihan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengguna as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->nama }}</td>
                                    <td>{{ $p->username }}</td>
                                    <td>{{ $p->password2 }}</td>
                                    <td>{{ $p->telp }}</td>
                                    <td>{{ $p->status }}</td>
                                    <td>
                                        <a href="/pengguna/{{ $p->id }}/edit" title="Edit data"
                                            class="btn btn-warning "><i class="bi bi-pencil-square"></i></a>
                                        <form action="/pengguna/{{ $p->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button title="Hapus data" class="btn btn-danger show_confirm"><i
                                                    class="bi bi-trash-fill"></i></button>
                                        </form>
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
