@extends('layouts.promocode')

@section('content')
<div class="container-fluid p-0">
    <!-- Page Header -->
    <div class="page-header mb-4">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="page-title">Promo Codes</h1>
                <p class="text-muted">Manage discount codes for your store</p>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPromoModal">
                    <i class="fas fa-plus-circle me-2"></i>Create New Promo
                </button>
            </div>
        </div>
    </div>

    <!-- Promo Codes List Card -->
    <div class="card shadow-sm">
        <div class="card-header bg-white py-3">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-0">Active Promo Codes</h5>
                </div>
                <div class="col-auto">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search promo codes..." id="searchPromo">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Promo Code</th>
                            <th>Discount</th>
                            <th>Usage / Limit</th>
                            <th>Expiration Date</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <span class="fw-medium">BBM2025</span>
                                <div class="small text-muted">Black Friday Sale</div>
                            </td>
                            <td>
                                <span class="badge bg-success text-white">20% OFF</span>
                            </td>
                            <td>124 / 500</td>
                            <td>
                                <div>29-03-2025</div>
                                <div class="small text-muted">4 days remaining</div>
                            </td>
                            <td>
                                <span class="badge bg-success-subtle text-success">Active</span>
                            </td>
                            <td class="text-end">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#"><i class="fas fa-edit me-2"></i>Edit</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="fas fa-chart-line me-2"></i>View Stats</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-trash-alt me-2"></i>Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="fw-medium">DDS2026</span>
                                <div class="small text-muted">New User Discount</div>
                            </td>
                            <td>
                                <span class="badge bg-info text-white">10% OFF</span>
                            </td>
                            <td>85 / 300</td>
                            <td>
                                <div>29-03-2025</div>
                                <div class="small text-muted">4 days remaining</div>
                            </td>
                            <td>
                                <span class="badge bg-success-subtle text-success">Active</span>
                            </td>
                            <td class="text-end">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#"><i class="fas fa-edit me-2"></i>Edit</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="fas fa-chart-line me-2"></i>View Stats</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-trash-alt me-2"></i>Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="fw-medium">LENILUGAW2030</span>
                                <div class="small text-muted">Summer Collection</div>
                            </td>
                            <td>
                                <span class="badge bg-primary text-white">15% OFF</span>
                            </td>
                            <td>42 / 200</td>
                            <td>
                                <div>29-03-2025</div>
                                <div class="small text-muted">4 days remaining</div>
                            </td>
                            <td>
                                <span class="badge bg-success-subtle text-success">Active</span>
                            </td>
                            <td class="text-end">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#"><i class="fas fa-edit me-2"></i>Edit</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="fas fa-chart-line me-2"></i>View Stats</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-trash-alt me-2"></i>Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="fw-medium">HOLIDAY2025</span>
                                <div class="small text-muted">Holiday Special</div>
                            </td>
                            <td>
                                <span class="badge bg-warning text-dark">25% OFF</span>
                            </td>
                            <td>0 / 100</td>
                            <td>
                                <div>25-12-2025</div>
                                <div class="small text-muted">8 months remaining</div>
                            </td>
                            <td>
                                <span class="badge bg-warning-subtle text-warning">Scheduled</span>
                            </td>
                            <td class="text-end">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#"><i class="fas fa-edit me-2"></i>Edit</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="fas fa-chart-line me-2"></i>View Stats</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-trash-alt me-2"></i>Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="fw-medium text-decoration-line-through">SPRING2024</span>
                                <div class="small text-muted">Spring Collection</div>
                            </td>
                            <td>
                                <span class="badge bg-secondary text-white">18% OFF</span>
                            </td>
                            <td>321 / 400</td>
                            <td>
                                <div>15-03-2025</div>
                                <div class="small text-muted">Expired</div>
                            </td>
                            <td>
                                <span class="badge bg-secondary-subtle text-secondary">Expired</span>
                            </td>
                            <td class="text-end">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#"><i class="fas fa-edit me-2"></i>Edit</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="fas fa-chart-line me-2"></i>View Stats</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-trash-alt me-2"></i>Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white py-3">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center mb-0">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- Create Promo Modal -->
<div class="modal fade" id="createPromoModal" tabindex="-1" aria-labelledby="createPromoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createPromoModalLabel">Create New Promo Code</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('promocodes.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="promoCode" class="form-label">Promo Code <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="promoCode" name="code" placeholder="Enter promo code" required>
                            <button class="btn btn-outline-secondary" type="button" id="generateCode">
                                <i class="fas fa-sync-alt"></i> Generate
                            </button>
                        </div>
                        <div class="form-text">Unique code customers will enter at checkout</div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="promoDescription" class="form-label">Description</label>
                        <input type="text" class="form-control" id="promoDescription" name="description" placeholder="e.g., Summer Sale">
                        <div class="form-text">Brief description for your reference</div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="discountType" class="form-label">Discount Type <span class="text-danger">*</span></label>
                            <select class="form-select" id="discountType" name="discount_type" required>
                                <option value="percentage">Percentage (%)</option>
                                <option value="fixed">Fixed Amount ($)</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="discountValue" class="form-label">Value <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="discountValue" name="discount_value" min="1" max="100" placeholder="e.g., 20" required>
                                <span class="input-group-text" id="discountSymbol">%</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="startDate" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="startDate" name="start_date">
                        </div>
                        <div class="col-md-6">
                            <label for="expirationDate" class="form-label">Expiration Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="expirationDate" name="expiration_date" required>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="usageLimit" class="form-label">Usage Limit</label>
                            <input type="number" class="form-control" id="usageLimit" name="usage_limit" min="1" placeholder="e.g., 100">
                            <div class="form-text">Leave empty for unlimited use</div>
                        </div>
                        <div class="col-md-6">
                            <label for="minPurchase" class="form-label">Minimum Purchase</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" id="minPurchase" name="min_purchase" min="0" step="0.01" placeholder="0.00">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="promoStatus" name="is_active" checked>
                        <label class="form-check-label" for="promoStatus">Active</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Create Promo Code
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Generate random promo code
    document.getElementById('generateCode').addEventListener('click', function() {
        const characters = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
        let result = '';
        for (let i = 0; i < 8; i++) {
            result += characters.charAt(Math.floor(Math.random() * characters.length));
        }
        document.getElementById('promoCode').value = result;
    });
    
    // Change discount symbol based on discount type
    document.getElementById('discountType').addEventListener('change', function() {
        const symbol = this.value === 'percentage' ? '%' : '$';
        document.getElementById('discountSymbol').textContent = symbol;
        
        const valueInput = document.getElementById('discountValue');
        if (this.value === 'percentage') {
            valueInput.setAttribute('max', '100');
        } else {
            valueInput.removeAttribute('max');
        }
    });
    
    // Set minimum date for expiration date field
    window.addEventListener('DOMContentLoaded', (event) => {
        const today = new Date();
        const formattedDate = today.toISOString().substr(0, 10);
        document.getElementById('startDate').setAttribute('min', formattedDate);
        document.getElementById('expirationDate').setAttribute('min', formattedDate);
        
        // Set default start date to today
        document.getElementById('startDate').value = formattedDate;
    });
    
    // Search functionality
    document.getElementById('searchPromo').addEventListener('keyup', function() {
        const searchText = this.value.toLowerCase();
        const tableRows = document.querySelectorAll('tbody tr');
        
        tableRows.forEach(row => {
            const promoText = row.querySelector('td:first-child').textContent.toLowerCase();
            const descText = row.querySelector('td:first-child .small').textContent.toLowerCase();
            
            if (promoText.includes(searchText) || descText.includes(searchText)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
@endsection