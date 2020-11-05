<!DOCTYPE html>
<html lang="en">

<?php 
include('conexion.php');
session_start(); 
if(isset($_SESSION['email'])){
    header('Location: index.php');
}
$errores = '';
$enviado = '';
$rut = '';
$clave = '';
//$clave2 = '';

?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body class="hidden">
    <!--prloader-->

    <!-- <div class="centrado" id="onload">
        <div class="lds-facebook"><div></div><div></div><div></div></div>
    </div> -->
    <header>
        <nav id="nav" class="nav1">
            <div class="contenedor-nav">
                <div class="logo">
                <a href="index.php"><img src="img/FINDYOU.png" style="transform:scale(0.6);" alt=""></a>
                </div>
                <div class="enlaces" id="enlaces">
                    <a href="index.php" id="enlace-inicio" class="btn-header">Inicio</a>
                    <a href="catalogo.php" id="enlace-catalogo" class="btn-header">Catálogo</a>
                    <a href="manualdeuso.php" id="enlace-catalogo" class="btn-header">Manual de uso</a>
                    <a href="#" id="enlace-login" class="btn-header">Login</a>
                </div>
                <div class="icono" id="open">
                    <span>&#9776;</span>
                </div>
            </div>
        </nav>        
    </header>
    
    <main>
        <section class="divlogin" id="divlogin" style="" > 
		
            <h3>Inicia sesión</h3>
            <p class="after">Si no estás registrado, utiliza el botón Registrar</p>

            <div class="ingreso">

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Correo electrónico (*):</label>
                    <input type="email" name="usuario" class="form-control" id="exampleFormControlInput1" placeholder="Por ejemplo: jp1999@gmail.com">
                </div>

                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Contraseña (*):</label>
                    <input type="password" name="clave" class="form-control" id="exampleFormControlInput1" placeholder="">
                </div>
                <button type="submit" class="btn btn-block" style="background:black; color:white; margin-top:25px; font-size: 20px;"  name="submit" onclick="login.submit()" >Ingresar</button>
                <br>
                <p> <a class ="btn btn-block" style="background:black; color:white; margin-top:5px;font-size: 20px;" name="registrar" href="registrar.php">Registrarme</a></p>
                
            </form>
          
					<br/><br/>
                     
                <?php 
        
                if(isset($_POST['submit'])){
                    $usuario= $_POST['usuario'];
                    $clave = $_POST['clave'];

                    //$clave = hash('sha256',$clave);
                
                    //MUESTRA DE ERROR Y ACCESO   
                    if(empty($usuario) or empty($clave)){
                        $errores .= 'Ingrese todos los datos';
                    }else if(empty($usuario) && empty($clave)){
                        $errores .= 'Ingrese todos los datos';
                    }else {

                        $consultaclave = $conexion->query("SELECT password from usuario WHERE correo_usuario= '$usuario'");
                        $clave2 = mysqli_fetch_array($consultaclave);
                        $clave2 = $clave2[0];

                        
                        
                        if(!$clave2){
                            $errores = 'El usuario o la contraseña no está correcta';
                        }else if($clave == $clave2){
                            $_SESSION['email']= $usuario;
                            header('Location: index.php');
                        }else{
                            $errores = 'El usuario o la contraseña no está correcta';
                        }
                    }            
                }?>
                       

            

            <?php
                    //MOSTRAR ERRORES
                    if(!empty($errores)){?>
                        <div class="alert error">
                            <?php echo $errores;?>
                        </div>
                    <?php } ?>      
            
            </div>
        </section>

        
        
        




    </main>
    <footer id='footer'>
        <div class="footer contenedor">
            <div class="marca-logo">
                <img src="img/FINDYOU.png" alt="">
                <p>Gracias por visitarnos</p>
            </div>
        </div>
        
    </footer>
    

    <script src="js/jquery.js"></script>
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- <script src="js/filtro.js"></script> -->
</body>
</html>