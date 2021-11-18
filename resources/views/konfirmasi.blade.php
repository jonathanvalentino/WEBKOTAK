@extends('layouts.app')

@section('content')
<div class="container my-5 w-50">
    <table class="table">
        <tr>
            <td>Nama Tempat</td>
            <td>:</td>
            <td>{{ $nama_user }}</td>
        </tr>
        <tr>
            <td>Penyewa</td>
            <td>:</td>
            <td>{{ $nama_penyewa }}</td>
        </tr>
        <tr>
            <td>Status Sewa</td>
            <td>:</td>
            <td>@if(!empty($sewa))
                @if($sewa->status_sewa=='')
                <button type="button" class="btn btn-success rounded-pill px-3 shd-blue me-2" data-bs-toggle="modal"
                    data-bs-target="#konfirmSewa">Konfirmasi</button>
                @elseif($sewa->status_sewa=='1')
                <p style="color:green">Sewa diterima</p>
                @elseif($sewa->status_sewa=='0')
                <p style="color:#FF0000">Sewa telah ditolak</p>
                @endif
                @endif
            </td>
        </tr>
        <tr>
            <td>Status Bayar</td>
            <td>:</td>
            <td>
                @if(!empty($sewa))
                @if($sewa->status_sewa=='1' && $sewa->status_bayar=='0')
                <button type="button" class="btn btn-success rounded-pill px-3 shd-blue me-2" data-bs-toggle="modal"
                    data-bs-target="#konfirmBayar">Konfirmasi</button>
                @elseif($sewa->status_sewa=='1'&& $sewa->status_bayar=='')
                <p style="color:blue">Menunggu penyewa membayar</p>
                @elseif($sewa->status_sewa=='0')
                <p style="color:#FF0000">Sewa telah ditolak</p>
                @elseif($sewa->status_sewa==''&& $sewa->status_bayar=='')
                Terima atau tolak sewa terlebih dahulu
                @elseif($sewa->status_sewa=='1'&& $sewa->status_bayar=='1')
                <p style="color:green">Pembayaran telah dikonfirmasi</p>
                @endif
                @endif
            </td>
        </tr>
    </table>
    <a class="btn btn-primary rounded-pill px-4 shd-blue" href="{{ url('penyewa') }}" role="button">Kembali</a>
    <!-- Edit Modal -->
    <div class="modal fade" id="konfirmSewa" tabindex="-1" aria-labelledby="konfirmSewaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="konfirmSewaLabel">Konfirmasi Status Sewa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Konfirmasi bahwa {{ $nama_penyewa }} bisa menyewa?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-pill px-3 me-2"
                        data-bs-dismiss="modal">Batal</button>
                    <a href="{{ url('updatesewatolak',[$sewa->id]) }}"><button type="button"
                            class="btn btn-danger rounded-pill px-3 me-2">Tolak</button></a>
                    <a href="{{ url('updatesewaterima',[$sewa->id]) }}"><button type="button"
                            class="btn btn-success rounded-pill px-3 me-2">Terima</button></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="konfirmBayar" tabindex="-1" aria-labelledby="konfirmBayarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="konfirmBayarLabel">Konfirmasi Status Bayar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Konfirmasi bahwa {{ $nama_penyewa }} sudah membayar?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-pill px-3 me-2"
                        data-bs-dismiss="modal">Batal</button>
                    <a href="{{ url('updatebayar',[$sewa->id]) }}"><button type="button"
                            class="btn btn-success rounded-pill px-3 me-2">Konfirmasi</button></a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
