<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-Bi2A6imZLfksrbJl8hJLw+0LwkNfeJ+YcgOFqJnpnZOAI3TxgOmVqUKQvzXcs5NHSSVyyv6Q9Diwmbaj2j/qzA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* CSS untuk menyesuaikan tinggi foto dengan tinggi layar */
        .fullscreen-bg {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            overflow: hidden;
            z-index: -1;
        }

        .fullscreen-background {
         background-image: url('path/to/your/image.jpg'); /* Ganti dengan path yang sesuai */
         background-position: center;
         background-size: cover;
         height: 100vh; /* Menggunakan viewport height untuk membuat tinggi sesuai dengan layar */
         width: 100%;
        }

        .fullscreen-logo{
         background-image: url('path/to/your/image.jpg'); /* Ganti dengan path yang sesuai */
         background-position: center;
         background-size: cover;
         height: 10vh; /* Menggunakan viewport height untuk membuat tinggi sesuai dengan layar */
         width: 100%;
        }

        .overlay-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: dark;
            text-align: center;
        }
        
        
        
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="">
            <button class="btn btn-outline-info me-2" type="button"><head><link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet">
            </head><i class="">
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('login') ?>"><button class="btn btn-outline-info me-2" type="button">Login</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('register') ?>"><button class="btn btn-outline-info me-2" type="button">Register</button></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Foto -->
    <div class="fullscreen-bg">
        <img src="<?php echo base_url('assets/img/pemandangan.jfif'); ?>" alt="Foto" class="fullscreen-background">
        <div class="overlay-text">
        <div><h1>Selamat Datang</h1></div>
        <button class="btn btn-outline-info me-2" type="button"> <p class="text-dark">Aplikasi atau situs web galeri foto adalah sebuah platform yang memungkinkan pengguna untuk mengunggah, mengelola, dan menampilkan koleksi foto secara online.</p></button>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js" integrity="sha384-zRmNmuBpFphtQj79p7oSGmVj/MEIAnHlvPc0EE+Tc8mmdfov87xOKlVMI3uikvEy" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shCk+5KV5+6spWm20dkn4pZl3hKkV0kZ1Zy" crossorigin="anonymous"></script>
</body>
</html>