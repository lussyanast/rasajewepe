<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel - RasaJeWePe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }

        .sidebar {
            height: 100vh;
            background-color: #212529;
            color: #fff;
            min-width: 230px;
        }

        .sidebar .brand {
            font-family: 'Italiana', serif;
            font-size: 1.6rem;
        }

        .sidebar .nav-link {
            color: #ccc;
            transition: all 0.2s ease;
            border-radius: 0.25rem;
        }

        .sidebar .nav-link:hover {
            background-color: #343a40;
            color: #fff;
        }

        .sidebar .nav-link.active {
            background-color: #495057;
            color: #fff;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        {{-- Sidebar --}}
        <div class="sidebar d-flex flex-column p-3">
            {{-- Brand --}}
            <div class="text-center mb-4">
                <a href="{{ url('/') }}" class="text-decoration-none text-light brand">
                    RasaJeWePe
                </a>
            </div>

            {{-- Navigasi --}}
            <nav class="flex-fill">
                <a href="{{ url('/admin/dashboard') }}"
                    class="nav-link px-3 py-2 {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                    Dashboard
                </a>
                <a href="{{ url('/admin/menus') }}"
                    class="nav-link px-3 py-2 {{ request()->is('admin/menus*') ? 'active' : '' }}">
                    Kelola Menu
                </a>
                <a href="{{ url('/admin/categories') }}"
                    class="nav-link px-3 py-2 {{ request()->is('admin/categories*') ? 'active' : '' }}">
                    Kelola Kategori
                </a>
                <a href="{{ url('/admin/orders') }}"
                    class="nav-link px-3 py-2 {{ request()->is('admin/orders*') ? 'active' : '' }}">
                    Kelola Pesanan
                </a>
                <a href="{{ url('/admin/testimonials') }}"
                    class="nav-link px-3 py-2 {{ request()->is('admin/testimonials*') ? 'active' : '' }}">
                    Kelola Testimoni
                </a>
                <a href="{{ url('/admin/galleries') }}"
                    class="nav-link px-3 py-2 {{ request()->is('admin/galleries*') ? 'active' : '' }}">
                    Kelola Galeri
                </a>
                <a href="{{ url('/admin/reports') }}"
                    class="nav-link px-3 py-2 {{ request()->is('admin/reports*') ? 'active' : '' }}">
                    Laporan
                </a>
            </nav>

            {{-- Logout --}}
            <div class="mt-auto text-center">
                <form method="POST" action="{{ url('/admin/logout') }}">
                    @csrf
                    <button class="btn btn-outline-danger btn-sm w-100">Logout</button>
                </form>
            </div>
        </div>

        {{-- Konten Utama --}}
        <div class="flex-fill p-4" style="background-color: #f8f9fa;">
            @yield('content')
        </div>
    </div>
</body>

</html>