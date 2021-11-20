<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Sewa;
use App\Models\Kosntrak;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PemilikController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        if($user->hasRole('pemilik')){
            $kosntrak = Kosntrak::where('user_id', Auth::user()->id)->get();
           return view('homepemilik',
            [
                "kosntrak" => $kosntrak,
            ]);
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
            
            if(!empty($nama_tempat)){
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
        else{
            return view('listpenyewa');
        }
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
        $sewa = Sewa::where('id',$id)->first();
        $kosntrak_id = $sewa->kosntrak_id;
        DB::table('kosntrak')->where('id', $kosntrak_id)->where('jenis', 'kos')->decrement("status_kamar");
        
        DB::table('sewa')->where('id', $id)->update(
            [
                'status_bayar'=> '1',
                'updated_at' => $update,
            ]
            );
        return redirect('penyewa');
    }

    public function posting()
    {
        // $user = User::where('id', Auth::user()->id)->first();
        // if(empty($user->rekening))
        // {
        //     alert()->error('Harap mengisi nomor rekening sebelum memposting kos  / kontrakan', 'Maaf');
        //     return redirect('profile');
        // } else
        // {
            return view('posting');
        // }
    }

    public function postingkos()
    {
        //return view ke halaman form posting crud
        return view('postingkos');
    }

    public function postingkontrakan()
    {
        //return view ke halaman form posting crud
        return view('postingkontrakan');
    }

    public function tambahkos(Request $req) {
        $create = Carbon::now()->toDateTimeString();
        $update = Carbon::now()->toDateTimeString();
        $user = User::where('id', Auth::user()->id)->first();
		$file = $req->file('gambar');
        $gambarupload = $req->fnama_tempat . '.png';
        $file->move(\base_path() ."/public/images", $gambarupload);

        //insert ke database
        DB::table('kosntrak')->insert(
            [
                'gambar' => $gambarupload,
                'jenis' => $req->fjenis,
                'user_id' => $user->id,
                'nama_tempat' => $req->fnama_tempat,
                'keterangan' => $req->fketerangan,
                'status_kamar' => $req->fstatus_kamar,
                'wifi' => $req->fwifi,
                'status_kamarmandi' => $req->fstatus_kamarmandi,
                'peraturan' => $req->fperaturan,
                'alamat' => $req->falamat,
                'warung_makan' => $req->fwarung_makan,
                'laundry' => $req->flaundry,
                'harga_sewa' => $req->fharga,
                'created_at' => $create,
                'updated_at' => $update
            ]
        );
        //alert()->success('Postingan berhasil ditambahkan', 'Sukses');
        return redirect('pemilik');
    }

    public function tambahkontrakan(Request $req) {
        $create = Carbon::now()->toDateTimeString();
        $update = Carbon::now()->toDateTimeString();
        $user = User::where('id', Auth::user()->id)->first();
		$file = $req->file('gambar');
        $gambarupload = $req->fnama_tempat . '.png';
        $file->move(\base_path() ."/public/images", $gambarupload);

        //insert ke database
        DB::table('kosntrak')->insert(
            [
                'gambar' => $gambarupload,
                'jenis' => $req->fjenis,
                'user_id' => $user->id,
                'nama_tempat' => $req->fnama_tempat,
                'keterangan' => $req->fketerangan,
                'status_kamar' => $req->fstatus_kamar,
                'wifi' => $req->fwifi,
                'status_kamarmandi' => $req->fstatus_kamarmandi,
                'peraturan' => $req->fperaturan,
                'alamat' => $req->falamat,
                'warung_makan' => $req->fwarung_makan,
                'laundry' => $req->flaundry,
                'harga_sewa' => $req->fharga,
                'created_at' => $create,
                'updated_at' => $update
            ]
        );
        //alert()->success('Postingan berhasil ditambahkan', 'Sukses');
        return redirect('pemilik');
    }

    public function tampiledit() {
        $id = request('id');
        $postedit = Kosntrak::where('id', $id)->first();
        return view('postingedit',["update" => $postedit]);
    }
    

    public function updateposting(Request $req) {
        $create = Carbon::now()->toDateTimeString();
        $update = Carbon::now()->toDateTimeString();
        $user = User::where('id', Auth::user()->id)->first();
        
        if(!empty($req->file('gambar'))) {
            $file = $req->file('gambar');
            $gambarupload = $req->fnama_tempat . '.png';
            $file->move(\base_path() ."/public/images", $gambarupload);
        }
        
        $kosntrak = Kosntrak::where('id', $req->id)->first();
        if(!empty($req)) {
            if(!empty($gambarupload)) {
                $kosntrak->gambar = $gambarupload;
            }
            $kosntrak->jenis = $req->fjenis;
            $kosntrak->user_id = $user->id;
            $kosntrak->nama_tempat = $req->fnama_tempat;
            $kosntrak->keterangan = $req->fketerangan;
            $kosntrak->status_kamar = $req->fstatus_kamar;
            $kosntrak->wifi = $req->fwifi;
            $kosntrak->status_kamarmandi = $req->fstatus_kamarmandi;
            $kosntrak->peraturan = $req->fperaturan;
            $kosntrak->alamat = $req->falamat;
            $kosntrak->warung_makan = $req->fwarung_makan;
            $kosntrak->laundry = $req->flaundry;
            $kosntrak->harga_sewa = $req->fharga;
            $kosntrak->created_at = $create;
            $kosntrak->updated_at = $update;
        }
        $kosntrak->update();
        return redirect('pemilik');
    }

    public function deletekosntrak($id) {
        $kosntrak = Kosntrak::where('id', $id)->first();
        File::delete(public_path('images/'. $kosntrak->gambar));
        DB::table('kosntrak')->where('id', $id)->delete();
        return redirect('pemilik');
    }

}
