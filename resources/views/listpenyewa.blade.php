@extends('layouts.app')
@section('content')
<div class="container my-5">
    <table class="table">
        <h2>Daftar Penyewa</h2>
        <p>Halaman ini digunakan untuk mengelola penyewa kos dan kontrakanmu yang ada di website Kotak.</p>
        <br />
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Item</th>
                <th scope="col">Penyewa</th>
                <th scope="col">Status Sewa</th>
                <th scope="col">Status Bayar</th>
            </tr>
        </thead>
        <tbody>
            <!-- Mulai perulangan -->
            @for($i=0; $i<count($nama_tempat); $i++)<tr>
                <th scope="row">
                    <?= $i+1; ?>
                </th>
                <td>{{ $nama_tempat[$i] }}</td>
                <td>{{ $nama_penyewa[$i] }}</td>
                <td>
                    <button type="button" class="btn btn-success rounded-pill px-3 shd-blue me-2" data-bs-toggle="modal"
                        data-bs-target="#konfirmSewa">Konfirmasi</button>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="konfirmSewa" tabindex="-1" aria-labelledby="konfirmSewaLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="konfirmSewaLabel">Konfirmasi Status Sewa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Konfirmasi bahwa bisa menyewa?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary rounded-pill px-3 me-2"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-danger rounded-pill px-3 me-2">Tidak</button>
                                    <button type="button" class="btn btn-success rounded-pill px-3 me-2">Ya</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <button type="button" class="btn btn-success rounded-pill px-3 shd-blue me-2" data-bs-toggle="modal"
                        data-bs-target="#konfirmBayar">Konfirmasi</button>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="konfirmBayar" tabindex="-1" aria-labelledby="konfirmBayarLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="konfirmBayarLabel">Konfirmasi Status Bayar</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Konfirmasi bahwa sudah membayar?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary rounded-pill px-3 me-2"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-success rounded-pill px-3 me-2">Sudah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                </tr>
                @endfor
        </tbody>
    </table>
</div>
@endsection
