<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RasaJeWePe</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Italiana&family=Open+Sans:wght@400;600;700&display=swap"
        rel="stylesheet">

    <!-- Global Styling -->
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            font-size: 1rem;
            color: #333;
            line-height: 1.6;
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            font-weight: 600;
        }

        .navbar-brand {
            font-family: 'Italiana', serif;
            font-size: 1.8rem;
        }

        footer h5,
        footer h6 {
            font-weight: 700;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">RasaJeWePe</a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="footer bg-dark text-light mt-5 py-4">
        <div class="container">
            <div class="row text-center text-md-start">
                <div class="col-md-4 mb-3">
                    <h5 class="mb-2" style="font-family: 'Italiana', serif;">RasaJeWePe</h5>
                    <p style="font-size: 0.9rem;">Layanan catering premium untuk acara spesial Anda.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h6 class="text-uppercase fw-bold mb-2">Menu</h6>
                    <ul class="list-unstyled">
                        <li><a href="/catalog" class="text-light text-decoration-none">Katalog</a></li>
                        <li><a href="/order" class="text-light text-decoration-none">Pesan</a></li>
                        <li><a href="/gallery" class="text-light text-decoration-none">Galeri</a></li>
                        <li><a href="/testimonials" class="text-light text-decoration-none">Testimoni</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3">
                    <h6 class="text-uppercase fw-bold mb-2">Kontak Kami</h6>
                    <p style="font-size: 0.9rem;">
                        Jl. Makanan Enak No. 17, Jakarta<br>
                        Email: info@rasajewepe.com<br>
                        Telp: 0812-3456-7890
                    </p>
                </div>
            </div>
            <hr class="border-light">
            <div class="text-center" style="font-size: 0.85rem;">
                © {{ date('Y') }} RasaJeWePe. All rights reserved.
            </div>
        </div>
    </footer>

</body>

</html>