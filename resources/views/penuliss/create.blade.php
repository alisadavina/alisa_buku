<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Penulis - Alisa Laravel 11</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #F0E7F0;
        }
        .navbar {
            background-color: #D8BFD8;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            background-color: #F8F3F8; 
        }
        .form-control {
            border-radius: 10px;
            border: 1px solid #ccc;
        }
        .form-control:focus {
            border-color: #D8BFD8;
            box-shadow: 0 0 0 0.25rem rgba(216, 191, 216, 0.25);
        }
        .btn-outline-success {
            color: #6c757d;
            border-color: #6c757d;
        }
        .btn-outline-success:hover {
            color: #fff;
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-outline-danger {
            color: #dc3545;
            border-color: #dc3545;
        }
        .btn-outline-danger:hover {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
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
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-secondary text-white text-center">
                    <h3 class="mb-0">Tambah Data Penulis</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('penuliss.store') }}" method="POST" enctype="multipart/form-data">
                        
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Id Penulis</label>
                            <input type="text" class="form-control @error('id_penulis') is-invalid @enderror" name="id_penulis" value="{{ old('id_penulis') }}" placeholder="Masukkan Id Penulis">
                            @error('id_penulis')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Penulis</label>
                            <input type="text" class="form-control @error('nama_penulis') is-invalid @enderror" name="nama_penulis" value="{{ old('nama_penulis') }}" placeholder="Masukkan Nama Penulis">
                            @error('nama_penulis')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" placeholder="Masukkan Tanggal Lahir">
                            @error('tanggal_lahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Masukkan Email">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="3" placeholder="Masukkan Alamat">{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-outline-success me-md-2">Simpan</button>
                            <button type="reset" class="btn btn-outline-danger">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="mt-3 text-start">
                <a href="{{ route('penuliss.index') }}" class="btn btn-outline-dark">Kembali</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
