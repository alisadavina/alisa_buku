<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f3e5f5;
            font-family: 'Arial', sans-serif;
        }
        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #ce93d8; 
            color: white;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
            text-align: center;
            font-size: 1.5rem;
            padding: 1rem;
        }
        .form-label {
            font-weight: bold;
            color: #7b1fa2; 
        }
        .form-control {
            border-radius: 0.5rem;
        }
        .btn-primary {
            background-color: #ce93d8; 
            border: none;
            border-radius: 0.5rem;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #ba68c8;
        }
        .input-group-text {
            background-color: #D8BFD8; 
            border-left: none;
            cursor: pointer;
        }
        .form-control {
            border-right: none;
        }
        .bi-eye, .bi-eye-slash {
            color: #6A5ACD; 
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><p class="fw-bolder colotext-dark">Form Register</p></div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('toggle-password').addEventListener('click', function () {
        const password = document.getElementById('password');
        const eyeIcon = document.getElementById('eye-icon');
        if (password.type === 'password') {
            password.type = 'text';
            eyeIcon.classList.remove('bi-eye-slash');
            eyeIcon.classList.add('bi-eye');
        } else {
            password.type = 'password';
            eyeIcon.classList.remove('bi-eye');
            eyeIcon.classList.add('bi-eye-slash');
        }
    });
    
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 2000
        });
    @elseif(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: '{{ session('error') }}',
            showConfirmButton: false,
            timer: 2000
        });
    @endif
</body>
</html>
