@extends('home.layout')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header text-center  pt-3">
                    <h4 id="cekk">Daftar Check-in</h4>
                </div>
                <div class="card-body table-responsive">
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
                                <th class="text-white">pilihan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $jml = 0;
                            @endphp
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
                                        <form action="/daftar/{{ $p->id_daftar }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button title="Hapus data" class="btn btn-danger show_confirm"><i
                                                    class="bi bi-trash-fill"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @php
                                    $jml = $loop->iteration;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <h4>Total bayar : Rp. {{ $jml * 30000 }}</h4>
                </div>
            </div>
        </div>
    </div>
@endsection
