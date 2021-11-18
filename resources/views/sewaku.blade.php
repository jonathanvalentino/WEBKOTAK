@extends('layouts.app')
@section('content')
<div class="container my-5">
    <h2>Sewaku</h2>
    <p>Halaman ini digunakan untuk melihat daftar kos dan kontrakan yang ingin kamu sewa, selain itu kamu juga bisa
        lihat status verifikasinya juga!</p>
    <br />
    @if(!empty($sewa))
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Tempat</th>
                <th scope="col">Status Verifikasi</th>
                <th scope="col">Status Pembayaran</th>
                <th scope="col">Sunting</th>
            </tr>
        </thead>
        <tbody>
            <!-- Mulai perulangan -->
            <?php $i=0 ?>
            @foreach($sewa as $sw)
            <tr>
                <th scope="row"> <?=$i+1;?></th>
                <td>{{ $kosntrak[$i] }}</td>
                <td>@if(!empty($sw))
                    @if($sw->status_sewa=='')
                    Belum dikonfirmasi
                    @elseif($sw->status_sewa=='1')
                    <p style="color:green">Diterima</p>
                    @elseif($sw->status_sewa=='0')
                    <p style="color:#FF0000">Ditolak</p>
                    @endif
                    @endif
                </td>
                <td>
                    @if(!empty($sw))
                    @if($sw->status_sewa=='1'&&$sw->status_bayar=='')
                    <button type="button" class="btn btn-primary rounded-pill px-3 shd-blue me-2" data-bs-toggle="modal"
                        data-bs-target="#editModal">Bayar Sekarang</button>
                    @elseif($sw->status_sewa=='1'&&$sw->status_bayar=='0')
                    Menunggu Konfirmasi Pembayaran
                    @elseif($sw->status_sewa=='1'&&$sw->status_bayar=='1')
                    <p style="color:green">Diterima</p>
                    @elseif($sw->status_sewa=='0')
                    <p style="color:#FF0000">Ditolak</p>
                    @elseif($sw->status_sewa=='')
                    Menunggu konfirmasi
                    @endif
                    @endif
                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Metode Pembayaran</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Jika anda ingin membayar secara langsung, klik tombol Bayar Langsung</p>
                                    <p>
                                        Jika anda ingin membayar secara online, berikut rekening pemilik:<br />
                                        {{ $rekening }}
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary rounded-pill px-3 me-2"
                                        data-bs-dismiss="modal">Batal</button>
                                    <a href="{{ url('bayar',[$sw->id]) }}"><button type="button"
                                            class="btn btn-primary rounded-pill px-3 me-2">Bayar
                                            Langsung</button>
                                        <a href="{{ url('bayar',[$sw->id]) }}"><button type="button"
                                                class="btn btn-primary rounded-pill px-3 me-2">Bayar
                                                Online</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    @if($sw->status_sewa==''||$sw->status_sewa=='0')
                    <button type="button" class="btn btn-danger rounded-pill px-3 shd-blue me-2" data-bs-toggle="modal"
                        data-bs-target="#editModal<?= $i ?>">Batal Sewa</button>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal<?= $i ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel<?= $i ?>">Hapus</h5>
                                </div>
                                <div class="modal-body">
                                    <p>Anda yakin ingin membatalkan sewa anda?
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary rounded-pill px-3 me-2"
                                        data-bs-dismiss="modal">Batal</button>
                                    <a class="btn btn-danger rounded-pill px-4" href="{{ url('hapus',[$sw->id]) }}"
                                        role="button">Batal
                                        Sewa</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    Menunggu Konfirmasi
                    @endif
                </td>
            </tr>
            <?php $i++ ?>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
@endsection
