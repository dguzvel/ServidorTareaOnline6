<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('titulo')</title>
        <!-- Captcha -->
        <script src="https://www.google.com/recaptcha/api.js?hl=es" async defer></script>
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Irish+Grover&display=swap " rel="stylesheet">
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <!-- CSS -->
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Utilizamos asset para buscar en la carpeta public, donde estarán los recursos de estilo -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- CKEditor -->
        <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    </head>
    <body>
        <header class="encabezado text-center">
        <!-- Encabezado de la página -->
            <h1>
                <img class="textoImagen" src="{{asset('miblog/images/php.png')}}" />
                    <a href="{{route('inicio')}}">DWES Tarea Online 6 - Mi Blog</a>
                <img class="textoImagen" src="{{asset('miblog/images/php.png')}}" />
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
                        <button type="button" class="btn btn-light" onclick="location.href='{{route('usuario.create')}}'">Registro de Usuarios</button>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-light" onclick="location.href='{{route('usuario.index')}}'">Listado de Usuarios</button>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-light" onclick="location.href='{{route('entrada.create')}}'">Dejar una Entrada</button>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-light" onclick="location.href='{{route('entrada.index')}}'">Listado de Entradas</button>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-light" onclick="location.href='{{route('log.index')}}'">Listado de Logs</button>  
                </div>

                <form class="form" type="get" action="{{route('search')}}">

                    <div class="input-group">  
                    <input class="form-control" name="busqueda" type="search" placeholder="¿Busca algo en concreto? ... Busque aquí el contenido de las entradas que desee visualizar">
                    <div class="input-group-append">
                        <button class="btn btn-outline-success" type="submit"><i id="icono" class="fa fa-search"></i></button>
                    </div>
    
                </form>
                
                    </div>
    
                <form class="form" type="get" action="{{route('searchUsuario')}}">
    
                    <div class="input-group">  
                    <input class="form-control" name="busqueda" type="search" placeholder="¿Busca a alguien? ... Busque aquí a los usuarios que desee visualizar">
                    <div class="input-group-append">
                        <button class="btn btn-outline-success" type="submit"><i id="icono" class="fa fa-search"></i></button>
                    </div>
    
                </form>
                
                    </div>

            </div>

            @yield('contenido')

        </main>

        <footer class="pie text-center">
        <!-- Pie de la página -->
            <p>Domingo Guzmán Vélez</p>
        </footer>
    </body>
</html>