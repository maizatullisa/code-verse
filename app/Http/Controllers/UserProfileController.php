<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function dashboardUserDesktop()
        {
            $user = auth()->user(); //mendapatkan user yg lgin

            return view('desktop.user-desktop', compact('user'));
        }

}
