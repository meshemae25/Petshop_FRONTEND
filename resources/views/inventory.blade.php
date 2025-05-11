@extends('layouts.inventory')

@section('content')
<div class="container-fluid px-4">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-primary mb-1">Inventory</h2>
            <p class="text-muted">Manage your inventory and stock levels</p>
        </div>
        <button class="btn btn-secondary px-4 d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addInventoryModal">
            <i class="fas fa-plus me-2"></i> Add New Item
        </button>
    </div>

    <!-- Filters and Actions Card -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-3">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search inventory...">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="categoryFilter">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="statusFilter">
                        <option value="">All Status</option>
                        <option value="active">Active</option>
                        <option value="low_stock">Low Stock</option>
                        <option value="out_of_stock">Out of Stock</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle w-100" type="button" id="bulkActionDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Bulk Actions
                        </button>
                        <ul class="dropdown-menu w-100" aria-labelledby="bulkActionDropdown">
                            <li><a class="dropdown-item" href="#" id="applyDiscount"><i class="fas fa-tag me-2"></i> Apply Discount</a></li>
                            <li><a class="dropdown-item" href="#" id="updateStock"><i class="fas fa-boxes me-2"></i> Update Stock</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="#" id="deleteSelected"><i class="fas fa-trash me-2"></i> Delete Selected</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Inventory Table Card -->
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th width="40">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="selectAll">
                                </div>
                            </th>
                            <th width="80">Image</th>
                            <th>Item Name</th>
                            <th>Category</th>
                            <th>SKU</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th>Cost</th>
                            <th>Discount</th>
                            <th>Status</th>
                            <th width="150">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inventories as $inventory)
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input inventory-select" type="checkbox" value="{{ $inventory->id }}">
                                </div>
                            </td>
                            <td>
                                <div class="inventory-img-container bg-light rounded d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    @if($inventory->image)
                                        <img src="{{ asset('storage/' . $inventory->image) }}" alt="{{ $inventory->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                                    @else
                                        <i class="fas fa-paw text-primary"></i>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="fw-medium">{{ $inventory->name }}</div>
                                <small class="text-muted">{{ $inventory->sku }}</small>
                            </td>
                            <td>{{ $inventory->category->name }}</td>
                            <td>{{ $inventory->sku }}</td>
                            <td>
                                @if($inventory->stock > 20)
                                    <span class="fw-medium">{{ $inventory->stock }}</span>
                                @elseif($inventory->stock > 0)
                                    <span class="fw-medium text-warning">{{ $inventory->stock }}</span>
                                @else
                                    <span class="fw-medium text-danger">{{ $inventory->stock }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="fw-medium">₱{{ number_format($inventory->price, 2) }}</div>
                                @if($inventory->discount > 0)
                                    <small class="text-success">
                                        ₱{{ number_format($inventory->price * (1 - $inventory->discount / 100), 2) }} after discount
                                    </small>
                                @endif
                            </td>
                            <td>₱{{ number_format($inventory->cost, 2) }}</td>
                            <td>
                                @if($inventory->discount > 0)
                                    <span class="badge bg-success">{{ $inventory->discount }}% OFF</span>
                                @else
                                    <span class="badge bg-light text-muted">No Discount</span>
                                @endif
                            </td>
                            <td>
                                @php
                                    $statusClass = [
                                        'active' => 'bg-success',
                                        'low_stock' => 'bg-warning',
                                        'out_of_stock' => 'bg-danger',
                                    ];
                                @endphp
                                <span class="badge {{ $statusClass[$inventory->status] }}">{{ ucwords(str_replace('_', ' ', $inventory->status)) }}</span>
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editInventoryModal" data-inventory-id="{{ $inventory->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#viewInventoryModal" data-inventory-id="{{ $inventory->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#discountModal" data-inventory-id="{{ $inventory->id }}">
                                                <i class="fas fa-tag me-2 text-primary"></i> Manage Discount
                                            </a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#stockModal" data-inventory-id="{{ $inventory->id }}">
                                                <i class="fas fa-boxes me-2 text-success"></i> Update Stock
                                            </a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="#">
                                                <i class="fas fa-trash me-2"></i> Delete
                                            </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-muted small">
                    Showing <span class="fw-medium">{{ $inventories->count() }}</span> of <span class="fw-medium">{{ $inventories->count() }}</span> items
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Inventory Modal -->
<div class="modal fade" id="addInventoryModal" tabindex="-1" aria-labelledby="addInventoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="addInventoryModalLabel">Add New Inventory Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addInventoryForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="inventoryName" class="form-label">Item Name</label>
                            <input type="text" class="form-control" id="inventoryName" name="name" required>
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="inventoryCategory" class="form-label">Category</label>
                            <select class="form-select" id="inventoryCategory" name="category_id" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="col-md-4">
                            <label for="inventorySKU" class="form-label">SKU</label>
                            <input type="text" class="form-control" id="inventorySKU" name="sku" required>
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="col-md-4">
                            <label for="inventoryPrice" class="form-label">Price (₱)</label>
                            <input type="number" class="form-control" id="inventoryPrice" name="price" step="0.01" min="0" required>
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="col-md-4">
                            <label for="inventoryStock" class="form-label">Initial Stock</label>
                            <input type="number" class="form-control" id="inventoryStock" name="stock" min="0" required>
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="col-md-4">
                            <label for="inventoryCost" class="form-label">Cost (₱)</label>
                            <input type="number" class="form-control" id="inventoryCost" name="cost" step="0.01" min="0" required>
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="col-md-4">
                            <label for="inventoryDiscount" class="form-label">Discount (%)</label>
                            <input type="number" class="form-control" id="inventoryDiscount" name="discount" min="0" max="100" value="0">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="col-md-4">
                            <label for="inventoryStatus" class="form-label">Status</label>
                            <select class="form-select" id="inventoryStatus" name="status" required>
                                <option value="active">Active</option>
                                <option value="low_stock">Low Stock</option>
                                <option value="out_of_stock">Out of Stock</option>
                            </select>
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="col-12">
                            <label for="inventoryDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="inventoryDescription" name="description" rows="3"></textarea>
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="col-12">
                            <label for="inventoryImage" class="form-label">Item Image</label>
                            <input type="file" class="form-control" id="inventoryImage" name="image" accept="image/*">
                            <span class="invalid-feedback"></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveInventoryBtn">Add Item</button>
            </div>
        </div>
    </div>
</div>

<!-- Placeholder modals for action buttons (not fully implemented) -->
<div class="modal fade" id="editInventoryModal" tabindex="-1" aria-labelledby="editInventoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="editInventoryModalLabel">Edit Inventory Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Edit form would go here (not implemented).</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="viewInventoryModal" tabindex="-1" aria-labelledby="viewInventoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="viewInventoryModalLabel">View Inventory Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>View details would go here (not implemented).</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="discountModal" tabindex="-1" aria-labelledby="discountModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="discountModalLabel">Manage Discount</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Discount form would go here (not implemented).</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Apply Discount</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="stockModal" tabindex="-1" aria-labelledby="stockModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="stockModalLabel">Update Stock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Stock update form would go here (not implemented).</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Update Stock</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Select all checkbox
        const selectAllCheckbox = document.getElementById('selectAll');
        const inventoryCheckboxes = document.querySelectorAll('.inventory-select');

        selectAllCheckbox.addEventListener('change', function() {
            inventoryCheckboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });

        function updateSelectAllCheckbox() {
            let allChecked = true;
            let anyChecked = false;

            inventoryCheckboxes.forEach(checkbox => {
                if (!checkbox.checked) allChecked = false;
                if (checkbox.checked) anyChecked = true;
            });

            selectAllCheckbox.checked = allChecked;
            selectAllCheckbox.indeterminate = !allChecked && anyChecked;
        }

        inventoryCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', updateSelectAllCheckbox);
        });

        // Handle Add Inventory Form Submission
        document.getElementById('saveInventoryBtn').addEventListener('click', function() {
            const form = document.getElementById('addInventoryForm');
            const formData = new FormData(form);

            // Clear previous validation errors
            document.querySelectorAll('.invalid-feedback').forEach(span => span.textContent = '');
            document.querySelectorAll('.form-control.is-invalid, .form-select.is-invalid').forEach(input => input.classList.remove('is-invalid'));

            $.ajax({
                url: '{{ route("inventory.store") }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        // Close the modal
                        $('#addInventoryModal').modal('hide');

                        // Reset the form
                        form.reset();

                        // Add the new inventory item to the table
                        const inventory = response.inventory;
                        const statusClass = {
                            'active': 'bg-success',
                            'low_stock': 'bg-warning',
                            'out_of_stock': 'bg-danger'
                        };

                        const stockClass = inventory.stock > 20 ? '' : (inventory.stock > 0 ? 'text-warning' : 'text-danger');

                        // Before appending the new row
                        if (document.querySelector(`.inventory-select[value="${inventory.id}"]`)) {
                            alert('This inventory item already exists in the table.');
                            return;
                        }

                        const newRow = `
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input inventory-select" type="checkbox" value="${inventory.id}">
                                    </div>
                                </td>
                                <td>
                                    <div class="inventory-img-container bg-light rounded d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                        ${inventory.image ? `<img src="{{ asset('storage') }}/${inventory.image}" alt="${inventory.name}" style="width: 100%; height: 100%; object-fit: cover;">` : '<i class="fas fa-paw text-primary"></i>'}
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-medium">${inventory.name}</div>
                                    <small class="text-muted">${inventory.sku}</small>
                                </td>
                                <td>${inventory.category.name}</td>
                                <td>${inventory.sku}</td>
                                <td>
                                    <span class="fw-medium ${stockClass}">${inventory.stock}</span>
                                </td>
                                <td>
                                    <div class="fw-medium">₱${parseFloat(inventory.price).toFixed(2)}</div>
                                    ${inventory.discount > 0 ? `<small class="text-success">₱${(inventory.price * (1 - inventory.discount / 100)).toFixed(2)} after discount</small>` : ''}
                                </td>
                                <td>₱${parseFloat(inventory.cost).toFixed(2)}</td>
                                <td>
                                    ${inventory.discount > 0 ? `<span class="badge bg-success">${inventory.discount}% OFF</span>` : '<span class="badge bg-light text-muted">No Discount</span>'}
                                </td>
                                <td>
                                    <span class="badge ${statusClass[inventory.status]}">${inventory.status.replace('_', ' ').replace(/\b\w/g, c => c.toUpperCase())}</span>
                                </td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editInventoryModal" data-inventory-id="${inventory.id}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#viewInventoryModal" data-inventory-id="${inventory.id}">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#discountModal" data-inventory-id="${inventory.id}">
                                                    <i class="fas fa-tag me-2 text-primary"></i> Manage Discount
                                                </a></li>
                                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#stockModal" data-inventory-id="${inventory.id}">
                                                    <i class="fas fa-boxes me-2 text-success"></i> Update Stock
                                                </a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item text-danger" href="#">
                                                    <i class="fas fa-trash me-2"></i> Delete
                                                </a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;

                        // Append the new row to the table body
                        document.querySelector('table tbody').insertAdjacentHTML('beforeend', newRow);

                        // Show success message
                        alert(response.message);
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        for (const [field, messages] of Object.entries(errors)) {
                            const input = document.querySelector(`[name="${field}"]`);
                            if (input) {
                                input.classList.add('is-invalid');
                                const errorSpan = input.nextElementSibling;
                                errorSpan.textContent = messages[0];
                            }
                        }
                    } else {
                        alert('An error occurred while saving the inventory item. Status: ' + xhr.status + ', Response: ' + xhr.responseText);
                    }
                }
            });
        });
    });
</script>
@endsection