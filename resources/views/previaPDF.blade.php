@extends('layouts.plantilla')

@section('titulo', 'Vista previa del PDF')

@section('contenido')        
        
        <table class="table table-dark table-striped table-hover text-center align-middle" style="font-size: 20px;">

            <tr>
                <th>NICK</th>
                <th>NOMBRE</th>
                <th>APELLIDOS</th>
                <th>E-MAIL</th>
            </tr>

            @foreach ($listaUsuarios as $usuario)
            <tr>
                <td>{{$usuario->nick}}</td>
                <td>{{$usuario->nombre}}</td>
                <td>{{$usuario->apellidos}}</td>
                <td>{{$usuario->email}}</td>
            </tr>
            @endforeach

        </table>

        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-success" onclick="location.href='{{route('conviertePDF')}}'">Generar PDF</button>
        </div>

@endsection