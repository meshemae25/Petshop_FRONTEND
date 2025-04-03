<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawShop Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Main Stylesheet for PawShop - Using the same CSS variables from navbar */
        :root {
            --primary-color: #0099ff;
            --primary-dark: #0077cc;
            --secondary-color: #f8f9fa;
            --accent-color: #ffcc00;
            --text-color: #212529;
            --light-text: #6c757d;
            --white: #ffffff;
            --gray-100: #f8f9fa;
            --gray-200: #e9ecef;
            --border-radius: 10px;
            --box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-color);
            background-color: #f5f8fa;
        }

        /* Admin-specific Styles */
        .admin-container {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: var(--primary-color);
            color: white;
            position: fixed;
            height: 100vh;
            transition: var(--transition);
        }

        .main-content {
            flex: 1;
            margin-left: 250px;
            transition: var(--transition);
        }

        .sidebar-header {
            padding: 20px;
            display: flex;
            align-items: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-header h3 {
            margin: 0;
            font-weight: 700;
            font-size: 1.25rem;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            color: white;
            text-decoration: none;
            font-weight: 700;
            font-size: 1.25rem;
        }

        .sidebar-brand img {
            margin-right: 10px;
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .sidebar-item {
            padding: 12px 20px;
            display: flex;
            align-items: center;
            color: rgba(255, 255, 255, 0.85);
            text-decoration: none;
            transition: var(--transition);
            border-left: 4px solid transparent;
        }

        .sidebar-item:hover, .sidebar-item.active {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            border-left: 4px solid white;
        }

        .sidebar-item i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        /* Common Button Styles - using the same styles from navbar */
        .btn {
            border-radius: 50px;
            padding: 10px 20px;
            font-weight: 600;
            transition: var(--transition);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover, .btn-primary:focus {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        /* Card Styles */
        .card {
            border-radius: var(--border-radius);
            overflow: hidden;
            transition: var(--transition);
        }

        .card:hover {
            box-shadow: var(--box-shadow);
            transform: translateY(-3px);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .sidebar {
                width: 70px;
            }
            .sidebar .sidebar-text {
                display: none;
            }
            .main-content {
                margin-left: 70px;
            }
        }

        @media (max-width: 576px) {
            .sidebar {
                width: 0;
                z-index: 1000;
            }
            .main-content {
                margin-left: 0;
            }
            .sidebar.show {
                width: 250px;
            }
            .sidebar.show .sidebar-text {
                display: inline;
            }
        }
    </style>
    @yield('styles')
</head>
<body>
    <div class="admin-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
                    <i class="fas fa-paw me-2"></i>
                    <span class="sidebar-text">PawShop</span>
                </a>
            </div>
            
            <div class="sidebar-menu">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-chart-line"></i>
                    <span class="sidebar-text">Dashboard</span>
                </a>
                
                <a href="{{ route('admin.index') }}" class="sidebar-item {{ request()->routeIs('admin.index') ? 'active' : '' }}">
                    <i class="fas fa-user-shield"></i>
                    <span class="sidebar-text">Admin</span>
                </a>
                
                <a href="{{ route('orders.index') }}" class="sidebar-item {{ request()->routeIs('orders.*') ? 'active' : '' }}">
                    <i class="fas fa-shopping-bag"></i>
                    <span class="sidebar-text">Orders</span>
                </a>
                
                <a href="{{ route('inventory.index') }}" class="sidebar-item {{ request()->routeIs('inventory.*') ? 'active' : '' }}">
                    <i class="fas fa-box-open"></i>
                    <span class="sidebar-text">Inventory</span>
                </a>
                
                <a href="{{ route('analytics.index') }}" class="sidebar-item {{ request()->routeIs('analytics.*') ? 'active' : '' }}">
                    <i class="fas fa-chart-bar"></i>
                    <span class="sidebar-text">Sales Analytics</span>
                </a>
                
                <a href="{{ route('promocodes.index') }}" class="sidebar-item {{ request()->routeIs('promocodes.*') ? 'active' : '' }}">
                    <i class="fas fa-tag"></i>
                    <span class="sidebar-text">Promo Codes</span>
                </a>
                
                <a href="{{ route('logout') }}" class="sidebar-item" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="sidebar-text">Logout</span>
                </a>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle sidebar on mobile
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.querySelector('.navbar-toggler');
            const sidebar = document.querySelector('.sidebar');
            
            if (toggleBtn) {
                toggleBtn.addEventListener('click', function() {
                    sidebar.classList.toggle('show');
                });
            }
            
            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(event) {
                const isClickInsideSidebar = sidebar.contains(event.target);
                const isClickInsideToggle = toggleBtn && toggleBtn.contains(event.target);
                
                if (!isClickInsideSidebar && !isClickInsideToggle && window.innerWidth < 576) {
                    sidebar.classList.remove('show');
                }
            });
        });
    </script>
    @yield('scripts')
</body>
</html>
