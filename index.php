<?php
    require './database/DatabaseMYSQL.php';
    require './models/Product.php';
    require './models/Category.php';
    require './models/Brand.php';
    require './models/Settings.php';
    session_start();
    if($_SESSION['admin'] == null) header("location:  ./login.php");

    if(isset($_GET['logout'])){
        session_unset();
        session_destroy();
        header("location:  ./login.php?logout"); 
    }

    $db = new DatabaseMYSQL();
    $products = array();
    $categories = array();
    $brands = array();
    $settings;
    $db->connect();

    $sql = "SELECT * FROM products";
    $resp = $db->query($sql);
    while($rs = mysqli_fetch_array($resp)){
        $products[] = new Product($rs[0],$rs[1],$rs[2],$rs[3],$rs[4],$rs[5],$rs[6],$rs[7]);
    }

    $sql = "SELECT * FROM categories";
    $resp = $db->query($sql);
    while($rs = mysqli_fetch_array($resp)){
        $categories[] = new Category($rs[0],$rs[1]);
    }

    $sql = "SELECT * FROM brands";
    $resp = $db->query($sql);
    while($rs = mysqli_fetch_array($resp)){
        $brands[] = new Brand($rs[0],$rs[1]);
    }

    $sql = "SELECT * FROM configurations";
    $resp = $db->query($sql);
    
    while($rs = mysqli_fetch_array($resp)){
        $settings = new Settings($rs[0],$rs[1],$rs[2],$rs[3],$rs[4],$rs[5]);
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include './components/head.php' ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rajit</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./styles/main.css">

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="logo navbar-brand" href="#"><img height="50" src="./imagen/logo de ranjit.jpg" alt=""></a>
            <a class="usuario dropdown-item" href="index.php?logout">Administrador</a>
        </nav>
    </header>
    <div class="container container-main mt-5">
        <div class="row">
            
            <div class="caja1 col-md-6">
                <h3 class="tabla1">Configuracion general</h3>
                <?php 
                    if(isset($_GET['saveSettings'])){
                        $sql = "DELETE FROM `configurations`";
                        $resp = $db->query($sql);

                        $sql = "INSERT INTO `configurations`
                        (`banner`, `whatsapp`, `ig`, `facebook`) VALUES 
                        ('".$_GET['txtBanner']."','".$_GET['txtWhatsapp']."',
                        '".$_GET['txtInstagram']."','".$_GET['txtFacebook']."')";
                        $resp = $db->query($sql);

                        $sql = "SELECT * FROM configurations";
                        $resp = $db->query($sql);
                        
                        while($rs = mysqli_fetch_array($resp)){
                            $settings = new Settings($rs[0],$rs[1],$rs[2],$rs[3],$rs[4],$rs[5]);
                        }
                    }
                ?>
                    <form method="GET" action="./index.php" class="row">
                    <div class="col-md-6">
                        <label>Banner</label>
                        <input type="text" class="form-control" name="txtBanner" value="<?php if($settings) echo $settings->getBanner();  else echo '';  ?>" required>
                    </div>

                    <div class="col-md-6">
                        <label>Whatsapp</label>
                        <input type="text" class="form-control" name="txtWhatsapp" value="<?php if($settings) echo $settings->getWhatsapp();  else echo '';  ?>" required>
                    </div>

                    <div class="col-md-6 mt-3">
                        <label>Instagram</label>
                        <input type="text" class="form-control" name="txtInstagram" value="<?php if($settings) echo $settings->getInstagram();  else echo '';  ?>" required>
                    </div>

                    <div class="col-md-6 mt-3">
                        <label>Facebook</label>
                        <input type="text" class="form-control" name="txtFacebook" value="<?php if($settings) echo $settings->getFacebook();  else echo '';  ?>" required>
                    </div>

                    <div class="botonConfiguracion col-md-12">
                        <input type="submit" class="btn btn-info" value="Guardar" name="saveSettings">
                    </div>
                </form>

            </div>

            <div class="caja2 col-md-6">
                <h3 class="tabla2">Reportes</h3>
                <div class="marco container">
                    <div class="jumbotron">
                        <div class="row">
                            <div class="col-sm-4 reportBox bg-blue">
                                <div class="caja panel">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <!-- <div class="col-sm-4 text-center"> -->
                                                <!-- <img class="iconos" src="./imagen/icono_precio.png"> -->
                                            <!-- </div> -->
                                            <div class="col-12 mx-2 text-center">
                                                <?php 
                                                    $sql = "SELECT SUM(stock) FROM products";
                                                    $resp = $db->query($sql);
                                                    if($rs = mysqli_fetch_array($resp)){
                                                        echo "<h4>Total Productos<br> ".$rs[0]."</h4>";
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 reportBox bg-red">
                                <div class="caja panel">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <!-- <div class="col-sm-4 text-center"> -->
                                                <!-- <img class="iconos" src="./imagen/icono_producto.png"> -->
                                            <!-- </div> -->
                                            <div class="col-12 mx-2 text-center">
                                            <?php 
                                                    $sql1 = "SELECT  MIN(stock) FROM products;";
                                                    $resp1 = $db->query($sql1);
                                                    if($rs1 = mysqli_fetch_array($resp1)){
                                                        $sql2 = "SELECT  title FROM products WHERE `stock`= $rs1[0];";
                                                        $resp2 = $db->query($sql2);
                                                        if($rs2 = mysqli_fetch_array($resp2)){
                                                            echo '<h4 class="stock">'.$rs2[0].'<br>'.$rs1[0].'</h4>';
                                                        }
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 reportBox bg-green">
                                <div class="caja panel">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <!-- <div class="col-sm-4 text-center"> -->
                                                <!-- <img class="iconos" src="./imagen/icono_precio_bajo.png"> -->
                                            <!-- </div> -->
                                            <div class="col-12 mx-2 text-center">
                                                <?php 
                                                    $sql = "SELECT AVG(price) FROM products;";
                                                    $resp = $db->query($sql);
                                                    if($rs = mysqli_fetch_array($resp)){
                                                        echo '<h4>Promedio precios<br>$'.floor($rs[0]).'</h4>';
                                                    }
                                                ?>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
                if(isset($_GET['productToDelete'])){
                    $sql = "DELETE FROM `products` WHERE `id` = '".$_GET['productToDelete']."' ";
                    $resp = $db->query($sql);
                    echo "<script>location.href = 'index.php'</script>";
                }
            ?>

            <div class="col-md-12">
                <div class="container-xl">
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h2>Tabla de <b>productos</b></h2>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar Producto</span></a>
                                    </div>
                                </div>
                            </div>

                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>

                                        <th>Titulo</th>
                                        <th>Stock</th>
                                        <th>Imagen</th>
                                        <th>Marca</th>
                                        <th>Categoria</th>
                                        <th>Precio</th>
                                        <th>Accion</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($products as $product) { ?>
                                        <tr>
                                            <td><?= $product->getTitle() ?></td>
                                            <td><?= $product->getStock() ?></td>
                                            <td>
                                                <img width="100px" height="100px" src='data:image/gif;base64,<?=$product->getImage()?>' alt='Producto'>
                                            </td>
                                            <td>
                                                <?php 
                                                    foreach($brands as $brand) 
                                                        if($product->getBrand() == $brand->getId()) 
                                                            echo $brand->getName()
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    foreach($categories as $category) 
                                                        if($product->getCategory() == $category->getId()) 
                                                            echo $category->getName()
                                                ?>
                                            </td>
                                            <td><?= $product->getPrice() ?></td>
                                            <td>
                                                <a href="#editEmployeeModal<?= $product->getId() ?>" class="edit" data-toggle="modal">
                                                    <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                                                </a>
                                                <a href="./index.php?productToDelete=<?=$product->getId()?>" class="delete">
                                                    <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

                 
            <!-- Edit Modal HTML -->
            <div id="addEmployeeModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <?php 
                        if(isset($_POST['createProduct'])){
                            $image = base64_encode(file_get_contents($_FILES["txtImagen"]['tmp_name']));
                            $sql = "INSERT INTO `products`
                            (`title`, `stock`, `image`,  `brand`, `category`, `price`) VALUES 
                            ('".$_POST['txtTitulo']."','".$_POST['txtStock']."','".$image."',
                            '".$_POST['txtMarca']."','".$_POST['txtCategoria']."','".$_POST['txtPrecio']."')";
                            $resp = $db->query($sql);

                            echo "<script>location.href = 'index.php'</script>";
                        }
                    ?> 
                        <form method="POST" action="./index.php" enctype='multipart/form-data'>
                            <div class="modal-header">
                                <h4 class="modal-title">Agregar Producto</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input type="text" class="form-control" name="txtTitulo" required>
                                </div>
                                <div class="form-group">
                                    <label>Stock</label>
                                    <input type="text" class="form-control" name="txtStock" required>
                                </div>
                                <div class="form-group">
                                    <label>Imagen</label>
                                    <input class="form-control" type="file" id="formFileMultiple" name="txtImagen" required>
                                </div>
                                <div class="form-group">
                                    <label>Marca</label>
                                    <select name="txtMarca" class="form-select" aria-label="Select Marca">
                                        <?php foreach($brands as $brand) {?>
                                        <option value="<?= $brand->getId(); ?>"><?= $brand->getName(); ?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Categoria</label>
                                    <select name="txtCategoria" class="form-select" aria-label="Select Marca">
                                        <?php foreach($categories as $category) {?>
                                        <option value="<?= $category->getId(); ?>"><?= $category->getName(); ?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Precio</label>
                                    <input type="text" class="form-control" name="txtPrecio" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                                <input type="submit" class="btn btn-success" name="createProduct" value="Agregar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php 
                if(isset($_POST['editProduct'])){
                    if($_FILES["txtImagen"]['tmp_name'] != null){
                        $image = base64_encode(file_get_contents($_FILES["txtImagen"]['tmp_name']));
                        $sql = "UPDATE `products` SET 
                        `title`='".$_POST['txtTitulo']."',
                        `description`='descripcion',
                        `stock`='".$_POST['txtStock']."',
                        `image`='".$image."',
                        `brand`='".$_POST['txtMarca']."',
                        `category`='".$_POST['txtCategoria']."',
                        `price`='".$_POST['txtPrecio']."' 
                        WHERE `id`= '".$_POST['txtId']."'";
                    }else{
                        $sql = "UPDATE `products` SET 
                        `title`='".$_POST['txtTitulo']."',
                        `description`='descripcion',
                        `stock`='".$_POST['txtStock']."',
                        `brand`='".$_POST['txtMarca']."',
                        `category`='".$_POST['txtCategoria']."',
                        `price`='".$_POST['txtPrecio']."' 
                        WHERE `id`= '".$_POST['txtId']."'";
                    }
                    $resp = $db->query($sql);
                    echo "<script>location.href = 'index.php'</script>";
                }
            ?> 
            <!-- Edit Modal HTML -->
            <?php foreach($products as $product) {?>
            <div id="editEmployeeModal<?= $product->getId()?>" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="./index.php" enctype='multipart/form-data'>
                            <div class="modal-header">
                                <h4 class="modal-title">Editar Producto</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="txtId" value="<?= $product->getId()?>">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input type="text" class="form-control" name="txtTitulo" value="<?= $product->getTitle()?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Stock</label>
                                    <input type="text" class="form-control" name="txtStock" value="<?= $product->getStock()?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Imagen</label>
                                    <input class="form-control" type="file" id="formFileMultiple" name="txtImagen">
                                </div>
                                <div class="form-group">
                                    <label>Marca</label>
                                    <select name="txtMarca" class="form-select" aria-label="Select Marca">
                                        <?php foreach($brands as $brand) {?>
                                        <option 
                                            value="<?= $brand->getId()?>" 
                                            <?php if($brand->getId() == $product->getBrand()) echo 'selected' ?> 
                                            >
                                             <?= $brand->getName(); ?>
                                            </option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Categoria</label>
                                    <select name="txtCategoria" class="form-select" aria-label="Select Marca">
                                        <?php foreach($categories as $category) {?>
                                        <option 
                                            value="<?= $category->getId(); ?>" 
                                            <?php if($category->getId() == $product->getCategory()) echo 'selected' ?>
                                            >
                                            <?= $category->getName(); ?>
                                        </option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Precio</label>
                                    <input type="text" class="form-control" name="txtPrecio" value="<?= $product->getPrice()?>" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                                <input type="submit" class="btn btn-info" name="editProduct" value="Editar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php }?>
</body>

</html>
<?php 
    $db->disconnect();
?>