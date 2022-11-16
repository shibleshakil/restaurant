<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Image;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
//use Session;

class UserController extends Controller
{

    public function profileUpdate(Request $request)
    {
        if($request->isMethod('post')){
            DB::beginTransaction();
            try{
                $data = User::find(Auth()->user()->id);
                if($request->file('user_img')){
                    $image = $request->file('user_img');
                    $input = time() . 'user_img.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('uploads/image');
                    // $img = Image::make($image->getRealPath());
                    // $img->orientate();
                    // $img->resize(64, 64)->save($destinationPath.'/'.$input);
                    // $destinationPath = public_path('/thumbnail');
                    $image->move($destinationPath,$input);
                    $data->user_img = $input;
                    // $tmpImg = public_path('thumbnail/'.$input);
                    // if (file_exists($tmpImg)) {
                    //     unlink($tmpImg);
                    // }
                }
                $data->name = $request->name;
                // $data->email = $request->email;
                $data->phone = $request->phone;
                $data->save();
                DB::commit();
                return back()->with('success', 'Data updated successfully!');
            } catch (Throwable $th) {
                DB::rollback();
                return back()->with('error', $th->getMessage());
            }
        }
        $data = User::find(1);
        return view('admin.profile.edit', compact('data'));
    }
    public function passwordUpdate(Request $request)
    {
        if($request->isMethod('post')){

            DB::beginTransaction();
            try{
//                $data = User::find(Auth()->user()->id);
//                Session::put('password', $request->password);
//                $request->session()->put('password', $request->password);
                auth()->user()->update(['password' => Hash::make($request->password) ]);
                if ($request->session()->has('password_hash_web')) {
                    $user = auth('web')->getUser();
                    $request->session()->forget('password_hash_web');
                    Auth::guard('web')->login($user);

                }


//                $data->password = Hash::make($request->password);


//                $data->save();
                DB::commit();
                return back()->with('success', 'Data updated successfully!');
            } catch (Throwable $th) {
                DB::rollback();
                return back()->with('error', $th->getMessage());
            }
        }
        return view('admin.profile.change-password');
    }

}
