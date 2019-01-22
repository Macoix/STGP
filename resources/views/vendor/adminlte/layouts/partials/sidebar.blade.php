<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('img\user8-128x128.jpg')}}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p style="overflow: hidden;text-overflow: ellipsis;max-width: 160px;" data-toggle="tooltip" title="{{ Auth::user()->nombre }}">{{ Auth::user()->nombre }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
            </div>
        </div>
        @endif

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header"><strong>MENÚ</strong></li>
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-home'></i> <span>Inicio</span></a></li>
            {{-- <li><a href=""><i class='fa fa-id-card-o'></i> <span>Perfil</span></a></li> --}}
            <li>
                <a href="{{ route('proyectos.index') }}"><i class='fa fa-paperclip'></i>
                    <span>
                        @if(Auth::user()->id == 2) Mis
                            @endif Proyectos
                    </span>
                </a>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-files-o'></i> <span>Anexos</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('formulario.anexo') }}"><i class='fa fa-file-o'></i><span>Anexo D</span></a></li>
                    <li><a href=""><i class='fa fa-file-o'></i><span>Anexo 4A</span></a></li>
                </ul>
            </li>
            <li><a href="{{route('proyectos.manual')}}" target="_blank"><i class='fa fa-file-pdf-o'></i> <span>Manual</span></a></li>
            <li class="header"><strong>ADMINISTRACIÓN</strong></li>
            <li class="treeview">
                <a href="#"><i class='fa fa-users'></i> <span>Personal</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('user.index') }}"><i class='fa fa-user'></i><span>Lista de Usuarios</span></a></li>
                    <li><a href="{{ route('tutor.index') }}"><i class='fa fa-user'></i><span>Lista de Tutores</span></a></li>
                    <li><a href="{{ route('jurado.index') }}"><i class='fa fa-user'></i><span>Lista de Jurados</span></a></li>
                    <li><a href="{{ route('comite.index') }}"><i class='fa fa-user'></i><span>Listado del Comité</span></a></li>
                    <li><a href="{{ route('decano.index') }}"><i class='fa fa-user'></i><span>Decano</span></a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-book'></i> <span>Académico</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('carreras.index') }}"><i class='fa fa-graduation-cap'></i><span>Lista de Carreras</span></a></li>
                    <li><a href="{{ route('periodos.index') }}"><i class='fa fa-clock-o'></i><span>Lista de Periodos</span></a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-file"></i> <span>Nomina</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('nomina.index') }}"><i class='fa fa-file'></i> <span>Tutores</span></a></li>
                    <li><a href=""><i class='fa fa-file'></i><span>Jurado</span></a></li>
                </ul>
            </li>
            <li><a href="{{ route('calendario') }}"><i class='fa fa-calendar'></i> <span>Calendario</span></a></li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
