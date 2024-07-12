<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 Forbidden</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #F0E7F0; 
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .error-container {
            text-align: center;
        }
        .error-code {
            font-size: 10rem;
            font-weight: bold;
            color: #6A5ACD; 
        }
        .error-message {
            font-size: 1.5rem;
            color: #483D8B;
        }
    </style>
</head>
<body>
<div class="error-container">
    <div class="error-code">403</div>
    <div class="error-message">Maaf, Anda tidak memiliki izin untuk mengakses halaman ini.</div>
    <a href="{{ route('login') }}" class="btn btn-primary mt-3">pergi ke Login</a>
</div>
</body>
</html>
