<?php
      include('conexion.php');
      session_start(); 

      $consulta = "SELECT latitud, longitud, nombreciudad from ciudad WHERE idciudad = 81";
      $resultado = $conexion -> query($consulta);
      $latitud;
      $longitud;
      $ciudad;
      while($producto2=mysqli_fetch_array($resultado)){
          $latitud= $producto2["latitud"];                    
          $longitud= $producto2["longitud"];
          $ciudad = $producto2["nombreciudad"];
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
    <title>Documento</title>

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
      <!-- Font Awesome CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">

    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDu7OySjdMI03V2hgmYOjm_80wTHNuUqOE&callback=initMap&libraries=&v=weekly"
      defer
    ></script>



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

    <!-- BUSCADOR DE LISTA -->
        <div id="list-example" class="list-group">
      <a class="list-group-item list-group-item-action" href="#list-item-1"><?php echo $ciudad?></a>
      <a class="list-group-item list-group-item-action" href="#list-item-2">Item2</a>
      <a class="list-group-item list-group-item-action" href="#list-item-3">Item 3</a>
      <a class="list-group-item list-group-item-action" href="#list-item-4">Item 4</a>
    </div>
    <script>
        $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myList li").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        });
    </script> 
  
    <iframe id="map" class="map" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d12777.876655723716!2d<?php echo $latitud;?>!3d<?php echo $longitud;?>!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2scl!4v1596088006295!5m2!1ses!2scl" width="600" height="450" frameborder="0" style="border:1;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
  
  </div>
<section >
    

    

   
                
    
         

</section>
  </main>





    
</body>
</html>