<!--
 * Sistema de Gestion de Laboratorios - ESPE
 *
 * Author: Mauro Morales - Jerson Morocho
 * Revisado por: 
 *
-->
@extends('app')
@section('content')
@include('shared.title', array('titulo' => 'Actualizar Horario'))

<div class="container-fluid">
    <div class="card border-primary mb-3">
        <div class="card-header">Recomendaciones</div>
        <div class="card-body text-primary">
            <p class="card-text">- Los campos de tipo checkbox son campos opcionales y sirven para determinar si la hora es opcional.</p>
        </div>
    </div>
    <form action="{{url('/horario/update')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="HOR_CODIGO" value="{{ $horario->HOR_CODIGO }}">
        <input type="hidden" name="PER_CODIGO" value="{{ $horario->PER_CODIGO }}">
        <input type="hidden" name="LAB_CODIGO" value="{{ $horario->LAB_CODIGO }}">
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
                        <input type="text" class="form-control" name="HOR_HORA1" value="{{ $horario->HOR_HORA1 }}" required>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_LUNES1">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_LUNES1)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_LUNES1_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES1_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES1_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MATES1">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_MATES1)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_MARTES1_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES1_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES1_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MIERCOLES1">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_MIERCOLES1)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_MIERCOLES1_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES1_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES1_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_JUEVES1">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_JUEVES1)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_JUEVES1_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES1_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES1_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_VIERNES1">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_VIERNES1)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_VIERNES1_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES1_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES1_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td scope="row">
                        <input type="text" class="form-control" name="HOR_HORA2" value="{{ $horario->HOR_HORA2 }}" required>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_LUNES2">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_LUNES2)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_LUNES2_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES2_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES2_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MATES2">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_MATES2)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_MARTES2_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES2_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES2_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MIERCOLES2">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_MIERCOLES2)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_MIERCOLES2_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES2_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES2_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_JUEVES2">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_JUEVES2)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_JUEVES2_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES2_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES2_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_VIERNES2">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_VIERNES2)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_VIERNES2_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES2_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES2_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td scope="row">
                        <input type="text" class="form-control" name="HOR_HORA3" value="{{ $horario->HOR_HORA3 }}" required>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_LUNES3">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_LUNES3)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_LUNES3_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES3_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES3_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MATES3">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_MATES3)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_MARTES3_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES3_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES3_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MIERCOLES3">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_MIERCOLES3)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_MIERCOLES3_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES3_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES3_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_JUEVES3">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_JUEVES3)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_JUEVES3_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES3_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES3_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_VIERNES3">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_VIERNES3)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_VIERNES3_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES3_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES3_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td scope="row">
                        <input type="text" class="form-control" name="HOR_HORA4" value="{{ $horario->HOR_HORA4 }}" required>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_LUNES4">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_LUNES4)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_LUNES4_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES4_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES4_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MATES4">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_MATES4)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_MARTES4_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES4_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES4_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MIERCOLES4">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_MIERCOLES4)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_MIERCOLES4_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES4_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES4_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_JUEVES4">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_JUEVES4)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_JUEVES4_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES4_OPC " checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES4_OPC ">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_VIERNES4">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_VIERNES4)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_VIERNES4_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES4_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES4_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td scope="row">
                        <input type="text" class="form-control" name="HOR_HORA5" value="{{ $horario->HOR_HORA5 }}" required>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_LUNES5">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_LUNES5)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_LUNES5_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES5_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES5_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MATES5">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_MATES5)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_MARTES5_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES5_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES5_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MIERCOLES5">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_MIERCOLES5)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_MIERCOLES5_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES5_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES5_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_JUEVES5">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_JUEVES5)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_JUEVES5_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES5_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES5_OPC ">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_VIERNES5">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_VIERNES5)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_VIERNES5_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES5_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES5_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td scope="row">
                        <input type="text" class="form-control" name="HOR_HORA6" value="{{ $horario->HOR_HORA6 }}" required>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_LUNES6">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_LUNES6)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_LUNES6_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES6_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES6_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MATES6">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_MATES6)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_MARTES6_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES6_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES6_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MIERCOLES6">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_MIERCOLES6)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_MIERCOLES6_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES6_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES6_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_JUEVES6">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_JUEVES6)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_JUEVES6_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES6_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES6_OPC ">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_VIERNES6">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_VIERNES6)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_VIERNES6_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES6_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES6_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td scope="row">
                        <input type="text" class="form-control" name="HOR_HORA7" value="{{ $horario->HOR_HORA7 }}" required>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_LUNES7">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_LUNES7)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_LUNES7_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES7_OPC " checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES7_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MATES7">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_MATES7)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_MARTES7_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES7_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES7_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MIERCOLES7">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_MIERCOLES7)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_MIERCOLES7_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES7_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES7_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_JUEVES7">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_JUEVES7)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_JUEVES7_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES7_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES7_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_VIERNES7">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_VIERNES7)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_VIERNES7_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES7_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES7_OPC ">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td scope="row">
                        <input type="text" class="form-control" name="HOR_HORA8" value="{{ $horario->HOR_HORA8 }}" required>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_LUNES8">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_LUNES8)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_LUNES8_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES8_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES8_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MATES8">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_MATES8)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_MARTES8_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES8_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES8_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MIERCOLES8">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_MIERCOLES8)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_MIERCOLES8_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES8_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES8_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_JUEVES8">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_JUEVES8)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_JUEVES8_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES8_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES8_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_VIERNES8">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_VIERNES8)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_VIERNES8_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES8_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES8_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td scope="row">
                        <input type="text" class="form-control" name="HOR_HORA9" value="{{ $horario->HOR_HORA9 }}" required>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_LUNES9">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_LUNES9)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_LUNES9_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES9_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES9_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MATES9">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_MATES9)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_MARTES9_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES9_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES9_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MIERCOLES9">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_MIERCOLES9)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_MIERCOLES9_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES9_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES9_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_JUEVES9">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_JUEVES9)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_JUEVES9_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES9_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES9_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_VIERNES9">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_VIERNES9)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_VIERNES9_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES9_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES9_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td scope="row">
                        <input type="text" class="form-control" name="HOR_HORA10" value="{{ $horario->HOR_HORA10 }}" required>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_LUNES10">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_LUNES10)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_LUNES10_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES10_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES10_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MATES10">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_MATES10)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_MARTES10_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES10_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES10_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MIERCOLES10">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_MIERCOLES10)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_MIERCOLES10_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES10_OPC " checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES10_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_JUEVES10">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_JUEVES10)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_JUEVES10_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES10_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES10_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_VIERNES10">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_VIERNES10)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_VIERNES10_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES10_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES10_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td scope="row">
                        <input type="text" class="form-control" name="HOR_HORA11" value="{{ $horario->HOR_HORA11 }}" required>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_LUNES11">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_LUNES11)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_LUNES11_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES11_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES11_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MATES11">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_MATES11)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_MARTES11_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES11_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES11_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MIERCOLES11">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_MIERCOLES11)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_MIERCOLES11_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES11_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES11_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_JUEVES11">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_JUEVES11)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_JUEVES11_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES11_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES11_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_VIERNES11">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_VIERNES11)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_VIERNES11_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES11_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES11_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td scope="row">
                        <input type="text" class="form-control" name="HOR_HORA12" value="{{ $horario->HOR_HORA12 }}" required>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_LUNES12">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_LUNES12)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_LUNES12_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES12_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES12_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MATES12">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_MATES12)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_MARTES12_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES12_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES12_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MIERCOLES12">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_MIERCOLES12)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_MIERCOLES12_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES12_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES12_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_JUEVES12">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_JUEVES12)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_JUEVES12_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES12_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES12_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_VIERNES12">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_VIERNES12)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_VIERNES12_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES12_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES12_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td scope="row">
                        <input type="text" class="form-control" name="HOR_HORA13" value="{{ $horario->HOR_HORA13 }}" required>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_LUNES13">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_LUNES13)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_LUNES13_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES13_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_LUNES13_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MATES13">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_MATES13)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_MARTES13_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES13_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MARTES13_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_MIERCOLES13">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_MIERCOLES13)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_MIERCOLES13_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES13_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_MIERCOLES13_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_JUEVES13">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_JUEVES13)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_JUEVES13_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES13_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_JUEVES13_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="input-group">
                            <select class="custom-select" name="HOR_VIERNES13">
                                <option value=""></option>
                                @foreach ($materias as $materia)
                                @if ($materia->MAT_CODIGO === $horario->HOR_VIERNES13)
                                <option value="{{ $materia->MAT_CODIGO }}" selected>{{ $materia->MAT_ABREVIATURA }}</option>
                                @else
                                <option value="{{ $materia->MAT_CODIGO }}">{{ $materia->MAT_ABREVIATURA }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    @if ($horario->HOR_VIERNES13_OPC === 1)
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES13_OPC" checked>
                                    @else
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="HOR_VIERNES13_OPC">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mb-2">Actualizar</button>
        <a href="{{url('/horario/'.$horario->HOR_CODIGO.'/destroy')}}" class="btn btn-warning mb-2">Eliminar</a>
        <a href="{{url('horario')}}" class="btn btn-danger mb-2">Cancelar</a>
    </form>
</div>
@endsection