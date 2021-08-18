<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/custom.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Control de Stock</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="container">

            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="/productos">Stock en Laravel</a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{action('ProductoController@listar')}}">Listar Todo</a></li>
                        <li><a href="{{action('ProductoController@nuevo')}}">Nuevo</a></li>
                    </ul>
                </div>

            </nav>

            @yield('contenido')

            <footer class="footer">
                <p>© Prof Matias Garcia.</p>
            </footer>

        </div>
    </body>
</html>
