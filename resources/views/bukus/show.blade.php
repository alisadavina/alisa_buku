<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Buku - Alisa Laravel 11</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #F0E7F0; 
        }
        .navbar {
            background-color: #D8BFD8;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light">
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


<!-- Content -->
<center><p class="fw-normal fs-2" style="color: #d63384;">Halaman Lihat Data</p></center>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <img src="/storage/{{$buku->foto_buku}}" class="card-img-top" style="width: 100%; height: auto;">
                <div class="card-body">
                    <h5 class="card-title">Judul Buku "{{ $buku->judul_buku }}"</h5>
                    <hr>
                    <p class="card-text"><p class="fw-bolder">Harga Buku</p>{{ "Rp " . number_format($buku->harga, 2, ',', '.') }}</p>
                    <hr>
                    <p class="card-text"><p class="fw-bolder">Deskripsi Buku</p>{!! $buku->deskripsi !!}</p>
                    <hr>
                    <p class="card-text fw-bolder">Stok: {{ $buku->stok }}</p>
                </div>
            </div>
            <div class="mt-3">
                <a href="{{ route('bukus.index') }}" class="btn btn-sm btn-outline-dark">Kembali</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
