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
        <!-- Utilizamos asset para buscar en la carpeta public, donde estarán los recursos de estilo -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- CKEditor -->
        <script src=""></script>
    </head>
    <body>
        @yield('contenido')
    </body>
</html>