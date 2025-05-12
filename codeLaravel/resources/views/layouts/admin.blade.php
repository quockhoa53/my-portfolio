<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <x-head.tinymce-config/>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <div class="logo">
            <img src="{{URL('images/khoa.png')}}" alt="Logo">
            <span class="logo-text">My Profile</span>
        </div>
        <a href="{{ route('admin.profile') }}" class="nav-item {{ request()->routeIs('admin.profile') ? 'active' : '' }}">
            <i class="fas fa-user me-2"></i>
            <span class="nav-text">Profile</span>
        </a>
        <a href="{{ route('admin.project') }}" class="nav-item {{ request()->routeIs('admin.project') ? 'active' : '' }}">
            <i class="fas fa-project-diagram me-2"></i>
            <span class="nav-text">Dự án</span>
        </a>
        <a href="{{ route('admin.knowledge') }}" class="nav-item {{ request()->routeIs('admin.knowledge') ? 'active' : '' }}">
            <i class="fas fa-book me-2"></i>
            <span class="nav-text">Kho kiến thức</span>
        </a>
        <form action="{{ route('logout') }}" method="POST" style="margin: 0; padding: 0;">
            @csrf
            <button type="submit" class="nav-item logout-btn">
                <i class="fas fa-sign-out-alt me-2"></i>
                <span class="nav-text">Đăng xuất</span>
            </button>
        </form>
    </div>
    <div class="content">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const sidebar = document.getElementById('sidebar');
        sidebar.addEventListener('mouseenter', () => {
            sidebar.classList.add('expanded');
        });
        sidebar.addEventListener('mouseleave', () => {
            sidebar.classList.remove('expanded');
        });
    </script>
</body>
</html>