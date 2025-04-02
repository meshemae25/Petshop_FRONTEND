<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product-detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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

        /* Hero Section */
        .hero-section {
            background-color: var(--primary-color);
            color: var(--white);
            padding: 5rem 0;
            position: relative;
            overflow: hidden;
            border-radius: 0 0 30px 30px;
            box-shadow: var(--box-shadow);
        }

        .hero-section h1 {
            font-weight: 800;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .hero-section .lead {
            font-size: 1.25rem;
            margin-bottom: 2rem;
        }

        .hero-section .btn-primary {
            background-color: var(--white);
            color: var(--primary-color);
            border-color: var(--white);
            padding: 12px 25px;
        }

        .hero-section .btn-outline-primary {
            color: var(--white);
            border-color: var(--white);
            padding: 12px 25px;
        }

        .hero-section .btn-outline-primary:hover {
            background-color: var(--white);
            color: var(--primary-color);
        }

        .hero-image {
            transform: scale(1.1);
            filter: drop-shadow(0 10px 15px rgba(0, 0, 0, 0.2));
            transition: transform 0.5s ease;
        }

        .hero-image:hover {
            transform: scale(1.15) translateY(-5px);
        }

        /* Category Section */
        .category-section {
            padding: 4rem 0;
        }

        .section-title {
            font-weight: 700;
            margin-bottom: 0.5rem;
            position: relative;
            display: inline-block;
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background-color: var(--primary-color);
            border-radius: 10px;
        }

        .section-subtitle {
            color: var(--light-text);
            margin-bottom: 3rem;
        }

        .category-item {
            transition: var(--transition);
            cursor: pointer;
            padding: 20px 15px;
            border-radius: var(--border-radius);
        }

        .category-item:hover {
            transform: translateY(-8px);
            background-color: var(--gray-100);
            box-shadow: var(--box-shadow);
        }

        .icon-bg {
            width: 80px;
            height: 80px;
            margin: 0 auto;
            background-color: var(--primary-color);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }

        .category-item:hover .icon-bg {
            border-radius: 30px;
            transform: rotate(5deg);
        }

        .category-icon {
            width: 40px;
            height: 40px;
            filter: brightness(0) invert(1);
        }

        .category-name {
            font-weight: 600;
            margin-top: 1rem;
            color: var(--text-color);
        }
        /* Footer */
        .footer {
            background-color: var(--primary-color);
            color: var(--white);
            padding: 5rem 0 2rem;
            border-radius: 30px 30px 0 0;
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

        .payment-icon {
            height: 30px;
            margin-left: 15px;
            filter: brightness(0) invert(1);
            transition: var(--transition);
        }

        .payment-icon:hover {
            transform: scale(1.1);
        }

        hr.footer-divider {
            border-color: rgba(255, 255, 255, 0.2);
            margin: 2.5rem 0;
        }

        .copyright {
            color: rgba(255, 255, 255, 0.8);
        }

        /* Toast Notification */
        .toast-notification {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: var(--white);
            color: var(--text-color);
            padding: 15px 25px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            display: flex;
            align-items: center;
            transform: translateY(100px);
            opacity: 0;
            transition: all 0.3s ease;
            z-index: 1000;
            border-left: 4px solid var(--primary-color);
        }
        
        .toast-notification.show {
            transform: translateY(0);
            opacity: 1;
        }
        
        .toast-content {
            display: flex;
            align-items: center;
        }
        
        .toast-content i {
            margin-right: 15px;
            color: var(--primary-color);
            font-size: 1.2rem;
        }

        .toast-notification .btn-close {
            margin-left: 15px;
            opacity: 0.5;
            transition: var(--transition);
        }

        .toast-notification .btn-close:hover {
            opacity: 1;
        }

        /* Back to top button */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            left: 30px;
            width: 50px;
            height: 50px;
            background-color: var(--primary-color);
            color: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
            z-index: 999;
        }

        .back-to-top.show {
            opacity: 1;
            visibility: visible;
        }

        .back-to-top:hover {
            background-color: var(--primary-dark);
            color: var(--white);
            transform: translateY(-5px);
        }

        /* Animation Classes */
        .fade-in-up {
            animation: fadeInUp 0.5s ease forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 991.98px) {
            .hero-section {
                padding: 4rem 0;
                text-align: center;
            }
            
            .hero-image {
                margin-top: 2rem;
            }
            
            .category-item {
                margin-bottom: 1.5rem;
            }
            
            .product-card {
                margin-bottom: 30px;
            }
            
            .testimonial-img-container {
                width: 150px;
                height: 150px;
                margin-bottom: 2rem;
            }
            
            .testimonial-card {
                margin-bottom: 30px;
            }
        }

        @media (max-width: 767.98px) {
            .navbar .container {
                padding-left: 15px;
                padding-right: 15px;
            }
            
            .hero-section h1 {
                font-size: 2.5rem;
            }
            
            .category-row {
                display: flex;
                flex-wrap: nowrap;
                overflow-x: auto;
                padding-bottom: 1rem;
                margin-bottom: 1rem;
                -ms-overflow-style: none;
                scrollbar-width: none;
            }
            
            .category-row::-webkit-scrollbar {
                display: none;
            }
            
            .category-col {
                min-width: 140px;
            }
            
            .section-title:after {
                width: 40px;
            }
            
            .testimonial-section {
                padding: 3rem 0;
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
            <a href="{{ route('favorites') }}" class="nav-icon text-dark ms-3"><i class="fas fa-heart"></i></a>
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
<!-- Main Content -->
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row">
        <!-- Product Images Section -->
        <div class="col-md-5">
            <div class="position-relative">
                <!-- Main Product Image with Navigation Arrows -->
                <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('images/products/brit-premium-salmon.jpg') }}" class="d-block w-100" alt="Brit Premium by Nature">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/products/brit-premium-chicken.jpg') }}" class="d-block w-100" alt="Brit Premium by Nature">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/products/brit-premium-turkey.jpg') }}" class="d-block w-100" alt="Brit Premium by Nature">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                
                <!-- Wishlist Button -->
                <button class="btn position-absolute top-0 end-0 m-2 bg-white rounded-circle p-2" style="width: 40px; height: 40px;">
                    <i class="far fa-heart"></i>
                </button>
            </div>
            
            <!-- Thumbnail Images -->
            <div class="row mt-3">
                <div class="col-3">
                    <img src="{{ asset('images/products/brit-premium-salmon-thumb.jpg') }}" class="img-thumbnail" data-bs-target="#productCarousel" data-bs-slide-to="0" alt="Salmon">
                </div>
                <div class="col-3">
                    <img src="{{ asset('images/products/brit-premium-chicken-thumb.jpg') }}" class="img-thumbnail" data-bs-target="#productCarousel" data-bs-slide-to="1" alt="Chicken">
                </div>
                <div class="col-3">
                    <img src="{{ asset('images/products/brit-premium-turkey-thumb.jpg') }}" class="img-thumbnail" data-bs-target="#productCarousel" data-bs-slide-to="2" alt="Turkey">
                </div>
                <div class="col-3">
                    <img src="{{ asset('images/products/brit-premium-lamb-thumb.jpg') }}" class="img-thumbnail" data-bs-target="#productCarousel" data-bs-slide-to="3" alt="Lamb">
                </div>
            </div>
            
            <!-- Reviews and Store Location -->
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div>
                    <span class="badge bg-light text-dark">Reviews</span>
                    <div class="d-flex align-items-center mt-1">
                        <div class="rating me-2">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= 4)
                                    <i class="fas fa-star"></i>
                                @else
                                    <i class="fas fa-star-half-alt"></i>
                                @endif
                            @endfor
                        </div>
                        <span class="text-muted small">({{ $reviews ?? '4.8' }}) {{ $reviewCount ?? '202' }} reviews</span>
                    </div>
                </div>
                <div>
                    <span class="badge bg-success text-white">Best Seller</span>
                </div>
            </div>
            
            <div class="mt-3">
                <i class="fas fa-map-marker-alt text-danger"></i>
                <span class="small ms-1">Rizal, Metro Philippines</span>
                <div class="mt-2">
                    <a href="#" class="text-primary small text-decoration-none">visit store</a>
                </div>
            </div>
        </div>
        
        <!-- Product Details Section -->
        <div class="col-md-7">
            <h2 class="fw-bold">BRIT Premium by Nature</h2>
            
            <!-- Star Rating -->
            <div class="d-flex align-items-center mb-2">
                <div class="rating">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= 4)
                            <i class="fas fa-star"></i>
                        @else
                            <i class="fas fa-star-half-alt"></i>
                        @endif
                    @endfor
                </div>
                <span class="text-muted ms-2">({{ $reviews ?? '4.8' }})</span>
                <span class="ms-2 text-muted">{{ $reviewCount ?? '202' }} reviews</span>
                <span class="ms-3 badge bg-success">Best Seller</span>
            </div>
            
            <!-- Select Flavor -->
            <div class="mt-4">
                <h6 class="mb-3">Select Flavor</h6>
                <div class="d-flex flex-wrap">
                    <div class="form-check me-3 mb-2">
                        <input class="form-check-input" type="radio" name="flavor" id="salmon" checked>
                        <label class="form-check-label" for="salmon">
                            <span class="badge bg-primary px-3 py-2">Salmon & Tuna</span>
                        </label>
                    </div>
                    <div class="form-check me-3 mb-2">
                        <input class="form-check-input" type="radio" name="flavor" id="salmon-chicken">
                        <label class="form-check-label" for="salmon-chicken">
                            <span class="badge bg-light text-dark px-3 py-2">Fresh Salmon & Chicken</span>
                        </label>
                    </div>
                    <div class="form-check me-3 mb-2">
                        <input class="form-check-input" type="radio" name="flavor" id="turkey-salmon">
                        <label class="form-check-label" for="turkey-salmon">
                            <span class="badge bg-light text-dark px-3 py-2">Fresh Turkey & Salmon</span>
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="flavor" id="lamb-rice">
                        <label class="form-check-label" for="lamb-rice">
                            <span class="badge bg-light text-dark px-3 py-2">Lamb Meat and Rice</span>
                        </label>
                    </div>
                </div>
            </div>
            
            <!-- Description -->
            <div class="mt-4">
                <h6 class="mb-2">Description</h6>
                <p class="text-muted">
                    Brit is a Czech pet food brand offering UK Premium and Brit Care cat food with higher meat content - a healthy and nutritionally balanced dry cat food option. Here we have puppies like Chicken, Salmon, Lamb, and Beef Meal. In Brit Care is a super-premium, hypoallergenic range with grain-free options and natural antioxidants. Free from colorants, preservatives, and GMO quality ingredients, supporting digestion, immunity, and overall health.
                </p>
            </div>
            
            <!-- Details -->
            <div class="mt-3">
                <h6 class="mb-2">Details</h6>
                <p class="mb-1"><i class="fas fa-globe me-2 text-primary"></i> Sent from Rizal, Metro Philippines</p>
                <p><i class="fas fa-truck me-2 text-primary"></i> Estimated Shipping: 7-10 days</p>
            </div>
            
            <!-- Quantity and Price -->
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div>
                    <h6 class="mb-2">Quantity</h6>
                    <div class="input-group" style="width: 120px;">
                        <button class="btn btn-outline-secondary" type="button" id="decrementBtn">-</button>
                        <input type="text" class="form-control text-center" value="1" id="quantity">
                        <button class="btn btn-outline-secondary" type="button" id="incrementBtn">+</button>
                    </div>
                </div>
                <div>
                    <h6 class="mb-2">Price</h6>
                    <h3 class="fw-bold">₱450.00</h3>
                </div>
            </div>
            
            <!-- Action Buttons -->
            <div class="d-flex mt-4">
                <button class="btn btn-primary flex-grow-1 me-2">Buy Now</button>
                <button class="btn btn-orange flex-grow-1"><i class="fas fa-shopping-cart me-2"></i>Add to Cart</button>
            </div>
        </div>
    </div>
