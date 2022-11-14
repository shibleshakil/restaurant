<?php

namespace App\Http\Controllers\Back\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use DB;
use Image;
use App\Models\User;
use App\Models\Restaurant;

class AclController extends Controller
{
    public function index()
    {
        $datas = User::where('role_id', 2)->get();
        $sl = 0;
        
        return view('acl.index', compact('datas', 'sl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurants = Restaurant::where('is_active', 1)->orderBy('name')->get();
        return view('acl.create', compact('restaurants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'restaurant_id' => ['required',],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'string', 'max:255', 'unique:users'],
            // 'phone' => ['nullable', 'numeric'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // 'image' => ['nullable', 'mimes:png,jpg','max:1024'],
        ]);

        DB::beginTransaction();
        try {
            $data = new User;
            $data->name = $request->name;
            $data->email = $request->email;
            $data->restaurant_id = $request->restaurant_id;
            // $data->phone = $request->phone;
            $data->password = Hash::make($request->password);
            // if($request->file('image')){
            //     $image = $request->file('image');
            //     $input = time() . 'user.' . $image->getClientOriginalExtension();
            //     $destinationPath = public_path('uploads/image');
            //     $image->move($destinationPath,$input);
            //     $data->image = $input;
            // }
            $data->role_id = 2;
            $data->save();
            DB::commit();
            return redirect()->route('systemUser.index')->with('success', 'New System User Added Successfully!');

        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('error', 'Somethings Went Wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        $restaurants = Restaurant::where('is_active', 1)->orderBy('name')->get();

        if (!$data) {
            abort(404);
        }

        return view('acl.edit', compact('data','restaurants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'restaurant_id' => ['required',],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'string', 'max:255', 'unique:users,email,' . $id],
            // 'phone' => ['nullable', 'numeric'],
            'password' => ['nullable', 'string'],
            // 'image' => ['nullable', 'mimes:png,jpg'],
        ]);

        DB::beginTransaction();
        try {
            $data = User::find($id);
            $data->name = $request->name;
            $data->email = $request->email;
            $data->restaurant_id = $request->restaurant_id;
            // $data->phone = $request->phone;
            if ($request->password) {
                $data->password = Hash::make($request->password);
            }
            // if($request->file('image')){
            //     $image = $request->file('image');
            //     $input = time() . 'user.' . $image->getClientOriginalExtension();
            //     $destinationPath = public_path('uploads/image');
            //     $image->move($destinationPath,$input);
            //     $data->image = $input;
            // }
            $data->save();
            DB::commit();
            return redirect()->route('systemUser.index')->with('success', 'System User Info Updated Successfully!');

        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('error', 'Somethings Went Wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function delete($id)
    // {
    //     DB::beginTransaction();
    //     try {
    //         $data = User::findorFail($id);
    //         $data->is_active = 0;
    //         $data->save();
    //         DB::commit();
    //         return 'System User Inactive Successfully!';
    //     } catch (\Throwable $th) {
    //         DB::rollback();
    //         return 'Somrthings Went Wrong!';
    //     }
    // }

    // public function restore($id)
    // {
    //     DB::beginTransaction();
    //     try {
    //         $data = User::find($id);
    //         $data->is_active = 1;
    //         $data->save();
    //         DB::commit();
    //         return 'System User Activate Successfully!';
    //     } catch (\Throwable $th) {
    //         DB::rollback();
    //         return 'Somrthings Went Wrong!';
    //     }
    // }
}
