@extends('layouts.plantilla')

@section('titulo', 'Acceso al Blog')
    
@section('contenido')
    <header class="encabezado text-center">
    <!-- Encabezado de la página -->
        <h1>
            <img class="textoImagen" src="{{asset('images/php.png')}}" />
                <a href="">DWES Tarea Online 6 - Mi Blog</a>
            <img class="textoImagen" src="{{asset('images/php.png')}}" />
        </h1>
    </header>

    <main>
        <section class="container cuerpo text-center">

            <h3 id="titulo">Login de Usuario</h3>
            <br>
            <!-- Formulario HTML que realizará la acción de la ruta establecida -->
            <form action="" method="POST" enctype="multipart/form-data">

                <label for="usuario">
                    Usuario:
                    <input type="text" name="usuario" class="form-control" 
                        <?php
                            if(isset($_COOKIE["usuario"])){
                                echo "value='{$_COOKIE["usuario"]}'";
                            }
                        ?>
                    />
                </label>
                <br><br>

                <label for="password">
                    Contraseña:
                    <input type="password" name="password" class="form-control"
                        <?php
                            if(isset($_COOKIE["password"])){
                                echo "value='{$_COOKIE["password"]}'";
                            }
                        ?>
                    />
                </label>
                <br><br>

                <label>
                    <input type="checkbox" name="recordar"
                        <?php
                            if(isset($_COOKIE["recordar"])){
                                echo "checked";
                            }
                        ?>
                    />
                    Recuérdame
                </label>
                <br><br>
                
                <label>
                    <input type="checkbox" name="abierta"
                        <?php
                            if(isset($_COOKIE["abierta"])){
                                echo "checked";
                            }
                        ?>
                    />
                    Mantener la sesión abierta
                </label>
                <br><br>

                <div class="g-recaptcha row justify-content-center" data-sitekey="6Lf7ticeAAAAAA8zF-Lc3BI2qcP8ZSdo01LKzJc3"></div>

                <?php

                    //Accede si hay valores en ?error= tras la ruta de la página
                    if(isset($_GET["error"])){

                        if ($_GET["error"] == "incorrecto") {

                            echo '<div class="alert alert-danger">'."Usuario o Contraseña incorrectos".'</div> <br>';

                        }elseif ($_GET["error"] == "fuera") {

                            echo '<div class="alert alert-danger">'."No se puede acceder directamente, debe hacer login".'</div> <br>';

                        }elseif ($_GET["error"] == "vacio") {

                            echo '<div class="alert alert-danger">'."Debe rellenar sus credenciales".'</div> <br>';
        
                        }elseif ($_GET["error"] == "captcha") {

                            echo '<div class="alert alert-danger">'."La validación no es correcta, rellene el Captcha".'</div> <br>';
        
                        }
                            
                    }

                ?>

                <input type="submit" value="Enviar" name="submit" class="btn btn-success" />

            </form>

        </section>
    </main>

    <footer class="pie text-center">
    <!-- Pie de la página -->
        <p>Domingo Guzmán Vélez</p>
    </footer>
@endsection