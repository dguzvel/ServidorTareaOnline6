@extends('layouts.plantilla')

@section('titulo', 'Formulario de Registro de Usuarios')

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
                    <button type="button" class="btn btn-light" onclick="location.href='formularioEntrada.php'">Dejar una Entrada</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn btn-light" onclick="location.href='formularioCategoria.php'">Configuración de Categorías</button>
            </div>
        </div>

        <section class="container cuerpo text-center">

            <h3 id="titulo">Añadir Usuario</h3>
            <br>
            <!-- Formulario HTML que realizará la acción de la ruta establecida, recoger.php -->
            <form action="{{ route('insertarUsuario') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <label for="nick">
                    Nick:
                    <input type="text" name="nick" class="form-control" 
                        <?php
                            if(isset($_POST["nick"])){
                                echo "value='{$_POST["nick"]}'";
                            }
                        ?>
                    />
                    <?php //echo mostrarError($errores, "nick"); ?>
                </label>
                <br><br>
                
                <label for="nombre">
                    Nombre:
                    <input type="text" name="nombre" class="form-control" 
                        <?php
                            if(isset($_POST["nombre"])){
                                echo "value='{$_POST["nombre"]}'";
                            }
                        ?>
                    />
                    <?php //echo mostrarError($errores, "nombre"); ?>
                </label>
                <br><br>

                <label for="apellidos">
                    Apellidos:
                    <input type="text" name="apellidos" class="form-control"
                        <?php
                            if(isset($_POST["apellidos"])){
                                echo "value='{$_POST["apellidos"]}'";
                            }
                        ?>
                    />
                    <?php //echo mostrarError($errores, "apellidos"); ?>
                </label>
                <br><br>

                <label for="email">
                    E-mail:
                    <input type="email" name="email" class="form-control"
                        <?php
                            if(isset($_POST["email"])){
                                echo "value='{$_POST["email"]}'";
                            }
                        ?>
                    />
                    <?php //echo mostrarError($errores, "email"); ?>
                </label>
                <br><br>

                <label for="password">
                    Contraseña:
                    <input type="password" name="password" class="form-control"
                        <?php
                            if(isset($_POST["password"])){
                                echo "value='{$_POST["password"]}'";
                            }
                        ?>
                    />
                    <?php //echo mostrarError($errores, "password"); ?>
                </label>
                <br><br>

                <label for="imagen">
                    Imagen:
                    <input type="file" name="imagen" class="form-control" />
                    <?php //echo mostrarError($errores, "imagen"); ?>
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