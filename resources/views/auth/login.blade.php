<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-color: #F0E7F0; 
        }
        .card {
            margin-top: 100px;
            border-radius: 15px;
            box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.1);
        }
        .card-header {
            background-color: #D8BFD8; 
            border-bottom: none;
            border-radius: 15px 15px 0 0;
        }
        .btn-primary {
            background-color: #6A5ACD; 
            border: none;
        }
        .btn-primary:hover {
            background-color: #483D8B;
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Login</h4>
                </div>
                <div class="card-body">
                    @if (session('status')) 
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" required>
                                <span class="input-group-text" id="toggle-password">
                                    <i class="bi bi-eye-slash" id="eye-icon"></i>
                                </span>
                            </div>
                        </div><br>
                        <div class="d-flex justify-content-between mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Remember Me</label>
                            </div>
                            <a href="{{ route('password.request') }}">Forgot Password</a>
                        </div><br>
                        <center><button type="submit" class="btn btn-primary btn-block mt-9">Login</button></center><br>
                        <div class="text-center">
                            <a>Belum ada akun? <a href="{{ route('register') }}">Coba Register Akun Anda</a></a>
                        </div>
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
</script>
</body>
</html>
