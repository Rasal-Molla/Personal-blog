<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function viewProfile(){

        $userInfo = User::all();
        return view('Backend.Pages.profile', compact('userInfo'));

    }

    public function resetPasswordForm(){

        return view('Backend.Pages.resetPassword');

    }
}
