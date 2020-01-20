@extends('app')
@section('content')
<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <br>
                <br>
                <div style="text-align: center; color: #ED7624;">
                    <h2>ACCESO</h2>
                </div>
                <div class="card-body">
                    <h6>Por favor llene el siguiente formulario con sus credenciales de acceso:</h6>
                    <div class="alert alert-success">Los campos con <label style="color: #ED7624">*</label> son obligatorios</div>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Uups!</strong> Hubieron algunos problemas mientras se logueaba.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="card-body pt-0 d-flex justify-content-center">
                    <form role="form" method="POST" action="{{url('/auth/login')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col">
                                <h3 style="color: #ED7624">Usuario*</h3>
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                            <div class="col">
                                <h3 style="color: #ED7624">Clave*</h3>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                        </div>

                        <div class="p-3 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary" style="margin-right: 15px;">Ingresar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection