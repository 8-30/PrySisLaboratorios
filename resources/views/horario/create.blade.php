<!--
 * Sistema de Gestion de Laboratorios - ESPE
 *
 * Author: Mauro Morales - Jerson Morocho
 * Revisado por: 
 *
-->
@extends('app')
@section('content')
@include('shared.title', array('titulo' => 'Crear Horario'))

<div class="container-fluid">
    <div class="card border-primary mb-3">
        <div class="card-header">Recomendaciones</div>
        <div class="card-body text-primary">
            <p class="card-text">- Los campos de tipo checkbox son campos opcionales y sirven para determinar si la hora es opcional.</p>
        </div>
    </div>
    <form action="{{url('/horario/store')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="PER_CODIGO" value="{{ $ids[1] }}">
        <input type="hidden" name="LAB_CODIGO" value="{{ $ids[0] }}">
        <table id="horario" class="table table-hover table-bordered results">
            <thead>
                <tr>
                    <th scope="row">HORA</th>
                    <th scope="row">LUNES</th>
                    <th scope="row">MARTES</th>
                    <th scope="row">MIERCOLES</th>
                    <th scope="row">JUEVES</th>
                    <th scope="row">VIERNES</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">
                        <input type="text" class="form-control" name="HOR_HORA1" value="{{ $horas[0]->HORA_NOMBRE }}" required>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_LUNES1">
                                <option value=""></option>
                                @foreach ($materias->sortBy('MAT_ABREVIATURA') as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA}}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES1_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MATES1">
                                <option value=""></option>
                                @foreach ($materias->sortBy('MAT_ABREVIATURA') as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES1_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MIERCOLES1">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES1_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_JUEVES1">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES1_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_VIERNES1">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES1_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td scope="row">
                        <input type="text" class="form-control" name="HOR_HORA2" value="{{ $horas[1]->HORA_NOMBRE }}" required>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_LUNES2">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES2_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MATES2">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES2_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MIERCOLES2">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES2_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_JUEVES2">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES2_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_VIERNES2">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES2_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td scope="row">
                        <input type="text" class="form-control" name="HOR_HORA3" value="{{ $horas[2]->HORA_NOMBRE }}" required>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_LUNES3">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES3_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MATES3">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES3_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MIERCOLES3">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES3_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_JUEVES3">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES3_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_VIERNES3">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES3_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td scope="row">
                        <input type="text" class="form-control" name="HOR_HORA4" value="{{ $horas[3]->HORA_NOMBRE }}" required>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_LUNES4">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES4_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MATES4">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES4_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MIERCOLES4">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES4_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_JUEVES4">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES4_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_VIERNES4">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES4_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td scope="row">
                        <input type="text" class="form-control" name="HOR_HORA5" value="{{ $horas[4]->HORA_NOMBRE }}" required>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_LUNES5">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES5_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MATES5">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES5_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MIERCOLES5">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES5_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_JUEVES5">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES5_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_VIERNES5">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES5_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td scope="row">
                        <input type="text" class="form-control" name="HOR_HORA6" value="{{ $horas[5]->HORA_NOMBRE }}" required>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_LUNES6">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES6_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MATES6">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES6_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MIERCOLES6">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES6_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_JUEVES6">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES6_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_VIERNES6">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES6_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td scope="row">
                        <input type="text" class="form-control" name="HOR_HORA7" value="{{ $horas[6]->HORA_NOMBRE }}" required>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_LUNES7">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES7_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MATES7">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES7_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MIERCOLES7">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES7_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_JUEVES7">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES7_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_VIERNES7">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES7_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td scope="row">
                        <input type="text" class="form-control" name="HOR_HORA8" value="{{ $horas[7]->HORA_NOMBRE }}" required>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_LUNES8">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES8_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MATES8">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES8_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MIERCOLES8">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES8_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_JUEVES8">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES8_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_VIERNES8">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES8_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td scope="row">
                        <input type="text" class="form-control" name="HOR_HORA9" value="{{ $horas[8]->HORA_NOMBRE }}" required>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_LUNES9">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES9_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MATES9">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES9_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MIERCOLES9">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES9_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_JUEVES9">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES9_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_VIERNES9">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES9_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td scope="row">
                        <input type="text" class="form-control" name="HOR_HORA10" value="{{ $horas[9]->HORA_NOMBRE }}" required>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_LUNES10">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES10_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MATES10">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES10_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MIERCOLES10">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES10_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_JUEVES10">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES10_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_VIERNES10">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES10_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td scope="row">
                        <input type="text" class="form-control" name="HOR_HORA11" value="{{ $horas[10]->HORA_NOMBRE }}" required>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_LUNES11">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES11_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MATES11">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES11_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MIERCOLES11">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES11_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_JUEVES11">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES11_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_VIERNES11">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES11_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td scope="row">
                        <input type="text" class="form-control" name="HOR_HORA12" value="{{ $horas[11]->HORA_NOMBRE }}" required>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_LUNES12">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES12_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MATES12">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES12_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MIERCOLES12">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES12_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_JUEVES12">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES12_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_VIERNES12">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES12_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td scope="row">
                        <input type="text" class="form-control" name="HOR_HORA13" value="{{ $horas[12]->HORA_NOMBRE }}" required>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_LUNES13">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES13_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MATES13">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES13_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MIERCOLES13">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES13_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_JUEVES13">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES13_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_VIERNES13">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES13_OPC">
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mb-2">Crear</button>
        <a href="{{url('horario')}}" class="btn btn-danger mb-2">Cancelar</a>
    </form>
</div>
@endsection