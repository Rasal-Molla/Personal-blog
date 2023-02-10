<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function viewProfile(){

        $userInfo = User::all();
        return view('Backend.Pages.profile', compact('userInfo'));

    }

    public function resetPassword(){

        return view('Backend.Pages.resetPassword');

    }
}
