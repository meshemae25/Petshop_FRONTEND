@extends('layouts.inventory')

@section('content')
<div class="container-fluid px-4">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-primary mb-1">Product Inventory</h2>
            <p class="text-muted">Manage your product inventory and stock levels</p>
        </div>
        <button class="btn btn-primary px-4 d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addProductModal">
            <i class="fas fa-plus me-2"></i> Add New Product
        </button>
    </div>

    <!-- Filters and Actions Card -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-3">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search products...">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="categoryFilter">
                        <option value="">All Categories</option>
                        <option value="Food">Food</option>
                        <option value="Toys">Toys</option>
                        <option value="Accessories">Accessories</option>
                        <option value="Health">Health & Wellness</option>
                        <option value="Grooming">Grooming</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="statusFilter">
                        <option value="">All Status</option>
                        <option value="Active">Active</option>
                        <option value="Low Stock">Low Stock</option>
                        <option value="Out of Stock">Out of Stock</option>
                        <option value="Discontinued">Discontinued</option>
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
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>SKU</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Status</th>
                            <th width="150">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example products (in a real app these would be dynamic) -->
                        @php
                            $products = [
                                [
                                    'id' => 1,
                                    'image' => 'dog-food.jpg',
                                    'name' => 'Premium Dog Food',
                                    'category' => 'Food',
                                    'sku' => 'PF-001',
                                    'stock' => 1000,
                                    'price' => 2500,
                                    'discount' => 15,
                                    'status' => 'Active'
                                ],
                                [
                                    'id' => 2,
                                    'image' => 'cat-bed.jpg',
                                    'name' => 'Luxury Cat Bed',
                                    'category' => 'Accessories',
                                    'sku' => 'CB-002',
                                    'stock' => 0,
                                    'price' => 1350,
                                    'discount' => 0,
                                    'status' => 'Out of Stock'
                                ],
                                [
                                    'id' => 3,
                                    'image' => 'dog-toy.jpg',
                                    'name' => 'Interactive Dog Toy',
                                    'category' => 'Toys',
                                    'sku' => 'DT-003',
                                    'stock' => 43,
                                    'price' => 850,
                                    'discount' => 10,
                                    'status' => 'Active'
                                ],
                                [
                                    'id' => 4,
                                    'image' => 'cat-food.jpg',
                                    'name' => 'Organic Cat Food',
                                    'category' => 'Food',
                                    'sku' => 'CF-004',
                                    'stock' => 12,
                                    'price' => 1900,
                                    'discount' => 0,
                                    'status' => 'Low Stock'
                                ],
                                [
                                    'id' => 5,
                                    'image' => 'pet-shampoo.jpg',
                                    'name' => 'Gentle Pet Shampoo',
                                    'category' => 'Grooming',
                                    'sku' => 'GP-005',
                                    'stock' => 87,
                                    'price' => 750,
                                    'discount' => 5,
                                    'status' => 'Active'
                                ]
                            ];
                        @endphp

                        @foreach($products as $product)
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input product-select" type="checkbox" value="{{ $product['id'] }}">
                                </div>
                            </td>
                            <td>
                                <div class="product-img-container bg-light rounded d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="fas fa-paw text-primary"></i>
                                </div>
                            </td>
                            <td>
                                <div class="fw-medium">{{ $product['name'] }}</div>
                                <small class="text-muted">{{ $product['sku'] }}</small>
                            </td>
                            <td>{{ $product['category'] }}</td>
                            <td>{{ $product['sku'] }}</td>
                            <td>
                                @if($product['stock'] > 20)
                                    <span class="fw-medium">{{ $product['stock'] }}</span>
                                @elseif($product['stock'] > 0)
                                    <span class="fw-medium text-warning">{{ $product['stock'] }}</span>
                                @else
                                    <span class="fw-medium text-danger">{{ $product['stock'] }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="fw-medium">₱{{ number_format($product['price'], 2) }}</div>
                                @if($product['discount'] > 0)
                                    <small class="text-success">
                                        ₱{{ number_format($product['price'] * (1 - $product['discount']/100), 2) }} after discount
                                    </small>
                                @endif
                            </td>
                            <td>
                                @if($product['discount'] > 0)
                                    <span class="badge bg-success">{{ $product['discount'] }}% OFF</span>
                                @else
                                    <span class="badge bg-light text-muted">No Discount</span>
                                @endif
                            </td>
                            <td>
                                @php
                                    $statusClass = [
                                        'Active' => 'bg-success',
                                        'Low Stock' => 'bg-warning',
                                        'Out of Stock' => 'bg-danger',
                                        'Discontinued' => 'bg-secondary'
                                    ];
                                @endphp
                                <span class="badge {{ $statusClass[$product['status']] }}">{{ $product['status'] }}</span>
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editProductModal" data-product-id="{{ $product['id'] }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#viewProductModal" data-product-id="{{ $product['id'] }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#discountModal" data-product-id="{{ $product['id'] }}">
                                                <i class="fas fa-tag me-2 text-primary"></i> Manage Discount
                                            </a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#stockModal" data-product-id="{{ $product['id'] }}">
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
                    Showing <span class="fw-medium">1-5</span> of <span class="fw-medium">24</span> products
                </div>
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
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

<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addProductForm">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="productName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="productName" required>
                        </div>
                        <div class="col-md-6">
                            <label for="productCategory" class="form-label">Category</label>
                            <select class="form-select" id="productCategory" required>
                                <option value="">Select Category</option>
                                <option value="Food">Food</option>
                                <option value="Toys">Toys</option>
                                <option value="Accessories">Accessories</option>
                                <option value="Health">Health & Wellness</option>
                                <option value="Grooming">Grooming</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="productSKU" class="form-label">SKU</label>
                            <input type="text" class="form-control" id="productSKU" required>
                        </div>
                        <div class="col-md-4">
                            <label for="productPrice" class="form-label">Price (₱)</label>
                            <input type="number" class="form-control" id="productPrice" step="0.01" min="0" required>
                        </div>
                        <div class="col-md-4">
                            <label for="productStock" class="form-label">Initial Stock</label>
                            <input type="number" class="form-control" id="productStock" min="0" required>
                        </div>
                        <div class="col-md-6">
                            <label for="productDiscount" class="form-label">Discount (%)</label>
                            <input type="number" class="form-control" id="productDiscount" min="0" max="100" value="0">
                        </div>
                        <div class="col-md-6">
                            <label for="productStatus" class="form-label">Status</label>
                            <select class="form-select" id="productStatus" required>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                                <option value="Discontinued">Discontinued</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="productDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="productDescription" rows="3"></textarea>
                        </div>
                        <div class="col-12">
                            <label for="productImage" class="form-label">Product Image</label>
                            <input type="file" class="form-control" id="productImage">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveProductBtn">Add Product</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Product Modal -->
<div class="modal fade" id="editProductModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Same form fields as Add Product Modal but with pre-filled values -->
                <form id="editProductForm">
                    <div class="row g-3">
                        <!-- These would be pre-filled based on the product being edited -->
                        <div class="col-md-6">
                            <label for="editProductName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="editProductName" value="Premium Dog Food" required>
                        </div>
                        <div class="col-md-6">
                            <label for="editProductCategory" class="form-label">Category</label>
                            <select class="form-select" id="editProductCategory" required>
                                <option value="">Select Category</option>
                                <option value="Food" selected>Food</option>
                                <option value="Toys">Toys</option>
                                <option value="Accessories">Accessories</option>
                                <option value="Health">Health & Wellness</option>
                                <option value="Grooming">Grooming</option>
                            </select>
                        </div>
                        <!-- Additional fields similar to Add Product modal -->
                        <div class="col-md-4">
                            <label for="editProductSKU" class="form-label">SKU</label>
                            <input type="text" class="form-control" id="editProductSKU" value="PF-001" required>
                        </div>
                        <div class="col-md-4">
                            <label for="editProductPrice" class="form-label">Price (₱)</label>
                            <input type="number" class="form-control" id="editProductPrice" value="2500" step="0.01" min="0" required>
                        </div>
                        <div class="col-md-4">
                            <label for="editProductStock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="editProductStock" value="1000" min="0" required>
                        </div>
                        <div class="col-md-6">
                            <label for="editProductDiscount" class="form-label">Discount (%)</label>
                            <input type="number" class="form-control" id="editProductDiscount" value="15" min="0" max="100">
                        </div>
                        <div class="col-md-6">
                            <label for="editProductStatus" class="form-label">Status</label>
                            <select class="form-select" id="editProductStatus" required>
                                <option value="Active" selected>Active</option>
                                <option value="Inactive">Inactive</option>
                                <option value="Discontinued">Discontinued</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="editProductDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="editProductDescription" rows="3">High-quality premium dog food with balanced nutrition.</textarea>
                        </div>
                        <div class="col-12">
                            <label for="editProductImage" class="form-label">Product Image</label>
                            <input type="file" class="form-control" id="editProductImage">
                            <div class="mt-2">
                                <span class="badge bg-light text-dark">Current image: dog-food.jpg</span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="updateProductBtn">Update Product</button>
            </div>
        </div>
    </div>
</div>

<!-- Discount Modal -->
<div class="modal fade" id="discountModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title">Manage Discount</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="discountForm">
                    <div class="mb-3">
                        <label class="form-label fw-medium">Product:</label>
                        <div id="discountProductName" class="fw-bold">Premium Dog Food</div>
                    </div>
                    <div class="mb-3">
                        <label for="discountType" class="form-label">Discount Type</label>
                        <select class="form-select" id="discountType">
                            <option value="percentage">Percentage (%)</option>
                            <option value="fixed">Fixed Amount (₱)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="discountValue" class="form-label">Discount Value</label>
                        <input type="number" class="form-control" id="discountValue" value="15" min="0">
                    </div>
                    <div class="mb-3">
                        <label for="discountStartDate" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="discountStartDate">
                    </div>
                    <div class="mb-3">
                        <label for="discountEndDate" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="discountEndDate">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="removeDiscountBtn">Remove Discount</button>
                <button type="button" class="btn btn-primary" id="applyDiscountBtn">Apply Discount</button>
            </div>
        </div>
    </div>
</div>

<!-- Stock Update Modal -->
<div class="modal fade" id="stockModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title">Update Stock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="stockForm">
                    <div class="mb-3">
                        <label class="form-label fw-medium">Product:</label>
                        <div id="stockProductName" class="fw-bold">Premium Dog Food</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Current Stock:</label>
                        <div id="currentStock" class="fw-bold">1000 units</div>
                    </div>
                    <div class="mb-3">
                        <label for="stockAction" class="form-label">Action</label>
                        <select class="form-select" id="stockAction">
                            <option value="add">Add Stock</option>
                            <option value="remove">Remove Stock</option>
                            <option value="set">Set Exact Stock</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="stockQuantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="stockQuantity" value="0" min="0">
                    </div>
                    <div class="mb-3">
                        <label for="stockNote" class="form-label">Note (Optional)</label>
                        <textarea class="form-control" id="stockNote" rows="2"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="updateStockBtn">Update Stock</button>
            </div>
        </div>
    </div>
</div>

<!-- View Product Modal -->
<div class="modal fade" id="viewProductModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title">Product Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 200px;">
                            <i class="fas fa-paw fa-3x text-primary"></i>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h4 class="mb-1">Premium Dog Food</h4>
                        <span class="badge bg-success mb-2">Active</span>
                        <p class="text-muted">High-quality premium dog food with balanced nutrition.</p>
                        
                        <div class="row mt-3">
                            <div class="col-6 mb-2">
                                <div class="text-muted small">Category</div>
                                <div class="fw-medium">Food</div>
                            </div>
                            <div class="col-6 mb-2">
                                <div class="text-muted small">SKU</div>
                                <div class="fw-medium">PF-001</div>
                            </div>
                            <div class="col-6 mb-2">
                                <div class="text-muted small">Price</div>
                                <div class="fw-medium">₱2,500.00</div>
                            </div>
                            <div class="col-6">
                                <div class="text-muted small">Stock</div>
                                <div class="fw-medium">1000 units</div>
                            </div>
                        </div>
                        
                        <div class="mt-3">
                            <div class="text-muted small">Discount</div>
                            <div class="d-flex align-items-center">
                                <span class="badge bg-success me-2">15% OFF</span>
                                <span class="text-success">Final price: ₱2,125.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <hr>
                
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="card h-100">
                            <div class="card-header bg-light">
                                <h6 class="card-title mb-0">Stock History</h6>
                            </div>
                            <div class="card-body p-0">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div>
                                            <div class="fw-medium">+200 units added</div>
                                            <small class="text-muted">April 5, 2025</small>
                                        </div>
                                        <span class="badge bg-success rounded-pill">1000</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div>
                                            <div class="fw-medium">+300 units added</div>
                                            <small class="text-muted">March 22, 2025</small>
                                        </div>
                                        <span class="badge bg-success rounded-pill">800</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div>
                                            <div class="fw-medium">Initial stock</div>
                                            <small class="text-muted">March 10, 2025</small>
                                        </div>
                                        <span class="badge bg-success rounded-pill">500</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100">
                            <div class="card-header bg-light">
                                <h6 class="card-title mb-0">Price & Discount History</h6>
                            </div>
                            <div class="card-body p-0">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div>
                                            <div class="fw-medium">15% discount applied</div>
                                            <small class="text-muted">April 1, 2025</small>
                                        </div>
                                        <span class="text-success">₱2,125.00</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div>
                                            <div class="fw-medium">Price increased</div>
                                            <small class="text-muted">March 15, 2025</small>
                                        </div>
                                        <span>₱2,500.00</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div>
                                            <div class="fw-