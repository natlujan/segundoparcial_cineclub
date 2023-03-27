<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/index.css" media="screen" /> 
    <title>Filmedia</title>
</head>
<body >
    <div>

        <section class= "left-form"> 
            <img  class= ""> 
        </section>

        <section class= "right-form">
            <form>
                <h1 class="mb-4 texto">Iniciar Sesión</h1>
                    <div class="mb-3">
                        <label  class="form-label texto fuenteLabel">Correo electrónico</label>
                        <input type="email" class="mb-3"  placeholder="name@example.com">

                        <label  class="form-label texto fuenteLabel">Contraseña</label>
                        <input type="email" class="form mb-3"  placeholder="">

                        <div class="text-center">
                            <button type="button" class="btn boton" style="width:50%;" href='#'> <a href='{{route('peliculas.index')}}' style="text-decoration: none; color: white;">Iniciar sesión</a></button> 
                        </div>
                        
                    </div>
            </form>
        </section>

        {{-- <div class="container" style="height: 100%;">
        <div class="row" style="height: auto;">
            <div class="col imagenFondo" >
                <img src="/assets/a.jpeg" style="width: 100%; height: 100%;"> 
            </div>
            
            <div class="col">
                <h1 class="mb-4 texto">Iniciar Sesión</h1>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label texto">Correo electrónico</label>
                    <input type="email" class="form-control mb-3" id="exampleFormControlInput1" placeholder="name@example.com">

                    <label for="exampleFormControlInput1" class="form-label texto">Contraseña</label>
                    <input type="email" class="form-control mb-3" id="exampleFormControlInput1" placeholder="">

                    <div class="text-center">
                        <button type="button" class="btn boton" style="width:50%;" >Iniciar sesión</button>
                    </div>
                    
                </div>
            </div>

        </div>
        </div> --}}
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>