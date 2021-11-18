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
        $sewa = Sewa::latest()->get();
        $kosntrak = Kosntrak::where('user_id', Auth::user()->id)->get();
        for($i=0; $i<count($sewa); $i++){
            $kosntrak_id[$i] = $sewa[$i]->kosntrak_id;
        }
        for($i=0; $i<count($sewa); $i++){
            $user_id[$i] = $sewa[$i]->user_id;
        }
        
        
            for($k=0; $k<count($sewa); $k++){
                for($i=0; $i<count($kosntrak); $i++){
                    if($kosntrak_id[$k] == $kosntrak[$i]->id){
                    
                    $nama_tempat[$k] = $kosntrak[$i]->nama_tempat;
                    $id_penyewa[$k] = $user_id[$k];
                    $user = User::where('id',$id_penyewa[$k])->first();
                    $userr[$k] = $user->name;    
                    // $sewa = $sewa->where('kosntrak_id',$kosntrak_id[$k]);
                    // $user_id = $sewa->user_id;
                    }
                }
            }
            dd($id_penyewa);
            $i=0;
            foreach($nama_tempat as $nmtmpt){
                $tempatfix[$i] = $nmtmpt;
                $i++;
            }

            $i=0;
            foreach($userr as $usr){
                $userfix[$i] = $usr;
                $i++;
            }
        
        return view('listpenyewa', 
        ["nama_tempat"=> $tempatfix,
         "nama_penyewa"=> $userfix,]);
    }
}
