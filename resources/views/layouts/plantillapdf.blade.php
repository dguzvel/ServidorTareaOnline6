<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('titulo')</title>
        <style>

            .encabezado{

            font-family: 'Irish Grover', cursive;
            color:white;
            text-align: center;
            background-color: black;
            padding: 10px; 

            }

            table{

            text-align: center;
            padding-top: 50px;
            padding-bottom: 50px;
            padding-left: 150px;
            border-collapse: collapse;

            }

            tr{

                border: 1px solid;

            }

            .pie{

            font-family: 'Irish Grover', cursive;
            color:white;
            text-align: center;
            background-color: black;
            min-width: 100%;
            padding: 5px;

            }
        </style>
    </head>
    <body>
        <header class="encabezado text-center">
        <!-- Encabezado de la página -->
            <h1>
                DWES Tarea Online 6 - Mi Blog
            </h1>
        </header>

        <main>
    
            @yield('contenido')

        </main>

        <footer class="pie text-center">
        <!-- Pie de la página -->
            <p>Domingo Guzmán Vélez</p>
        </footer>
    </body>
</html>