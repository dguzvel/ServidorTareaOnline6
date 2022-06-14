@extends('layouts.plantilla')

@section('titulo', 'Listado de Logs')

@section('contenido')        
        
        <table class="table table-dark table-striped table-hover text-center align-middle" style="font-size: 20px;">

            <tr>
                <th>FECHA</th>
                <th>OPERACION REALIZADA</th>
                <th>ELIMINAR REGISTRO</th>
            </tr>

            @foreach ($listaLogs as $log)
            <tr>
                <td>{{$log->created_at}}</td>
                <td>{{$log->operacion}}</td>
                <td>
                    <form action="{{ route('log.destroy', $log->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de que desea eliminar a este usuario?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach

        </table>

@endsection