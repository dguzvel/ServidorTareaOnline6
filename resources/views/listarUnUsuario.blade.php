@extends('layouts.plantilla')

@section('titulo', 'Detalles de un Usuario')

@section('contenido')         
        
        <table class="table table-dark table-striped table-hover text-center align-middle" style="font-size: 20px;">

            <tr>
                <th>NICK</th>
                <th>NOMBRE</th>
                <th>APELLIDOS</th>
                <th>E-MAIL</th>
                <th>IMAGEN</th>
                <th>OPERACIONES</th>
            </tr>

            <!-- Variable accesible a la vista desde el controlador mediante compact de la que podemos extraer os valores de sus campos -->
            <tr>
                <td>{{$usuarioDetallado->nick}}</td>
                <td>{{$usuarioDetallado->nombre}}</td>
                <td>{{$usuarioDetallado->apellidos}}</td>
                <td>{{$usuarioDetallado->email}}</td>
                <td><img src="../../miblog/images/{{$usuarioDetallado->imagen}}" height="100" width="100"/></td>
                <td>
                    <form>
                        <button type="button" class="btn btn-warning" onclick="location.href='{{route('usuario.edit', $usuarioDetallado->id)}}'">Editar</button>
                    </form>
                    &nbsp;
                    <form action="{{ route('usuario.destroy', $usuarioDetallado->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de que desea eliminar a este usuario?')">Eliminar</button>
                    </form>
                </td>
            </tr>

        </table>      

@endsection