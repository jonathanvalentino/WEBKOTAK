@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-center container my-5">
    <div class="w-50">
        <div class="d-flex">
            <div class="col-md-2 me-5">
                <!-- <img src="./images/image-ft-1.png" class="pp" alt="" />
                        <a class="editpp" href="">aaaaaa</a> -->
                <div class="container-profilepic card rounded-circle overflow-hidden">
                    <div class="photo-preview card-img w-100 h-100"></div>
                    <div
                        class="middle-profilepic text-center card-img-overlay d-none flex-column justify-content-center">
                        <div class="text-profilepic">
                            <i class="fas fa-camera"></i>
                            <a href="" class="f-color text-decoration-none text-profilepic">Ubah</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-10 d-flex align-items-center">
                <div>
                    <h2>{{ $user->name }}</h2>
                    <button type="button" class="btn btn-primary rounded-pill px-3 shd-blue me-2" data-bs-toggle="modal"
                        data-bs-target="#editModal">Edit Profil</button>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit Profil</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <label class="form-label" for="customFile">Ubah foto profil</label>
                                    <input type="file" class="form-control" id="customFile" />
                                    <span><input class="field" type="text" name="" placeholder="Nama lengkap"
                                            value="Ivan Andika Surya" /><br /></span>
                                    <span><input class="field" type="text" name=""
                                            placeholder="No Telepon" /><br /></span>
                                    <span><input class="field" type="text" name="" placeholder="Alamat" /><br /></span>
                                    @if(Auth::user()->role=='pemilik')
                                    <span><input class="field" type="text" name=""
                                            placeholder="Rekening" /><br /></span>
                                    @endif
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary rounded-pill px-3 me-2"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-primary rounded-pill px-3 me-2">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary rounded-pill px-3 shd-blue" data-bs-toggle="modal"
                        data-bs-target="#sandiModal">Ubah Sandi</button>
                    <!-- Sandi Modal -->
                    <div class="modal fade" id="sandiModal" tabindex="-1" aria-labelledby="sandiModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="sandiModalLabel">Ubah Kata Sandi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <span><input class="field" type="password" name=""
                                            placeholder="Kata sandi baru" /><br /></span>
                                    <span><input class="field" type="password" name=""
                                            placeholder="Konfirmasi Kata sandi" /><br /></span>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary rounded-pill px-3 me-2"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-primary rounded-pill px-3 me-2">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-5">
            <table cellpadding="5" class="table w-100">
                <tr>
                    <th class="col-3">Email</th>
                    <td>:</td>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>No. Telepon</th>
                    <td>:</td>
                    <td>{{ $user->no_hp }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>:</td>
                    <td>
                        @if(empty($user->alamat))
                        Alamat kosong, silahkan isi di bagian edit profil
                        @else
                        {{ $user->alamat }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Jenis akun</th>
                    <td>:</td>
                    <td>{{ $user->role }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
