@extends('layouts.app')

@section('content')
<div class="container my-5">
    <table class="table">
        <h2>Postinganku</h2>
        <p>Halaman ini digunakan untuk mengelola kos dan kontrakanmu yang ada di website Kotak. Pastikan semua data
            benar dan sesuai ya!</p>
        <br />
        <a class="btn btn-primary rounded-pill px-4 my-3" href="{{ url('formposting') }}" role="button">Posting</a>
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kos / Kontrakan</th>
                <th scope="col">Nama Tempat</th>
                <th scope="col">Kamar Tersedia</th>
                <th scope="col">Edit</th>
                <th scope="col">Hapus</th>
            </tr>
        </thead>
        <tbody>
            <!-- Mulai perulangan -->
            <?php $i=0 ?>
            @foreach($kosntrak as $ktk)
            <tr>
                <th scope="row"><?=$i+1;?></th>
                @if($ktk->jenis == "kos")
                <td>Kos</td>
                @else
                <td>Kontrakan</td>
                @endif
                <td>{{ $ktk->nama_tempat }}</td>
                <td>{{ $ktk->status_kamar }}</td>
                <td><a href="{{ url('editposting')}}?id={{ $ktk->id }}"><button type="button"
                            class="btn btn-primary rounded-pill px-4 me-2">Edit</button></a></td>
                <td>
                    <button type="button" class="btn btn-danger rounded-pill px-3 shd-blue me-2" data-bs-toggle="modal"
                        data-bs-target="#editModal<?= $i ?>">Hapus</button>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal<?= $i ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel<?= $i ?>">Hapus</h5>
                                </div>
                                <div class="modal-body">
                                    @if($ktk->jenis == "kos")
                                    <p>Anda yakin ingin menghapus data Kos {{ $ktk->nama_tempat }} anda?</p>
                                    @else
                                    <p>Anda yakin ingin menghapus data Kontrakan {{ $ktk->nama_tempat }} anda?</p>
                                    @endif
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary rounded-pill px-3 me-2"
                                        data-bs-dismiss="modal">Batal</button>
                                    <a type="submit" class="btn btn-primary rounded-pill px-3 me-2"
                                        href="{{ url('deletekosntrak',[$ktk->id]) }}">Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <?php $i++ ?>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
