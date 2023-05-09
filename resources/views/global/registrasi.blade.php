@extends('global.layout')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header text-center pt-3">
                    <h4>Form tambah data pengguna</h4>
                </div>
                <form action="/registrasi" method="POST">
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
                            <input type="password" name="password" placeholder="Password" minlength="5" maxlength="30"
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
                            <input type="password" name="password_confirmation" placeholder="Password_confirmation"
                                minlength="5" maxlength="30" required
                                class="form-control @error('password_confirmation') is-invalid
                        @enderror"
                                id="password_confirmation"value="{{ old('password_confirmation') }}">
                            <label for="password_confirmation">Password confirmation</label>
                            @error('password_confirmation')
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
                        <input type="hidden" name="status" value="penonton">
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
