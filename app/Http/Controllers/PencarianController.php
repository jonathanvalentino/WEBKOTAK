<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Kosntrak;
use Illuminate\Http\Request;

class PencarianController extends Controller
{
    
    public function pencarian()
    {
        $kosntrak = Kosntrak::latest();
        if(!empty(request('search'))){
            $kosntrak->where('nama_tempat', 'like', '%' . request('search') . '%')->orwhere('jenis', 'like', '%' . request('search') . '%')->orwhere('alamat', 'like', '%' . request('search') . '%')->orwhere('keterangan', 'like', '%' . request('search') . '%');
        }

        if(!empty(request('filter1'))){
            $kosntrak->where('jenis', 'kontrak')->orwhere('jenis', 'kos');
        }
        if(!empty(request('filter2'))){
            $kosntrak->where('jenis', 'kos');
        }
        if(!empty(request('filter3'))){
            $kosntrak->where('jenis', 'kontrak');
        }

        return view('pencarian', 
        ["kosntrak" => $kosntrak->get(),
         "search" => request('search')]);
    }

    public function detail(){
        $kosntrak = Kosntrak::latest();
        $detail = request('detail');
        $kosntrak->where('id',$detail);
        $user = User::latest();
        return view('detail',
        ["kosntrak" => $kosntrak->get(),
         "user"=>$user->get()]);
    }
}
