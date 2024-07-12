<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Buku - Alisa Laravel 11</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table tbody tr td {
            vertical-align: middle;
        }
        .btn-group .btn {
            margin-right: 5px;
            margin-bottom: 5px;
        }
        .btn-edit {
            margin-right: 0; 
        }
        .btn-group {
            display: flex;
            justify-content: center;
        }
        .pagination .page-item.active .page-link {
            background-color: #D8BFD8;
            border-color: #D8BFD8; 
            color: white; 
        }
        .pagination .page-link {
            color: #6A5ACD; 
        }
        .pagination .page-link:hover {
            background-color: #E6E6FA;
            border-color: #E6E6FA;
        }
        .pagination .page-item.disabled .page-link {
            color: #D8BFD8; 
        }
        #searchInput {
            border-radius: 20px;
            border: 1px solid #D8BFD8;
            padding: 10px 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        #searchInput:focus {
            outline: none;
            border-color: #6A5ACD;
            box-shadow: 0 0 15px rgba(106, 90, 205, 0.5);
        }
    </style>
</head>
<body style="background-color: #F0E7F0;">

<nav class="navbar navbar-expand-lg" style="background-color: #D8BFD8;">
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
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" style="color: black;">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h3 class="text-center my-4">Data Buku - Alisa Laravel 11</h3>
                <hr>
                <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
                Data Buku Berhasil di tambahkan^_^  
            </div>
            </div>
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <center>
                        <a href="{{ route('bukus.create') }}" class="btn btn-md btn-outline-dark mb-3">[+] Tambah Data Buku</a>
                    </center>
                    <form class="d-flex mb-3">
                        <input class="form-control" type="search" id="searchInput" placeholder="Cari Data Tabel" aria-label="Search">
                    </form>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Id Buku</th>
                                <th scope="col">Nama Penulis</th>
                                <th scope="col">Foto Buku</th>
                                <th scope="col">Judul Buku</th>
                                <th scope="col">Tahun Terbit</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Stok</th>
                                <th scope="col" style="width: 20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bukus as $buku)
                                <tr>
                                    <td>{{ $buku->id_buku }}</td>
                                    <td>{{ $buku->penulis->nama_penulis}}</td>
                                    <td class="text-center align-middle">
                                        <img src="/storage/{{$buku->foto_buku}}" class="rounded" style="width: 150px">
                                    </td>
                                    <td>{{ $buku->judul_buku }}</td>
                                    <td>{{ $buku->tahun_terbit }}</td>
                                    <td>{!! $buku->deskripsi !!}</td>
                                    <td>{{ "Rp " . number_format($buku->harga, 2, ',', '.') }}</td>
                                    <td>{{ $buku->stok }}</td>
                                    <td class="text-center align-middle">
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <a href="{{ route('bukus.show', $buku->id_buku) }}" class="btn btn-sm btn-outline-success">Detail</a>
                                            <a href="{{ route('bukus.edit', $buku->id_buku) }}" class="btn btn-sm btn-outline-warning btn-edit">Edit</a>
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('bukus.destroy', $buku->id_buku) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9">
                                        <div class="alert alert-danger text-center">
                                            Data buku belum tersedia.
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <!-- Pagination links -->
                    {{ $bukus->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        var input = this.value.toLowerCase();
        var rows = document.querySelectorAll('table tbody tr');
        rows.forEach(function(row) {
            var text = row.textContent.toLowerCase();
            row.style.display = text.includes(input) ? '' : 'none';
        });
    });

    @if(session('success'))
        Swal.fire({
            icon: "success",
            title: "BERHASIL",
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2000
        });
    @elseif(session('error'))
        Swal.fire({
            icon: "error",
            title: "GAGAL!",
            text: "{{ session('error') }}",
            showConfirmButton: false,
            timer: 2000
        });
    @endif
</script>

</body>
</html>
