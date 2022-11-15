<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [WebController::class, 'index'])->name('home');
Route::get('/menus', [WebController::class, 'menus'])->name('menus');
Route::get('/restaurants', [WebController::class, 'restaurant'])->name('restaurantList');
Route::get('/restaurants/{slug}', [WebController::class, 'restaurantDetail'])->name('restaurantDetail');
Route::get('/contact', [WebController::class, 'contact'])->name('contact');
Route::get('/about', [WebController::class, 'about'])->name('about');
Route::get('/booking', [WebController::class, 'booking'])->name('booking');
Route::post('/reserveSelectedTime', [WebController::class, 'reserveSelectedTime'])->name('reserveSelectedTime');
Route::post('/confirmReservation', [WebController::class, 'confirmReservation'])->name('confirmReservation');
Route::get('checkResttaurantInfo', 'App\Http\Controllers\CommonController@checkResttaurantInfo')->name('checkResttaurantInfo');
Route::get('restaurantMenuList', 'App\Http\Controllers\CommonController@restaurantMenuList')->name('restaurantMenuList');

//backend
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
   Route::get('/dashboard', 'App\Http\Controllers\Back\DashboardController@index')->name('dashboard');
//    Route::get('/form', function () {return view('admin.form');})->name('form');
//    Route::get('/managesite', [AdminController::class, 'manage'])->name('managesite');

//    Route::get('/homepage', [AdminController::class, 'adminHome'])->name('homepage');

//    Route::get('/restaurantpage', [AdminController::class, 'restaurantPage'])->name('restaurantpage');

//    Route::get('/aboutpage', [AdminController::class, 'aboutPage'])->name('aboutpage');

//    Route::get('/contactpage', [AdminController::class, 'contactPage'])->name('contactpage');

//    Route::get('/bookingpage', [AdminController::class, 'bookingPage'])->name('bookingpage');

    Route::get('/view_pdf', [AdminController::class, 'viewPdf'])->name('view_pdf');
