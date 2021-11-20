<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sewa;
use App\Models\Kosntrak;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('profile',compact('user'));
    }

    public function ubahsandi(Request $request)
    {
        $this->validate($request, [
            'password'  => 'confirmed',
        ]);
        $user = User::where('id', Auth::user()->id)->first();
        
        if(!empty($request->password))
    	{
    		$user->password = Hash::make($request->password);
    	}
        $user->update();
        alert()->success('Password berhasil diganti', 'Sukses');
        return view('profile',compact('user'));
    }

    public function ubahprofil(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        
        if(!empty($request))
    	{
    		$user->name = $request->name;
    	    $user->no_hp = $request->no_hp;
    	    $user->alamat = $request->alamat;
            if($user->role=='pemilik'){
                $user->rekening = $request->rekening;
            }
    	}
        $user->update();
        alert()->success('Profil berhasil diganti', 'Sukses');
        return view('profile',compact('user'));
    }

    public function ubahfoto(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        // if($user->foto != "fotodefault.png"){
        //     File::delete(public_path('fotoprofil/'.$user->foto));
        //     } //ini berhasil tapi ga guna untuk kasus ini

        $file = $request->file('gambar');
        $gambarupload = $user->id . '.png';
        $file->move(\base_path() ."/public/fotoprofil", $gambarupload);
        if(!empty($request))
    	{   
    		$user->foto = $gambarupload;
    	}
        $user->update();

        alert()->success('Foto profil berhasil diganti', 'Sukses');
        return redirect('profile');
    }
}
