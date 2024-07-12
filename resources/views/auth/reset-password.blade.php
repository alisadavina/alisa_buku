<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
                    <h4>Reset Password</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('ps.email') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" value="{{ old('email' , request('email')) }}" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
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
