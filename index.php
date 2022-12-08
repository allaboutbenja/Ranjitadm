<!DOCTYPE html>
<html lang="es">

<head>
    <?php include './components/head.php' ?>
    <link rel="stylesheet" href="./styles/main.css">
    <title>Rajit</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <meta name="viewport" content="width=device-width, inicial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>

<body>
    <?php include './components/header.php' ?>

    <div class="container container-main mt-5">
        <div class="row">
            <div class="caja1 col-md-6">
                <h3 class="tabla1">Configuracion general</h3>

                <div class="row">
                    <div class="col-md-6">
                        <label>Banner</label>
                        <input type="text" class="form-control" name="txtBanner" required>
                    </div>

                    <div class="col-md-6">
                        <label>Whatsapp</label>
                        <input type="text" class="form-control" name="txtWhatsapp" required>
                    </div>

                    <div class="col-md-6 mt-3">
                        <label>Instagram</label>
                        <input type="text" class="form-control" name="txtInstagram" required>
                    </div>

                    <div class="col-md-6 mt-3">
                        <label>Facebook</label>
                        <input type="text" class="form-control" name="txtFacebook" required>
                    </div>

                    <div class="botonConfiguracion col-md-12">
                        <input type="submit" class="btn btn-info" value="Guardar">
                    </div>
                </div>
            </div>

            <div class="caja2 col-md-6">
                <h3 class="tabla2">Reportes</h3>
                <div class="marco container">
                    <div class="jumbotron">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="caja panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-sm-4 text-center">
                                                <img class="iconos" src="./imagen/icono_precio.png">
                                            </div>
                                            <div class="col-sm-8 text-right">
                                                <h4>Total Producto<br> 10</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="caja panel panel-danger">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-sm-4 text-center">
                                                <img class="iconos" src="./imagen/icono_producto.png">
                                            </div>
                                            <div class="col-sm-8 text-right">
                                                <h4 class="stock">Stock bajo<br> 50</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="caja panel panel-success">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-sm-4 text-center">
                                                <img class="iconos" src="./imagen/icono_precio_bajo.png">
                                            </div>
                                            <div class="col-sm-8 text-right">
                                                <h4>Precio de Venta<br> 5</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


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
                                    <tr>

                                        <td>Leche Soya 1L - LoncoLeche</td>
                                        <td>1</td>
                                        <td>Imagen</td>
                                        <td>LONCO LECHE</td>
                                        <td>Leche</td>
                                        <td>990</td>
                                        <td>
                                            <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                        </td>
                                    </tr>
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
                        <form>
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
                                    <input type="email" class="form-control" name="txtStock" required>
                                </div>
                                <div class="form-group">
                                    <label>Imagen</label>
                                    <input class="form-control" type="file" id="formFileMultiple" name="txtImagen" required>
                                </div>
                                <div class="form-group">
                                    <label>Marca</label>
                                    <input type="text" class="form-control" name="txtMarca" required>
                                </div>
                                <div class="form-group">
                                    <label>Categoria</label>
                                    <input type="text" class="form-control" name="txtCategoria" required>
                                </div>
                                <div class="form-group">
                                    <label>Precio</label>
                                    <input type="text" class="form-control" name="txtPrecio" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                                <input type="submit" class="btn btn-success" value="Agregar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Edit Modal HTML -->
            <div id="editEmployeeModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form>
                            <div class="modal-header">
                                <h4 class="modal-title">Editar Producto</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input type="text" class="form-control" name="txtTitulo" required>
                                </div>
                                <div class="form-group">
                                    <label>Stock</label>
                                    <input type="email" class="form-control" name="txtStock" required>
                                </div>
                                <div class="form-group">
                                    <label>Imagen</label>
                                    <input class="form-control" type="file" id="formFileMultiple" name="txtImagen" required>
                                </div>
                                <div class="form-group">
                                    <label>Marca</label>
                                    <input type="text" class="form-control" name="txtMarca" required>
                                </div>
                                <div class="form-group">
                                    <label>Categoria</label>
                                    <input type="text" class="form-control" name="txtCategoria" required>
                                </div>
                                <div class="form-group">
                                    <label>Precio</label>
                                    <input type="text" class="form-control" name="txtPrecio" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                                <input type="submit" class="btn btn-info" value="Editar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Delete Modal HTML -->
            <div id="deleteEmployeeModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form>
                            <div class="modal-header">
                                <h4 class="modal-title">Eliminar Producto</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <p>¿Está seguro de que desea eliminar el producto?</p>
                                <p class="text-warning"><small>Esta acción no se puede deshacer.</small></p>
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                                <input type="submit" class="btn btn-danger" value="Eliminar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
</body>

</html>