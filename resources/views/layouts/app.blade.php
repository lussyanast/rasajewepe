<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RasaJeWePe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">RasaJeWePe</a>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <footer class="text-center py-4 mt-5 bg-light">
        <small>© {{ date('Y') }} RasaJeWePe. All rights reserved.</small>
    </footer>
</body>
</html>
