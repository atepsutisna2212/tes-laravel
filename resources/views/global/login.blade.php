@extends('global.layout')

@section('main')
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card shadow">
                <div class="card-header">
                    <h4 class="text-center">Login</h4>
                </div>
                <form action="/login" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-floating mb-3">
                            <input type="text" name="username" placeholder="Username"autofocus required
                                class="form-control " id="username">
                            <label for="username">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password" placeholder="Password"autofocus required
                                class="form-control " id="password">
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary me-4">Login</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
