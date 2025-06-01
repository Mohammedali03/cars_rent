<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\User;
use App\Models\Service;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_cars' => Car::count(),
            'total_users' => User::where('is_admin', false)->count(),
            'total_bookings' => Service::count(),
            'recent_bookings' => Service::with(['user', 'car'])->latest()->take(5)->get(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
} 