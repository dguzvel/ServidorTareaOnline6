@extends('layouts.plantilla')

@section('titulo', 'Detalles de una Entrada')

@section('contenido')        
        
        <table class="table table-dark table-striped table-hover text-center align-middle" style="font-size: 20px;">

            <tr>
                <th>USUARIO</th>
                <th>ROL</th>
                <th>TITULO</th>
                <th>IMAGEN</th>
                <th>DESCRIPCION</th>
                <th>FECHA</th>
                <th>OPERACIONES</th>
            </tr>

            <!-- Variable accesible a la vista desde el controlador mediante compact de la que podemos extraer os valores de sus campos -->
            <tr>
                <td>{{$entradaDetallada->usuario_id}}</td>
                <td>{{$entradaDetallada->categoria_id}}</td>
                <td>{{$entradaDetallada->titulo}}</td>
                <td><img src="../../miblog/images/{{$entradaDetallada->imagen}}" height="100" width="100"/></td>
                <td>{{$entradaDetallada->descripcion}}</td>
                <td>{{$entradaDetallada->created_at}}</td>
                <td>
                    <form>
                        <button type="button" class="btn btn-warning" onclick="location.href='{{route('entrada.edit', $entradaDetallada->id)}}'">Editar</button>
                    </form>
                    &nbsp;
                    <form action="{{ route('entrada.destroy', $entradaDetallada->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de que desea eliminar esta entrada?')">Eliminar</button>
                    </form>
                </td>
            </tr>

        </table>      
    </main>

@endsection