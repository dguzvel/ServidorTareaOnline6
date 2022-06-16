@extends('layouts.plantilla')

@section('titulo', 'Listado de Entradas')

@section('contenido')         
        
        <table class="table table-dark table-striped table-hover text-center align-middle" style="font-size: 20px;">

            <tr>
                <th>USUARIO</th>
                <th>TITULO</th>
                <th>IMAGEN</th>
                <th>@sortablelink('created_at', 'FECHA')</th>
                <th>OPERACIONES</th>
            </tr>

            <!-- Bucle foreach que recorre la variable accesible a la vista desde el controlador mediante compact -->
            @foreach ($listaEntradas as $entrada)
            <tr>
                <td>{{$entrada->usuario_id}}</td>
                <td>{{$entrada->titulo}}</td>
                <td><img src="../../public/miblog/images/{{$entrada->imagen}}" height="200" width="200"/></td>
                <td>{{$entrada->created_at}}</td>
                <td>
                    <form>
                        <button type="button" class="btn btn-warning" onclick="location.href='{{route('entrada.edit', $entrada->id)}}'">Editar</button>
                    </form>
                    &nbsp;
                    <form action="{{ route('entrada.destroy', $entrada->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de que desea eliminar esta entrada?')">Eliminar</button>
                    </form>
                    &nbsp;
                    <form>
                        <button type="button" class="btn btn-info" onclick="location.href='{{route('entrada.show', $entrada->id)}}'">Detallar</button>
                    </form>
                </td>
            </tr>
            @endforeach

        </table>
        
        <!-- Ordena el paginado de modo que tenga en cuenta el orden ascendente o descendente de las entradas -->
        <div class="d-flex justify-content-center">
            {{!! $listaEntradas->appends(Request::except('page'))->render() !!}}
        </div>
        
@endsection