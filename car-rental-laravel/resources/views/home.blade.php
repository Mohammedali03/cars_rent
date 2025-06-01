@extends('layouts.app')

@section('title', 'CARrent - Home')

@section('content')
<!-- Hero Section with Carousel -->
<div class="hero-section position-relative">
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('storage/images/wallpaperslide1.jpg') }}" class="d-block w-100" alt="Car Rental">
                <div class="carousel-caption">
                    <h1 class="display-4 fw-bold mb-4">Find Your Perfect Ride</h1>
                    <p class="lead mb-4">Choose from our extensive fleet of premium vehicles</p>
                    <a href="{{ route('cars.index') }}" class="btn btn-primary btn-lg">Browse Cars</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('storage/images/wallpaperslide2.jpg') }}" class="d-block w-100" alt="Car Rental">
                <div class="carousel-caption">
                    <h1 class="display-4 fw-bold mb-4">Luxury & Comfort</h1>
                    <p class="lead mb-4">Experience premium vehicles at affordable rates</p>
                    <a href="{{ route('cars.index') }}" class="btn btn-primary btn-lg">View Fleet</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('storage/images/wallpaperslide3.jpg') }}" class="d-block w-100" alt="Car Rental">
                <div class="carousel-caption">
                    <h1 class="display-4 fw-bold mb-4">Flexible Rental Options</h1>
                    <p class="lead mb-4">Daily, weekly, and monthly rental plans available</p>
                    <a href="{{ route('cars.index') }}" class="btn btn-primary btn-lg">Get Started</a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<!-- Featured Cars Section -->
<section class="featured-cars py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Featured Vehicles</h2>
        <div class="row g-4">
            @foreach($cars->take(4) as $car)
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="position-relative">
                        <img src="{{ asset('storage/' . $car->image) }}" 
                             class="card-img-top" 
                             alt="{{ $car->name }}"
                             style="height: 200px; object-fit: cover;">
                        <div class="position-absolute top-0 end-0 m-2">
                            <span class="badge bg-primary">{{ $car->brand }}</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $car->name }}</h5>
                        <p class="text-primary fw-bold mb-3">${{ number_format($car->price, 2) }}/day</p>
                        <a href="{{ route('cars.index') }}" class="btn btn-outline-primary w-100">View Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('cars.index') }}" class="btn btn-primary btn-lg">View All Vehicles</a>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="why-choose-us py-5">
    <div class="container">
        <h2 class="text-center mb-2">Why Choose Us</h2>
        <p class="text-center text-muted mb-5">Experience the best car rental service with our premium features</p>

        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="feature-card text-center p-5">
                    <div class="icon-wrapper mb-4">
                        <i class="fas fa-car-side fa-4x text-primary"></i>
                    </div>
                    <h3 class="h4 mb-3">Premium Fleet</h3>
                    <p class="text-muted mb-0">Choose from our extensive collection of well-maintained vehicles, from luxury sedans to spacious SUVs</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card text-center p-5">
                    <div class="icon-wrapper mb-4">
                        <i class="fas fa-hand-holding-usd fa-4x text-primary"></i>
                    </div>
                    <h3 class="h4 mb-3">Best Value</h3>
                    <p class="text-muted mb-0">Enjoy competitive rates with transparent pricing and no hidden fees. We guarantee the best value for your money</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card text-center p-5">
                    <div class="icon-wrapper mb-4">
                        <i class="fas fa-headset fa-4x text-primary"></i>
                    </div>
                    <h3 class="h4 mb-3">24/7 Support</h3>
                    <p class="text-muted mb-0">Our dedicated team is available round the clock to assist you with any queries or concerns</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-2">What Our Clients Say</h2>
        <p class="text-center text-muted mb-5">Hear from our satisfied customers about their experience</p>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="testimonial-card card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-4">
                            <img src="{{ asset('storage/images/person_1.jpg') }}" 
                                 alt="HICHAM" 
                                 class="rounded-circle me-3"
                                 style="width: 60px; height: 60px; object-fit: cover;">
                            <div>
                                <h6 class="mb-0">HICHAM</h6>
                                <small class="text-muted">CEO, Company data</small>
                            </div>
                        </div>
                        <p class="card-text">"Exceptional service and great vehicles. The booking process was smooth and the staff was very helpful."</p>
                        <div class="text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="testimonial-card card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-4">
                            <img src="{{ asset('storage/images/person_3.jpg') }}" 
                                 alt="KHALID" 
                                 class="rounded-circle me-3"
                                 style="width: 60px; height: 60px; object-fit: cover;">
                            <div>
                                <h5 class="mb-1">KHALID</h5>
                                <p class="text-muted mb-0">Manager, Company streaming</p>
                            </div>
                        </div>
                        <p class="card-text">"The best car rental service I've used. Clean vehicles and professional staff. Highly recommended!"</p>
                        <div class="text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="testimonial-card card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-4">
                            <img src="{{ asset('storage/images/person_4.jpg') }}" 
                                 alt="HAMZA" 
                                 class="rounded-circle me-3"
                                 style="width: 60px; height: 60px; object-fit: cover;">
                            <div>
                                <h5 class="mb-1">HAMZA</h5>
                                <p class="text-muted mb-0">Supervisor, Hotel company</p>
                            </div>
                        </div>
                        <p class="card-text">"Great experience from start to finish. The cars are well-maintained and the prices are very reasonable."</p>
                        <div class="text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="cta-section py-5 bg-primary text-white">
    <div class="container text-center">
        <h2 class="mb-4">Ready to Start Your Journey?</h2>
        <p class="lead mb-4">Choose from our wide range of vehicles and enjoy the best rental experience</p>
        <a href="{{ route('cars.index') }}" class="btn btn-light btn-lg">Browse Our Fleet</a>
    </div>
</section>
@endsection

@push('styles')
<style>
    /* Hero Section */
    .hero-section {
        position: relative;
        height: 100vh;
        margin-bottom: 0;
        overflow: hidden;
    }

    .carousel {
        height: 100vh;
    }

    .carousel-inner {
        height: 100vh;
    }

    .carousel-item {
        height: 100vh;
        position: relative;
    }

    .carousel-item img {
        height: 100vh;
        width: 100%;
        object-fit: cover;
        filter: brightness(0.6);
    }

    .carousel-caption {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        width: 100%;
        padding: 0 15px;
    }

    .carousel-caption h1 {
        font-size: 4rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        margin-bottom: 1.5rem;
    }

    .carousel-caption p {
        font-size: 1.5rem;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        margin-bottom: 2rem;
    }

    .carousel-caption .btn {
        padding: 1rem 2.5rem;
        font-size: 1.2rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .carousel-caption .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
    }

    .carousel-control-prev,
    .carousel-control-next {
        width: 5%;
        opacity: 0.8;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        width: 40px;
        height: 40px;
    }

    /* Featured Cars */
    .featured-cars .card {
        transition: transform 0.3s ease;
    }

    .featured-cars .card:hover {
        transform: translateY(-5px);
    }

    /* Feature Cards */
    .feature-card {
        background: white;
        border-radius: 15px;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        height: 100%;
        position: relative;
        overflow: hidden;
    }

    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }

    .feature-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background: linear-gradient(90deg, #0d6efd, #0a58ca);
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .feature-card:hover::before {
        transform: scaleX(1);
    }

    .icon-wrapper {
        width: 120px;
        height: 120px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(13, 110, 253, 0.1);
        border-radius: 50%;
        transition: all 0.3s ease;
    }

    .feature-card:hover .icon-wrapper {
        background: rgba(13, 110, 253, 0.2);
        transform: scale(1.1);
    }

    .feature-card h3 {
        color: #2c3e50;
        font-weight: 600;
    }

    .feature-card p {
        font-size: 1.1rem;
        line-height: 1.6;
    }

    /* Testimonial Cards */
    .testimonial-card {
        transition: transform 0.3s ease;
    }

    .testimonial-card:hover {
        transform: translateY(-5px);
    }

    /* CTA Section */
    .cta-section {
        background: linear-gradient(45deg, #0d6efd, #0a58ca);
    }

    .btn-light {
        padding: 0.75rem 2rem;
        font-weight: 500;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .carousel-caption h1 {
            font-size: 2.5rem;
        }

        .carousel-caption p {
            font-size: 1.2rem;
        }

        .carousel-caption .btn {
            padding: 0.75rem 2rem;
            font-size: 1rem;
        }
    }
</style>
@endpush 