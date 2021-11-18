@extends('layouts.app')

@section('content')
<div class="">
    <div class="bg-image-home"></div>
    <div class="header-text w-25">
        <h1>Sedang cari Kos atau Kontrakan?</h1>
        <p>Kotak adalah platform terpercaya untuk mendapatkan informasi kos dan kontrakan di Kota Salatiga. Mau mulai
            lihat-lihat?</p>
        <a class="btn btn-primary rounded-pill px-4 shd-blue" href="#cari-id" role="button">Mulai</a>
    </div>
</div>
<!-- stop jumbotron -->

<!-- start section 1 -->
<div id="cari-id" class=" container-fluid text-center d-flex justify-content-center py-10 bg-color-g">
    <div class="col-md-5">
        <h1>Mulai pencarianmu dari sini</h1>
        <p>Kamu bisa cari sesuai lokasi yang kamu inginkan, coba cari juga menggunakan kata kunci seperti FTI, UKSW, dan
            yang lain</p>
        <div class="d-flex flex-row my-5 shd-blue rounded-pill">
            <div class="col-md-10">
                <form action="{{ url('pencarian') }}">
                    <input type="text" class="w-100 h-100 rnd-kiri mt-2 bg-color-g" name="search" />
            </div>
            <button class="btn btn-primary rnd-kanan px-3 w-100" type="submit">Cari</button>
        </div>
    </div>
</div>
<!-- stop section 1 -->

<!-- start section 2 -->
<div class="container-fluid text-center d-flex justify-content-center py-10 bg-color-b">
    <div class="col-md-8 f-color-w">
        <h1>Nikmati kemudahan dalam mencari kos dan kontrakan di Kota Salatiga</h1>
        <p>
            Kami menawarkan fitur-fitur yang dapat memudahkan Anda dalam mencari kos atau kontrakan nih,<br />
            apa aja sih kelebihan dari Kotak?
        </p>
        <div class="d-flex my-5 ml-5">
            <div class="row row-cols-md-4 g-4 ml-5">
                <div class="col">
                    <div class="card h-100 bg-color-d px-2 py-7 rnd-box">
                        <div class="card-body">
                            <h5 class="card-title">Mudah digunakan</h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 bg-color-d px-2 py-7 rnd-box">
                        <div class="card-body">
                            <h5 class="card-title">Pilihan yang variatif</h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 bg-color-d px-2 py-7 rnd-box">
                        <div class="card-body">
                            <h5 class="card-title">Update setiap hari</h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 bg-color-d px-2 py-7 rnd-box">
                        <div class="card-body">
                            <h5 class="card-title">Minim biaya layanan</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- stop section 2 -->

<!-- start section 3 -->
<div class="container-fluid text-center d-flex justify-content-center py-10 bg-color-g">
    <div class="col-md-8">
        <h1>Kata mereka yang sudah pakai Kotak!</h1>
        <p>Mari kita lihat pendapat mereka mengenai Kotak</p>
        <div class="d-flex my-5">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="h-100">
                        <img src="./images/image-ft-1.png" height="200px" />
                        <div class="card-body">
                            <h5 class="card-title">Ivan Andika Surya</h5>
                            <p class="card-text">"Mantap, sangat membantu untuk mencari kos di Kota Salatiga!"</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="h-100">
                        <img src="./images/image-ft-1.png" height="200px" />
                        <div class="card-body">
                            <h5 class="card-title">Ivan Andika Surya</h5>
                            <p class="card-text">"Mantap, sangat membantu untuk mencari kos di Kota Salatiga!"</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="h-100">
                        <img src="./images/image-ft-1.png" height="200px" />
                        <div class="card-body">
                            <h5 class="card-title">Ivan Andika Surya</h5>
                            <p class="card-text">"Mantap, sangat membantu untuk mencari kos di Kota Salatiga!"</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
