@extends('layouts.plantilla')

@section('titulo', 'Formulario de Registro de Entradas')

@section('contenido')

        <section class="container cuerpo text-center">

            <h3 id="titulo">Añadir Entrada</h3>
            <br>
            <!-- Formulario HTML que realizará la acción de la ruta establecida -->
            <form action="{{ route('entrada.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <label for="titulo">
                    Titulo:
                    <input type="text" name="titulo" class="form-control" value="{{old('titulo')}}" required/>
                </label>
                <br><br>

                <label for="imagen">
                    Imagen:
                    <input type="file" name="imagen" class="form-control" required/>
                </label>
                <br><br>

                <label for="descripcion">
                    Descripcion:
                    <textarea name="descripcion" class="form-control" required>{{old('descripcion')}}</textarea>
                </label>
                <br><br>

                <input type="submit" value="Enviar" name="submit" class="btn btn-success" />

            </form>

            <!-- Inserción del editor de texto CKEDITOR -->
            <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
            <script>
                CKEDITOR.replace('descripcion');
            </script>

        </section>

@endsection