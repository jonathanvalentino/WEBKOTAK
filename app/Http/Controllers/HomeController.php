<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sewa;
use App\Models\Kosntrak;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        if(!empty(Auth::user()->id)){
        $user = User::where('id', Auth::user()->id)->first();
        if($user->hasRole('admin')){
            return redirect('/admin');
        }
        elseif($user->hasRole('user')){
            return view('home');
        }
        elseif($user->hasRole('pemilik')){
            return redirect('/pemilik');
        }  
        }  
        else{
            return view('home');
        }
    }

    public function pencarian()
    {
        $kosntrak = Kosntrak::paginate(30);
        return view('pencarian', compact('kosntrak'));
    }
    
    public function sewaku()
    {
        $sewa = Sewa::where('user_id', Auth::user()->id)->first();
        if(!empty($sewa)){
            $kosntrak = Kosntrak::all()->first();
            $pemilik = User::where('id',$kosntrak->user_id)->first();
            $sewa = Sewa::where('user_id', Auth::user()->id)->get();
        
            for($i=0; $i<count($sewa); $i++){
            $kosntrak = Kosntrak::where('id',$sewa[$i]->kosntrak_id)->first();
            $kosntrakk[$i] = $kosntrak->nama_tempat;
            }

            return view('sewaku',
            ["kosntrak" => $kosntrakk,
            "sewa" => $sewa,
            "rekening" =>$pemilik->rekening]);
            }
        else{
            return view('sewaku');
        }
    }
    public function profile()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('profile',compact('user'));
    }
    public function about()
    {
        return view('about');
    }
    public function faq()
    {
        return view('faq');
    }
}
