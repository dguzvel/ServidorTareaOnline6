@extends('layouts.plantilla')

@section('titulo', 'Listado de Usuarios')

@section('contenido')        
        
        <table class="table table-dark table-striped table-hover text-center align-middle" style="font-size: 20px;">

            <tr>
                <th>@sortablelink('nick', 'NICK')</th>
                <th>E-MAIL</th>
                <th>IMAGEN</th>
                <th>OPERACIONES</th>
            </tr>

            @foreach ($listaUsuarios as $usuario)
            <tr>
                <td>{{$usuario->nick}}</td>
                <td>{{$usuario->email}}</td>
                <td><img src="../../public/miblog/images/{{$usuario->imagen}}" height="100" width="100"/></td>
                <td>
                    <form>
                        <button type="button" class="btn btn-warning" onclick="location.href='{{route('usuario.edit', $usuario->id)}}'">Editar</button>
                    </form>
                    &nbsp;
                    <form action="{{ route('usuario.destroy', $usuario->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de que desea eliminar a este usuario?')">Eliminar</button>
                    </form>
                    &nbsp;
                    <form>
                        <button type="button" class="btn btn-info" onclick="location.href='{{route('usuario.show', $usuario->id)}}'">Detallar</button>
                    </form>
                </td>
            </tr>
            @endforeach

        </table>

        <div class="d-flex justify-content-center">
            {{-- {{$listaUsuarios->links()}} --}}
            {!! $listaUsuarios->appends(Request::except('page'))->render() !!}
        </div>

        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-primary" onclick="location.href='{{route('previaPDF')}}'">Previsualizar PDF a imprimir</button>
        </div>

        <br>

        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-primary" onclick="location.href='{{route('previaExcel')}}'">Previsualizar EXCEL a exportar/importar</button>
        </div>

@endsection