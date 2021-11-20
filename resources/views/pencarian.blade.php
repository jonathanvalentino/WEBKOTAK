@extends('layouts.app')
@section('content')
<div id="carouselExampleCaptions" class="carousel" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="/images/image-carousel-1.png" class="d-block w-100" alt="..." />
            <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="/images/image-carousel-1.png" class="d-block w-100" alt="..." />
            <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="/images/image-carousel-1.png" class="d-block w-100" alt="..." />
            <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- Akhir carousel -->

<!-- start section 1 -->
<div class="container-fluid text-center d-flex justify-content-center py-5 bg-color-g">
    <div class="col-md-5">
        <div class="d-flex flex-row shd-blue rounded-pill">
            <div class="col-md-10">
                <form action="{{ url('pencarian') }}">
                    <input type="text" class="w-100 h-100 rnd-kiri ps-3 mt-2 bg-color-g"
                        placeholder="Cari sesuatu disini" name="search" />
            </div>
            <button class="btn btn-primary rnd-kanan px-3 w-100" type="submit">Cari</button>
        </div>
        </form>
    </div>
</div>
<!-- stop section 1 -->

<!-- start section 2 -->
<div class="container py-5">
    <a class="btn btn-outline-primary rounded-pill px-4 me-2" href="{{ url('pencarian') }}?filter1=semua"
        role="button">Semua</a>
    <a class="btn btn-outline-primary rounded-pill px-4 me-2" href="{{ url('pencarian') }}?filter2=kos"
        role="button">Kos</a>
    <a class="btn btn-outline-primary rounded-pill px-4" href="{{ url('pencarian') }}?filter3=kontrakan"
        role="button">Kontrakan</a>
</div>
<div class="container">
    @if(!empty($search))
    <p>Hasil pencarian untuk : <b>{{ $search }}</b></p>
    @endif
</div>
<!-- stop section 2 -->

<!-- start section 3 -->
<div class="container mb-5">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($kosntrak as $ktk)
        @if($ktk->status_kamar != '0')
        <div class="col">
            <div class="card h-100">
                <img src="{{ url('images') }}/{{ $ktk->gambar }}" class="card-img-top" alt="..." />
                <div class="card-body">
                    <h5 class="card-title">{{ $ktk->nama_tempat }}</h5>
                    <p class="card-text">{{ $ktk->keterangan }} </p>
                    <hr>
                    <p class="card-text">Kamar tersedia : {{ $ktk->status_kamar }}</p>
                    <p class="card-text">Kamar mandi : {{ $ktk->status_kamarmandi }}</p>
                    <p class="card-text">Harga : Rp. {{ number_format($ktk->harga_sewa) }}</p>
                    <a href="{{ url('detail') }}?detail={{ $ktk->id }}" class="btn"
                        style="background-color: #0166ff; color:#ffffff" name="detail">Detail</a>
                </div>

                <div class="card-footer">
                    <small class="text-muted">Last updated {{ $ktk->updated_at }}</small>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>
@endsection
