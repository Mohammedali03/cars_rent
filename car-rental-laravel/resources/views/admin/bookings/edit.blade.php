@extends('layouts.app')

@section('title', 'Update Booking Status')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Update Booking Status</h4>
                        <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to Bookings
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="booking-details mb-4">
                        <h5 class="mb-3">Booking Details</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Booking ID:</strong> #{{ $booking->id }}</p>
                                <p><strong>User:</strong> {{ $booking->user->name }}</p>
                                <p><strong>Car:</strong> {{ $booking->car->name }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Start Date:</strong> {{ $booking->start_date->format('M d, Y') }}</p>
                                <p><strong>End Date:</strong> {{ $booking->end_date->format('M d, Y') }}</p>
                                <p><strong>Total Price:</strong> ${{ number_format($booking->amount, 2) }}</p>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('admin.bookings.status', $booking) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        
                        <div class="mb-4">
                            <label for="status" class="form-label">Current Status</label>
                            <div class="current-status mb-2">
                                <span class="badge bg-{{ $booking->status === 'confirmed' ? 'success' : 
                                    ($booking->status === 'pending' ? 'warning' : 
                                    ($booking->status === 'cancelled' ? 'danger' : 'secondary')) }}">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="status" class="form-label">Update Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="pending" {{ $booking->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="confirmed" {{ $booking->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="cancelled" {{ $booking->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                <option value="completed" {{ $booking->status === 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update Status</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .card {
        border: none;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }

    .card-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
        padding: 1rem;
    }

    .card-body {
        padding: 1.5rem;
    }

    .booking-details {
        background-color: #f8f9fa;
        border-radius: 0.5rem;
        padding: 1.5rem;
    }

    .booking-details p {
        margin-bottom: 0.5rem;
    }

    .form-select {
        border: 1px solid #dee2e6;
        padding: 0.5rem;
        width: 100%;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .form-select:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        outline: 0;
    }

    .badge {
        font-size: 0.875rem;
        padding: 0.5em 0.75em;
    }

    .btn {
        padding: 0.5rem 1rem;
        font-weight: 500;
        transition: all 0.2s ease-in-out;
    }

    .btn:hover {
        transform: translateY(-1px);
    }

    .btn-primary {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }

    .btn-primary:hover {
        background-color: #0b5ed7;
        border-color: #0a58ca;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .btn-secondary:hover {
        background-color: #5c636a;
        border-color: #565e64;
    }
</style>
@endpush 