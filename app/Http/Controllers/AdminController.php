<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function viewPdf(){
        return view('admin.setup.menu.view_pdf');
    }
    public function editProfile(){
        return view('admin.profile.edit');
    }
    public function changePassword(){
        return view('admin.profile.change-password');
    }

}
