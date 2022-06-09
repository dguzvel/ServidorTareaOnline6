@extends('layouts.plantilla')

@section('titulo', 'Inicio')
    
@section('contenido')

        <section class="container cuerpo text-center">
            <h1 id="titulo">Mi Blog PHP/MVC - Inicio</h1>
            <br>
            <h2>
                Bienvenido <?php
                                if(isset($_COOKIE["abierta"])){
                                    echo $_COOKIE["abierta"];
                                }
                            ?>
            </h2>
        </section>

@endsection