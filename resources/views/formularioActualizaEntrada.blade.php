@extends('layouts.plantilla')

@section('titulo', 'Formulario de Actualización de Entrada')

@section('contenido')

        <section class="container cuerpo text-center">

            <h3 id="titulo">Actualizar Entrada</h3>
            <br>
            <!-- Formulario HTML que realizará la acción de la ruta establecida -->
            <form action="{{ route('entrada.update', $entradaActualizada) }}" method="POST" enctype="multipart/form-data">

                @csrf

                @method('put')

                <label for="titulo">
                    Titulo:
                    <input type="text" name="titulo" class="form-control" value="{{old('titulo', $entradaActualizada->titulo)}}" />
                </label>
                <br><br>

                <label for="descripcion">
                    Descripcion:
                    <textarea name="descripcion" class="form-control" required>{{old('descripcion', $entradaActualizada->descripcion)}}</textarea>
                </label>
                <br><br>

                <label for="imagen">
                    Imagen:
                    <input type="file" name="imagen" class="form-control" required/>
                    <img src="../../images/{{$entradaActualizada->imagen}}" height="100" width="100"/>
                </label>
                <br><br>

                <input type="submit" value="Enviar" name="submit" class="btn btn-success" onclick="return confirm('¿Está seguro de que desea modificar la entrada con estos nuevos valores?')"/>

            </form>

            <!-- Inserción del editor de texto CKEDITOR -->
            <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
            <script>
                CKEDITOR.replace('descripcion');
            </script>

        </section>

@endsection