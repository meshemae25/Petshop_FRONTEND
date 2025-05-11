<!-- resources/views/promocodes/index.blade.php -->
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
                        @forelse ($promoCodes as $promo)
                        <tr>
                            <td>
                                <span class="fw-medium {{ $promo->status == 'Expired' ? 'text-decoration-line-through' : '' }}">{{ $promo->code }}</span>
                                <div class="small text-muted">{{ $promo->description ?: 'No description' }}</div>
                            </td>
                            <td>
                                <span class="badge {{ $promo->discount_type == 'percentage' ? 'bg-success' : 'bg-info' }} text-white">
                                    {{ $promo->discount_type == 'percentage' ? $promo->discount_value . '% OFF' : '$' . number_format($promo->discount_value, 2) . ' OFF' }}
                                </span>
                            </td>
                            <td>{{ $promo->usage_count }} / {{ $promo->usage_limit ?: 'Unlimited' }}</td>
                            <td>
                                <div>{{ \Carbon\Carbon::parse($promo->expiration_date)->format('d-m-Y') }}</div>
                                <div class="small text-muted">
                                    @if ($promo->status == 'Expired')
                                        Expired
                                    @elseif ($promo->status == 'Scheduled')
                                        Starts {{ \Carbon\Carbon::parse($promo->start_date)->diffInDays(now()) }} days
                                    @else
                                        {{ \Carbon\Carbon::parse($promo->expiration_date)->diffInDays(now()) }} days remaining
                                    @endif
                                </div>
                            </td>
                            <td>
                                <span class="badge {{ $promo->status == 'Active' ? 'bg-success-subtle text-success' : ($promo->status == 'Scheduled' ? 'bg-warning-subtle text-warning' : 'bg-secondary-subtle text-secondary') }}">
                                    {{ $promo->status }}
                                </span>
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
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                No promo codes found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white py-3">
            {{ $promoCodes->links() }}
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
            <form id="createPromoForm" action="{{ route('promocodes.store') }}" method="POST">
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
                        <span class="invalid-feedback"></span>
                    </div>

                    <div class="mb-3">
                        <label for="promoDescription" class="form-label">Description</label>
                        <input type="text" class="form-control" id="promoDescription" name="description" placeholder="e.g., Summer Sale">
                        <div class="form-text">Brief description for your reference</div>
                        <span class="invalid-feedback"></span>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="discountType" class="form-label">Discount Type <span class="text-danger">*</span></label>
                            <select class="form-select" id="discountType" name="discount_type" required>
                                <option value="percentage">Percentage (%)</option>
                                <option value="fixed">Fixed Amount ($)</option>
                            </select>
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="discountValue" class="form-label">Value <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="discountValue" name="discount_value" min="1" max="100" placeholder="e.g., 20" required>
                                <span class="input-group-text" id="discountSymbol">%</span>
                            </div>
                            <span class="invalid-feedback"></span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="startDate" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="startDate" name="start_date">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="expirationDate" class="form-label">Expiration Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="expirationDate" name="expiration_date" required>
                            <span class="invalid-feedback"></span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="usageLimit" class="form-label">Usage Limit</label>
                            <input type="number" class="form-control" id="usageLimit" name="usage_limit" min="1" placeholder="e.g., 100">
                            <div class="form-text">Leave empty for unlimited use</div>
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="minPurchase" class="form-label">Minimum Purchase</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" id="minPurchase" name="min_purchase" min="0" step="0.01" placeholder="0.00">
                            </div>
                            <span class="invalid-feedback"></span>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Generate random promo code
        $('#generateCode').on('click', function() {
            const characters = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
            let result = '';
            for (let i = 0; i < 8; i++) {
                result += characters.charAt(Math.floor(Math.random() * characters.length));
            }
            $('#promoCode').val(result);
        });

        // Change discount symbol based on discount type
        $('#discountType').on('change', function() {
            const symbol = this.value === 'percentage' ? '%' : '$';
            $('#discountSymbol').text(symbol);
            const valueInput = $('#discountValue');
            if (this.value === 'percentage') {
                valueInput.attr('max', '100');
                valueInput.val(Math.min(valueInput.val() || 0, 100));
            } else {
                valueInput.removeAttr('max');
            }
        });

        // Set minimum date for date fields
        const today = new Date();
        const formattedDate = today.toISOString().substr(0, 10);
        $('#startDate').attr('min', formattedDate);
        $('#expirationDate').attr('min', formattedDate);
        $('#startDate').val(formattedDate);

        // Search functionality
        $('#searchPromo').on('keyup', function() {
            const searchText = this.value.toLowerCase();
            $('tbody tr').each(function() {
                const promoText = $(this).find('td:first-child .fw-medium').text().toLowerCase();
                const descText = $(this).find('td:first-child .small').text().toLowerCase();
                $(this).toggle(promoText.includes(searchText) || descText.includes(searchText));
            });
        });

        // Handle Create Promo Form Submission via AJAX
        $('#createPromoForm').on('submit', function(e) {
            e.preventDefault();

            // Clear previous validation errors
            $('.invalid-feedback').text('');
            $('.form-control.is-invalid, .form-select.is-invalid').removeClass('is-invalid');

            const statusClass = {
                'Active': 'bg-success-subtle text-success',
                'Scheduled': 'bg-warning-subtle text-warning',
                'Expired': 'bg-secondary-subtle text-secondary',
                'Inactive': 'bg-secondary-subtle text-secondary',
                'Exhausted': 'bg-danger-subtle text-danger'
            };

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        // Close the modal
                        $('#createPromoModal').modal('hide');

                        // Reset the form
                        $('#createPromoForm')[0].reset();
                        $('#startDate').val(formattedDate);
                        $('#promoStatus').prop('checked', true);
                        $('#discountType').val('percentage');
                        $('#discountSymbol').text('%');
                        $('#discountValue').attr('max', '100');

                        // Add new promo code to the table
                        const promo = response.promo;
                        const discountClass = {
                            'percentage': 'bg-success',
                            'fixed': 'bg-info'
                        };

                        const newRow = `
                            <tr>
                                <td>
                                    <span class="fw-medium">${promo.code}</span>
                                    <div class="small text-muted">${promo.description || 'No description'}</div>
                                </td>
                                <td>
                                    <span class="badge ${discountClass[promo.discount_type]} text-white">
                                        ${promo.discount_type === 'percentage' ? promo.discount_value + '% OFF' : '$' + parseFloat(promo.discount_value).toFixed(2) + ' OFF'}
                                    </span>
                                </td>
                                <td>${promo.usage_count} / ${promo.usage_limit || 'Unlimited'}</td>
                                <td>
                                    <div>${new Date(promo.expiration_date).toLocaleDateString('en-GB', { day: '2-digit', month: '2-digit', year: 'numeric' }).replace(/\//g, '-')}</div>
                                </td>
                                <td>
                                    <span class="badge ${statusClass[promo.status]}">${promo.status}</span>
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
                        `;

                        // Add or update the promo code in the table
                        const existingRow = $(`tbody tr:contains(${promo.code})`);
                        if (existingRow.length) {
                            existingRow.replaceWith(newRow); // Update existing row
                        } else {
                            $('tbody').prepend(newRow); // Add new row
                        }

                        alert('Promo code updated successfully!');
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        for (const [field, messages] of Object.entries(errors)) {
                            const input = $(`#createPromoForm [name="${field}"]`);
                            input.addClass('is-invalid');
                            input.siblings('.invalid-feedback').text(messages[0]);
                        }
                    } else {
                        alert('An error occurred: ' + (xhr.responseJSON?.message || 'Unknown error'));
                    }
                }
            });
        });
    });
</script>
@endsection