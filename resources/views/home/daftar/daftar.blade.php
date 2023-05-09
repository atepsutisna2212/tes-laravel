@extends('home.layout')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header text-center pt-3">
                    <h4>Form tambah data pengguna</h4>
                </div>
                <form action="/daftar" method="POST">
                    <div class="card-body">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" name="nama" placeholder="Nama lengkap" minlength="2" maxlength="20"
                                autofocus required
                                class="form-control @error('nama') is-invalid
                            @enderror"
                                id="nama"value="{{ old('nama') }}">
                            <label for="nama">Nama lengkap</label>
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" name="telp" placeholder="Nomor telepon" required
                                class="form-control @error('telp') is-invalid
                            @enderror"
                                id="telp"value="{{ old('telp') }}">
                            <label for="telp">Nomor telepon</label>
                            @error('telp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <input type="hidden" name="ket" value="belum" id="">
                    </div>
                    <div class="card-footer">
                        <div class="mb-3">
                            <button class="btn btn-primary me-2" type="submit">Simpan</button>
                            <button class="btn btn-secondary" type="reset">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
