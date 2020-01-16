@extends('app')
@section('content')
	<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <br>
                    <div ><h3 style="color: #ED7624">Acceso Solicitud</h3>
                    </div>
                	<div class="alert alert-success">Los campos con <label style="color: #ED7624">*</label> son obligatorios</div>
                    <div class="card-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{url('/guias')}}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right" ><h3 style="color: #ED7624">Usuario *</h3></label>
                                <div class="col-md-6">
                                	<input type="text" class="form-control" name="usuario" id="usuario" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right"><h3 style="color: #ED7624">Clave *</h3></label>
                                <div class="col-md-6">
                                	<input type="password" class="form-control" name="clave" id="clave" required>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
									Ver Solicitud
								</button>
                            </div>                    
                    	</form>
                    </div>
	            </div>
	        </div>
	    </div>
    </div>	
@endsection