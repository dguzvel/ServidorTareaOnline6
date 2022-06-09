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
 
@endsection