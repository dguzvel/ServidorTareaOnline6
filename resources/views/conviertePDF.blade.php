@extends('layouts.plantillapdf')

@section('titulo', 'PDF Generado')

@section('contenido')        
        
        <table class="table table-dark table-striped table-hover justify-content-center text-center align-middle" style="font-size: 20px;">

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

@endsection