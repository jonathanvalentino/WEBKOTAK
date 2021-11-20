@extends('layouts.app')

@section('content')
<body class="f-color">
    <!-- start form -->
    <div class="container w-75 my-5">
        <h2>Form Posting Kos dan Kontrakan</h2>
        <a type="button" class="btn btn-outline-primary rounded-pill px-3 me-2" href="{{ url('formpostingkos') }}">Kos</a>
        <a type="button" class="btn btn-outline-primary rounded-pill px-3 me-2" href="{{ url('formpostingkontrakan') }}">Kontrakan</a>
    </div>
</body>
@endsection