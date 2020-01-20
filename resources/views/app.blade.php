<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF=8">
  <title>Sistema de Gestión de Laboratorios V1.0</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Octavo Nivel 'B'">
  <link rel="shortcut icon" type="image/ico" href="/favicon.ico"/>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" integrity="sha256-BJ/G+e+y7bQdrYkS2RBTyNfBHpA9IuGaPmf9htub5MQ=" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
  @yield('css')
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link href="{{ URL::asset('css/index.css') }}" rel='stylesheet' type='text/css' />
  <link href="{{ URL::asset('css/table.css') }}" rel='stylesheet' type='text/css' />
  <style type="text/css">
    img.guia{
    width: 75px; height: 40px;
    }
    }
  </style>
  <!--
  <link href="{{ URL::asset('css/slicebox.css') }}" rel='stylesheet' type="text/css"/>
	<link href="{{ URL::asset('css/demo.css') }}" rel='stylesheet' type="text/css" />
	<link href="{{ URL::asset('css/custom.css') }}" rel='stylesheet' type="text/css"/>
	<script type="text/javascript" src="{{ URL::asset('js/modernizr.custom.46884.js') }}"></script>
  -->
</head>
<body>
  <header>
    <div class="header-img" style="background-image:url({{URL::asset('images/principal/header.png')}})">
        <ul class="btn-group nav topnav float-right" role="group">
          <a type="button" class="btn btn-dark btn-xs" href="{{url('/')}}">Inicio</a>
          @if(Auth::check())
          <a type="button" class="btn btn-dark btn-xs" href="{{url('/auth/logout')}}">Salir</a>
          @else
          <a type="button" class="btn btn-dark btn-xs" href="{{url('/auth/login')}}">Entrar</a>
          @endif
        </ul>
    </div>
  </header>

  @include('shared.navbar')
  @yield('content')

  <footer class="footer footer-color footer-display">
    <div class="container">
      <p>Copyright &copy; 2019 TIC's ESPE-L</p>
      <p>Powered by <a href="https://laravel.com/">Laravel Framework</a></p>
    </div>
  </footer>

  <!-- <span class="oi oi-icon-name" title="icon name" aria-hidden="true"></span> -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://momentjs.com/downloads/moment.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

  <script type="text/javascript" src="{{ URL::asset('js/ListTable.js') }}"></script>
  <!-- <script type="text/javascript" src="{{ URL::asset('js/DatePicker.js') }}"></script> -->

  <script type="text/javascript" src="{{ URL::asset('js/jspdf.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/jspdf.plugin.autotable.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/jsReport.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/combo.js') }}"></script> 
  <script type="text/javascript" src="{{ URL::asset('js/dropdown.js') }}"></script> 
  <script type="text/javascript" src="{{ URL::asset('js/validarCedula.js') }}"></script> 
  <!--
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript" src="{{ URL::asset('js/jquery.slicebox.js') }} "></script>
  <script type="text/javascript">
			$(function() {
				
				var Page = (function() {

					var $navArrows = $( '#nav-arrows' ).hide(),
						$shadow = $( '#shadow' ).hide(),
						slicebox = $( '#sb-slider' ).slicebox( {
							onReady : function() {

								$navArrows.show();
								$shadow.show();

							},
							orientation : 'r',
							cuboidsRandom : true
						} ),
						
						init = function() {

							initEvents();
							
						},
						initEvents = function() {

							// add navigation events
							$navArrows.children( ':first' ).on( 'click', function() {

								slicebox.next();
								return false;

							} );

							$navArrows.children( ':last' ).on( 'click', function() {
								
								slicebox.previous();
								return false;

							} );

						};

						return { init : init };

				})();

				Page.init();

			});
		</script>
		-->
  @yield('js')
