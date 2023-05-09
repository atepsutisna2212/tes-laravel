<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>{{ $title }}</title>
</head>

<body>
    <div class="row justify-content-center">
        <div class="col-10">
            <h3 class="text-center mt-2">Tiket Konser</h3>
        </div>
        <div class="row mt-4">
            <b>
                <div class="col-12 mb-2">ID : {{ $data->ID }}</div>
            </b>
            <div class="border-top border-dark"></div>
            <div class="col-4">Tanggal daftar</div>
            <div class="col-8">: {{ $data->created_at }}</div>
            <div class="col-4">Nama</div>
            <div class="col-8">: {{ $data->nama }}</div>
            <div class="col-4">No. telepon</div>
            <div class="col-8">: {{ $data->telp }}</div>
            <div class="col-4">Akun pendaftar</div>
            <div class="col-8">: {{ $data->user->username }}</div>
            <div class="border-top border-dark mb-2"></div>
            <h3>Harga tiket : Rp. 30.000 perorang</h3>
        </div>
    </div>
    <script>
        window.print()
    </script>
</body>

</html>
