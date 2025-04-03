@extends('layouts.orders')

@section('content')

<div class="main-content">
            <div class="page-header">
                <h1 class="h3">Orders Dashboard</h1>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="exportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-download me-1"></i> Export
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="exportDropdown">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-file-csv me-2"></i>Export as CSV</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-file-excel me-2"></i>Export as Excel</a></li>
                    </ul>
                </div>
            </div>

            <!-- Filter Bar -->
            <div class="filter-bar">
                <div class="row g-2 align-items-center">
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0">
                                <i class="fas fa-search text-muted"></i>
                            </span>
                            <input type="text" class="form-control border-start-0" placeholder="Search by Order ID, Customer, or Tracking Number">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <select class="form-select">
                            <option selected>All Statuses</option>
                            <option>Pending</option>
                            <option>Processing</option>
                            <option>Shipped</option>
                            <option>Delivered</option>
                            <option>Cancelled</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-select">
                            <option selected>All Payment Methods</option>
                            <option>Credit Card</option>
                            <option>PayPal</option>
                            <option>Bank Transfer</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <div class="input-group">
                            <span class="input-group-text bg-white">
                                <i class="fas fa-calendar text-muted"></i>
                            </span>
                            <input type="date" class="form-control" value="2025-03-18">
                        </div>
                    </div>
                    <div class="col-md-1 text-center">
                        <span class="fw-bold">to</span>
                    </div>
                    <div class="col-md-2">
                        <div class="input-group">
                            <span class="input-group-text bg-white">
                                <i class="fas fa-calendar text-muted"></i>
                            </span>
                            <input type="date" class="form-control" value="2025-03-18">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Orders Table -->
            <div class="orders-table">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Total Amount</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>ORD-2025-8742</td>
                            <td>John Smith</td>
                            <td>Mar 15, 2025</td>
                            <td><span class="status-badge status-pending">Pending</span></td>
                            <td>₱129.99</td>
                            <td>
                                <button class="btn action-btn view-btn" data-bs-toggle="modal" data-bs-target="#orderDetailsModal">
                                    <i class="fas fa-eye me-1"></i> View
                                </button>
                                <button class="btn action-btn update-btn" data-bs-toggle="modal" data-bs-target="#updateStatusModal">
                                    <i class="fas fa-edit me-1"></i> Update
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>ORD-2025-8741</td>
                            <td>Emma Johnson</td>
                            <td>Mar 14, 2025</td>
                            <td><span class="status-badge status-shipped">Shipped</span></td>
                            <td>₱239.50</td>
                            <td>
                                <button class="btn action-btn view-btn">
                                    <i class="fas fa-eye me-1"></i> View
                                </button>
                                <button class="btn action-btn update-btn">
                                    <i class="fas fa-edit me-1"></i> Update
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>ORD-2025-8740</td>
                            <td>Michael Brown</td>
                            <td>Mar 13, 2025</td>
                            <td><span class="status-badge status-delivered">Delivered</span></td>
                            <td>₱75.25</td>
                            <td>
                                <button class="btn action-btn view-btn">
                                    <i class="fas fa-eye me-1"></i> View
                                </button>
                                <button class="btn action-btn update-btn">
                                    <i class="fas fa-edit me-1"></i> Update
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>ORD-2025-8739</td>
                            <td>Sarah Davis</td>
                            <td>Mar 12, 2025</td>
                            <td><span class="status-badge status-cancelled">Cancelled</span></td>
                            <td>₱195.80</td>
                            <td>
                                <button class="btn action-btn view-btn">
                                    <i class="fas fa-eye me-1"></i> View
                                </button>
                                <button class="btn action-btn update-btn">
                                    <i class="fas fa-edit me-1"></i> Update
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="pagination-container">
                    <div>
                        <span class="text-muted">Showing 1 to 4 of 24 results</span>
                    </div>
                    <nav aria-label="Page navigation">
                        <ul class="pagination m-0">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link active" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">6</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Order Details Modal -->
    <div class="modal fade" id="orderDetailsModal" tabindex="-1" aria-labelledby="orderDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderDetailsModalLabel">Order Details: ORD-2025-8742</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Customer Information -->
                    <div class="order-details-section">
                        <h6 class="fw-bold mb-3">Customer Information</h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <p><span class="detail-label">Name:</span> John Smith</p>
                                <p><span class="detail-label">Address:</span> 123 Main St, Apt 4B, New York, NY 10001</p>
                            </div>
                            <div class="col-md-6">
                                <p><span class="detail-label">Email:</span> john.smith@example.com</p>
                                <p><span class="detail-label">Phone:</span> (555) 123-4567</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Order Items -->
                    <div class="order-details-section">
                        <h6 class="fw-bold mb-3">Order Items</h6>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Premium Headphones</td>
                                        <td>1</td>
                                        <td>₱89.99</td>
                                        <td>₱89.99</td>
                                    </tr>
                                    <tr>
                                        <td>Wireless Charger</td>
                                        <td>2</td>
                                        <td>₱19.99</td>
                                        <td>₱39.98</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" class="text-end fw-bold">Subtotal:</td>
                                        <td>₱129.97</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-end fw-bold">Tax:</td>
                                        <td>₱0.00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-end fw-bold">Shipping:</td>
                                        <td>₱0.00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-end fw-bold">Total:</td>
                                        <td class="fw-bold">₱129.97</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    
                    <!-- Payment Details -->
                    <div class="order-details-section">
                        <h6 class="fw-bold mb-3">Payment Details</h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <p><span class="detail-label">Method:</span> Credit Card (Visa ending in 4242)</p>
                                <p><span class="detail-label">Status:</span> Paid</p>
                            </div>
                            <div class="col-md-6">
                                <p><span class="detail-label">Transaction ID:</span> TXN-5896-7412</p>
                                <p><span class="detail-label">Payment Date:</span> Mar 15, 2025</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Shipping Details -->
                    <div class="order-details-section">
                        <h6 class="fw-bold mb-3">Shipping Details</h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <p><span class="detail-label">Courier:</span> FedEx</p>
                                <p><span class="detail-label">Tracking Number:</span> FDX-12345-6789</p>
                            </div>
                            <div class="col-md-6">
                                <p><span class="detail-label">Estimated Delivery Date:</span> Mar 18, 2025</p>
                                <p><span class="detail-label">Current Status:</span> In Transit</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info action-modal-btn">
                        <i class="fas fa-bell me-1"></i> Send Notification
                    </button>
                    <button type="button" class="btn btn-danger action-modal-btn">
                        <i class="fas fa-undo me-1"></i> Issue Refund
                    </button>
                    <button type="button" class="btn btn-secondary action-modal-btn">
                        <i class="fas fa-print me-1"></i> Print Order
                    </button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Status Modal -->
    <div class="modal fade" id="updateStatusModal" tabindex="-1" aria-labelledby="updateStatusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateStatusModalLabel">Update Order Status: ORD-2025-8742</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="orderStatus" class="form-label">Update Order Status</label>
                        <select class="form-select" id="orderStatus">
                            <option selected disabled>Select Status</option>
                            <option>Processing</option>
                            <option>Shipped</option>
                            <option>Delivered</option>
                            <option>Cancelled</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Update Status</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })

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
                const isClickInsideSidebar = sidebar && sidebar.contains(event.target);
                const isClickInsideToggle = toggleBtn && toggleBtn.contains(event.target);
                
                if (sidebar && !isClickInsideSidebar && !isClickInsideToggle && window.innerWidth < 576) {
                    sidebar.classList.remove('show');
                }
            });
        });
    </script>
</body>
</html>
@endsection