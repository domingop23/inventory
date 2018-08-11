<?php
    // initializing and validating the session to the user
    session_start();
    if($_SESSION["connected"] == false){
        header("Location: index.php");
    }

    // including the connection of the data
    include("conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Compras</title>

    <!-- Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

    <!-- Load css bootstrap -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="css/dashboard.css">

    <!-- Load icon font-awesome -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

    <!-- Load google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Hanalei+Fill" rel="stylesheet">
    
    <!-- Load css style -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand logo" href="inventory.php">Sistema de Inventario</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class"user"><a href="logout.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i> <span><?php echo $_SESSION["name"]; ?></span> - Log Out</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- end navbar -->

    <!--container -->
    <div class="container-fluid app">
      <div class="row">
        <!-- nav-sidebar -->
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="inventory.php">Inventario</a></li>
            <li><a href="sales.php">Ventas</a></li>
            <li><a href="purchases.php">Compras</a></li>
          </ul>
        </div>
        <!-- end nav-sidebar -->

        <!-- content -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class=" text-center page-header">Ventas de Compras</h1>
          <h4 class="sub-header"><a class="pull-right" href="add_purchase.php"><i class="fa fa-plus" aria-hidden="true"> Añadir Compra</i></a></h4>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th># de Factura</th>
                  <th>Fecha</th>
                  <th>Descripción</th>
                  <th>Cantidad</th>
                  <th>Acción</th>
                </tr>
              </thead>
              <?php
                // Setting utf8 data format
                mysqli_set_charset($conexion, "utf8");

                $select = "SELECT * FROM purchases";
                $result = mysqli_query($conexion, $select);
                if(mysqli_num_rows($result) > 0){
                    while($data = mysqli_fetch_array($result)){
              ?>
              <tbody>
                <tr>
                  <td><?php echo $data["invoice_id"]; ?></td>
                  <td><?php echo $data["date"]; ?></td>
                  <td><?php echo $data["product_id"]; ?></td>
                  <td><?php echo $data["quantity"]; ?></td>
                  <td>
                    <a href="edit_purchase.php?id=<?php echo $data["invoice_id"]; ?>">Editar</a> -&nbsp;
                    <a href="delete_purchase.php?id=<?php echo $data["invoice_id"]; ?>">Borrar</a>
                  </td>
                </tr>
                <?php
                    }
                  }else{
                ?>
                <tr>
                    <td align="center" colspan="5">No hay datos disponibles en la tabla</td>
                </tr>
                <?php 
                  }
                    mysqli_close($conexion);
                ?>
              </tbody>
            </table>
          </div>
        </div>
       <!--  end content -->
      </div>
    </div>
    <!-- end container -->

    <!-- load jquery -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- load main js -->
    <script src="js/main.js"></script>
</body>
</html>