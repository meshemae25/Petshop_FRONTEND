<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    @foreach($products as $product)
        <div class="col">
            <div class="card product-card h-100">
                <div class="position-relative">
                    <img src="{{ asset('images/products/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <button class="btn btn-icon position-absolute top-0 end-0 m-2 bg-white text-primary add-to-wishlist">
                        <i class="far fa-heart"></i>
                    </button>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="price">₱{{ number_format($product->price, 2) }}</span>
                        <button class="btn btn-sm btn-primary add-to-cart" data-product-id="{{ $product->id }}">
                            <i class="fas fa-shopping-cart me-1"></i> Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>