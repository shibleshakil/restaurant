<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuSubCategory;
use App\Models\Restaurant;

class CommonController extends Controller
{
    public function getSubCatAgainstCat(Request $request){
        $datas = MenuSubCategory::where('menu_category_id', $request->id)->get();

        return json_encode($datas);
    }

    public function checkResttaurantInfo(Request $request){
        $data = Restaurant::find($request->id);
        $guestList = [];
        for ($i = 0; $i < $data->no_of_guest; $i++) {
            array_push($guestList, $i+1);
        }

        $start = $data->open_at ? $data->open_at : '10:00';
        $end = $data->close_at ? $data->close_at : '21:00';
        $times = array();
        $period = new \DatePeriod(
            new \DateTime($start),
            new \DateInterval('PT30M'),
            new \DateTime($end)
        );
        foreach ($period as $date) {
            array_push($times,$date->format("H:i"));
        }

        $datas = [
            'guest' => $guestList,
            'times' => $times,
        ];
        return json_encode($datas);
    }
}
