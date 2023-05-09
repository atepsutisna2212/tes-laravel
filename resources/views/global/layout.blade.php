<!doctype html>
<html lang="en">

<head>
    <title>{{ $title }}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container">
                <a class="navbar-brand text-white" href="/">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item ms-2">
                            <a class="nav-link text-white " href="/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  text-white" href="/registrasi">Registrasi</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="container mt-4" style="min-height: 510px">
        @yield('main')
    </main>
    <footer class="bg-secondary text-white text-center py-2 mt-4">
        <h6>&copy; Konser {{ date('Y') }}</h6>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session()->has('pesan'))
        <script>
            Swal.fire({
                icon: 'success',
                showCancelButton: true,
                cancelButtonText: 'Ok',
                cancelButtonColor: '#3085d6',
                title: 'Sukses',
                text: '{{ session('pesan') }}',
                showConfirmButton: false,
                // timer: 1500
            })
        </script>
    @endif
    @if (session()->has('gagal'))
        <script>
            Swal.fire({
                icon: 'error',
                showCancelButton: true,
                cancelButtonText: 'Ok',
                cancelButtonColor: '#3085d6',
                title: 'Gagal',
                text: '{{ session('gagal') }}',
                showConfirmButton: false,
                // timer: 1500
            })
        </script>
    @endif
</body>

</html>
