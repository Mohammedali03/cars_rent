<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Service::with(['user', 'car'])->latest()->paginate(10);
        return view('admin.bookings.index', compact('bookings'));
    }

    public function show(Service $booking)
    {
        $booking->load(['user', 'car']);
        return view('admin.bookings.show', compact('booking'));
    }

    public function edit(Service $booking)
    {
        $booking->load(['user', 'car']);
        return view('admin.bookings.edit', compact('booking'));
    }

    public function updateStatus(Request $request, Service $booking)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled,completed'
        ]);

        $booking->update($validated);

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Booking status updated successfully.');
    }

    public function destroy(Service $booking)
    {
        $booking->delete();

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Booking deleted successfully.');
    }
} 