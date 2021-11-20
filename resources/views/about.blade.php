@extends('layouts.app')
@section('content')
<div class="container my-5">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-collection"></i>
                </div>
                <h2 class="h4 fw-bolder">Kenapa Kami membuat Kotak?</h2>
                <p>Kotak ditujukan untuk membantu pengguna mencari kos dan kontrakan dengan aman dan cepat.</p>
            </div>
            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-building"></i>
                </div>
                <h2 class="h4 fw-bolder">Teknologi apa saja yang dipakai?</h2>
                <p>.</p>
            </div>
            <div class="col-lg-4">
                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i>
                </div>
                <h2 class="h4 fw-bolder">Dimana kami mengelola website ini?</h2>
                <p>Kami mengelola website ini di perusahaan yang terletak di Kota Salatiga</p>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid text-center d-flex justify-content-center bg-color-g py-6">
    <div class="col-md-8">
        <h2>Siapa saja orang-orang dibalik Kotak?</h2>
        <br />
        <div class="d-flex my-5 justify-content-center">
            <div class="row row-cols-2 row-cols-md-3 g-4 justify-content-center">
                <div class="col">
                    <div class="h-100">
                        <img src="./images/image-ft-1.png" height="150" />
                        <div class="card-body">
                            <h5 class="card-title">Hebertus</h5>
                            <p class="card-text">"Mantap, sangat membantu untuk mencari kos di Kota Salatiga!"</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="h-100">
                        <img src="./images/image-ft-1.png" height="150" />
                        <div class="card-body">
                            <h5 class="card-title">Ivan</h5>
                            <p class="card-text">"Mantap, sangat membantu untuk mencari kos di Kota Salatiga!"</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="h-100">
                        <img src="./images/image-ft-1.png" height="150" />
                        <div class="card-body">
                            <h5 class="card-title">Evan</h5>
                            <p class="card-text">"Mantap, sangat membantu untuk mencari kos di Kota Salatiga!"</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="h-100">
                        <img src="./images/image-ft-1.png" height="150" />
                        <div class="card-body">
                            <h5 class="card-title">Abi</h5>
                            <p class="card-text">"Mantap, sangat membantu untuk mencari kos di Kota Salatiga!"</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="h-100">
                        <img src="./images/image-ft-1.png" height="150" />
                        <div class="card-body">
                            <h5 class="card-title">Jonathan</h5>
                            <p class="card-text">"Mantap, sangat membantu untuk mencari kos di Kota Salatiga!"</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container px-5 my-5 px-5">
    <div class="text-center mb-5">
        <h2 class="">Bagaimana pendapat orang tentang aplikasi ini?</h2>
        <p>Banyak pelanggan yang senang dengan pekerjaan kami</p>
    </div>
    <div class="row gx-5 justify-content-center">
        <div class="col-lg-6">
            <!-- Testimonial 1-->
            <div class="card mb-4">
                <div class="card-body p-4">
                    <div class="d-flex">
                        <div class="flex-shrink-0"><i class="bi bi-chat-right-quote-fill text-primary fs-1"></i></div>
                        <div class="ms-4">
                            <p class="mb-1">Rumah saya jauh, Tetapi dengan aplikai <b>Kotak</b> saya sangat terbantu
                                sekali dalam mencari kontrakan. Terima kasih <b>Kotak</b></p>
                            <div class="small text-muted">- Raynaldo, Pontianak</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body p-4">
                    <div class="d-flex">
                        <div class="flex-shrink-0"><i class="bi bi-chat-right-quote-fill text-primary fs-1"></i></div>
                        <div class="ms-4">
                            <p class="mb-1">Aplikasi yang sangat profesional dalam membantu pencarian dan sangat efektif
                                sekali!</p>
                            <div class="small text-muted">- Jason Sinaga, Semarang</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Testimonial 2-->
            <div class="card">
                <div class="card-body p-4">
                    <div class="d-flex">
                        <div class="flex-shrink-0"><i class="bi bi-chat-right-quote-fill text-primary fs-1"></i></div>
                        <div class="ms-4">
                            <p class="mb-1">Saya dari kudus dan ingin berkuliah di Salatiga, Dan aplikasi ini sangat
                                membantu saya dalam menemukan kos dengan cepat. Mantap pokoknya!</p>
                            <div class="small text-muted">- Jordi, Kudus</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
