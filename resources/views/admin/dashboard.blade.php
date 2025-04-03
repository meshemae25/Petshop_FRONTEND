@extends('layouts.dashboard')

@section('content')
<div class="container-fluid p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2 mb-0">Dashboard</h1>
        <div class="text-end">
            <span class="text-secondary me-2">{{ date('F d, Y') }}</span>
        </div>
    </div>

    <!-- Key Metrics Cards -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h6 class="text-secondary mb-3">Daily Sales</h6>
                    <h3 class="mb-0">₱ 150,000</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h6 class="text-secondary mb-3">New Orders</h6>
                    <h3 class="mb-0">25</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h6 class="text-secondary mb-3">Low Stock Items</h6>
                    <h3 class="mb-0">70</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <!-- Monthly Revenue Chart -->
        <div class="col-lg-8 mb-4 mb-lg-0">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title mb-0">Monthly Revenue</h5>
                        <div>
                            <small class="text-secondary">This week vs website and compared with e-commerce stats</small>
                        </div>
                    </div>
                    <div class="chart-container" style="height: 250px;">
                        <canvas id="monthlyRevenueChart"></canvas>
                    </div>
                    <div class="mt-3 d-flex justify-content-end">
                        <span class="me-4">
                            <span class="badge bg-primary">&nbsp;</span>
                            <small class="ms-1">Physical</small>
                        </span>
                        <span>
                            <span class="badge bg-info">&nbsp;</span>
                            <small class="ms-1">Digital</small>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sales By Category -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <h5 class="card-title mb-4">Sales By Category</h5>
                    <div class="chart-container" style="height: 250px;">
                        <canvas id="categoryChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Recent Orders Table -->
        <div class="col-lg-8 mb-4 mb-lg-0">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h5 class="card-title mb-4">Recent Orders</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#1001</td>
                                    <td>Juan Dela Cruz</td>
                                    <td>April 2, 2025</td>
                                    <td>₱ 3,500</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                    <td><button class="btn btn-sm btn-primary">View</button></td>
                                </tr>
                                <tr>
                                    <td>#1002</td>
                                    <td>Maria Santos</td>
                                    <td>April 2, 2025</td>
                                    <td>₱ 1,200</td>
                                    <td><span class="badge bg-warning text-dark">Pending</span></td>
                                    <td><button class="btn btn-sm btn-primary">View</button></td>
                                </tr>
                                <tr>
                                    <td>#1003</td>
                                    <td>Pedro Flores</td>
                                    <td>April 1, 2025</td>
                                    <td>₱ 7,800</td>
                                    <td><span class="badge bg-danger">Cancelled</span></td>
                                    <td><button class="btn btn-sm btn-primary">View</button></td>
                                </tr>
                                <tr>
                                    <td>#1004</td>
                                    <td>Ana Reyes</td>
                                    <td>April 1, 2025</td>
                                    <td>₱ 5,600</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                    <td><button class="btn btn-sm btn-primary">View</button></td>
                                </tr>
                                <tr>
                                    <td>#1005</td>
                                    <td>Maria Rai</td>
                                    <td>April 1, 2025</td>
                                    <td>₱ 980</td>
                                    <td><span class="badge bg-success">Delivered</span></td>
                                    <td><button class="btn btn-sm btn-primary">View</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Inventory Alerts -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h5 class="card-title mb-4">Inventory Alerts</h5>
                    <div class="alert alert-danger d-flex align-items-center mb-3" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <div>Dog Food (Premium) - 2 items left</div>
                    </div>
                    <div class="alert alert-warning d-flex align-items-center mb-3" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <div>Cat Toys (Catnip Mouse) - 5 items left</div>
                    </div>
                    <div class="alert alert-warning d-flex align-items-center mb-3" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <div>Dog Leash (Medium) - 8 items left</div>
                    </div>
                    <div class="alert alert-warning d-flex align-items-center" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <div>Bird Cage (Small) - 10 items left</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Monthly Revenue Chart
        const monthlyRevenueCtx = document.getElementById('monthlyRevenueChart').getContext('2d');
        const monthlyRevenueChart = new Chart(monthlyRevenueCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                datasets: [
                    {
                        label: 'Physical Store',
                        data: [150000, 175000, 140000, 180000, 200000, 160000, 130000],
                        backgroundColor: '#0099ff',
                        borderWidth: 0,
                        borderRadius: 5,
                        barPercentage: 0.6,
                        categoryPercentage: 0.7
                    },
                    {
                        label: 'Online Store',
                        data: [100000, 125000, 110000, 90000, 105000, 125000, 150000],
                        backgroundColor: '#90cdf4',
                        borderWidth: 0,
                        borderRadius: 5,
                        barPercentage: 0.6,
                        categoryPercentage: 0.7
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return '₱' + value.toLocaleString();
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // Category Sales Chart
        const categoryCtx = document.getElementById('categoryChart').getContext('2d');
        const categoryChart = new Chart(categoryCtx, {
            type: 'doughnut',
            data: {
                labels: ['Dog Products', 'Cat Products', 'Bird Products', 'Other Pets'],
                datasets: [{
                    data: [45, 30, 15, 10],
                    backgroundColor: ['#0099ff', '#36b9cc', '#ffcc00', '#adb5bd'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                },
                cutout: '70%'
            }
        });
    });
</script>

<!-- Toggle sidebar functionality -->
<script>
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
            const isClickInsideSidebar = sidebar && sidebar.contains(event.target);
            const isClickInsideToggle = toggleBtn && toggleBtn.contains(event.target);
            
            if (sidebar && !isClickInsideSidebar && !isClickInsideToggle && window.innerWidth < 576) {
                sidebar.classList.remove('show');
            }
        });
    });
</script>
@endsection