</div>

<!-- Toast Notification for Add to Cart -->
<div class="toast-notification" id="cartNotification">
    <div class="toast-content">
        <i class="fas fa-check-circle"></i>
        <div>
            <strong>Product added to cart!</strong>
            <p class="mb-0 small">You can view your cart anytime.</p>
        </div>
    </div>
    <button type="button" class="btn-close" onclick="hideToast()"></button>
</div>
@endsection

@section('scripts')
<script>
    // Quantity incrementer/decrementer
    document.getElementById('incrementBtn').addEventListener('click', function() {
        let quantity = document.getElementById('quantity');
        quantity.value = parseInt(quantity.value) + 1;
    });
    
    document.getElementById('decrementBtn').addEventListener('click', function() {
        let quantity = document.getElementById('quantity');
        if (parseInt(quantity.value) > 1) {
            quantity.value = parseInt(quantity.value) - 1;
        }
    });
    
    // Add to cart notification
    document.querySelector('.btn-orange').addEventListener('click', function() {
        const toast = document.getElementById('cartNotification');
        toast.classList.add('show');
        
        setTimeout(function() {
            hideToast();
        }, 3000);
    });
    
    function hideToast() {
        const toast = document.getElementById('cartNotification');
        toast.classList.remove('show');
    }
    
    // Thumbnail image click handlers
    document.querySelectorAll('.img-thumbnail').forEach(function(thumb, index) {
        thumb.addEventListener('click', function() {
            const carousel = document.getElementById('productCarousel');
            const bsCarousel = new bootstrap.Carousel(carousel);
            bsCarousel.to(index);
        });
    });
</script>
@endsection
