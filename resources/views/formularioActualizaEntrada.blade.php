@extends('layouts.plantilla')

@section('titulo', 'Formulario de Actualización de Entrada')

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
                    <button type="button" class="btn btn-light" onclick="location.href='{{route('listarUsuarios')}}'">Listado de Usuarios</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn btn-light" onclick="location.href='{{route('insertarEntrada')}}'">Dejar una Entrada</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn btn-light" onclick="location.href='formularioCategoria.php'">Configuración de Categorías</button>
            </div>
        </div>

        <section class="container cuerpo text-center">

            <h3 id="titulo">Actualizar Entrada</h3>
            <br>
            <!-- Formulario HTML que realizará la acción de la ruta establecida, recoger.php -->
            <form action="{{ route('actualizarEntrada', $entradaActualizada) }}" method="POST" enctype="multipart/form-data">

                @csrf

                @method('put')

                <label for="titulo">
                    Titulo:
                    <input type="text" name="titulo" class="form-control" value="{{$entradaActualizada->titulo}}" />
                </label>
                <br><br>

                <label for="descripcion">
                    Descripcion:
                    <textarea name="descripcion" class="form-control" >{{$entradaActualizada->descripcion}}</textarea>
                </label>
                <br><br>

                <label for="imagen">
                    Imagen:
                    <input type="file" name="imagen" class="form-control" />
                    <img src="../../images/{{$entradaActualizada->imagen}}" height="100" width="100"/>
                </label>
                <br><br>

                <input type="submit" value="Enviar" name="submit" class="btn btn-success" />

            </form>

        </section>
    </main>

    <footer class="pie text-center">
    <!-- Pie de la página -->
        <p>Domingo Guzmán Vélez</p>
    </footer>
@endsection