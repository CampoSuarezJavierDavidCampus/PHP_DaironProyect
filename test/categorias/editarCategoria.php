<?php

  


   require_once("configCategory.php");
   $data = new Category();

    $id = $_GET['categoria_id']; //usamos array asociativo para los get
    $data->setId($id);

    $record = $data->selectOne();//guarda lo que el metedo selectOne() me retorna
  

    $val = $record[0]; //capturamos al array
    

    if(isset($_POST['editar'])){//si via post name=editar linea 101


        $data-> setNombre($_POST['nombre']);
        $data-> setDescripcion($_POST['descripcion']);
        $data-> setImagen($_POST['imagen']);
        

        //INVOCAR MÉTODO
        $data->update();
        echo "<script> alert ('DATOS ACTUALIZADOS EXITOSAMENTE');document.location='categoria.php'</script>";
    }   
    
?>
<!DOCTYPE html>
<html>
  
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualizar categoria</title>
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
          <h3 style="margin-bottom: 2rem;"><pre>C A T E G O R I A S</pre></h3>
          <img src="../css/carrito-de-compras.png" alt="categorias" class="imagenPerfil">
        
        </div>
        <div class="menus">
          
          <a href="../home/home.php" style="display: flex;gap:2px;">
              <i class="bi bi-house-door"> </i>
              <h3 style="margin: 0px;">Home</h3>
            </a>
            <a href="../categorias/categoria.php" style="display: flex;gap:1px;">
              <i class="bi bi-people"></i>
              <h3 style="margin: 0px;font-weight: 800;">Categorías</h3>
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
          <h2 class="m-2">Modificar Categoria</h2>
        <div class="menuTabla contenedor2">
        <form class="col d-flex flex-wrap" action=""  method="post">
                <div class="mb-1 col-12">
                  <label for="nombre" class="form-label">Nombre</label>
                  <input 
                    type="text"
                    id="nombre"
                    name="nombre"
                    class="form-control" 
                    value ="<?php echo $val['nombre'];?>" 
                  
                  />
                </div>

                <div class="mb-1 col-12">
                  <label for="descripcion" class="form-label">Descripción</label>
                  <input 
                    type="text"
                    id="descripcion"
                    name="descripcion"
                    class="form-control"  
                    value ="<?php echo $val['descripcion'];?>" 
                  
                  />
                </div>

                <div class="mb-1 col-12">
                  <label for="imagen" class="form-label">Imagen</label>
                  <input 
                    type="text"
                    id="imagen"
                    name="imagen"
                    class="form-control"  
                    value ="<?php echo $val['imagen'];?>" 
                    
                  />
                </div>

                

                <div class=" col-12 m-2">
                  <input type="submit" class="btn btn-primary" value="UPDATE" name="editar"/>
                </div>
              </form>  
          <div id="charts1" class="charts"> </div>
        </div>
      </div>

      </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"></script>




  </body>

</html>