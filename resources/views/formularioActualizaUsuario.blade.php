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
                    <input type="text" name="nombre" class="form-control" value="{{old('nombre', $usuarioActualizado->nombre)}}" />
                    @if($errors->any())
                        <br>
                        @error('nombre')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror 
                    @endif                
                </label>
                <br><br>

                <label for="apellidos">
                    Apellidos:
                    <input type="text" name="apellidos" class="form-control" value="{{old('apellidos', $usuarioActualizado->apellidos)}}" />
                    @if($errors->any())
                        <br>
                        @error('apellidos')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror 
                    @endif                
                </label>
                <br><br>

                <label for="email">
                    E-mail:
                    <input type="email" name="email" class="form-control" value="{{old('email', $usuarioActualizado->email)}}"/>
                    @if($errors->any())
                        <br>
                        @error('email')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror 
                    @endif                
                </label>
                <br><br>

                <label for="imagen">
                    Imagen:
                    <input type="file" name="imagen" class="form-control" />
                    @if($errors->any())
                        <br>
                        @error('imagen')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror 
                    @endif                    
                    <img src="../../images/{{$usuarioActualizado->imagen}}" height="100" width="100"/>
                </label>
                <br><br>

                <input type="submit" value="Enviar" name="submit" class="btn btn-success" onclick="return confirm('¿Está seguro de que desea modificar al usuario con estos nuevos valores?')"/>

            </form>

        </section>
 
@endsection