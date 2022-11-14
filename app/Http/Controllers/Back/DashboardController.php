<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Restaurant;
use App\Models\Booking;


class DashboardController extends Controller
{
    private $restaurants, $bookings;
    public function __construct(){
        $this->restaurants = Restaurant::where('is_active', 1)->get();
        $this->bookings = Booking::get();
    }
    public function index(){
        $totalArea = Area::where('is_active', 1)->count();
        $totaRestaurants = $this->restaurants->count();
        $totalBookings = $this->bookings->count();
        $todayBookings = $this->bookings->where('date', date('Y-m-d'))->count();
        $mostVisited = Restaurant::where('is_active', 1)->orderBy('no_of_visit', 'DESC')->first()->name;
        if (Auth()->user()->role_id == 2) {
            $totalBookings = $this->bookings->where('restaurant_id', Auth()->user()->restaurant_id)->count();
            $todayBookings = $this->bookings->where('restaurant_id', Auth()->user()->restaurant_id)->where('date', date('Y-m-d'))->count();
            $totalArea = 0;
            $totaRestaurants = 0;
            $mostVisited = '';
        }

        return view('dashboard', [
            'totalArea' => $totalArea,
            'totaRestaurants' => $totaRestaurants,
            'totalBookings' => $totalBookings,
            'todayBookings' => $todayBookings,
            'mostVisited' => $mostVisited,
        ]);
    }
}
