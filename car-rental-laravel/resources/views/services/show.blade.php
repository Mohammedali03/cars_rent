@extends('layouts.app')

@section('title', 'Booking Details')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Booking Details</h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5 class="text-primary">Car Information</h5>
                            <div class="card">
                                <img src="{{ asset('storage/' . $service->car->image) }}" class="card-img-top" alt="{{ $service->car->name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $service->car->name }}</h5>
                                    <p class="card-text">{{ $service->car->description }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-primary fw-bold">${{ number_format($service->car->price, 2) }} <small class="text-muted">/day</small></span>
                                        <span class="badge bg-primary">{{ $service->car->brand }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-primary">Booking Information</h5>
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="fw-bold">Booking ID:</label>
                                        <p>{{ $service->id }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="fw-bold">Status:</label>
                                        <p><span class="badge bg-{{ $service->status === 'pending' ? 'warning' : ($service->status === 'confirmed' ? 'success' : 'danger') }}">
                                            {{ ucfirst($service->status) }}
                                        </span></p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="fw-bold">Start Date:</label>
                                        <p>{{ $service->start_date->format('F j, Y g:i A') }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="fw-bold">End Date:</label>
                                        <p>{{ $service->end_date->format('F j, Y g:i A') }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="fw-bold">Duration:</label>
                                        <p>{{ $service->duration }} days</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="fw-bold">Total Amount:</label>
                                        <p class="text-primary fw-bold">${{ number_format($service->amount, 2) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="text-primary">Customer Information</h5>
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="fw-bold">Name:</label>
                                        <p>{{ $service->username }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="fw-bold">Email:</label>
                                        <p>{{ $service->email }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="fw-bold">Phone:</label>
                                        <p>{{ $service->phone }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-primary">Payment Information</h5>
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="fw-bold">Payment Method:</label>
                                        <p class="text-capitalize">{{ str_replace('_', ' ', $service->payment_method) }}</p>
                                    </div>
                                    @php
                                        $paymentDetails = json_decode($service->payment_details, true);
                                    @endphp
                                    @if($service->payment_method === 'bank_transfer')
                                        <div class="mb-3">
                                            <label class="fw-bold">Account Number:</label>
                                            <p>{{ $paymentDetails['account_number'] }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="fw-bold">Routing Number:</label>
                                            <p>{{ $paymentDetails['routing_number'] }}</p>
                                        </div>
                                    @elseif($service->payment_method === 'cheque')
                                        <div class="mb-3">
                                            <label class="fw-bold">Cheque Number:</label>
                                            <p>{{ $paymentDetails['cheque_number'] }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="fw-bold">Cheque Date:</label>
                                            <p>{{ $paymentDetails['cheque_date'] }}</p>
                                        </div>
                                    @elseif($service->payment_method === 'mastercard')
                                        <div class="mb-3">
                                            <label class="fw-bold">Card Number:</label>
                                            <p>**** **** **** {{ $paymentDetails['card_number'] }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="fw-bold">Expiry Date:</label>
                                            <p>{{ $paymentDetails['expiry_date'] }}</p>
                                        </div>
                                    @elseif($service->payment_method === 'paypal')
                                        <div class="mb-3">
                                            <label class="fw-bold">PayPal Email:</label>
                                            <p>{{ $paymentDetails['paypal_email'] }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 text-center">
                        <a href="{{ route('services.index') }}" class="btn btn-primary">
                            <i class="fas fa-list me-2"></i>View All Bookings
                        </a>
                        @if($service->status === 'pending')
                            <form action="{{ route('services.destroy', $service) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to cancel this booking?')">
                                    <i class="fas fa-times me-2"></i>Cancel Booking
                                </button>
                            </form>
                        @endif
                    </div>
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
        margin-bottom: 1rem;
    }
    
    .card-img-top {
        height: 200px;
        object-fit: cover;
    }

    .text-primary {
        color: var(--bs-primary) !important;
    }

    .badge {
        font-size: 0.9rem;
        padding: 0.5em 1em;
    }
</style>
@endpush 