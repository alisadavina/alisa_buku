<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Buku - Alisa Laravel 11</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #F0E7F0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar {
            background-color: #D8BFD8;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
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


<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm rounded border-0">
                <div class="card-header bg-light py-3">
                    <h4 class="card-title mb-0">Edit Data Buku</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('bukus.update', $buku->id_buku) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Id Buku -->
                        <div class="mb-3">
                            <label for="id_buku" class="form-label">Id Buku</label>
                            <input type="text" class="form-control @error('id_buku') is-invalid @enderror" id="id_buku" name="id_buku" value="{{ old('id_buku', $buku->id_buku) }}" placeholder="Masukkan Id Buku" required>
                            @error('id_buku')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Id Penulis -->
                        <div class="mb-3">
                            <label for="id_penulis" class="form-label">Penulis</label>
                            <select name="id_penulis" id="id_penulis" class="form-select">
                                <option selected disabled>Pilih Penulis</option>
                                @foreach ($penulis as $data)
                                    <option value="{{ $data->id_penulis }}" {{ $data->id_penulis == $buku->id_penulis ? 'selected' : '' }}>{{ $data->nama_penulis }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Foto Buku -->
                        <div class="mb-3">
                            <label for="foto_buku" class="form-label">Foto Buku</label>
                            <input type="file" class="form-control @error('foto_buku') is-invalid @enderror" id="foto_buku" name="foto_buku">
                            @error('foto_buku')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Judul Buku -->
                        <div class="mb-3">
                            <label for="judul_buku" class="form-label">Judul Buku</label>
                            <input type="text" class="form-control @error('judul_buku') is-invalid @enderror" id="judul_buku" name="judul_buku" value="{{ old('judul_buku', $buku->judul_buku) }}" placeholder="Masukkan Judul Buku" required>
                            @error('judul_buku')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tahun Terbit -->
                        <div class="mb-3">
                            <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                            <input type="number" class="form-control @error('tahun_terbit') is-invalid @enderror" id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}" placeholder="Masukkan Tahun Terbit" required>
                            @error('tahun_terbit')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="5" placeholder="Masukkan Deskripsi Buku" required>{{ old('deskripsi', $buku->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Harga -->
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga', $buku->harga) }}" placeholder="Masukkan Harga Buku" required>
                            @error('harga')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Stok -->
                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" value="{{ old('stok', $buku->stok) }}" placeholder="Masukkan Stok Buku" required>
                            @error('stok')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tombol Update dan Reset -->
                        <div class="mb-3 d-grid">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('deskripsi');
</script>

</body>
</html>
