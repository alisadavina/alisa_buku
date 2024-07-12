<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F0E7F0; 
        }
        .sidebar {
            height: 100vh;
            position: fixed;
            width: 250px;
            background-color: #D8BFD8; 
            color: #6A5ACD;
            padding-top: 20px;
            transition: width 0.3s;
        }
        .sidebar a {
            color: #6A5ACD;
            display: block;
            padding: 15px;
            text-decoration: none;
            font-size: 1.1em;
            transition: background-color 0.3s;
        }
        .sidebar a:hover {
            background-color: #C9A0DC;
        }
        .sidebar i {
            margin-right: 10px;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.3s;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .card-header {
            background-color: #6A5ACD; 
            color: white;
            border-radius: 15px 15px 0 0;
            padding: 15px;
            font-size: 1.2em;
        }
        .card-body {
            background-color: white;
            padding: 20px;
            border-radius: 0 0 15px 15px;
        }
        .card-title {
            font-size: 1.2em;
            margin-bottom: 10px;
        }
        .btn-primary {
            background-color: #6A5ACD; 
            border: none;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #483D8B;
        }
</style>

</head>
<body>
    <div class="sidebar">
        <h3 class="text-center">Dashboard <br> User</h3><hr>
        <a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
    <div class="content">
        <h2 class="mb-4">Selamat data di halaman Dashboard User</h2>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
