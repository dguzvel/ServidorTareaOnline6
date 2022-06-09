@extends('layouts.plantilla')

@section('titulo', 'Formulario de Actualización de Entrada')

@section('contenido')

        <section class="container cuerpo text-center">

            <h3 id="titulo">Actualizar Entrada</h3>
            <br>
            <!-- Formulario HTML que realizará la acción de la ruta establecida, recoger.php -->
            <form action="{{ route('entrada.update', $entradaActualizada) }}" method="POST" enctype="multipart/form-data">

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

            <script>
                CKEDITOR.replace( 'descripcion' );
            </script>

        </section>

@endsection