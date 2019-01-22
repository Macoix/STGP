<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>STGP-UJAP | Inicio @yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Bootstrap core CSS -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Custom fonts for this template -->
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">        <!-- Custom styles for this template -->
        <link href="{{ asset('css/landing-page.css') }}" rel="stylesheet">
         @stack('styles')
    </head>
    <body>
      <div class="">
      <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
          <div class="container">
              <a class="navbar-brand" href="">
                  <img src="{{ asset('img/Logo-UJAP2.jpg') }}" width="40px" alt="">&nbsp STGP-UJAP
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                  <span class="navbar-toggler-icon"></span>
              </button>

                  <!-- Right Side Of Navbar -->
                  <ul class="navbar-nav ml-auto">
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                      </li>
                  </ul>
              </div>
          </div>
      </nav>
      </div>
      {{-- PRIMER PARALLAX --}}
    <div class="parallax-window" data-z-index="-100" data-parallax="scroll" data-image-src="{{asset('img/regis.jpg')}}">
        <div class="overlay"></div>
          <div class="container">
            <div class="row ">
              <div class="col-xl-6 offset-md-5">
                <h1 class="mb-5">STGP UJAP</h1>
              </div>
              <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                <form>
                  <div class="form-row">
                    <div class="offset-lg-2 col-md-8">
                        <a href="{{url('register')}}" class="btn btn-info btn-block btn-lg" >Registrate ahora!</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
        </div>
    </div>

        {{-- PRIMER SECTION --}}
    <section class="features-icons text-center" style="background-color: #ffec80">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-4">
                <div class="features-icons-icon d-flex">
                  <i class="icon-screen-desktop m-auto"></i>
                </div>
                <h3>Ingresa desde cualquier lugar</h3>
                <p class="lead mb-0 ">Consulta los proyectos desde donde quiera que estes</p>
                </div>
            </div>
            </div>
        </div>
    </section>

        {{-- SEGUNDO PARALLAX --}}
    <div class="parallax-window" data-z-index="-100" data-parallax="scroll" data-image-src="{{asset('img/section1.jpg')}}">
        <div class="overlay"></div>
          <div class="container">
            <div class="row ">
              <div class="col-xl-6 offset-md-5">
              </div>
              <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                <form>
                  <div class="form-row">
                    <div class="offset-lg-2 col-md-8">
                    </div>
                  </div>
                </form>
              </div>
            </div>
        </div>
    </div>

        {{-- SEGUNDO SECTION --}}
    <section class="features-icons text-center" style="background-color: #ccd9ff">
      <div class="container"
        <div class="row">
          <div class="col-lg-12">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-layers m-auto"></i>
              </div>
              <h3>Las mejores tecnologias</h3>
              <p class="lead mb-0">En este proyecto se usa las mejores tecnologias web.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

        {{-- TERCER PARALLAX --}}
    <div class="parallax-window" data-z-index="-100" data-parallax="scroll" data-image-src="{{asset('img/section2.jpg')}}">
        <div class="overlay"></div>
          <div class="container">
            <div class="row ">
              <div class="col-xl-6 offset-md-5">
              </div>
              <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                <form>
                  <div class="form-row">
                    <div class="offset-lg-2 col-md-8">
                    </div>
                  </div>
                </form>
              </div>
            </div>
        </div>
    </div>

        {{-- ULTIMO SECTION --}}
    <section class="features-icons text-center" style="background-color: #ff6666">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-clock m-auto"></i>
              </div>
              <h3 class="">Facil acceso, facil uso</h3>
              <p class="lead mb-0 " >Puedes usar este sistema de manera muy facil, ahorando mucho tiempo.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

        {{-- ULTIMO PARALLAX --}}
    <div class="parallax-window" data-z-index="-100" data-parallax="scroll" data-image-src="{{asset('img/section3.jpg')}}">
        <div class="overlay"></div>
          <div class="container">
            <div class="row ">
              <div class="col-xl-6 offset-md-5">
              </div>
              <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                <form>
                  <div class="form-row">
                    <div class="offset-lg-2 col-md-8">
                    </div>
                  </div>
                </form>
              </div>
            </div>
        </div>
    </div>

        <footer class="footer bg-light">
            <div class="container">
            <div class="row">
                <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
                <ul class="list-inline mb-2">
                </ul>
                <p class="text-muted small mb-4 mb-lg-0">&copy; STGP UJAP. Todos los derechos reservados.</p>
                </div>
                <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item mr-3">
                    <a href="#">
                        <i class="fa fa-facebook fa-2x fa-fw text-dark"></i>
                    </a>
                    </li>
                    <li class="list-inline-item mr-3">
                    <a href="#">
                        <i class="fa fa-twitter fa-2x fa-fw text-dark"></i>
                    </a>
                    </li>
                    <li class="list-inline-item">
                    <a href="#">
                        <i class="fa fa-instagram fa-2x fa-fw text-dark"></i>
                    </a>
                    </li>
                </ul>
                </div>
            </div>
            </div>
        </footer>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/parallax.js') }}"></script>
        {{-- @stack('scripts') --}}
    </body>
</html>
