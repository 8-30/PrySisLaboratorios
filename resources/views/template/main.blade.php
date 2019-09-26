<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF=8">
  <title>SG-LAB</title>
  <link rel="stylesheet" href="{{ asset('Plugins/Boostrap/css/bootstrap.css') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Clean responsive bootstrap website template">
  <meta name="author" content="">
  <!-- styles -->
  <link href="{{ asset('bootstrap/css/bootstrap.css') }}" rel="stylesheet">
  <link href="{{ asset('bootstrap/css/bootstrap-reboot.css') }}" rel="stylesheet">
  <link href="{{ asset('bootstrap/css/bootstrap-grid.css') }}" rel="stylesheet">
  <link href="{{ asset('Plugins/Boostrap/css/bootstrap.css') }}" rel="stylesheet">
  <link href="{{ asset('Plugins/Boostrap/css/bootstrap-responsive.css') }}" rel="stylesheet">
  <link href="{{ asset('Plugins/Boostrap/css/docs.css') }}" rel="stylesheet">

  <link href="{{ asset('Plugins/Boostrap/css/prettyPhoto.css') }}" rel="stylesheet">

  <link href="{{ asset('Plugins/Boostrap/js/google-code-prettify/prettify.css') }}" rel="stylesheet">

  <link href="{{ asset('Plugins/Boostrap/css/flexslider.css') }}" rel="stylesheet">

  <link href="{{ asset('Plugins/Boostrap/css/refineslide.css') }}" rel="stylesheet">

  <link href="{{ asset('Plugins/Boostrap/css/font-awesome.css') }}" rel="stylesheet">

  <link href="{{ asset('Plugins/Boostrap/css/animate.css') }}" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700" rel="stylesheet">

  <link href="{{ asset('Plugins/Boostrap/css/style.css') }}" rel="stylesheet">

  <link href="{{ asset('Plugins/Boostrap/color/default.css') }}" rel="stylesheet">

  <!-- fav and touch icons -->
  <link rel="shortcut icon" href="{{ asset('Plugins/Boostrap/ico/favicon.ico') }}">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('Plugins/Boostrap/ico/apple-touch-icon-144-precomposed.png') }}">

  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('Plugins/Boostrap/ico/apple-touch-icon-114-precomposed.png') }}">

  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('Plugins/Boostrap/ico/apple-touch-icon-72-precomposed.png') }}">
  <link rel="apple-touch-icon-precomposed" href="{{ asset('Plugins/Boostrap/ico/apple-touch-icon-57-precomposed.png') }}">

  <!-- =======================================================
    Theme Name: Plato
    Theme URL: https://bootstrapmade.com/plato-responsive-bootstrap-website-template/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>
<body>
  @include ('template.navbar')
   
    <main role="main">        
        @yield('content')
    </main><!-- /.container -->

  @include ('template.footer')
  <script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
  <script src="{{ asset('Plugins/js/jquery.js') }}"></script>
  <script src="{{ asset('Plugins/js/modernizr.js') }}"></script>
  <script src="{{ asset('Plugins/js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('Plugins/js/google-code-prettify/prettify.js') }}"></script>
  <script src="{{ asset('Plugins/js/bootstrap.js') }}"></script>
  <script src="{{ asset('Plugins/js/jquery.prettyPhoto.js') }}"></script>
  <script src="{{ asset('Plugins/js/portfolio/jquery.quicksand.js') }}"></script>
  <script src="{{ asset('Plugins/js/portfolio/setting.js') }}"></script>
  <script src="{{ asset('Plugins/js/hover/jquery-hover-effect.js') }}"></script>
  <script src="{{ asset('Plugins/js/jquery.flexslider.js') }}"></script>
  <script src="{{ asset('Plugins/js/classie.js') }}"></script>
  <script src="{{ asset('Plugins/js/cbpAnimatedHeader.min.js') }}"></script>
  <script src="{{ asset('Plugins/js/jquery.refineslide.js') }}"></script>
  <script src="{{ asset('Plugins/js/jquery.ui.totop.js') }}"></script>

  <!-- Template Custom Javascript File -->
  <script src="assets/js/custom.js"></script>

</body>

