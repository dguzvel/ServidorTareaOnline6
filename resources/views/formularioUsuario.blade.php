@extends('layouts.plantilla')

@section('titulo', 'Formulario de Registro de Usuarios')

@section('contenido')

        <section class="container cuerpo text-center">

            <h3 id="titulo">Añadir Usuario</h3>
            <br>
            <!-- Formulario HTML que realizará la acción de la ruta establecida, recoger.php -->
            <form action="{{ route('usuario.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <label for="nick">
                    Nick:
                    <input type="text" name="nick" class="form-control" value="{{old('nick')}}"/>
                    @if($errors->any())
                        <br>
                        @error('nick')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror 
                    @endif
                </label>
                <br><br>
                
                <label for="nombre">
                    Nombre:
                    <input type="text" name="nombre" class="form-control" value="{{old('nombre')}}"/>
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
                    <input type="text" name="apellidos" class="form-control" value="{{old('apellidos')}}"/>
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
                    <input type="email" name="email" class="form-control" value="{{old('email')}}"/>
                    @if($errors->any())
                        <br>
                        @error('email')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror 
                    @endif
                </label>
                <br><br>

                <label for="password">
                    Contraseña:
                    <input type="password" name="password" class="form-control" value="{{old('password')}}"/>
                    @if($errors->any())
                        <br>
                        @error('password')
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
                </label>
                <br><br>

                <input type="submit" value="Enviar" name="submit" class="btn btn-success" />

            </form>

        </section>
 
@endsection