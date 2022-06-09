@extends('layouts.plantilla')

@section('titulo', 'Formulario de Registro de Entradas')

@section('contenido')

        <section class="container cuerpo text-center">

            <h3 id="titulo">Añadir Entrada</h3>
            <br>
            <!-- Formulario HTML que realizará la acción de la ruta establecida, recoger.php -->
            <form action="{{ route('entrada.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <label for="titulo">
                    Titulo:
                    <input type="text" name="titulo" class="form-control" 
                        <?php
                            if(isset($_POST["nick"])){
                                echo "value='{$_POST["nick"]}'";
                            }
                        ?>
                    />
                    <?php //echo mostrarError($errores, "nick"); ?>
                </label>
                <br><br>

                <label for="imagen">
                    Imagen:
                    <input type="file" name="imagen" class="form-control" />
                    <?php //echo mostrarError($errores, "imagen"); ?>
                </label>
                <br><br>

                <label for="descripcion">
                    Descripcion:
                    <textarea name="descripcion" class="form-control">
                        <?php
                            if(isset($_POST["bio"])){
                                echo $_POST["bio"];
                            }
                        ?>
                    </textarea>
                    <?php //echo mostrarError($errores, "bio"); ?>
                </label>
                <br><br>

                <input type="submit" value="Enviar" name="submit" class="btn btn-success" />

            </form>

            <script>
                CKEDITOR.replace( 'descripcion' );
            </script>

        </section>

@endsection