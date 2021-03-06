<!--
 Sistema de Gestion de Laboratorios - ESPE
 
 Author: Jerson Morocho
 Revisado por: DevOps
 -->
<nav class="navbar navbar-expand-lg navbar-dark nav-color">
@if(Auth::check())
  
  <ul class="navbar-nav mr-auto">
  @if(Auth::user()->authorizeAccion("menu_proceso"))
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
        Procesos
      </a>
      <div class="dropdown-menu">
      @if(Auth::user()->authorizeAccion("menu_proceso_Docente"))
      <a class="dropdown-item" href="{{url('docente')}}">Docente</a>
        <div class="dropdown-divider"></div>
      @endif
      @if(Auth::user()->authorizeAccion("menu_proceso_Periodo"))
        <a class="dropdown-item" href="{{url('periodo')}}">Periodo</a>
        <div class="dropdown-divider"></div>
      @endif
      @if(Auth::user()->authorizeAccion("menu_proceso_Materia"))
        <a class="dropdown-item" href="{{url('materia')}}">Materia</a>
        <div class="dropdown-divider"></div>
      @endif
      @if(Auth::user()->authorizeAccion("menu_proceso_Horario"))
        <a class="dropdown-item" href="{{url('horario')}}">Registrar Horario</a>
        <div class="dropdown-divider"></div>
      @endif
      @if(Auth::user()->authorizeAccion("menu_proceso_GenerarControl"))
        <a class="dropdown-item" href="{{url('control')}}">Generar Control</a>
        <div class="dropdown-divider"></div>
      @endif
      @if(Auth::user()->authorizeAccion("menu_proceso_AgregarHorasControl"))
        <a class="dropdown-item" href="{{url('ocasionales')}}">Eventos Ocasionales</a>
        <div class="dropdown-divider"></div>
      @endif
      @if(Auth::user()->authorizeAccion("menu_proceso_ControlLaboratorio"))
        <a class="dropdown-item" href="{{url('control/consola')}}">Control Laboratorio</a>
        <div class="dropdown-divider"></div>
      @endif
      @if(Auth::user()->authorizeAccion("menu_proceso_RegistrarGuiaAnterior"))
        <a class="dropdown-item" href="{{url('control')}}">Registrar Guia Anterior</a>
        <div class="dropdown-divider"></div>
      @endif
      <a class="dropdown-item" href="{{url('objeto')}}">Objetos Recuperados</a>
        <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="{{url('noticia')}}">Noticia</a>
        <div class="dropdown-divider"></div>
      </div>
    </li>
    @endif
    @if(Auth::user()->authorizeAccion("menu_reportes"))
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
        Reportes
      </a>
     <div class="dropdown-menu">
    @if(Auth::user()->authorizeAccion("menu_reporte_Horarios"))
        <a class="dropdown-item" href="{{url('reporte/horario/sala')}}">Horarios de Sala</a>
        <div class="dropdown-divider"></div>
      @endif
    @if(Auth::user()->authorizeAccion("menu_reporte_HorarioDocente"))
        <a class="dropdown-item" href="{{url('reporte/horario/docente')}}">Horario por Docente</a>
        <div class="dropdown-divider"></div>
      @endif
    @if(Auth::user()->authorizeAccion("menu_reporte_HojaDeControl"))
        <a class="dropdown-item" href="{{url('reporte/hoja/control')}}">Hoja de Control</a>
        <div class="dropdown-divider"></div>
      @endif
    @if(Auth::user()->authorizeAccion("menu_reporte_EventosOcasionales"))
        <a class="dropdown-item" href="{{url('reporte/ocasionales')}}">Eventos ocasionales</a>
        <div class="dropdown-divider"></div>
    @endif
    @if(Auth::user()->authorizeAccion("menu_reporte_MateriasCarrera"))
        <a class="dropdown-item" href="{{url('reporte/materia/carrera')}}">Materia por Carrera</a>
        <div class="dropdown-divider"></div>
      @endif
    @if(Auth::user()->authorizeAccion("menu_reporte_GuiasCarreras"))
        <a class="dropdown-item" href="{{url('reporte/guia/carrera')}}">Guias por Carrera</a>
        <div class="dropdown-divider"></div>
      @endif
    @if(Auth::user()->authorizeAccion("menu_reporte_GuiasPendientes"))
        <a class="dropdown-item" href="{{url('reporte/guia/docente')}}">Guias Pendientes</a>
        <div class="dropdown-divider"></div>
    @endif
    @if(Auth::user()->authorizeAccion("menu_reporte_GuiasEntregadas"))
        <a class="dropdown-item" href="{{url('reporte/guia/docente')}}">Uso con Guias Entregadas</a>
        <div class="dropdown-divider"></div>
      @endif
      </div>
    </li>
    @endif

    @if(Auth::user()->authorizeAccion("menu_estadisticas"))

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
        Estadisticas
      </a>
     <div class="dropdown-menu">
        <a class="dropdown-item" href="#">.....</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">........</a>
        <div class="dropdown-divider"></div>
        
      </div>
    </li>
    @endif
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
        Institucion
      </a>
     <div class="dropdown-menu">

        <a class="dropdown-item" href="{{url('/hora')}}">Hora</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{url('/empresa')}}">Empresa</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{url('/institucion')}}">Institución</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{url('/laboratorio')}}">Laboratorio</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{url('/parametro')}}">Parametro</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{url('/carrera')}}">Carrera</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{url('/control')}}">Control</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="/">Guias</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{url('/campus')}}">Campus</a>
      </div>
    </li>
    @if(Auth::user()->authorizeAccion("menu_admin"))

<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
    Administrar
  </a>
 <div class="dropdown-menu">
   @if(Auth::user()->authorizeAccion("menu_admin_roles"))
    <a class="dropdown-item" href="{{url('/role')}}">Roles</a>
  @endif
    @if(Auth::user()->authorizeAccion("menu_admin_users"))
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="{{url('/user')}}">Usuarios</a>
  @endif

    
  </div>
</li>
@endif
@endif
  </ul>



</nav>