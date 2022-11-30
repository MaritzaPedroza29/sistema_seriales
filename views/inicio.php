<?php
require_once ("../funciones.php");
//require_once ("../model/class.php");
require_once ("../conexion.php");
//$orden=new Orden ();
$consulta="SELECT `nombre_provedor`, `fecha`, `numero_orden` FROM `orden_compra`";
//$mysqli = new mysqli("localhost", "root", "", "sistema");
            $resul=mysqli_query($mysqli, $consulta);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inicio</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Custom styles for this template-->
    <link href="css/style.css" rel="stylesheet">

</head>
<?php
//$row=$orden->seleccionar()
while($row=$resul->fetch_array()){
?>
    <body>
    <div class="row">
      <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
      </div>
                        <div class="card-body">
                            <div class="table-responsive">
                              <div class="container">
                                 <div class="row align-items-start">
                                        <h6><strong>Nombre:</strong><br><a href="../views/productos.php" style="color:#000000"><?php echo $row['nombre_provedor'];?></a></h6>
                                        <h6><strong>Fecha:</strong><br><?php echo $row ['fecha'];?></h6>
                                        <h6><strong>Número de orden:</strong><br><?php echo $row ['numero_orden'];?></h6>
                                    </div>
                              </div>
                            </div>
                        </div>
      </div> 
  <?php
}
  ?>
    </body>
</html>