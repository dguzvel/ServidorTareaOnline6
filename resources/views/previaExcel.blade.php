@extends('layouts.plantilla')

@section('titulo', 'Vista previa del los datos a exportar/importar a Excel')

@section('contenido')        
        
        <table class="table table-dark table-striped table-hover text-center align-middle" style="font-size: 20px;">

            <tr>
                <th>NICK</th>
                <th>NOMBRE</th>
                <th>APELLIDOS</th>
                <th>E-MAIL</th>
                <th>CONTRASEÑA</th>
                <th>IMAGEN</th>
            </tr>

            <!-- Bucle foreach que recorre la variable accesible a la vista desde el controlador mediante compact -->
            @foreach ($listaUsuarios as $usuario)
            <tr>
                <td>{{$usuario->nick}}</td>
                <td>{{$usuario->nombre}}</td>
                <td>{{$usuario->apellidos}}</td>
                <td>{{$usuario->email}}</td>
                <td>{{$usuario->password}}</td>
                <td><img src="../../public/miblog/images/{{$usuario->imagen}}" height="100" width="100"/></td>
            </tr>
            @endforeach

        </table>

        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-info" onclick="location.href='{{route('exportar')}}'">Exportar a EXCEL</button>
        </div>

        <br>

        <div class="d-flex justify-content-center">
            <form action="{{route('importar')}}" method="POST" enctype="multipart/form-data">

                @csrf

                <input type="file" name="excel" style="background-color: white">
                <button type="submit" class="btn btn-success">Importar desde EXCEL</button>

            </form>
        </div>

@endsection