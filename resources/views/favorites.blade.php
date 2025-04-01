<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawShop - Favorites</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Main Stylesheet for PawShop */
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
            background-color: var(--secondary-color);
        }

        /* Common Button Styles */
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

        .btn-orange {
            background-color: orange;
            border-color: orange;
            color: white;
            transition: var(--transition);
        }

        .btn-orange:hover {
            background-color: darkorange;
            border-color: darkorange;
            color: white;
        }

        /* Header & Navigation */
        .navbar {
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .navbar-brand {
            font-weight: 700;
        }

        .nav-link {
            font-weight: 500;
            padding: 8px 16px !important;
            margin-right: 5px;
            border-radius: 20px;
            transition: var(--transition);
        }

        .nav-link:hover, .nav-link.active {
            background-color: rgba(0, 153, 255, 0.1);
            color: var(--primary-color) !important;
        }

        .nav-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background-color: var(--gray-100);
            transition: var(--transition);
        }

        .nav-icon:hover {
            background-color: var(--primary-color);
            color: var(--white) !important;
        }

        /* Page Title Section */
        .page-title {
            background-color: var(--white);
            padding: 2rem 0;
            margin-bottom: 2rem;
            border-radius: 0 0 var(--border-radius) var(--border-radius);
            box-shadow: var(--box-shadow);
        }

        .page-title h1 {
            font-weight: 700;
            color: var(--text-color);
            margin-bottom: 0.5rem;
        }

        .page-title p {
            color: var(--light-text);
            margin-bottom: 0;
        }

        /* Search Bar */
        .search-container {
            margin-bottom: 2rem;
        }

        .search-input {
            border-radius: 50px;
            padding: 12px 20px;
            border: 1px solid var(--gray-200);
            box-shadow: var(--box-shadow);
        }

        .search-btn {
            border-radius: 50px;
            padding: 10px 20px;
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        /* Product Cards */
        .product-card {
            background-color: var(--white);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--box-shadow);
            transition: var(--transition);
            border: none;
            height: 100%;
            margin-bottom: 30px;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
        }

        .product-card .card-img-top {
            height: 180px;
            object-fit: cover;
            transition: var(--transition);
        }

        .product-card:hover .card-img-top {
            transform: scale(1.05);
        }

        .product-card .card-body {
            padding: 1.5rem;
        }

        .product-card .card-title {
            font-weight: 700;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            height: 40px;
            overflow: hidden;
        }

        .price {
            font-weight: 700;
            font-size: 1.1rem;
            color: var(--primary-color);
        }

        .old-price {
            text-decoration: line-through;
            color: var(--light-text);
            font-size: 0.8rem;
            margin-right: 8px;
        }

        .product-card .btn {
            padding: 8px 15px;
            font-size: 0.85rem;
        }

        .favorite-btn {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--white);
            color: #ff4d4d;
            border: none;
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 1;
            transition: var(--transition);
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .favorite-btn:hover {
            transform: scale(1.1);
        }

        .rating {
            color: var(--accent-color);
            font-size: 0.8rem;
            margin-top: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .reviews-count {
            font-size: 0.8rem;
            color: var(--light-text);
        }

        /* Empty Favorites */
        .empty-favorites {
            background-color: var(--white);
            border-radius: var(--border-radius);
            padding: 3rem;
            text-align: center;
            margin: 2rem 0;
            box-shadow: var(--box-shadow);
        }

        .empty-favorites i {
            font-size: 4rem;
            color: var(--gray-200);
            margin-bottom: 1.5rem;
        }

        .empty-favorites h3 {
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .empty-favorites p {
            color: var(--light-text);
            margin-bottom: 1.5rem;
        }

        /* Footer */
        .footer {
            background-color: var(--primary-color);
            color: var(--white);
            padding: 5rem 0 2rem;
            border-radius: 30px 30px 0 0;
            margin-top: 4rem;
        }

        .footer-widget h4 {
            font-weight: 700;
            margin-bottom: 1.5rem;
            position: relative;
            display: inline-block;
        }

        .footer-widget h4:after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 30px;
            height: 2px;
            background-color: var(--white);
        }

        .footer-links {
            margin-top: 1.5rem;
        }

        .footer-links li {
            margin-bottom: 0.8rem;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: var(--transition);
            display: inline-block;
        }

        .footer-links a:hover {
            color: var(--white);
            transform: translateX(5px);
        }

        .social-links {
            display: flex;
            margin-top: 1.5rem;
        }

        .social-links a {
            display: flex;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.15);
            border-radius: 50%;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: var(--white);
            margin-right: 10px;
            transition: var(--transition);
        }

        .social-links a:hover {
            background-color: var(--white);
            color: var(--primary-color);
            transform: translateY(-5px);
        }

        hr.footer-divider {
            border-color: rgba(255, 255, 255, 0.2);
            margin: 2.5rem 0;
        }

        .copyright {
            color: rgba(255, 255, 255, 0.8);
        }

        /* Responsive */
        @media (max-width: 991.98px) {
            .product-card {
                margin-bottom: 30px;
            }
        }

        @media (max-width: 767.98px) {
            .navbar .container {
                padding-left: 15px;
                padding-right: 15px;
            }
            
            .page-title {
                text-align: center;
            }
            
            .footer {
                padding-top: 3rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header/Navigation -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('images/pawshop-logo.png') }}" alt="PawShop Logo" height="40">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('shop') ? 'active' : '' }}" href="{{ route('shop') }}">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex align-items-center">
                    @include('components.search')
                    <a href="{{ route('account') }}" class="nav-icon text-dark ms-3"><i class="fas fa-user"></i></a>
                    <a href="{{ route('cart') }}" class="nav-icon text-dark position-relative ms-3">
                        <i class="fas fa-shopping-cart"></i>
                        @if(session()->has('cart') && count(session('cart')) > 0)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                                {{ count(session('cart')) }}
                            </span>
                        @endif
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <!-- Page Title -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Favorites</h1>
                    <p>Find your saved items and get ready to order them.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Favorites Content -->
    <section class="favorites-section">
        <div class="container">
            <!-- Search Bar -->
            <div class="row justify-content-center">
                <div class="col-md-8 search-container">
                    <form action="{{ route('favorites.search') }}" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control search-input" name="search" placeholder="Search favorites..." value="{{ request('search') }}">
                            <button class="btn search-btn" type="submit">
                                <i class="fas fa-search text-white"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            @if(count($favorites) > 0)
                <div class="row">
                    @foreach($favorites as $product)
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="product-card">
                                <div class="position-relative">
                                    <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                                    <button class="favorite-btn" onclick="removeFromFavorites({{ $product->id }})">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <div class="rating">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $product->rating)
                                                <i class="fas fa-star"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                        <span class="reviews-count">({{ $product->reviews_count }})</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        @if($product->discount_price)
                                            <span class="old-price">Rp. {{ number_format($product->price, 0, ',', '.') }}</span>
                                            <span class="price">Rp. {{ number_format($product->discount_price, 0, ',', '.') }}</span>
                                        @else
                                            <span class="price">Rp. {{ number_format($product->price, 0, ',', '.') }}</span>
                                        @endif
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <form action="{{ route('cart.add') }}" method="POST" class="flex-grow-1 me-2">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button type="submit" class="btn btn-primary w-100">Buy</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $favorites->links() }}
                </div>
            @else
                <div class="empty-favorites">
                    <i class="far fa-heart"></i>
                    <h3>Your favorites list is empty</h3>
                    <p>Save your favorite items to find them easily when you're ready to shop.</p>
                    <a href="{{ route('shop') }}" class="btn btn-primary">Browse Products</a>
                </div>
            @endif
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="footer-widget">
                        <h4>About PawShop</h4>
                        <p>We're dedicated to providing the best products for your beloved pets. Quality, affordability and care are our top priorities.</p>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                    <div class="footer-widget">
                        <h4>Shop</h4>
                        <ul class="list-unstyled footer-links">
                            <li><a href="#">Dogs</a></li>
                            <li><a href="#">Cats</a></li>
                            <li><a href="#">Birds</a></li>
                            <li><a href="#">Small Pets</a></li>
                            <li><a href="#">Accessories</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                    <div class="footer-widget">
                        <h4>Company</h4>
                        <ul class="list-unstyled footer-links">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Terms of Service</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">FAQs</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget">
                        <h4>Contact Us</h4>
                        <p><i class="fas fa-map-marker-alt me-2"></i> 123 Pawsome Street, Pet City</p>
                        <p><i class="fas fa-phone-alt me-2"></i> +123 456 7890</p>
                        <p><i class="fas fa-envelope me-2"></i> support@pawshop.com</p>
                        <div class="mt-3">
                            <h6 class="text-white mb-3">Accepted Payments</h6>
                            <div class="d-flex">
                                <img src="{{ asset('images/visa.png') }}" alt="Visa" class="payment-icon">
                                <img src="{{ asset('images/mastercard.png') }}" alt="Mastercard" class="payment-icon">
                                <img src="{{ asset('images/paypal.png') }}" alt="PayPal" class="payment-icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="footer-divider">
            <div class="text-center copyright">
                <p>© {{ date('Y') }} PawShop. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript for Favorites Functionality -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function removeFromFavorites(productId) {
            // Using Fetch API to make an AJAX request
            fetch("{{ route('favorites.remove') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ product_id: productId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Remove the product card from the DOM
                    const productCard = document.querySelector(`[data-product-id="${productId}"]`);
                    if (productCard) {
                        productCard.closest('.col-6').remove();
                    }
                    
                    // Reload the page if no products left
                    if (document.querySelectorAll('.product-card').length === 0) {
                        location.reload();
                    }
                    
                    // Show toast notification
                    showToast('Product removed from favorites');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
        
        function showToast(message) {
            // Create toast element
            const toast = document.createElement('div');
            toast.className = 'toast-notification';
            toast.innerHTML = `
                <div class="toast-content">
                    <i class="fas fa-check-circle"></i>
                    <span>${message}</span>
                </div>
                <button type="button" class="btn-close" onclick="this.parentElement.remove()"></button>
            `;
            
            // Add to body
            document.body.appendChild(toast);
            
            // Show the toast
            setTimeout(() => {
                toast.classList.add('show');
            }, 100);
            
            // Auto remove after 3 seconds
            setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => {
                    toast.remove();
                }, 300);
            }, 3000);
        }
    </script>
</body>
</html>
