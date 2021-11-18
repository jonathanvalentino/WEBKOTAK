<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link href="{{ url('images/image-logokotak.png') }}" rel="shortcut icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="style.css" />
    <title>Login Kotak</title>
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
                        <h2>Baru datang ya?</h2>
                        <p>Kalau belum punya akun, tentu kamu bisa daftar!</p>
                        <a class="btn btn-outline-light rounded-pill px-3 shd-blue" href="{{ route('register') }}"
                            role="button">Daftar</a>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-center col-md-6 h-100">
                    <div class="w-75 text-center">
                        <img class="my-3" src="{{ url('images/image-logokotak.png') }}" height="50px"
                            alt="" /><br /><br />
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
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
                            <a class="btn btn-link my-3" href="">Lupa kata sandi?</a><br />
                            <button type="submit"
                                class="btn btn-primary rounded-pill my-2 px-3 shd-blue">{{ __('Masuk') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
