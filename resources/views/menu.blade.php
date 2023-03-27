<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/menu.css" media="screen" /> 

    {{-- Importados --}}
        
    {{-- <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css"> --}}

    <link rel="stylesheet" href="\css\Carrusel\templatemo-hexashop.css"> 

    <link rel="stylesheet" href="\css\Carrusel\owl-carousel.css">

    <link rel="stylesheet" href="\css\Carrusel\lightbox.css">

    <title>Peliculas</title>
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
                            <li><a class="dropdown-item" href='{{route('inicio')}}' >Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class = "container-fluid contenido " >
        @if(Session::has('exito'))
            <h5> <b> {{Session::get('exito')}} </b> </h5>
        @endif
        <div class="row"> 
            <div class="col"> 
                <h1> Peliculas </h1>
            </div>
            <div class="col" style="display: flex; align-items: center; justify-content: right;"> 
                <a style="padding-right: 10px; text-decoration: none; color: #0a0b18; " href='{{route('generos.index')}}'> <u>Agregar género</u> </a>
                <input type="" class="form-control"  placeholder="Buscar..." style="width: 50%; ">
                <h2 style="padding-left: 10px;"> <a href='{{route('peliculas.create')}}' style="text-decoration: none; color: #0a0b18; "> + </a> </h2>
            </div>

        </div>
        
        
        
        @foreach ($generos as $genero)
            @if ($genero->activo == 1)
                <h2> {{$genero->nombre}} </h2>
                <div class="line-1"></div>

                <div class="row row-cols-1 row-cols-md-6 " >
                    @foreach ($peliculas as $pelicula)
                        @foreach ($generosPelicula as $generoPelicula)
                            
                                @if ($generoPelicula->id_genero == $genero->id && $generoPelicula->id_pelicula == $pelicula->id)
                                    @if ($pelicula->activo == 1)
                                        <div class="col">
                                            <div class="card h-100">
                                            <a href='{{route('peliculas.pelicula', $pelicula->id)}}'> <img src="/storage/posters/{{$pelicula->poster}}" class="card-img-top fotoPelicula" alt="..."> </a>

                                            </div>
                                        </div>
                                    @endif
                                @endif
                        
                        @endforeach
                        
                    @endforeach
                </div>
             @endif
        @endforeach        
        

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


</body>
</html>