@extends('layouts.app')

@section('title', 'Book Car - ' . $car->name)

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Car Details Section -->
        <div class="col-md-5 mb-4">
            <div class="card h-100">
                <img src="{{ asset('storage/' . $car->image) }}" class="card-img-top" alt="{{ $car->name }}">
                <div class="card-body">
                    <h2 class="card-title">{{ $car->name }}</h2>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="text-primary mb-0">${{ number_format($car->price, 2) }} <small class="text-muted">/day</small></h3>
                        <div class="rating">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star-half-alt text-warning"></i>
                            <span class="ms-1">4.5</span>
                        </div>
                    </div>
                    <p class="card-text">{{ $car->description }}</p>
                    <div class="row g-3 mt-3">
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-car text-primary me-2"></i>
                                <span>{{ $car->model }}</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-cogs text-primary me-2"></i>
                                <span>{{ $car->transmission }}</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-couch text-primary me-2"></i>
                                <span>{{ $car->interior }}</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-tag text-primary me-2"></i>
                                <span>{{ $car->brand }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Booking Form Section -->
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-4">Booking Information</h3>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('services.store', $car) }}" method="POST" id="bookingForm">
                        @csrf
                        <input type="hidden" name="car_id" value="{{ $car->id }}">
                        <input type="hidden" name="payment_method" id="payment_method" value="">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="username" name="username" value="{{ auth()->user()->name }}" readonly>
                                    <label for="username">Full Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" readonly>
                                    <label for="email">Email Address</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone Number" required>
                                    <label for="phone">Phone Number</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="datetime-local" class="form-control" id="startDate" name="start_date" required>
                                    <label for="startDate">Start Date</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="datetime-local" class="form-control" id="endDate" name="end_date" required>
                                    <label for="endDate">End Date</label>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <h4 class="mb-3">Payment Method</h4>
                            <div class="d-flex flex-wrap gap-2 mb-3">
                                <button type="button" class="btn btn-outline-primary payment-btn" data-method="bank_transfer">
                                    <i class="fas fa-university me-2"></i>Bank Transfer
                                </button>
                                <button type="button" class="btn btn-outline-primary payment-btn" data-method="cheque">
                                    <i class="fas fa-money-check me-2"></i>Cheque
                                </button>
                                <button type="button" class="btn btn-outline-primary payment-btn" data-method="mastercard">
                                    <i class="fab fa-cc-mastercard me-2"></i>MasterCard
                                </button>
                                <button type="button" class="btn btn-outline-primary payment-btn" data-method="paypal">
                                    <i class="fab fa-paypal me-2"></i>PayPal
                                </button>
                            </div>

                            <!-- Payment Forms -->
                            <div id="paymentForms">
                                <!-- Bank Transfer Form -->
                                <div class="payment-form" id="bank_transfer_form" style="display: none;">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Bank Transfer Details</h5>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="bank_account" name="bank_account" required>
                                                        <label for="bank_account">Account Number</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="bank_routing" name="bank_routing" required>
                                                        <label for="bank_routing">Routing Number</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Cheque Form -->
                                <div class="payment-form" id="cheque_form" style="display: none;">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Cheque Details</h5>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="cheque_number" name="cheque_number" required>
                                                        <label for="cheque_number">Cheque Number</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="date" class="form-control" id="cheque_date" name="cheque_date" required>
                                                        <label for="cheque_date">Date</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- MasterCard Form -->
                                <div class="payment-form" id="mastercard_form" style="display: none;">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Card Details</h5>
                                            <div class="row g-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="card_number" name="card_number" placeholder="1234 5678 9012 3456" required>
                                                        <label for="card_number">Card Number</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="month" class="form-control" id="expiry_date" name="expiry_date" required>
                                                        <label for="expiry_date">Expiry Date</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="cvv" name="cvv" required>
                                                        <label for="cvv">CVV</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- PayPal Form -->
                                <div class="payment-form" id="paypal_form" style="display: none;">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">PayPal Details</h5>
                                            <div class="form-floating">
                                                <input type="email" class="form-control" id="paypal_email" name="paypal_email" required>
                                                <label for="paypal_email">PayPal Email</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary btn-lg w-100" id="submitBtn">
                                <i class="fas fa-check-circle me-2"></i>Confirm Booking
                            </button>
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
    
    .card-img-top {
        height: 300px;
        object-fit: cover;
    }

    .payment-btn {
        min-width: 150px;
    }

    .payment-btn.active {
        background-color: var(--bs-primary);
        color: white;
    }

    .payment-form {
        margin-top: 1rem;
    }

    .form-floating > .form-control:focus ~ label,
    .form-floating > .form-control:not(:placeholder-shown) ~ label {
        color: var(--bs-primary);
    }

    .rating {
        font-size: 1.1rem;
    }

    .text-primary {
        color: var(--bs-primary) !important;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Set minimum dates for start and end date inputs
        const now = new Date();
        const startDate = document.getElementById('startDate');
        const endDate = document.getElementById('endDate');

        // Format date for input
        const formatDate = (date) => {
            return date.toISOString().slice(0, 16);
        };

        startDate.min = formatDate(now);
        endDate.min = formatDate(now);

        // Update end date minimum when start date changes
        startDate.addEventListener('change', function() {
            endDate.min = this.value;
        });

        // Payment method buttons
        const paymentButtons = document.querySelectorAll('.payment-btn');
        const paymentForms = document.querySelectorAll('.payment-form');
        const paymentMethodInput = document.getElementById('payment_method');
        let selectedPaymentMethod = null;

        paymentButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class from all buttons
                paymentButtons.forEach(btn => btn.classList.remove('active'));
                // Add active class to clicked button
                button.classList.add('active');

                // Hide all forms
                paymentForms.forEach(form => form.style.display = 'none');
                // Show selected form
                const method = button.dataset.method;
                document.getElementById(`${method}_form`).style.display = 'block';
                selectedPaymentMethod = method;
                paymentMethodInput.value = method;

                // Remove required attribute from all payment fields
                document.querySelectorAll('.payment-form input[required]').forEach(input => {
                    input.removeAttribute('required');
                });

                // Add required attribute only to the selected payment method's fields
                document.querySelectorAll(`#${method}_form input`).forEach(input => {
                    input.setAttribute('required', 'required');
                });
            });
        });

        // Form submission validation
        const form = document.getElementById('bookingForm');
        const submitBtn = document.getElementById('submitBtn');

        form.addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            if (!selectedPaymentMethod) {
                alert('Please select a payment method');
                return;
            }

            // Validate only the selected payment method's fields
            const paymentForm = document.getElementById(`${selectedPaymentMethod}_form`);
            const requiredFields = paymentForm.querySelectorAll('[required]');
            let isValid = true;

            requiredFields.forEach(field => {
                if (!field.value) {
                    isValid = false;
                    field.classList.add('is-invalid');
                } else {
                    field.classList.remove('is-invalid');
                }
            });

            if (!isValid) {
                alert('Please fill in all required payment details');
                return;
            }

            // If all validations pass, submit the form
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Processing...';
            this.submit();
        });
    });
</script>
@endpush 