//    Route::get('/edit_profile', [AdminController::class, 'editProfile'])->name('edit_profile');
//    Route::get('/update_profile', [AdminController::class, 'updateProfile'])->name('update_profile');
//    Route::get('/change_password', [AdminController::class, 'changePassword'])->name('change_password');
//    Route::get('/update_password', [AdminController::class, 'updatePassword'])->name('update_password');

    Route::match(['get', 'post'], 'managewebsite', 'App\Http\Controllers\Back\Setup\SettingsController@appItemUpdate')->name('managewebsite');

    Route::match(['get', 'post'], 'mananagehomepage', 'App\Http\Controllers\HomepageController@homepageUpdate')->name('mananagehomepage');

    Route::match(['get', 'post'], 'mananagerestaurantpage', 'App\Http\Controllers\RestaurantpageController@restaurantpageUpdate')->name('mananagerestaurantpage');

   Route::match(['get', 'post'], 'mananageaboutpage', 'App\Http\Controllers\AboutpageController@aboutpageUpdate')->name('mananageaboutpage');

    // Route::match(['get', 'post'], 'mananageabout', 'App\Http\Controllers\AboutController@aboutpageUpdate')->name('mananageabout');

    Route::match(['get', 'post'], 'mananagecontactpage', 'App\Http\Controllers\ContactpageController@contactpageUpdate')->name('mananagecontactpage');

    Route::match(['get', 'post'], 'managebookingpage', 'App\Http\Controllers\BookingpageController@bookingpageUpdate')->name('managebookingpage');

    Route::match(['get', 'post'], 'profile/{name}', 'App\Http\Controllers\UserController@profileUpdate')->name('profileUpdate');

    Route::match(['get', 'post'], 'change-password/{name}', 'App\Http\Controllers\UserController@passwordUpdate')->name('changePassword');



    Route::match(['get', 'post'], 'restaurant/{id}/lunch/menu', 'App\Http\Controllers\Back\RestaurantController@lunch')->name('restaurant.lunch');
    Route::match(['get', 'post'], 'restaurant/{id}/dinner/menu', 'App\Http\Controllers\Back\RestaurantController@dinner')->name('restaurant.dinner');
    Route::match(['get', 'post'], 'restaurant/{id}/facility', 'App\Http\Controllers\Back\RestaurantController@facility')->name('restaurant.facility');
    Route::match(['get', 'post'], 'restaurant/{id}/parking', 'App\Http\Controllers\Back\RestaurantController@parking')->name('restaurant.parking');

    Route::delete('restaurant/option/{id}/delete/lunch', 'App\Http\Controllers\Back\RestaurantController@deleterestaurantLunchItem')->name('restaurantLunchItem.delete');
    Route::post('restaurant/option/update/lunch', 'App\Http\Controllers\Back\RestaurantController@updaterestaurantLunchItem')->name('restaurantLunchItem.update');
    Route::delete('restaurant/option/{id}/delete/dinner', 'App\Http\Controllers\Back\RestaurantController@deleterestaurantDinnerItem')->name('restaurantDinnerItem.delete');
    Route::post('restaurant/option/update/dinner', 'App\Http\Controllers\Back\RestaurantController@updaterestaurantDinnerItem')->name('restaurantDinnerItem.update');
    Route::delete('restaurant/{id}/delete/parking', 'App\Http\Controllers\Back\RestaurantController@deleterestaurantParking')->name('restaurantParking.delete');
    Route::post('restaurant/option/update/parking', 'App\Http\Controllers\Back\RestaurantController@updaterestaurantParking')->name('restaurantParking.update');
    Route::post('restaurant/option/update/facility', 'App\Http\Controllers\Back\RestaurantController@updaterestaurantFacility')->name('restaurantFacility.update');
    Route::delete('restaurant/{id}/delete/facility', 'App\Http\Controllers\Back\RestaurantController@deleterestaurantFacility')->name('restaurantFacility.delete');

    Route::delete('restaurant/{id}', 'App\Http\Controllers\Back\RestaurantController@delete')->name('restaurant.delete');
    Route::resource('restaurant', 'App\Http\Controllers\Back\RestaurantController')->parameters('restaurant','id') ;
    Route::post('restaurant/{id}/update', 'App\Http\Controllers\Back\RestaurantController@update')->name('restaurant.update');

    Route::delete('area/{id}', 'App\Http\Controllers\Back\AreaController@delete')->name('area.delete');
    Route::put('area/{id}', 'App\Http\Controllers\Back\AreaController@restore')->name('area.restore');
    Route::resource('area', 'App\Http\Controllers\Back\AreaController')->parameters('area','id') ;
    Route::post('area/{id}/update', 'App\Http\Controllers\Back\AreaController@update')->name('area.update');

    Route::delete('menuCategory/{id}', 'App\Http\Controllers\Back\Setup\MenuCategoryController@delete')->name('menuCategory.delete');
    Route::put('menuCategory/{id}', 'App\Http\Controllers\Back\Setup\MenuCategoryController@restore')->name('menuCategory.restore');
    Route::resource('menuCategory', 'App\Http\Controllers\Back\Setup\MenuCategoryController')->parameters('menuCategory', 'id');
    Route::post('menuCategory/update', 'App\Http\Controllers\Back\Setup\MenuCategoryController@update')->name('menuCategory.update');

    Route::delete('menuSubCategory/{id}', 'App\Http\Controllers\Back\Setup\MenuSubCategoryController@delete')->name('menuSubCategory.delete');
    Route::put('menuSubCategory/{id}', 'App\Http\Controllers\Back\Setup\MenuSubCategoryController@restore')->name('menuSubCategory.restore');
    Route::resource('menuSubCategory', 'App\Http\Controllers\Back\Setup\MenuSubCategoryController')->parameters('menuSubCategory', 'id');
    Route::post('menuSubCategory/update', 'App\Http\Controllers\Back\Setup\MenuSubCategoryController@update')->name('menuSubCategory.update');

    Route::delete('menu/{id}', 'App\Http\Controllers\Back\Setup\MenuController@delete')->name('menu.delete');
    Route::put('menu/{id}', 'App\Http\Controllers\Back\Setup\MenuController@restore')->name('menu.restore');
    Route::resource('menu', 'App\Http\Controllers\Back\Setup\MenuController')->parameters('menu', 'id');
    Route::post('menu/{id}/update', 'App\Http\Controllers\Back\Setup\MenuController@update')->name('menu.update');

    Route::delete('system/booking/{id}', 'App\Http\Controllers\Back\BookingController@delete')->name('booking.delete');
    Route::put('system/booking/{id}', 'App\Http\Controllers\Back\BookingController@restore')->name('booking.restore');
    Route::resource('system/booking', 'App\Http\Controllers\Back\BookingController')->parameters('booking', 'id');
    Route::post('system/booking/{id}/update', 'App\Http\Controllers\Back\BookingController@update')->name('booking.update');

    Route::get('getSubCatAgainstCat', 'App\Http\Controllers\CommonController@getSubCatAgainstCat')->name('getSubCatAgainstCat');

    Route::delete('systemUser/{id}', 'App\Http\Controllers\Back\Setup\AclController@delete')->name('systemUser.delete');
    Route::put('systemUser/{id}', 'App\Http\Controllers\Back\Setup\AclController@restore')->name('systemUser.restore');
    Route::resource('systemUser', 'App\Http\Controllers\Back\Setup\AclController')->parameters('systemUser', 'id');
    Route::post('systemUser/{id}/update', 'App\Http\Controllers\Back\Setup\AclController@update')->name('systemUser.update');

});
