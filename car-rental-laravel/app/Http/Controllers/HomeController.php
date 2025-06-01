<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $cars = Car::latest()->take(8)->get();
        return view('home', compact('cars'));
    }

    public function about()
    {
        return view('about');
    }
} 