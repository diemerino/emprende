<?php
      include('conexion.php');
      session_start(); 

      $consulta = "SELECT latitud, longitud, nombreciudad from ciudad WHERE idciudad = 81";
      $resultado = $conexion -> query($consulta);
      
      while($result=mysqli_fetch_array($resultado)){
          $latitud= $result["latitud"];                    
          $longitud= $result["longitud"];
          $ciudad = $result["nombreciudad"];
      }

      $consulta = "SELECT idcategoria, nombrecategoria from categoria ";
      $resultado = $conexion -> query($consulta);
      while($result=mysqli_fetch_array($resultado)){
        $idcategoria[]= $result["idcategoria"];                    
        $nombrecategoria[]= $result["nombrecategoria"];
      }

      if(!isset($_SESSION['email'])){
        //header('Location: login.php');
        $inicio= "no";
	    }else{
        $usuario = $_SESSION['email'];
        $inicio ="si";
      } 


  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>

    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDu7OySjdMI03V2hgmYOjm_80wTHNuUqOE&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
     
    <script src="js/jquery.js"></script>
    <!-- <script src="js/main.js"></script> -->
    <script src="http://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="js/jquery.gmaps.js"></script>


    <!-- <script src="js/filtro.js"></script> -->
    <script src="js/localizacion.js"></script>
    <link href="js/jquery.gmaps.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
      <!-- Font Awesome CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">

    



</head>
<body>
<header>
<header>
        <nav id="nav" class="nav1">
            <div class="contenedor-nav">
                <div class="logo">
                <a href="index.php"><img src="img/FINDYOU.png" style="transform:scale(0.6);" alt=""></a>
                </div>
                <div class="enlaces" id="enlaces">
                    <a href="index.php" id="enlace-inicio" class="btn-header">Inicio</a>
                                      
                    <?php if($inicio =='no'){?>
                      <a href="login.php" id="enlace-login" class="btn-header">Iniciar Sesión</a>
                    <?php } else{
                        echo '|';
                        // echo 'Hola '.$nombre;
                        ?>
                    <a href="mispublicaciones.php" id="enlace-catalogo" class="btn-header">Mis publicaciones</a>
                    <a href="perfil.php" id="enlace-catalogo" class="btn-header">Mi perfil</a>      
                    <a href="cerrarsesion.php" id="enlace-catalogo" class="btn-header">Cerrar Sesión</a>
                    <?php }?>


                </div>
                <div class="icono" id="open">
                    <span>&#9776;</span>
                </div>
            </div>
        </nav>        
    </header>
</header>
<main>
  <div class="sectionmapa" id="sectionmapa">
                      
        <!-- Categorias de productos -->
        <div id="list-example" class="list-group" style="position:top">
          <h1 style="color:white">Categorias</h1>


          <a class="list-group-item list-group-item-action active" href="#list-item-0">Todos
            <?php 
              for ($i=0; $i<sizeof($nombrecategoria); $i++){
            ?>
                <a class="list-group-item list-group-item-action" href="#list-item-<?php echo $idcategoria[$i] ?>"><?php echo $nombrecategoria[$i];?></a>
            <?php } ?>

            <script>
              $('.list-group-item').on('click', function (e) {
                        console.log('wenas');
                        e.preventDefault()
                        $(this).addClass('active').siblings().removeClass('active');
                      })
            </script>

        </div>
      <div id="mapa" class="mapa">
  
        <iframe id="mapa" class="mapa" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d12777.876655723716!2d<?php echo $latitud;?>!3d<?php echo $longitud;?>!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2scl!4v1596088006295!5m2!1ses!2scl"  frameborder="0" style="border:1;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      </div>
  </div>


          <?php 
          
          $consulta = "SELECT P.idproducto, P.nombreproducto, P.precioproducto, P.rutaimagen, U.nombres, C.nombrecategoria
            from categoria C, producto P, usuario U WHERE P.idusuario=1";
          $resultado = $conexion -> query($consulta);
          while($result=mysqli_fetch_array($resultado)){
            $nombreproducto[]= $result["nombreproducto"];
            $precio[]=$result["precioproducto"];
            $vendedor[] = $result["nombres"];
            $rutaimagen[]=$result["rutaimagen"];                    
            $nombrecategoria[]= $result["nombrecategoria"]; 
          }
          ?>
        <section class="team contenedor" >

        <h3>Destacados</h3>
            <p class="after">Estas productos son destacados en </p>
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="img/papasfritas.jpg" alt="First slide"style="max-height:300px; object-fit: cover;">
              <div class="carousel-caption d-none d-md-block">
                <h5><?php echo $nombreproducto[0].'/ $'.$precio[0]?></h5>
                <p><?php echo $nombrecategoria[0]?></p>
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="img/papasfritas.jpg" alt="Second slide"style="max-height:300px; object-fit: cover;">
              <div class="carousel-caption d-none d-md-block" >
                <h5><?php echo $nombreproducto[0].'/ $'.$precio[0]?></h5>
                <p><?php echo $nombrecategoria[0]?></p>
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100"  src="img/papasfritas.jpg" alt="Third slide" style="max-height:300px; object-fit: cover;">
              <div class="carousel-caption d-none d-md-block">
                <h5><?php echo $nombreproducto[0].'/ $'.$precio[0]?></h5>
                <p><?php echo $nombrecategoria[0]?></p>
              </div>
            </div>
          </div>

          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
             
        </section>



  </main>


  <script>
    "use strict";
    var marker; 
    function initMap() {
        const myLatLng = {
            lat: -36.822827856293166,
            lng: -73.01187817007303
        };
        
        const map = new google.maps.Map(document.getElementById("mapa"), {
          zoom: 15,
          center: myLatLng,
         
        }); 

        marker = new google.maps.Marker({
                position: myLatLng,
                map,
            });    

        }
        
  </script>




    
</body>
</html>