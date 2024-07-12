<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Penulis - Alisa Laravel 11</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #F0E7F0;
        }
        .navbar {
            background-color: #D8BFD8;
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
        .search-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .search-container input {
            width: 50%;
            border-radius: 25px;
            padding: 10px 20px;
            border: 2px solid #D8BFD8;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
                <h3 class="text-center my-4">Data Penulis Buku - Alisa Laravel 11</h3>
                <hr>
            </div>
            <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
                Data Penulis Buku Berhasil di tambahkan^_^  
            </div>
            </div>
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <center>
                        <a href="{{ route('penuliss.create') }}" class="btn btn-md btn-outline-dark mb-3">[+] Tambah Data Penulis Buku</a>
                    </center>
                    <div class="search-container">
                        <input class="form-control" type="search" id="searchInput" placeholder="Cari Data Tabel" aria-label="Search">
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No. </th>
                                <th scope="col">Id Penulis</th>
                                <th scope="col">Nama Penulis</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Email</th>
                                <th scope="col">Alamat</th>
                                <th scope="col" style="width: 20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($penuliss as $index => $penulis)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $penulis->id_penulis }}</td>
                                    <td>{{ $penulis->nama_penulis }}</td>
                                    <td>{{ $penulis->tanggal_lahir }}</td>
                                    <td>{{ $penulis->email }}</td>
                                    <td>{{ $penulis->alamat }}</td>
                                    <td class="text-center">
                                        <div class="btn-group d-flex align-items-center justify-content-center" role="group" aria-label="Basic mixed styles example">
                                            <a href="{{ route('penuliss.show', $penulis->id_penulis) }}" class="btn btn-sm btn-outline-success me-1">Detail</a>
                                            <a href="{{ route('penuliss.edit', $penulis->id_penulis) }}" class="btn btn-sm btn-outline-warning me-1">Edit</a>
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('penuliss.destroy', $penulis->id_penulis) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">
                                        <div class="alert alert-danger text-center">
                                            Data Penulis Buku Belum Tersedia.
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $penuliss->links('vendor.pagination.bootstrap-5') }}
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
