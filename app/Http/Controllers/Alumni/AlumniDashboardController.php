<?php

namespace App\Http\Controllers\Alumni;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlumniDashboardController extends Controller
{
    public function dashboard(){
        $personal = User::where('id',Auth::user()->id)->first();
        return view('alumni.dashboard',compact('personal'));
    }
}
