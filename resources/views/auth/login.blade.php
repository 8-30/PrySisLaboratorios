@extends('app')
@section('content')
	<div class="cotainer">
        <div class="row justify-content-right">
            <div class="col-md-8">
                <div class="card">
                	<br>
                	
                    <div class="card-body">
                	<div ><h3 style="color: #ED7624">Acceso</h3>
            		<p>Por favor llene el siguiente formulario con sus credenciales de acceso:</p>
                	</div>
                	<div class="alert alert-success">Los campos con <label style="color: #ED7624">*</label> son obligatorios
                	</div>
                    <div class="card-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{url('/auth/login')}}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group row">
                                <label for="email_address" class="col-lg-2 control-label text-md-left" ><h3 style="color: #ED7624">Usuario*</h3></label>
                                <div class="col-xs-4">
	                                <input type="text" size="30"  class="form-control"name="username" id="username" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"  class="col-lg-2 control-label"><h3 style="color: #ED7624">Clave*</h3></label>
                                <div class="col-xs-4" >
                                	<input type="email_address" size="30" class="form-control" name="email" id="email" required>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" ">
									Ingresar	
								</button>
                            </div>                    
                    	</form>
                    </div>
	            </div>
	        </div>
	    </div>
    </div>	
@endsection