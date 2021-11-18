 @extends('layouts.app')
 @section('content')

 <body class="f-color">
     <!-- start section 1 -->
     <div class="container-fluid text-center d-flex justify-content-center py-4">
         <div class="col-md-5">
             <div class="d-flex flex-row shd-blue rounded-pill">
                 <div class="col-md-10">
                     <input type="text" class="w-100 h-100 rnd-kiri ps-3" placeholder="Cari sesuatu disini" />
                 </div>
                 <a class="btn btn-primary rnd-kanan px-3 w-100" href="#" role="button">Cari</a>
             </div>
         </div>
     </div>
     <!-- stop section 1 -->

     <!-- start section 2 -->
     @foreach($kosntrak as $ktk)
     <div class="container-fluid p-0">
         <img class="w-100" src="{{ url('images') }}/{{ $ktk->gambar }}" alt="" />
     </div>
     <!-- stop section 2 -->

     <div class="container d-flex my-5">
         <div class="col-md-8 pe-5">
             <!-- start section 3 -->

             <div class="py-5">
                 <h2 class="mb-3">Keterangan</h2>
                 <p>{{ $ktk->keterangan }}</p>
             </div>
             <div class="py-5 bdr-top">
                 <h2 class="mb-3">Fitur</h2>
                 <ul>
                     <li>
                         <a><img src="/images/icon-fitur-1.png" class="me-2" alt="" /></a>Kamar tersedia :
                         {{ $ktk->status_kamar }}
                     </li>
                     <li>
                         <a><img src="/images/icon-fitur-2.png" class="me-2" alt="" /></a>Kamar mandi :
                         {{ $ktk->status_kamarmandi }}
                     </li>
                     @if($ktk->jenis=="kos")
                     <li>
                         <a><img src="/images/icon-fitur-3.png" class="me-2" alt="" /></a>Wifi :
                         {{ $ktk->wifi }}
                     </li>
                     @endif
                 </ul>
             </div>
             <div class="py-5 bdr-top">
                 <h2 class="mb-3">Peraturan</h2>
                 <p>
                     {{$ktk->peraturan}}
                 </p>
             </div>
             <div class="py-5 bdr-top">
                 <h2 class="mb-3">Lokasi</h2>
                 @if(!empty($ktk->maps))
                 <iframe src="{{ $ktk->maps }}" class="map-size" style="border: 0" allowfullscreen=""
                     loading="lazy"></iframe>
                 @else
                 <h4>Maaf maps belum tersedia</h4>
                 @endif
                 <p>Alamat lengkap : {{ $ktk->alamat }}</p>
             </div>
             <div class="py-5 bdr-top">
                 @foreach($user as $usr)
                 @if($usr->id==$ktk->user_id)
                 <h2 class="mb-3"></h2>
                 <h4>
                     <a><img src="{{ $usr->foto }}" height="50" class="me-3 mb-3" alt="" />{{ $usr->name }}</a>
                 </h4>
                 <p>No Hp : {{ $usr->no_hp }}</p>
                 <p>Alamat : {{ $ktk->alamat }}</p>
                 <p>Email : {{ $usr->email }}</p>
                 @endif
                 @endforeach
             </div>
             <!-- stop section 3 -->
         </div>
         <div class="col-md-4">
             <!-- start aside -->
             <div class="bg-color-b f-color-w my-5 p-4 rnd-box shd-blue">
                 <h2>Tertarik?</h2>
                 <p>Kamu dapat menyewa kos ini dengan harga berikut.</p>
                 <div class="d-flex">
                     <h2>{{ number_format($ktk->harga_sewa) }}</h2>
                     <p style="line-height: 300%">/bulan</p>
                 </div>
                 <button type="button" class="btn btn-outline-light rounded-pill px-3 shd-blue me-2"
                     data-bs-toggle="modal" data-bs-target="#konfirmBayar">Sewa</button>

                 <!-- Edit Modal -->
                 <div class="modal fade" id="konfirmBayar" tabindex="-1" aria-labelledby="konfirmBayarLabel"
                     aria-hidden="true">
                     <div class="modal-dialog f-color">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h5 class="modal-title" id="konfirmBayarLabel">Konfirmasi Status Bayar</h5>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal"
                                     aria-label="Close"></button>
                             </div>
                             <div class="modal-body">
                                 <p>Anda yakin ingin menyewa?</p>
                                 <p>Dengan menyewa kos ini, data anda akan dikirim ke pemilik kos untuk dikonfirmasi</p>
                             </div>
                             <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary rounded-pill px-3 me-2"
                                     data-bs-dismiss="modal">Batal</button>
                                 <a href="{{ url('details',[$ktk->id]) }}"><button type="button"
                                         class="btn btn-primary rounded-pill px-3 me-2">Sewa</button></a>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="bg-color-g f-color my-5 p-4 rnd-box">
                 <h2>Informasi lainnya</h2>
                 <p>Kos ini dekat dengan fasilitas berikut:</p>
                 <p>@if($ktk->laundry == 'ada')
                     Terdapat Laundry dekat dengan
                     @if($ktk->jenis == 'kos')kos
                     @else kontrakan
                     @endif
                     @else
                     Tidak terdapat Laundry di sekitar
                     @if($ktk->jenis == 'kos')kos
                     @else kontrakan
                     @endif
                     @endif
                     <br>
                     Terdapat {{ $ktk->warung_makan }} warung makan di sekitar
                     @if($ktk->jenis == 'kos')kos
                     @else kontrakan
                     @endif
                 </p>
             </div>
             <!-- stop aside -->
         </div>
     </div>
     @endforeach
 </body>

 @endsection
