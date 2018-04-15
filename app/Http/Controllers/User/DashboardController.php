<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class DashboardController extends Controller
{
    //
    function view(Request $request){
        return view('templates.dashboard');
        return Auth::user();
    }
}
