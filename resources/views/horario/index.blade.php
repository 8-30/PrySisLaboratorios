<!--
 * Sistema de Gestion de Laboratorios - ESPE
 *
 * Author: Mauro Morales - Jerson Morocho
 * Revisado por: 
 *
-->
@extends('app')
@section('content')
@include('shared.title', array('titulo' => 'Salas'))

<div class="container-fluid">
    @if (session('title') && session('subtitle'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">{{ session('title') }}</h4>
        <p>{{ session('subtitle') }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    
    @if (count($laboratorios) == 0)
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">No hay salas creadas!</h4>
        <p>Para poder crear un horario primero cree una sala <a href="{{ url('laboratorio/create') }}">aquí</a>.</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <table id="ListTable" class="table table-hover table-bordered results">
        <thead>
            <tr>
                <th scope="row">#</th>
                <th scope="row">NOMBRE</th>
                <th scope="row">CAPACIDAD</th>
                <th scope="row">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($laboratorios as $lab)
            <tr>
                <td scope="row">{{$lab -> LAB_CODIGO}}</td>
                <td scope="row">{{$lab -> LAB_NOMBRE}}</td>
                <td scope="row">{{$lab -> LAB_CAPACIDAD}}</td>
                <td>
                    @if ($lab -> visible == 'lapiz')
                    <a href="{{url('horario/'.$lab->LAB_CODIGO.'/'.$lab->PER_CODIGO.'/edit')}}" class="btn btn-primary mb-2"><span class="oi oi-pencil"></span></a>
                    @elseif ($lab -> visible == 'plus')
                    <a href="{{url('horario/'.$lab->LAB_CODIGO.'/'.$lab->PER_CODIGO.'/create')}}" class="btn btn-success mb-2"><span class="oi oi-plus"></span></a>
                    @endif
                </td>
            </tr>
        @endforeach   
        </tbody>
    </table>
</div>
@endsection