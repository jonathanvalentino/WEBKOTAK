@extends('layouts.app')

@section('content')
<body class="f-color">
    <!-- start form -->
    <div class="container w-75 my-5">
        <h2>Form Posting Kontrakan</h2>
        <form method="POST" action="{{ url('formtambahkontrakan') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="my-5">
            <input name="fjenis" type="hidden" value="kontrakan">
                <table cellpadding="5" class="">
                    <tr>
                        <th class="col-3">Posting Foto</th>
                        <td>:</td>
                        <td>
                            <input type="file" class="form-control" id="customFile" name="gambar"/>
                        </td>
                    </tr>
                    <tr>
                        <th class="col-3">Nama Tempat</th>
                        <td>:</td>
                        <td>
                            <span><input class="field" type="text" name="fnama_tempat" required/><br /></span>
                        </td>
                    </tr>
                    <tr>
                        <th class="col-3">Keterangan</th>
                        <td>:</td>
                        <td>
                            <span><input class="field" type="text" name="fketerangan" required/><br /></span>
                        </td>
                    </tr>
                    <tr>
                        <th class="col-3">Kamar Tersedia</th>
                        <td>:</td>
                        <td>
                            <span><input class="field" type="number" name="fstatus_kamar" required/><br /></span>
                        </td>
                    </tr>
                    <tr>
                        <th class="col-3">Wifi</th>
                        <td>:</td>
                        <td>
                            <span><input class="field" type="text" name="fwifi" required/><br /></span>
                        </td>
                    </tr>
                    <tr>
                        <th class="col-3">Kamar Mandi</th>
                        <td>:</td>
                        <td>
                            <span><input class="field" type="number" name="fstatus_kamarmandi" required /><br /></span>
                        </td>
                    </tr>
                    <tr>
                        <th class="col-3">Peraturan</th>
                        <td>:</td>
                        <td>
                            <span><input class="field" type="text" name="fperaturan" required/><br /></span>
                        </td>
                    </tr>
                    <tr>
                        <th class="col-3">Alamat Lengkap</th>
                        <td>:</td>
                        <td>
                            <span><input class="field" type="text" name="falamat" required/><br /></span>
                        </td>
                    </tr>
                    <tr>
                        <th class="col-3">Warung Makan Terdekat</th>
                        <td>:</td>
                        <td>
                            <span><input class="field" type="number" name="fwarung_makan" required/><br /></span>
                        </td>
                    </tr>
                    <tr>
                        <th class="col-3">Laundry Terdekat</th>
                        <td>:</td>
                        <td>
                            <span><input class="field" type="number" name="flaundry" required/><br /></span>
                        </td>
                    </tr>
                    <tr>
                        <th class="col-3">Harga</th>
                        <td>:</td>
                        <td>
                            <span><input class="field" type="number" name="fharga" required/><br /></span>
                        </td>
                    </tr>
                </table>
            </div>
            <a type="submit" class="btn btn-secondary rounded-pill px-3 me-2" href="{{ url('pemilik') }}">Batal</a>
            <input type="submit" class="btn btn-primary rounded-pill px-3 me-2" value="Simpan">
        </form>
    </div>
</body>
@endsection