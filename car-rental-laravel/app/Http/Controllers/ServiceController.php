<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ServiceController extends Controller
{
    public function index()
    {
        $bookings = Auth::user()->services()->with('car')->latest()->paginate(10);
        return view('services.index', compact('bookings'));
    }

    public function create(Car $car)
    {
        return view('services.create', compact('car'));
    }

    public function store(Request $request, Car $car)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'start_date' => 'required|date|after:now',
            'end_date' => 'required|date|after:start_date',
            'payment_method' => 'required|string|in:bank_transfer,cheque,mastercard,paypal',
        ]);

        // Calculate duration and amount
        $start = new \DateTime($validated['start_date']);
        $end = new \DateTime($validated['end_date']);
        $duration = $start->diff($end)->days;
        $amount = $duration * $car->price;

        // Add payment details based on payment method
        $payment_details = [];
        switch ($validated['payment_method']) {
            case 'bank_transfer':
                $request->validate([
                    'bank_account' => 'required|string',
                    'bank_routing' => 'required|string',
                ]);
                $payment_details = [
                    'account_number' => $request->bank_account,
                    'routing_number' => $request->bank_routing,
                ];
                break;
            case 'cheque':
                $request->validate([
                    'cheque_number' => 'required|string',
                    'cheque_date' => 'required|date',
                ]);
                $payment_details = [
                    'cheque_number' => $request->cheque_number,
                    'cheque_date' => $request->cheque_date,
                ];
                break;
            case 'mastercard':
                $request->validate([
                    'card_number' => 'required|string|min:16|max:19',
                    'expiry_date' => 'required|date_format:Y-m',
                    'cvv' => 'required|string|min:3|max:4',
                ]);
                $payment_details = [
                    'card_number' => substr($request->card_number, -4), // Store only last 4 digits
                    'expiry_date' => $request->expiry_date,
                ];
                break;
            case 'paypal':
                $request->validate([
                    'paypal_email' => 'required|email',
                ]);
                $payment_details = [
                    'paypal_email' => $request->paypal_email,
                ];
                break;
        }

        try {
            // Create the service record
            $service = Service::create([
                'user_id' => Auth::id(),
                'car_id' => $car->id,
                'username' => $validated['username'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'start_date' => $validated['start_date'],
                'end_date' => $validated['end_date'],
                'duration' => $duration,
                'amount' => $amount,
                'payment_method' => $validated['payment_method'],
                'payment_details' => json_encode($payment_details),
                'status' => 'pending',
            ]);

            return redirect()->route('services.show', $service)
                ->with('success', 'Booking confirmed! Your payment is being processed.');
        } catch (\Exception $e) {
            return back()->withInput()
                ->withErrors(['error' => 'Failed to create booking. Please try again.']);
        }
    }

    public function show(Service $service)
    {
        if (Auth::id() !== $service->user_id) {
            abort(403);
        }
        return view('services.show', compact('service'));
    }

    public function destroy(Service $service)
    {
        if (Auth::id() !== $service->user_id) {
            abort(403);
        }
        
        $service->delete();
        
        return redirect()->route('services.index')
            ->with('success', 'Booking cancelled successfully.');
    }

    public function userBookings()
    {
        $bookings = Auth::user()->services()->with('car')->latest()->paginate(10);
        return view('services.user-bookings', compact('bookings'));
    }
} 