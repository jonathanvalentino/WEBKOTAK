<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PemilikController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        if($user->hasRole('pemilik')){
            return view('homepemilik');
        }
        else{
            return redirect('home');
        }
    }
}
