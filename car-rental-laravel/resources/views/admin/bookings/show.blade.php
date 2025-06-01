@extends('layouts.app')

@section('title', 'Booking Details')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-2">
                            <i class="fas fa-arrow-left me-2"></i>Back to Dashboard
                        </a>
                        <h4 class="mb-0">Booking Details #{{ $booking->id }}</h4>
                    </div>
                    <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to List
                    </a>
                </div>
                <div class="card-body">
                    <!-- Booking Status -->
                    <div class="mb-4">
                        <h5>Status</h5>
                        <span class="badge bg-{{ $booking->status === 'confirmed' ? 'success' : 
                            ($booking->status === 'pending' ? 'warning' : 
                            ($booking->status === 'cancelled' ? 'danger' : 'secondary')) }} fs-6">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </div>

                    <!-- Booking Dates and Price -->
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <h5>Start Date</h5>
                            <p>{{ $booking->start_date->format('M d, Y') }}</p>
                        </div>
                        <div class="col-md-4">
                            <h5>End Date</h5>
                            <p>{{ $booking->end_date->format('M d, Y') }}</p>
                        </div>
                        <div class="col-md-4">
                            <h5>Total Price</h5>
                            <p class="text-primary fw-bold">${{ number_format($booking->total_price, 2) }}</p>
                        </div>
                    </div>

                    <!-- Car Details -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">Car Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ Storage::url($booking->car->image) }}" 
                                         alt="{{ $booking->car->name }}" 
                                         class="img-fluid rounded">
                                </div>
                                <div class="col-md-8">
                                    <h5>{{ $booking->car->name }}</h5>
                                    <p class="mb-1"><strong>Brand:</strong> {{ $booking->car->brand }}</p>
                                    <p class="mb-1"><strong>Model:</strong> {{ $booking->car->model }}</p>
                                    <p class="mb-1"><strong>Transmission:</strong> {{ $booking->car->transmission }}</p>
                                    <p class="mb-1"><strong>Interior:</strong> {{ $booking->car->interior }}</p>
                                    <p class="mb-1"><strong>Price per Day:</strong> ${{ number_format($booking->car->price, 2) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- User Details -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">User Details</h5>
                        </div>
                        <div class="card-body">
                            <p class="mb-1"><strong>Name:</strong> {{ $booking->user->name }}</p>
                            <p class="mb-1"><strong>Email:</strong> {{ $booking->user->email }}</p>
                            <p class="mb-1"><strong>Phone:</strong> {{ $booking->user->phone }}</p>
                            <p class="mb-1"><strong>Address:</strong> {{ $booking->user->address }}</p>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="d-flex justify-content-between">
                        <form action="{{ route('admin.bookings.destroy', $booking) }}" 
                              method="POST" 
                              onsubmit="return confirm('Are you sure you want to delete this booking?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash me-2"></i>Delete Booking
                            </button>
                        </form>
                        <button type="button" 
                                class="btn btn-primary" 
                                data-bs-toggle="modal" 
                                data-bs-target="#statusModal">
                            <i class="fas fa-edit me-2"></i>Update Status
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Status Update Modal -->
<div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.bookings.status', $booking) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel">Update Booking Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="pending" {{ $booking->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="confirmed" {{ $booking->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                            <option value="cancelled" {{ $booking->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            <option value="completed" {{ $booking->status === 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Status</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 