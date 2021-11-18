<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Sewa;
use App\Models\Kosntrak;

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

    public function listpenyewa()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $kosntrak = Kosntrak::where('user_id', Auth::user()->id)->get();

        for($i=0; $i<count($kosntrak); $i++){
            $sewa = Sewa::where('kosntrak_id', $kosntrak[$i]->id)->first();
            $id[$i] = $kosntrak[$i]->nama_tempat;
        }

        dd($id[0]);
        
        return view('listpenyewa', 
        ["nama" => $id]);
    }
}
