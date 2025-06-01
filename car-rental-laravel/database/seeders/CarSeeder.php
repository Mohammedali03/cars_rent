<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        $cars = [
            [
                'name' => 'Luxury Sedan',
                'price' => 150.00,
                'description' => 'A comfortable and stylish sedan perfect for business or leisure.',
                'model' => '2023',
                'transmission' => 'Automatic',
                'interior' => 'Leather',
                'brand' => 'Hyundai',
                'image' => 'cars/img3.png',
            ],
            [
                'name' => 'Sports Car',
                'price' => 200.00,
                'description' => 'High-performance sports car for the ultimate driving experience.',
                'model' => '2023',
                'transmission' => 'Manual',
                'interior' => 'Leather',
                'brand' => 'Suzuki',
                'image' => 'cars/img1.png',
            ],
            [
                'name' => 'SUV',
                'price' => 180.00,
                'description' => 'Spacious SUV perfect for family trips and outdoor adventures.',
                'model' => '2023',
                'transmission' => 'Automatic',
                'interior' => 'Fabric',
                'brand' => 'Škoda',
                'image' => 'cars/img2.png',
            ],
            [
                'name' => 'Compact Car',
                'price' => 100.00,
                'description' => 'Fuel-efficient compact car ideal for city driving.',
                'model' => '2023',
                'transmission' => 'Automatic',
                'interior' => 'Fabric',
                'brand' => 'Suzuki',
                'image' => 'cars/img4.png',
            ],
            [
                'name' => 'baleno',
                'price' => 250.00,
                'description' => 'Luxurious executive sedan with premium features and comfort.',
                'model' => '2023',
                'transmission' => 'Automatic',
                'interior' => 'Premium Leather',
                'brand' => 'Suzuki',
                'image' => 'cars/img5.png',
            ],
            [
                'name' => 'Scorpio',
                'price' => 280.00,
                'description' => 'Luxury SUV with powerful performance and advanced technology.',
                'model' => '2023',
                'transmission' => 'Automatic',
                'interior' => 'Leather',
                'brand' => 'Mahindra',
                'image' => 'cars/img6.png',
            ],
            [
                'name' => 'Hexa',
                'price' => 220.00,
                'description' => 'Sophisticated sedan with quattro all-wheel drive and premium features.',
                'model' => '2023',
                'transmission' => 'Automatic',
                'interior' => 'Leather',
                'brand' => 'Mahindra',
                'image' => 'cars/img21.png',
            ],
            [
                'name' => 'Tiago',
                'price' => 190.00,
                'description' => 'Electric sedan with autopilot and cutting-edge technology.',
                'model' => '2023',
                'transmission' => 'Automatic',
                'interior' => 'Vegan Leather',
                'brand' => 'Tata',
                'image' => 'cars/img8.png',
            ],
            [
                'name' => 'Verna',
                'price' => 170.00,
                'description' => 'Iconic off-road SUV perfect for adventure seekers.',
                'model' => '2023',
                'transmission' => 'Automatic',
                'interior' => 'Fabric',
                'brand' => 'Hyundai',
                'image' => 'cars/img9.png',
            ],
            [
                'name' => 'Creta',
                'price' => 350.00,
                'description' => 'Legendary sports car with unmatched performance and handling.',
                'model' => '2023',
                'transmission' => 'Automatic',
                'interior' => 'Premium Leather',
                'brand' => 'Hyundai',
                'image' => 'cars/img10.png',
            ],
            [
                'name' => 'Ioniq',
                'price' => 130.00,
                'description' => 'Modern compact SUV with great fuel efficiency and features.',
                'model' => '2023',
                'transmission' => 'Automatic',
                'interior' => 'Fabric',
                'brand' => 'Tata',
                'image' => 'cars/img11.png',
            ],
            [
                'name' => 'Celerio',
                'price' => 240.00,
                'description' => 'Safe and luxurious SUV with Scandinavian design.',
                'model' => '2023',
                'transmission' => 'Automatic',
                'interior' => 'Leather',
                'brand' => 'Suzuki',
                'image' => 'cars/img13.png',
            ]
        ];

        foreach ($cars as $car) {
            Car::create($car);
        }
    }
} 