@extends('layouts.plantilla')

@section('titulo', 'Detalles de una Entrada')

@section('contenido')
    <header class="encabezado text-center">
    <!-- Encabezado de la página -->
        <h1>
            <img class="textoImagen" src="{{asset('images/php.png')}}" />
                <a href="{{route('inicio')}}">DWES Tarea Online 6 - Mi Blog</a>
            <img class="textoImagen" src="{{asset('images/php.png')}}" />
        </h1>
    </header>

    <main>
        <nav class="navbar navbar-dark bg-dark">
            <!-- Incluimos un nav con un botón toggler, tres líneas verticales, que podrá desplegarse y mostrar un menú -->
            <div class="navbar navbar-toggleable-md navbar-light bg-faded">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <a class="navbar-brand" href="../includes/logout.php">Cerrar sesión</a>
        </nav>

        <div class="collapse" id="navbarToggleExternalContent">
            <div class="bg-dark p-4">
                    <button type="button" class="btn btn-light" onclick="location.href='{{route('insertarUsuario')}}'">Registro de Usuarios</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn btn-light" onclick="location.href='{{route('listarUsuarios')}}'">Listado de Usuarios</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn btn-light" onclick="location.href='{{route('insertarEntrada')}}'">Dejar una Entrada</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn btn-light" onclick="location.href='formularioCategoria.php'">Configuración de Categorías</button>
            </div>
        </div>           
        
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

            <tr>
                <td>{{$entradaDetallada->usuario_id}}</td>
                <td>{{$entradaDetallada->categoria_id}}</td>
                <td>{{$entradaDetallada->titulo}}</td>
                <td><img src="../../images/{{$entradaDetallada->imagen}}" height="100" width="100"/></td>
                <td>{{$entradaDetallada->descripcion}}</td>
                <td>{{$entradaDetallada->created_at}}</td>
                <td>
                    <a href="{{route('mostrarActualizarEntrada', $entradaDetallada)}}">Editar</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="{{route('eliminarEntrada', $entradaDetallada)}}">Eliminar</a>
                </td>
            </tr>

        </table>      
    </main>

    <footer class="pie text-center">
    <!-- Pie de la página -->
        <p>Domingo Guzmán Vélez</p>
    </footer>
@endsection