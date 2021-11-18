<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Sewa;
use App\Models\Kosntrak;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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

        for($i=0; $i<count($sewa); $i++){
            $id[$i] = $sewa[$i]->id;
        }

        for($i=0; $i<count($sewa); $i++){
            $statusbayar[$i] = $sewa[$i]->status_bayar;
        }
        
        
            for($k=0; $k<count($sewa); $k++){
                for($i=0; $i<count($kosntrak); $i++){
                    if($kosntrak_id[$k] == $kosntrak[$i]->id){
                    $id_sewa[$k] =  $id[$k];
                    $statbayar[$k]  = $statusbayar[$k];
                    $nama_tempat[$k] = $kosntrak[$i]->nama_tempat;
                    $id_penyewa[$k] = $user_id[$k];
                    $user = User::where('id',$id_penyewa[$k])->first();
                    $userr[$k] = $user->name;  
                    // $sewa = $sewa->where('kosntrak_id',$kosntrak_id[$k]);
                    // $user_id = $sewa->user_id;
                    }
                }
            }
            
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

            $i=0;
            foreach($id_sewa as $id){
                $id_sewa[$i] = $id;
                $i++;
            }

            $i=0;
            foreach($statbayar as $sb){
                $bayarfix[$i] = $sb;
                $i++;
            }

        return view('listpenyewa', 
        ["nama_tempat"=> $tempatfix,
         "nama_penyewa"=> $userfix,
         "id_sewa"=> $id_sewa,
         "bayarfix"=> $bayarfix,]);
    }

    public function konfirmasi(Request $rq){
        $sewa = Sewa::where('id', $rq->idsewa)->first();
        $nama_user = $rq->namatempat;
        $nama_penyewa = $rq->namapenyewa;
        return view('konfirmasi', 
        ["sewa"=> $sewa,
         "nama_user"=> $nama_user,
         "nama_penyewa"=> $nama_penyewa,]);
    }

    public function updatesewatolak($id){
        $update = Carbon::now()->toDateTimeString();
        DB::table('sewa')->where('id', $id)->update(
            [
                'status_sewa'=> '0',
                'updated_at' => $update,
            ]
            );
        return redirect('penyewa');
    }

    public function updatesewaterima($id){
        $update = Carbon::now()->toDateTimeString();
        DB::table('sewa')->where('id', $id)->update(
            [
                'status_sewa'=> '1',
                'updated_at' => $update,
            ]
            );
        return redirect('penyewa');
    }

    public function updatebayar($id){
        $update = Carbon::now()->toDateTimeString();
        DB::table('sewa')->where('id', $id)->update(
            [
                'status_bayar'=> '1',
                'updated_at' => $update,
            ]
            );
        return redirect('penyewa');
    }

}
