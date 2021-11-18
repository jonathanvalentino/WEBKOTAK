<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="button.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link href="{{ url('images/image-logokotak.png') }}" rel="shortcut icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>Daftar Pemilik Kos/Kontrakan Kotak</title>
</head>

<body>
    <div class="bg-image">
        <div class="homebut container-fluid d-flex justify-content-center">
            <a href="{{ url('home') }}" class="btn btn-primary shd-blue rounded-pill"><i
                    class="fa fa-home fa-lg"></i></a>
        </div>
        <div class="parent-con d-flex justify-content-center align-items-center">
            <div class="d-flex child-con shadow rnd-box">
                <div class="d-flex align-items-center justify-content-center col-md-6 h-100 bg-primary rnd-kiri">
                    <div class="w-75 text-center f-color-w">
                        <h2>Udah punya akun?</h2>
                        <p>Kamu bisa langsung masuk kalau udah punya akun!</p>
                        <a class="btn btn-outline-light rounded-pill px-3 shd-blue" href="{{ route('login') }}"
                            role="button">Masuk</a>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-center col-md-6 h-100">
                    <div class="w-75 text-center">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <h4 class="mb-3">Daftar (Pemilik)</h4>
                            <span>
                                <input id="name" class="field @error('name') is-invalid @enderror" type="name"
                                    name="name" value="{{ old('name') }}" required autocomplete="name"
                                    placeholder="Nama Lengkap" autofocus /><br />

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </span>
                            <span>
                                <input id="no_hp" class="field @error('no_hp') is-invalid @enderror" type="number"
                                    name="no_hp" value="{{ old('no_hp') }}" required autocomplete="no_hp"
                                    placeholder="Nomor Telepon" autofocus /><br />

                                @error('no_hp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </span>
                            <span>
                                <input id="email" class="field @error('email') is-invalid @enderror" type="email"
                                    name="email" value="{{ old('email') }}" required autocomplete="email"
                                    placeholder="Alamat Email" autofocus /><br />

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </span>
                            <span>
                                <input id="password" type="password"
                                    class="field @error('password') is-invalid @enderror" placeholder="Kata sandi"
                                    name="password" required autocomplete="current-password" /><br />
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </span>
                            <span>
                                <input id="password-confirm" type="password" class="field"
                                    placeholder="Konfirmasi kata sandi" name="password_confirmation" required
                                    autocomplete="new-password" /><br />
                            </span>
                            <input id="role" name="role" type="hidden" value="pemilik">
                            <a class="btn btn-link my-2" href="{{ route('register') }}">Daftar sebagai penyewa</a><br />
                            <button type="submit" class="btn btn-primary rounded-pill my-2 px-3 shd-blue">
                                {{ __('Daftar') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>
