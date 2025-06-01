@extends('layouts.app')

@section('title', 'My Bookings')

@section('content')
<div class="container py-5">
    <h1>My Bookings</h1>
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>Car</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($bookings as $booking)
                <tr>
                    <td>{{ $booking->car->name ?? '-' }}</td>
                    <td>{{ $booking->start_date }}</td>
                    <td>{{ $booking->end_date }}</td>
                    <td>{{ ucfirst($booking->status) }}</td>
                    <td>{{ $booking->amount ?? '-' }}</td>
                    <td>
                        <form action="{{ route('services.destroy', $booking) }}" method="POST" onsubmit="return confirm('Cancel this booking?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Cancel</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">No bookings found.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-3">{{ $bookings->links() }}</div>
</div>
@endsection 