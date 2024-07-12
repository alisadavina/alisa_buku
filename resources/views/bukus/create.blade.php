<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Buku - Alisa Laravel 11</title>
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
        .btn-outline-warning {
            color: #ffc107;
            border-color: #ffc107;
        }
        .btn-outline-warning:hover {
            color: #fff;
            background-color: #ffc107;
            border-color: #ffc107;
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
                    <h3 class="mb-0">Tambah Buku</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('bukus.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Form Inputs -->
                        <div class="mb-3">
                            <label class="form-label">Foto Buku</label>
                            <input type="file" class="form-control @error('foto_buku') is-invalid @enderror" name="foto_buku">
                            @error('foto_buku')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Id Buku</label>
                            <input type="text" class="form-control @error('id_buku') is-invalid @enderror" name="id_buku" value="{{ old('id_buku') }}" placeholder="Masukkan Id Buku">
                            @error('id_buku')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Id Penulis</label>
                            <select name="id_penulis" id="id_penulis" class="form-select">
                                <option selected disabled>Pilih Penulis</option>
                                @foreach ($penulis as $data)
                                    <option value="{{ $data->id_penulis }}">{{ $data->nama_penulis }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Judul Buku</label>
                            <input type="text" class="form-control @error('judul_buku') is-invalid @enderror" name="judul_buku" value="{{ old('judul_buku') }}" placeholder="Masukkan Judul Buku">
                            @error('judul_buku')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tahun Terbit</label>
                                <input type="number" class="form-control @error('tahun_terbit') is-invalid @enderror" name="tahun_terbit" value="{{ old('tahun_terbit') }}" placeholder="Masukkan Tahun Terbit Buku">
                                @error('tahun_terbit')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Harga</label>
                                <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga') }}" placeholder="Masukkan Harga Buku">
                                @error('harga')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="5" placeholder="Masukkan Deskripsi Buku">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Stok</label>
                            <input type="number" class="form-control @error('stok') is-invalid @enderror" name="stok" value="{{ old('stok') }}" placeholder="Masukkan Stok Buku">
                            @error('stok')
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
                <a href="{{ route('bukus.index') }}" class="btn btn-outline-dark">Kembali</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
