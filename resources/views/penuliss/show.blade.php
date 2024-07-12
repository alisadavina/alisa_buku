<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lihat Data Penulis - Alisa Davina Laravel 11</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #F0E7F0;
        }
        .card-custom {
            background-color: #D8BFD8;
        }
        .card-custom .card-header {
            background-color: #BA8CB5;
            color: white;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #D8BFD8;">
    <div class="container">
        <a class="navbar-brand" href="#" style="color: black;">Alisa Laravel 11</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('bukus.index') }}" style="color: black;">Laman Data Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('penuliss.index') }}" style="color: black;">Laman Data Penulis</a>
                </li>
            </ul>
        </div>
    </div>
</nav>



<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded card-custom">
                <div class="card-header bg-secondary">
                    <h3 class="card-title">Biodata Penulis Buku</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>Nama Penulis: </strong>
                            <span>{!! $penulis->nama_penulis !!}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Tanggal Lahir: </strong>
                            <span>{!! $penulis->tanggal_lahir !!}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Email: </strong>
                            <span>{!! $penulis->email !!}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Alamat: </strong>
                            <span>{!! $penulis->alamat !!}</span>
                        </li>
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('penuliss.index') }}" class="btn btn-outline-dark">Kembali</a>
                    <a href="{{ route('penuliss.edit', $penulis->id_penulis) }}" class="btn btn-outline-success">Edit</a>
                    <form action="{{ route('penuliss.destroy', $penulis->id_penulis) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Apakah Anda Yakin ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
