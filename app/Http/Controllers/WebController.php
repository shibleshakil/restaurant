<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Homepage;
use App\Models\AppSettings;
use App\Models\About;
use App\Models\Aboutpage;
use App\Models\Contactpage;
use App\Models\Bookingpage;
use App\Models\Area;
use App\Models\Restaurantpage;
use App\Models\Restaurant;
use App\Models\LunchMenu;
use App\Models\DinnerMenu;
use App\Models\MenuCategory;
use App\Models\MenuSubCategory;
use App\Models\Menu;

class WebController extends Controller
{
    public function index(){
        $home = Homepage::find(1);
        return view('front.home', compact('home'));
    }
    public function menus(){
        $menuCats = MenuCategory::where('is_active', 1)->get();
        $menuSubCats = MenuSubCategory::where('is_active', 1)->get();
        $menus = Menu::where('is_active', 1)->get();
        return view('front.menus', compact('menuCats', 'menuSubCats', 'menus'));
    }
    public function restaurant(){
        $respage = Restaurantpage::find(1);
        $areas = Area::where('is_active', 1)->orderBy('title')->get();
        $restaurants = Restaurant::where('is_active', 1)->orderBy('name')->get();
        return view('front.restaurants', compact('respage', 'restaurants', 'areas'));
    }
    public function contact(){
        $contact = Contactpage::find(1);
        $areas = Area::where('is_active', 1)->orderBy('title')->get();
        return view('front.contact', compact('contact', 'areas'));
    }
    public function about(){
        $about = Aboutpage::find(1);
        return view('front.about', compact('about'));
    }
    public function booking(){
        $bookingSetting = Bookingpage::findorFail(1);
        $restaurants = Restaurant::where('is_active', 1)->orderBy('name')->get();
        return view('front.booking', compact('bookingSetting', 'restaurants'));
    }

    public function restaurantDetail($slug){
        $data = Restaurant::where('slug', $slug)->first();
        if (!$data) {
            abort(404);
        }
        $bookingSetting = Bookingpage::findorFail(1);
        $restaurants = Restaurant::where('is_active', 1)->orderBy('name')->get();
        $lunchItems = LunchMenu::where('restaurant_id', $data->id)->inRandomOrder()->limit(2)->get();
        return view('front.restaurant_details', compact('restaurants', 'bookingSetting', 'data', 'lunchItems'));
    }



}