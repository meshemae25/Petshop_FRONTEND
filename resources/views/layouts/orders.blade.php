<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawShop Orders Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
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
            z-index: 1000;
        }

        .main-content {
            flex: 1;
            margin-left: 125px;
            transition: var(--transition);
            padding: 20px;
        }

        .sidebar-header {
            padding: 20px;
            display: flex;
            align-items: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
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

        /* Order Dashboard Specific Styles */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .filter-bar {
            background-color: white;
            border-radius: var(--border-radius);
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        .orders-table {
            background-color: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        .table {
            margin-bottom: 0;
        }

        .table th {
            background-color: #f8f9fa;
            border-top: none;
            font-weight: 600;
            color: var(--light-text);
        }

        .table td, .table th {
            padding: 15px;
            vertical-align: middle;
        }

        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            display: inline-block;
            min-width: 80px;
            text-align: center;
        }

        .status-pending {
            background-color: #ffc107;
            color: #212529;
        }

        .status-shipped {
            background-color: #17a2b8;
            color: white;
        }

        .status-delivered {
            background-color: #28a745;
            color: white;
        }

        .status-cancelled {
            background-color: #dc3545;
            color: white;
        }

        .action-btn {
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            margin-right: 5px;
            transition: var(--transition);
        }

        .view-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
        }

        .view-btn:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }

        .update-btn {
            background-color: #28a745;
            color: white;
            border: none;
        }

        .update-btn:hover {
            background-color: #218838;
            transform: translateY(-2px);
        }

        .pagination-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            background-color: white;
            border-top: 1px solid #e9ecef;
        }

        .page-link {
            padding: 5px 10px;
            margin: 0 3px;
            border-radius: 5px;
        }

        .page-link.active {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        /* Modal Styles */
        .modal-content {
            border-radius: var(--border-radius);
            border: none;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .modal-header {
            border-bottom: 1px solid #e9ecef;
            padding: 15px 20px;
        }

        .modal-body {
            padding: 20px;
        }

        .modal-footer {
            border-top: 1px solid #e9ecef;
            padding: 15px 20px;
        }

        .order-details-section {
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e9ecef;
        }

        .order-details-section:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .detail-label {
            font-weight: 600;
            color: var(--light-text);
        }

        .action-modal-btn {
            border-radius: 20px;
            padding: 8px 15px;
            margin-right: 10px;
        }

        /* Responsive adjustments */
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
            .filter-bar .row {
                flex-direction: column;
            }
            .filter-bar .col-md-3 {
                margin-bottom: 10px;
            }
        }
    </style>
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
                
                <a href="{{ route('orders.index') }}" class="sidebar-item {{ request()->routeIs('order.index') ? 'active' : '' }}">
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
                
                <a href="{{ route('logout') }}" class="sidebar-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="sidebar-text">Logout</span>
                </a>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>
    </div>

    @yield('scripts')
</body>
</html>
