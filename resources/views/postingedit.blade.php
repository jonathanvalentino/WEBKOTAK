@extends('layouts.app')

@section('content')
<div class="container w-75 my-5">
    @if($update->jenis == "kos")
    <h2>Edit Postingan Kos</h2>
    @else
    <h2>Edit Postingan Kontrakan</h2>
    @endif

    <form method="POST" action="{{ url('proseseditposting') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $update->id }}" />
        <input name="fjenis" type="hidden" value="{{ $update->jenis }}" />
        <div class="my-5">
            <table cellpadding="5" class="">
                <tr>
                    <th class="col-3">Posting Foto</th>
                    <td>:</td>
                    <td>
                        <input type="file" class="form-control" id="customFile" name="gambar" value="" />
                        <input class="field" type="text" id="customFile" name="" value="{{ $update->gambar }}" />
                    </td>
                </tr>
                <tr>
                    <th class="col-3">Nama Tempat</th>
                    <td>:</td>
                    <td>
                        <span><input class="field" type="text" name="fnama_tempat"
                                value="{{ $update->nama_tempat }}" /><br /></span>
                    </td>
                </tr>
                <tr>
                    <th class="col-3">Keterangan</th>
                    <td>:</td>
                    <td>
                        <span><input class="field" type="text" name="fketerangan"
                                value="{{ $update->keterangan }}" /><br /></span>
                    </td>
                </tr>
                <tr>
                    <th class="col-3">Kamar Tersedia</th>
                    <td>:</td>
                    <td>
                        <span><input class="field" type="number" name="fstatus_kamar"
                                value="{{ $update->status_kamar }}" /><br /></span>
                    </td>
                </tr>
                <tr>
                    <th class="col-3">Wifi</th>
                    <td>:</td>
                    <td>
                        <span><input class="field" type="text" name="fwifi" value="{{ $update->wifi }}" /><br /></span>
                    </td>
                </tr>
                <tr>
                    <th class="col-3">Kamar Mandi</th>
                    <td>:</td>
                    @if($update->jenis == "kos")
                    <td>
                        <input type="radio" name="fstatus_kamarmandi" id="radioLuar" value="Luar"
                            {{$update->status_kamarmandi == 'Luar'? 'checked' : ''}} />
                        <label for="radioLuar">Luar</label>&nbsp;&nbsp;
                        <input type="radio" name="fstatus_kamarmandi" id="radioDalam" value="Dalam"
                            {{$update->status_kamarmandi == 'Dalam'? 'checked' : ''}} />
                        <label for="radioDalam">Dalam</label>
                    </td>
                    @else
                    <td>
                        <span><input class="field" type="number" name="fstatus_kamarmandi"
                                value="{{ $update->status_kamarmandi }}" /><br /></span>
                    </td>
                    @endif
                </tr>
                <tr>
                    <th class="col-3">Peraturan</th>
                    <td>:</td>
                    <td>
                        <span><input class="field" type="text" name="fperaturan"
                                value="{{ $update->peraturan }}" /><br /></span>
                    </td>
                </tr>
                <tr>
                    <th class="col-3">Alamat Lengkap</th>
                    <td>:</td>
                    <td>
                        <span><input class="field" type="text" name="falamat"
                                value="{{ $update->alamat }}" /><br /></span>
                    </td>
                </tr>
                <tr>
                    <th class="col-3">Warung Makan Terdekat</th>
                    <td>:</td>
                    <td>
                        <span><input class="field" type="text" name="fwarung_makan"
                                value="{{ $update->warung_makan }}" /><br /></span>
                    </td>
                </tr>
                <tr>
                    <th class="col-3">Laundry Terdekat</th>
                    <td>:</td>
                    <td>
                        <span><input class="field" type="text" name="flaundry"
                                value="{{ $update->laundry }}" /><br /></span>
                    </td>
                </tr>
                <tr>
                    <th class="col-3">Harga</th>
                    <td>:</td>
                    <td>
                        <span><input class="field" type="number" name="fharga"
                                value="{{ $update->harga_sewa }}" /><br /></span>
                    </td>
                </tr>
            </table>
        </div>
        <a type="button" class="btn btn-secondary rounded-pill px-3 me-2" href="{{ url('pemilik') }}">Batal</a>
        <input type="submit" class="btn btn-primary rounded-pill px-3 me-2" value="Simpan">
    </form>
</div>
@endsection
