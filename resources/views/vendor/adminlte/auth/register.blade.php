@extends('adminlte::layouts.auth')

@section('title','Registro')

@section('content')

<body class="hold-transition register-page">
    <div id="app" v-cloak>
        <div class="register-box">
            <div class="register-logo">
              <a href="{{ url('/') }}"><span class="logo-mini"><img src="{{ asset('img/Logo-UJAP2.png') }}" width="40px" alt=""></span>&nbsp;<b>STGP</b>-UJAP</a>
            </div>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="register-box-body">
                <p class="login-box-msg">Registro de nuevo usuario</p>

                <register-form></register-form>

                <a href="{{ url('/login') }}" class="text-center">¿Ya eres miembro?</a>
            </div><!-- /.form-box -->
        </div><!-- /.register-box -->
    </div>

    @include('adminlte::layouts.partials.scripts_auth')
</body>

@endsection
