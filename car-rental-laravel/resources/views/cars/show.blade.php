@extends('layouts.app')

@section('title', $car->name)

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            @if($car->image)
                <img src="{{ asset('storage/' . $car->image) }}" 
                     class="car-detail-image rounded shadow" 
                     alt="{{ $car->name }}">
            @else
                <img src="{{ asset('images/no-image.jpg') }}" 
                     class="car-detail-image rounded shadow" 
                     alt="No image available">
            @endif
        </div>
        <div class="col-md-6">
            <h1 class="mb-3">{{ $car->name }}</h1>
            <p class="lead mb-4">{{ $car->description }}</p>
            
            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="card-title mb-3">Car Details</h4>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <strong>Brand:</strong><br>
                            <span class="text-muted">{{ $car->brand }}</span>
                        </div>
                        <div class="col-6 mb-3">
                            <strong>Model:</strong><br>
                            <span class="text-muted">{{ $car->model }}</span>
                        </div>
                        <div class="col-6 mb-3">
                            <strong>Transmission:</strong><br>
                            <span class="text-muted">{{ $car->transmission }}</span>
                        </div>
                        <div class="col-6 mb-3">
                            <strong>Interior:</strong><br>
                            <span class="text-muted">{{ $car->interior }}</span>
                        </div>
                        <div class="col-12">
                            <strong>Price:</strong><br>
                            <span class="h4 text-primary">${{ number_format($car->price, 2) }}/day</span>
                        </div>
                    </div>
                </div>
            </div>

            @auth
                <a href="{{ route('services.create', $car) }}" class="btn btn-primary btn-lg w-100">Book Now</a>
            @else
                <div class="alert alert-info">
                    Please <a href="{{ route('login') }}" class="alert-link">login</a> to book this car.
                </div>
            @endauth
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Set minimum date for start_date to today
    document.getElementById('start_date').min = new Date().toISOString().split('T')[0];
    
    // Update end_date minimum when start_date changes
    document.getElementById('start_date').addEventListener('change', function() {
        document.getElementById('end_date').min = this.value;
    });
</script>
@endpush 