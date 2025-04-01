<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawShop - Everything Your Pet Needs</title>
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

        /* Product Cards */
        .product-section {
            background-color: var(--gray-100);
            padding: 4rem 0;
            border-radius: 30px;
        }

        .product-card {
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--box-shadow);
            transition: var(--transition);
            border: none;
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
        }

        .product-card .card-img-top {
            height: 220px;
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
        }

        .product-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: var(--accent-color);
            color: var(--text-color);
            font-weight: 600;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
        }

        .price {
            font-weight: 700;
            font-size: 1.3rem;
            color: var(--primary-color);
        }

        .old-price {
            text-decoration: line-through;
            color: var(--light-text);
            font-size: 0.9rem;
            margin-right: 8px;
        }

        .product-card .btn-primary {
            padding: 8px 15px;
            font-size: 0.9rem;
        }

        .product-card .btn-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--gray-100);
            color: var(--primary-color);
            border: none;
            margin-left: 10px;
            transition: var(--transition);
        }

        .product-card .btn-icon:hover {
            background-color: var(--primary-color);
            color: var(--white);
        }

        .carousel-control-next {
            width: 50px;
            height: 50px;
            top: 50%;
            transform: translateY(-50%);
            background-color: var(--white);
            border-radius: 50%;
            box-shadow: var(--box-shadow);
            opacity: 1;
            margin-right: -25px;
        }

        .carousel-control-next-icon {
            width: 20px;
            height: 20px;
            background-color: var(--primary-color);
        }

        /* Partners Section */
        .partners-section {
            padding: 4rem 0;
        }

        .partner-logo {
            max-height: 60px;
            filter: opacity(0.7);
            transition: var(--transition);
        }

        .partner-logo:hover {
            filter: opacity(1);
            transform: scale(1.05);
        }

        /* Testimonials Section */
        .testimonials-section {
            background-color: var(--primary-color);
            color: var(--white);
            padding: 5rem 0;
            position: relative;
            border-radius: 30px;
            margin: 4rem 0;
        }

        .testimonial-img-container {
            width: 180px;
            height: 180px;
            margin: 0 auto;
            border-radius: 20px;
            overflow: hidden;
            border: 5px solid var(--white);
            box-shadow: var(--box-shadow);
            transition: var(--transition);
        }

        .testimonial-img-container:hover {
            transform: scale(1.05) rotate(2deg);
            border-radius: 30px;
        }

        .testimonial-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .testimonial-card {
            border-radius: 15px;
            padding: 1.5rem;
            background-color: var(--white);
            height: 100%;
            transition: var(--transition);
            box-shadow: var(--box-shadow);
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
        }

        .testimonial-text {
            font-style: italic;
            font-size: 0.95rem;
            color: var(--text-color);
            margin-bottom: 1rem;
            position: relative;
        }

        .testimonial-text:before {
            content: '"';
            font-size: 3rem;
            position: absolute;
            left: -10px;
            top: -20px;
            color: rgba(0, 153, 255, 0.1);
            font-family: serif;
        }

        .testimonial-card .avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 15px;
        }

        .testimonial-card .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .testimonial-card .customer-info {
            flex: 1;
        }

        .testimonial-card .customer-name {
            font-weight: 700;
            margin-bottom: 0;
        }

        .testimonial-card .customer-type {
            font-size: 0.8rem;
            color: var(--light-text);
        }

        .rating {
            font-weight: 600;
        }

        .rating i {
            color: var(--accent-color);
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