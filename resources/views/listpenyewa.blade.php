@extends('layouts.app')
@section('content')
<div class="container my-5">
    <table class="table">
        <h2>Daftar Penyewa</h2>
        <p>Halaman ini digunakan untuk mengelola penyewa kos dan kontrakanmu yang ada di website Kotak.</p>
        <br />
        @if(!empty($nama_tempat))
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Tempat</th>
                <th scope="col">Penyewa</th>
                <th scope="col">Status Penyewaan</th>
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
                    <form method="POST" action="{{ url('konfirmasi') }}">
                        @csrf
                        <input type="hidden" value="{{ $id_sewa[$i] }}" name="idsewa">
                        <input type="hidden" value="{{ $nama_tempat[$i] }}" name="namatempat">
                        <input type="hidden" value="{{ $nama_penyewa[$i] }}" name="namapenyewa">
                        @if($bayarfix[$i] == '1')
                        <button type="submit" class="btn btn-secondary disabled rounded-pill px-3 me-2">Selesai</button>
                        @else
                        <button type="submit"
                            class="btn btn-success rounded-pill px-3 shd-blue me-2">Konfirmasi</button>
                        @endif
                    </form>
                </td>
                </tr>
                @endfor
                @else
                < <h3>
                    Kosong
                    </h3>
                    <p>Belum ada penyewa yang ingin menyewa kos / kontrakan anda</p>
                    @endif
        </tbody>
    </table>
</div>
@endsection
