@extends('app')
@section('content')
@include('shared.title', array('titulo' => 'Crear Hora Evento Ocasional'))

<div class="container-fluid">
    <form action="{{url('/ocasionales/store')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="LAB_CODIGO">Sala</label>
                    <select type="input" class="form-control" id="LAB_CODIGO" name="LAB_CODIGO" placeholder="Laboratorio"  required>
                        @foreach ($laboratorios as $laboratorio)
                            <option value="{{$laboratorio->LAB_CODIGO}}">{{$laboratorio->LAB_NOMBRE}}</option>
                        @endforeach
                    </select> 
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="MAT_CODIGO">Materia</label>
                    <select type="input" class="form-control" id="MAT_CODIGO" name="MAT_CODIGO" placeholder="Materia"  required>
                        <option>Seleccione</option>
                        @foreach ($materias as $materia)
                            <option value="{{$materia->MAT_CODIGO}}">{{$materia->MAT_NOMBRE}} -- {{$materia->MAT_NRC}}</option>
                        @endforeach
                    </select> 
                </div>
            </div>
        </div>
        
        <div class="row">
            
            <div class="col">
                <div class="form-group">
                    <label for="DOC_CODIGO">Docente</label>
                    <select type="input" class="form-control" id="DOC_CODIGO" name="DOC_CODIGO" placeholder="Docente"  required>
                        <option value=""></option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="CON_DIA">Dia</label>
                    <input type="date" class="form-control" id="CON_DIA" name="CON_DIA" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="CON_HORA_ENTRADA">Hora Entrada</label>
                    <input type="time" class="form-control" id="CON_HORA_ENTRADA" name="CON_HORA_ENTRADA" required>
                </div>
            </div>    
            <div class="col">
                <div class="form-group">
                    <label for="CON_HORA_SALIDA">Hora Salida</label>
                    <input type="time" class="form-control" id="CON_HORA_SALIDA" name="CON_HORA_SALIDA" required>
                </div>
            </div>   
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="CON_NUMERO_HORAS">Numero Horas</label>
                    <input type="number" class="form-control" id="CON_NUMERO_HORAS" name="CON_NUMERO_HORAS" required>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="CON_NOTA">Nota</label>
                    <input type="text" class="form-control" id="CON_NOTA" name="CON_NOTA">
                </div>
            </div>
           
        </div>
        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mb-2">Crear</button>
        <a href="{{url('ocasionales')}}" class="btn btn-danger mb-2">Cancelar</a>
    </form>
</div>
@endsection