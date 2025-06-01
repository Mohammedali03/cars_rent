@extends('layouts.app')

@section('title', 'Available Cars')

@section('content')
<!-- Heading Section -->
<div class="container py-5">
    <h1 class="text-center mb-5">Choose the best here.</h1>

    <!-- Container for Cars -->
    <div class="row g-4" id="car-listings">
        @forelse($cars as $car)
            <div class="col-md-6 col-lg-4">
                <div class="car card h-100 shadow-sm">
                    <div class="position-relative">
                        <img src="{{ asset('storage/' . $car->image) }}" 
                             class="card-img-top" 
                             alt="{{ $car->name }}" 
                             style="height: 250px; object-fit: cover;">
                        <div class="position-absolute top-0 end-0 m-2">
                            <span class="badge bg-primary">{{ $car->brand }}</span>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h3 class="card-title h4 mb-3">{{ $car->name }}</h3>
                        <p class="card-text text-muted mb-3">{{ Str::limit($car->description, 100) }}</p>
                        <div class="car-details mb-3">
                            <div class="row g-2">
                                <div class="col-6">
                                    <small class="text-muted d-block">Model</small>
                                    <strong>{{ $car->model }}</strong>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted d-block">Transmission</small>
                                    <strong>{{ $car->transmission }}</strong>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted d-block">Interior</small>
                                    <strong>{{ $car->interior }}</strong>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted d-block">Price</small>
                                    <strong class="text-primary">${{ number_format($car->price, 2) }}/day</strong>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('cars.show', $car) }}" class="btn btn-primary mt-auto">View Details</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    No cars available at the moment.
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-5">
        {{ $cars->links() }}
    </div>
</div>
@endsection

@push('styles')
<style>
    .car {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
        border-radius: 10px;
        overflow: hidden;
    }

    .car:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1) !important;
    }

    .card-img-top {
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    .car-details {
        background-color: #f8f9fa;
        padding: 1rem;
        border-radius: 8px;
    }

    .btn-primary {
        padding: 0.75rem 1.5rem;
        font-weight: 500;
        border-radius: 5px;
    }

    .badge {
        font-size: 0.8rem;
        padding: 0.5rem 0.75rem;
        border-radius: 5px;
    }
</style>
@endpush 