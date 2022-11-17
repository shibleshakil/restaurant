<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
use App\Models\Booking;
use App\Models\Facility;
use App\Models\Parking;
use PDF;

use Session;
use DB;

class WebController extends Controller
{
    public function index(){
        $home = Homepage::find(1);
        $restaurants = Restaurant::where('is_active', 1)->orderBy('name')->get();
        return view('front.home', compact('home', 'restaurants'));
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
        $restaurants = Restaurant::where('is_active', 1)->orderBy('name')->get();
        return view('front.contact', compact('contact', 'areas', 'restaurants'));
    }
    public function about(){
        $about = Aboutpage::find(1);
        $restaurants = Restaurant::where('is_active', 1)->orderBy('name')->get();
        return view('front.about', compact('about', 'restaurants'));
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
        $data->no_of_visit = $data->no_of_visit + 1;
        $data->save();
        $menus = Menu::where('restaurant_id', $data->id)->orWhereNull('restaurant_id')->get();
        $bookingSetting = Bookingpage::findorFail(1);
        $restaurants = Restaurant::where('is_active', 1)->orderBy('name')->get();
        $lunchItems = LunchMenu::where('restaurant_id', $data->id)->inRandomOrder()->limit(2)->get();
        $facilities = Facility::where('restaurant_id', $data->id)->get()->reverse();
        $parkings = Parking::where('restaurant_id', $data->id)->get()->reverse();
        return view('front.restaurant_details', compact('restaurants', 'bookingSetting', 'data', 'lunchItems', 'menus', 'facilities', 'parkings'));
    }

    public function reserveSelectedTime(Request $request){
        $reservation = array();
        $reservation[] = [
            'restaurant' => $request->restaurant ,
            'restaurantName' => $request->restaurantName ,
            'booking_date' => date('d F Y', strtotime($request->booking_date )),
            'no_of_guest' => $request->no_of_guest ,
            'preferred_time' => $request->preferred_time
        ];
        Session::put('reservation', $reservation);
        $reservation = Session::get('reservation');
        
        return json_encode($reservation);
    }


    public function confirmReservation(Request $request){
        $validatedData = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required'],
        ]);
        $reservation = Session::get('reservation');
        $quantity = array();
        $orderDetails = array();
        if ($request->ordered_menu) {
            foreach ($request->ordered_menu as $key => $value) {
                if (!($request->quantity[$key]) || $request->quantity[$key] < 1) {
                    array_push($quantity, 1);
                }else{
                    array_push($quantity, $request->quantity[$key]);
                }
            }
        }
        
        $menu = implode(',', $request->ordered_menu);
        $menuQty = implode(',', $quantity);
        $orderDetails = Menu::whereIn('id', $request->ordered_menu)->get();
        
        DB::beginTransaction();
        try {
            $data = new Booking;
            $data->booking_id = "TB". time();
            $data->restaurant_id = $reservation[0]['restaurant'];
            $data->first_name = $request->first_name;
            $data->last_name = $request->last_name;
            $data->phone_number = $request->phone_number;
            $data->email = $request->email;
            $data->menu = $menu;
            $data->quantity = $menuQty;
            $data->no_of_guest = $reservation[0]['no_of_guest'];
            $data->date = date('Y-m-d', strtotime($reservation[0]['booking_date']));
            $data->preferred_time = $reservation[0]['preferred_time'];
            $data->special_request = $request->special_request;
            $data->save();

            if ($data->email) {
                Mail::raw('Hi, welcome sir!. Thank you for chossen us. Have a good day!', function ($message) use ($data){
                    $message->to($data->email)
                    ->subject("Booking Complete");
                });
            }
            $restaurantInfo = Restaurant::find($data->restaurant_id);
            if ($restaurantInfo->email) {
                $emailSubject = "You Have a new reservation";
                $toMail = $restaurantInfo->email;

                $data1 = [
                    'name' =>$data->first_name,
                    'phone' => $data->phone_number,
                    'email' => $data->email,
                    'date' => $data->date,
                    'preferred_time' => $data->preferred_time,
                    'no_of_guest' => $data->no_of_guest,
                    'special_request' => $data->special_request,
                    'orderDetails' => $orderDetails,
                    'quantity' => $quantity,
                ]; // Empty array
                Mail::send('emails.restaurant_reservation', ["emailData"=>$data1], function($message) use ($toMail, $emailSubject)
                {
                    $message->to($toMail)->subject($emailSubject);
                });
            }
            
            DB::commit();
            return back()->with('success', 'Booking Successfull!. Check Your Mail!');

        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('error', $th->getMessage());
        }
    }

    public function restaurantMenu($slug){
        $data = Restaurant::where('slug', $slug)->first();
        if (!$data) {
            abort(404);
        }
        $menusCategories = MenuSubCategory::where('is_active', 1)->orderBy('name')->get();
        $subCat = array();
        foreach ($menusCategories as $key => $value) {
            array_push($subCat, $value->id);
        }
        $menus = Menu::where('restaurant_id', $data->id)->orWhereNull('restaurant_id')->get();
        $lunchItems = LunchMenu::where('restaurant_id', $data->id)->get();
        $dinnerItems = DinnerMenu::where('restaurant_id', $data->id)->get();

        // return view('front.pdf_menu', compact('data', 'menusCategories', 'subCat', 'menus', 'lunchItems', 'dinnerItems'));
        
        $pdf = PDF::loadView('front.pdf_menu', compact('data', 'menusCategories', 'subCat', 'menus', 'lunchItems', 'dinnerItems'));
        $fileName =  $data->name.'-menu.'. 'pdf' ;
        return $pdf->download($fileName);
    }
}