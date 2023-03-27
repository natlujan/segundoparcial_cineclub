<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/menu.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/css/pelicula.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/css/agregarPelicula.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/css/generos.css" media="screen" /> 

    {{-- Importados --}}
        
    {{-- <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css"> --}}

    <link rel="stylesheet" href="\css\Carrusel\templatemo-hexashop.css"> 

    <link rel="stylesheet" href="\css\Carrusel\owl-carousel.css">

    <link rel="stylesheet" href="\css\Carrusel\lightbox.css">

    <title>Género</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg -tertiary menuColor">
        <div class="container-fluid">
            <h4 class="menuTitulo" >Filmedia</h4>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar menu" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item" style= "padding-right: 10px;">
                        <a class="nav-link menuTexto activo" aria-current="page" href='{{route('peliculas.index')}}' style="text-decoration: none;"> <b>Películas</b> </a>
                    </li>
                    <li class="nav-item" style= "padding-right: 10px;">
                        <a class="nav-link menuTexto"  href='{{route('funciones.index')}}' style="text-decoration: none;"> <b>Funciones</b> </a>
                    </li>
                    <li class="nav-item dropdown btnFondo" style= "padding-right: 10px;">
                        <a class="nav-link dropdown-toggle menuTexto" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="/assets/avatar.png" alt="Logo" width="24" height="24" class="d-inline-block align-text-top">
                            <b>César</b> 
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href='{{route('usuarios.create')}}' >Crear usuario</a></li>
                            <li><a class="dropdown-item" href='{{route('usuarios.edit', 1)}}' >Editar usuario</a></li>
                            <li><a class="dropdown-item" href='{{route('inicio')}}'>Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- {{-- Contenido --}} -->
    <div class="contenidoForm" style="padding: 1%;">


        <h1 class="textoo" >Géneros disponibles</h1>

        <br>
        

        @if(Session::has('exito'))
            <h5> <b> {{Session::get('exito')}} </b> </h5>
        @endif

        <br>

        <div class="row row-cols-1 row-cols-md-6" >
            @foreach($generos as $genero)
            @if ($genero->activo == 1)
                <div class="col">
                    <button class="form-control mb-4 BtnGeneros" type="" placeholder="" > <a href="{{route('generos.edit', $genero->id)}}" style="text-decoration: none; color: #fff; "> {{$genero->nombre}} </a> </button>
                </div>
            @endif
            @endforeach
     
        </div>

        <br>

        <h2 class="textoo" >Agregar género</h2> 
        <div class="line-3"></div>

        <form action="{{route('generos.store')}}" method="POST">
        @csrf
            <div class="col" style="display: flex; align-items: center;"> 
                <input class="form-control btnFondoColor mb-3" type="text" name="nombre"  placeholder="Nombre del género..." style="width: 30%; margin-right: 1%;">
                <button type="submit" class="btn boton2"  style="width: 15%; ">Agregar</button>
            </div>
        </form>

    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


</body>
</html>