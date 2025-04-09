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
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="orderDetailsModalLabel">
                    <i class="fas fa-shopping-bag me-2 text-primary"></i>
                    Order #ORD-2025-8742
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <!-- Order Status Banner -->
                <div class="alert alert-info d-flex align-items-center mb-4" role="alert">
                    <i class="fas fa-truck me-2"></i>
                    <div>
                        <strong>Status:</strong> In Transit
                        <a href="#" class="ms-3 text-decoration-none" data-bs-toggle="modal" data-bs-target="#updateStatusModal">
                            <i class="fas fa-edit"></i> Update
                        </a>
                    </div>
                </div>
                
                <!-- Order Summary Card -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Order Summary</h6>
                        <span class="badge bg-success">Paid</span>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-3 col-6">
                                <small class="text-muted d-block">Order Date</small>
                                <span>Mar 15, 2025</span>
                            </div>
                            <div class="col-md-3 col-6">
                                <small class="text-muted d-block">Payment Method</small>
                                <span>Visa •••• 4242</span>
                            </div>
                            <div class="col-md-3 col-6">
                                <small class="text-muted d-block">Transaction ID</small>
                                <span>TXN-5896-7412</span>
                            </div>
                            <div class="col-md-3 col-6">
                                <small class="text-muted d-block">Est. Delivery</small>
                                <span>Mar 18, 2025</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-4">
                    <!-- Customer Information Card -->
                    <div class="col-md-6">
                        <div class="card shadow-sm h-100">
                            <div class="card-header bg-white">
                                <h6 class="mb-0"><i class="fas fa-user me-2 text-primary"></i>Customer Details</h6>
                            </div>
                            <div class="card-body">
                                <p class="mb-1"><strong>{{ $order->customer_name ?? 'John Smith' }}</strong></p>
                                <p class="mb-1 text-muted">{{ $order->customer_email ?? 'john.smith@example.com' }}</p>
                                <p class="mb-1">{{ $order->customer_phone ?? '(555) 123-4567' }}</p>
                                <hr>
                                <small class="text-muted">Shipping Address</small>
                                <p class="mb-0">{{ $order->shipping_address ?? '123 Main St, Apt 4B, New York, NY 10001' }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Shipping Information Card -->
                    <div class="col-md-6">
                        <div class="card shadow-sm h-100">
                            <div class="card-header bg-white">
                                <h6 class="mb-0"><i class="fas fa-truck me-2 text-primary"></i>Shipping Details</h6>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Courier</span>
                                    <strong>{{ $order->courier ?? 'FedEx' }}</strong>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Tracking Number</span>
                                    <strong>
                                        <a href="#" class="text-decoration-none">{{ $order->tracking_number ?? 'FDX-12345-6789' }}</a>
                                    </strong>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Shipping Method</span>
                                    <strong>{{ $order->shipping_method ?? 'Standard Shipping' }}</strong>
                                </div>
                                <div class="progress mt-3" style="height: 5px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 75%"></div>
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    <small>Shipped</small>
                                    <small>In Transit</small>
                                    <small class="text-muted">Delivered</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Order Items Card -->
                <div class="card shadow-sm mt-4">
                    <div class="card-header bg-white">
                        <h6 class="mb-0"><i class="fas fa-box-open me-2 text-primary"></i>Order Items</h6>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Product</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-end">Price</th>
                                        <th class="text-end">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($order->items ?? [] as $item)
                                        <tr>
                                            <td>{{ $item->product_name }}</td>
                                            <td class="text-center">{{ $item->quantity }}</td>
                                            <td class="text-end">₱{{ number_format($item->price, 2) }}</td>
                                            <td class="text-end">₱{{ number_format($item->price * $item->quantity, 2) }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>Premium Headphones</td>
                                            <td class="text-center">1</td>
                                            <td class="text-end">₱89.99</td>
                                            <td class="text-end">₱89.99</td>
                                        </tr>
                                        <tr>
                                            <td>Wireless Charger</td>
                                            <td class="text-center">2</td>
                                            <td class="text-end">₱19.99</td>
                                            <td class="text-end">₱39.98</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <div class="row">
                            <div class="col-md-6 offset-md-6">
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Subtotal</span>
                                    <span>₱{{ $order->subtotal ?? '129.97' }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Tax</span>
                                    <span>₱{{ $order->tax ?? '0.00' }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Shipping</span>
                                    <span>₱{{ $order->shipping_fee ?? '0.00' }}</span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <strong>Total</strong>
                                    <strong class="text-primary">₱{{ $order->total ?? '129.97' }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Order Timeline -->
                <div class="card shadow-sm mt-4">
                    <div class="card-header bg-white">
                        <h6 class="mb-0"><i class="fas fa-history me-2 text-primary"></i>Order Timeline</h6>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            @forelse($order->timeline ?? [] as $event)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="badge bg-secondary rounded-pill me-2">{{ $event->timestamp }}</span>
                                        {{ $event->description }}
                                    </div>
                                    <span class="text-muted">{{ $event->user }}</span>
                                </li>
                            @empty
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="badge bg-secondary rounded-pill me-2">Mar 15, 2025 18:42</span>
                                        Order placed
                                    </div>
                                    <span class="text-muted">System</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="badge bg-secondary rounded-pill me-2">Mar 15, 2025 19:05</span>
                                        Payment confirmed
                                    </div>
                                    <span class="text-muted">System</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="badge bg-secondary rounded-pill me-2">Mar 16, 2025 09:12</span>
                                        Order shipped
                                    </div>
                                    <span class="text-muted">Admin</span>
                                </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-outline-primary" onclick="printOrder()">
                        <i class="fas fa-print me-1"></i> Print
                    </button>
                    <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#sendNotificationModal">
                        <i class="fas fa-bell me-1"></i> Notify
                    </button>
                </div>
                <div class="btn-group ms-2" role="group">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#refundModal">
                        <i class="fas fa-undo me-1"></i> Issue Refund
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Update Status Modal -->
<div class="modal fade" id="updateStatusModal" tabindex="-1" aria-labelledby="updateStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateStatusModalLabel">Update Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('orders.update-status', $order->id ?? 1) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="orderStatus" class="form-label">Order Status</label>
                        <select class="form-select" id="orderStatus" name="status" required>
                            <option value="" selected disabled>Select Status</option>
                            <option value="processing">Processing</option>
                            <option value="shipped">Shipped</option>
                            <option value="delivered">Delivered</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="statusNote" class="form-label">Note (Optional)</label>
                        <textarea class="form-control" id="statusNote" name="note" rows="2" placeholder="Add any relevant details"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update Status</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Send Notification Modal -->
<div class="modal fade" id="sendNotificationModal" tabindex="-1" aria-labelledby="sendNotificationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sendNotificationModalLabel">Send Customer Notification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('orders.send-notification', $order->id ?? 1) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="notificationType" class="form-label">Notification Type</label>
                        <select class="form-select" id="notificationType" name="type" required>
                            <option value="" selected disabled>Select Type</option>
                            <option value="status_update">Status Update</option>
                            <option value="shipping_delay">Shipping Delay</option>
                            <option value="delivery_confirmation">Delivery Confirmation</option>
                            <option value="custom">Custom Message</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="notificationMessage" class="form-label">Message</label>
                        <textarea class="form-control" id="notificationMessage" name="message" rows="3" required></textarea>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="sendEmail" name="send_email" checked>
                        <label class="form-check-label" for="sendEmail">
                            Send via Email
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="sendSMS" name="send_sms">
                        <label class="form-check-label" for="sendSMS">
                            Send via SMS
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Send Notification</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Refund Modal -->
<div class="modal fade" id="refundModal" tabindex="-1" aria-labelledby="refundModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="refundModalLabel">Issue Refund</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('orders.refund', $order->id ?? 1) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-1"></i>
                        You are about to issue a refund for order #ORD-2025-8742
                    </div>
                    
                    <div class="mb-3">
                        <label for="refundAmount" class="form-label">Refund Amount</label>
                        <div class="input-group">
                            <span class="input-group-text">₱</span>
                            <input type="number" class="form-control" id="refundAmount" name="amount" value="129.97" step="0.01" min="0" max="129.97" required>
                        </div>
                        <div class="form-text">Maximum refund amount: ₱129.97</div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="refundReason" class="form-label">Reason for Refund</label>
                        <select class="form-select" id="refundReason" name="reason" required>
                            <option value="" selected disabled>Select Reason</option>
                            <option value="customer_request">Customer Request</option>
                            <option value="damaged_product">Damaged Product</option>
                            <option value="wrong_item">Wrong Item Shipped</option>
                            <option value="late_delivery">Late Delivery</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="refundNote" class="form-label">Additional Notes</label>
                        <textarea class="form-control" id="refundNote" name="note" rows="2"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Process Refund</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
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