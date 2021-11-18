<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Sewa;
use App\Models\Kosntrak;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SweetAlert;
use UxWeb\SweetAlert\SweetAlertServiceProvider;

class SewaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function sewa($id){
        $kosntrak = Kosntrak::where('id', $id)->first();
    	$tanggal = Carbon::now();
        $create = Carbon::now()->toDateTimeString();
        $update = Carbon::now()->toDateTimeString();
        $pemilik = User::where('id',$kosntrak->user_id)->first();
        $cek_sewa = Sewa::where('user_id', Auth::user()->id)->where('id',$id)->first();
    	//simpan ke database pesanan
    	if(empty($cek_sewa))
    	{
    		DB::table('sewa')->insert(
            [
                'user_id' => Auth::user()->id,
                'kosntrak_id' => $id,
                'tanggal' => $tanggal,
                'status_sewa'=> '',
                'created_at' => $create,
                'updated_at' => $update,
            ]
            );
    	}
		alert()->success('Harap menunggu konfirmasi pesan dari pemilik dan melakukan pembayaran', 'Sukses');
		return redirect('sewaku');
	}

    public function bayar($id){
        $sewa = Sewa::where('id', $id)->first();
        $kosntrak = Kosntrak::where('id', $sewa->kosntrak_id)->first();
        $pemilik = User::where('id',$kosntrak->user_id)->first();
        DB::table('sewa')->where('id',$id)->update(
            [
                'status_bayar'=> '0',
            ]
            );  
        alert()->success('Harap menyelesaikan transaksi dan menunggu konfirmasi pembayaran dari pemilik', 'Sukses');
        return redirect('sewaku');
    }

    public function hapus($id){
        Sewa::where('id', $id)->delete();
        alert()->success('Anda berhasil membatalkan sewa', 'Sukses');
        return redirect('sewaku');
    }
}
