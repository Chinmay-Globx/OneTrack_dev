<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ERP CRM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            overflow-x: hidden;
        }
        .sidebar {
            width: 240px;
            height: 100vh;
            position: fixed;
            top: 56px; /* below header */
            left: 0;
            background-color: #f8f9fa; /* ERPNext light sidebar */
            border-right: 1px solid #dee2e6;
            padding-top: 1rem;
        }
        .content {
            margin-left: 240px;
            margin-top: 56px;
            padding: 20px;
        }
        .navbar-brand {
            font-weight: bold;
            color: #0d6efd !important; /* ERPNext blue */
        }
        .sidebar a {
            color: #333;
            display: block;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 6px;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #e9ecef;
            color: #0d6efd;
        }
        .dropdown-menu {
            right: 0;
            left: auto;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom fixed-top shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dashboard') }}">ERP CRM</a>

            <div class="dropdown ms-auto">
                <button class="btn btn-light border-0" type="button" id="userMenu" data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle fs-4"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="userMenu">
                    <li><a class="dropdown-item" href="#">My Profile</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="{{ route('dashboard') }}" class="active"><i class="bi bi-house-door"></i> Dashboard</a>
        <a href="#"><i class="bi bi-people"></i> Customers</a>
        <a href="#"><i class="bi bi-cart"></i> Sales</a>
        <a href="#"><i class="bi bi-bar-chart"></i> Reports</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
