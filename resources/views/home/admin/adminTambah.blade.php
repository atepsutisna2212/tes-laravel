@extends('home.layout')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header text-center pt-3">
                    <h4>Form tambah data pengguna</h4>
                </div>
                <form action="/pengguna" method="POST">
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
                            <input type="text" name="username" placeholder="Username" minlength="5" maxlength="20"
                                required
                                class="form-control @error('username') is-invalid
                            @enderror"
                                id="username"value="{{ old('username') }}">
                            <label for="username">Username</label>
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="password" placeholder="Password" minlength="5" maxlength="30"
                                required
                                class="form-control @error('password') is-invalid
                            @enderror"
                                id="password"value="{{ old('password') }}">
                            <label for="password">Password</label>
                            @error('password')
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
                        <h6>Status pengguna</h6>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="ad" value="admin"
                                required {{ old('status') == 'admin' ? 'checked' : '' }}>
                            <label class="form-check-label" for="ad">Admin</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="ow" value="penonton"
                                {{ old('status') == 'penonton' ? 'checked' : '' }}>
                            <label class="form-check-label" for="ow">Penonton</label>
                        </div>
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
