@extends('layouts.plantilla')

@section('titulo', 'Formulario de Actualización de Usuario')

@section('contenido')

        <section class="container cuerpo text-center">

            <h3 id="titulo">Actualizar Usuario</h3>
            <br>
            <!-- Formulario HTML que realizará la acción de la ruta establecida, recoger.php -->
            <form action="{{ route('usuario.update', $usuarioActualizado) }}" method="POST" enctype="multipart/form-data">

                @csrf

                @method('put')

                <label for="nombre">
                    Nombre:
                    <input type="text" name="nombre" class="form-control" value="{{$usuarioActualizado->nombre}}" />
                </label>
                <br><br>

                <label for="apellidos">
                    Apellidos:
                    <input type="text" name="apellidos" class="form-control" value="{{$usuarioActualizado->apellidos}}" />
                </label>
                <br><br>

                <label for="email">
                    E-mail:
                    <input type="email" name="email" class="form-control" value="{{$usuarioActualizado->email}}"/>
                </label>
                <br><br>

                <label for="imagen">
                    Imagen:
                    <input type="file" name="imagen" class="form-control" />
                    <img src="../../images/{{$usuarioActualizado->imagen}}" height="100" width="100"/>
                </label>
                <br><br>

                <input type="submit" value="Enviar" name="submit" class="btn btn-success" />

            </form>

        </section>
 
@endsection