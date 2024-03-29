<?php
require_once("configEmpleado.php");
$data = new Empleado();

 $allEmpleado = $data-> obtenerEmpleado();


?>




<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página </title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


  <link rel="stylesheet" type="text/css" href="../css/supermarket.css">

</head>

<body>
  <div class="contenedor">

    <div class="parte-izquierda">

      <div class="perfil">
        <h3 style="margin-bottom: 2rem;">TIENDA VIRTUAL</h3>
        <img src="../css/marca.png" alt="" class="imagenPerfil">
      </div>
      <div class="menus">
        <a href="/Home/home.php" style="display: flex;gap:2px;">
          <i class="bi bi-house-door"> </i>
          <h3 style="margin: 0px;">Home</h3>
        </a>
        <a href="../categorias/categoria.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Categorias</h3>
        </a>
        <a href="../Clientes/cliente.php" style="display: flex;gap:1px;">
            <i class="bi bi-people"></i>
            <h3 style="margin: 0px;font-weight: 800;">Clientes</h3>
          </a>
          <a href="../Empleados/empleado.php" style="display: flex;gap:1px;">
            <i class="bi bi-people"></i>
            <h3 style="margin: 0px;font-weight: 800;">Empleados</h3>
          </a>
          <a href="../proveedores/proveedores.php" style="display: flex;gap:1px;">
            <i class="bi bi-people"></i>
            <h3 style="margin: 0px;font-weight: 800;">Proveedores</h3>
          </a>
          <a href="../productos/productos.php" style="display: flex;gap:1px;">
            <i class="bi bi-people"></i>
            <h3 style="margin: 0px;font-weight: 800;">Productos</h3>
          </a>
          <a href="../facturas/facturas.php" style="display: flex;gap:1px;">
            <i class="bi bi-people"></i>
            <h3 style="margin: 0px;font-weight: 800;">Facturas</h3>
          </a>
          <a href="../detailFactura/detailFactura.php" style="display: flex;gap:1px;">
            <i class="bi bi-people"></i>
            <h3 style="margin: 0px;font-weight: 800;">Factura Detalle</h3>
          </a>


      </div>
    </div>

    <div class="parte-media">
      <div style="display: flex; justify-content: space-between;">
        <h2>EMPLEADOS</h2>
        <button class="btn-m" data-bs-toggle="modal" data-bs-target="#registrarEmpleado"><i class="bi bi-person-add " style="color: rgb(255, 255, 255);" ></i></button>
      </div>
      <div class="menuTabla contenedor2">
        <table class="table table-custom ">
          <thead>
            <tr>
              <th scope="col">ID </th>
              <th scope="col">NOMBRE</th>
              <th scope="col">CELULAR</th>
              <th scope="col">DIRECCIÓN</th>
              <th scope="col">FOTOGRAFÍA</th>
              <th scope="col">ELIMINAR</th>
              <th scope="col">ACTUALIZAR</th>
            </tr>
          </thead>
          <tbody class="" id="tabla">

            <!-- ///////Llenado DInamico desde la Base de Datos -->
            <?php
            foreach ($allEmpleado as $key => $val) {
            ?>
            <tr>
              <td> <?php echo $val['empleado_id']?></td>
              <td> <?php echo $val['nombre_empleado']?></td>
              <td> <?php echo $val['celular_empleado']?></td>
              <td> <?php echo $val['direccion_empleado']?></td>
              <td><img src="<?php echo $val['imagen_empleado']?>" alt="..." width="80px" ></td>
              <td> <a  class="btn btn-danger" href="borrarEmpleado.php?empleado_id=<?= $val['empleado_id']?>&&req=delete">BORRAR </a></td>
              <td> <a  class="btn btn-primary" href="editarEmpleado.php?empleado_id=<?=$val['empleado_id']?>">MODIFICAR </a></td>
           
             
            </tr>

          </tbody>
        <?php
        }    
        ?>
        </table>

      </div>


    </div>





    <!-- /////////Modal de registro de nuevo estuiante //////////-->
    <div class="modal fade" id="registrarEmpleado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="backdrop-filter: blur(5px)">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
        <div class="modal-content" >
          <div class="modal-header" >
            <h1 class="modal-title fs-5" id="exampleModalLabel">Empleados</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="background-color: rgb(231, 253, 246);">
            <form class="col d-flex flex-wrap" action="registrarEmpleado.php" method="post">

              <div class="mb-1 col-12">
                <label for="nombre" class="form-label">NOMBRE</label>
                <input 
                  type="text"
                  id="nombre"
                  name="nombre"
                  class="form-control"  
                />
              </div>

              <div class="mb-1 col-12">
                <label for="celular" class="form-label">CELULAR</label>
                <input 
                  type="text"
                  id="celular"
                  name="celular"
                  class="form-control"  
                />
              </div>

              <div class="mb-1 col-12">
                <label for="direccion" class="form-label">DIRECCIÓN</label>
                <input 
                  type="text"
                  id="direccion"
                  name="direccion"
                  class="form-control"  
                />
              </div>

              <div class="mb-1 col-12">
                <label for="fotografia" class="form-label">FOTOGRAFÍA</label>
                <input 
                  type="text"
                  id="fotografia"
                  name="fotografia"
                  class="form-control"  
                />
              </div>



              <div class=" col-12 m-2">
                <input type="submit" class="btn btn-primary" value="ADD CLIENTE" name="guardarEmpleado"/>
              </div>
            </form>  
         </div>       
        </div>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"></script>


</body>

</html>