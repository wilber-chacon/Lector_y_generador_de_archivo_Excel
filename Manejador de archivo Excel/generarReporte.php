<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <link href="css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <title>Productos</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link href="css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="css/forms.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/font-awesome.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Villa Despensa</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Productos </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="generarReporte.php">Generar reporte <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="importar.php">Importar datos</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container p-5 my-5 bg-light" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form1" style="margin: auto;">
            <div class="form-group">
                <label for="categoria" class="mt-4">Seleccione la categoria:</label>
                <select class="form-control" id="categoria" name="categoria">
                    <option value="">Seleccione una opcción</option>
                    <?php

                    header('Content-Type: text/html; charset=UTF-8');
                    //header('Content-Type: text/html; charset=ISO-8859-1');
                    include("./conexion.php");
                    $conexion->set_charset("utf8");
                    $sql = "SELECT DISTINCT categoria FROM productos";
                    $ejecutar = mysqli_query($conexion, $sql);
                    while ($fila = mysqli_fetch_array($ejecutar)) {

                        ?>
                        <option value="<?php echo $fila[0] ?>"><?php echo $fila[0] ?></option>

                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label class="mt-4">Seleccione el rango de existencias:</label>
                <div class="row">
                    <div class="col">
                        <label for="inicio" class="mt-4">Inicial:</label>
                        <input type="number" min="1" id="inicio" name="inicio" class="form-control">
                    </div>
                    <div class="col">
                        <label for="fin" class="mt-4">Final:</label>
                        <input type="number" id="fin" name="fin" min="1" class="form-control">
                    </div>
                </div>
            </div>
            <input type="submit" name="enviar" id="enviar" class="btn btn-success mt-4 btn-sm btn-block"
                value="Generar" />
        </form><br><br><br>

        <?php
        if (isset($_POST['enviar'])):
            $categoria = $_POST['categoria'];
            $inicio = $_POST['inicio'];
            $fin = $_POST['fin'];

            if (empty($categoria) && empty($inicio) && empty($fin)) { ?>
                <a href='reporte.php?todo="si"' class="btn btn-info"><i class="fa fa-download"
                        aria-hidden="true"></i> Descargar</a><br><br>

                <table class="table border" id="dataTable">
                    <thead>
                        <tr class="bg-info">
                            <th>Código</th>
                            <th>Detalle</th>
                            <th>Categoria</th>
                            <th>Precio unitario</th>
                            <th>Existencias</th>
                            <th>Proveedor</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        include("./conexion.php");
                        $conexion->set_charset("utf8");
                        $sql = "SELECT codigo, detalle, categoria, precioUnitario, existencias, proveedor FROM productos";
                        $ejecutar = mysqli_query($conexion, $sql);
                        while ($fila = mysqli_fetch_array($ejecutar)) {

                            ?>

                            <tr>
                                <td>
                                    <?php echo $fila[0] ?>
                                </td>
                                <td>
                                    <?php echo $fila[1] ?>
                                </td>
                                <td>
                                    <?php echo $fila[2] ?>
                                </td>
                                <td>
                                    <?php echo $fila[3] ?>
                                </td>
                                <td>
                                    <?php echo $fila[4] ?>
                                </td>
                                <td>
                                    <?php echo $fila[5] ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            <?php } elseif (!empty($categoria) && empty($inicio) && empty($fin)) { ?>

                <a href='reporte.php?categoria="<?php echo $categoria ?>"' class="btn btn-info"><i class="fa fa-download"
                        aria-hidden="true"></i> Descargar</a><br><br>

                <table class="table border" id="dataTable">
                    <thead>
                        <tr class="bg-info">
                            <th>Código</th>
                            <th>Detalle</th>
                            <th>Categoria</th>
                            <th>Precio unitario</th>
                            <th>Existencias</th>
                            <th>Proveedor</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        include("./conexion.php");
                        $conexion->set_charset("utf8");
                        $sql = "SELECT codigo, detalle, categoria, precioUnitario, existencias, proveedor FROM productos WHERE categoria = '$categoria'";
                        $ejecutar = mysqli_query($conexion, $sql);
                        while ($fila = mysqli_fetch_array($ejecutar)) {

                            ?>

                            <tr>
                                <td>
                                    <?php echo $fila[0] ?>
                                </td>
                                <td>
                                    <?php echo $fila[1] ?>
                                </td>
                                <td>
                                    <?php echo $fila[2] ?>
                                </td>
                                <td>
                                    <?php echo $fila[3] ?>
                                </td>
                                <td>
                                    <?php echo $fila[4] ?>
                                </td>
                                <td>
                                    <?php echo $fila[5] ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            <?php } elseif (empty($categoria) && !empty($inicio) && !empty($fin)) { ?>
                <a href='reporte.php?inicio="<?php echo $inicio ?>"&fin="<?php echo $fin ?>"' class="btn btn-info"><i
                        class="fa fa-download" aria-hidden="true"></i> Descargar</a><br><br>
                <table class="table border" id="dataTable">
                    <thead>
                        <tr class="bg-info">
                            <th>Código</th>
                            <th>Detalle</th>
                            <th>Categoria</th>
                            <th>Precio unitario</th>
                            <th>Existencias</th>
                            <th>Proveedor</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        include("./conexion.php");
                        $conexion->set_charset("utf8");
                        $sql = "SELECT codigo, detalle, categoria, precioUnitario, existencias, proveedor FROM productos WHERE existencias > $inicio AND existencias < $fin";
                        $ejecutar = mysqli_query($conexion, $sql);
                        while ($fila = mysqli_fetch_array($ejecutar)) {

                            ?>

                            <tr>
                                <td>
                                    <?php echo $fila[0] ?>
                                </td>
                                <td>
                                    <?php echo $fila[1] ?>
                                </td>
                                <td>
                                    <?php echo $fila[2] ?>
                                </td>
                                <td>
                                    <?php echo $fila[3] ?>
                                </td>
                                <td>
                                    <?php echo $fila[4] ?>
                                </td>
                                <td>
                                    <?php echo $fila[5] ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } elseif (!empty($categoria) && !empty($inicio) && !empty($fin)) { ?>
                <a href='reporte.php?inicio="<?php echo $inicio ?>"&fin="<?php echo $fin ?>"&categoria=<?php echo $categoria ?>'
                    class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i> Descargar</a><br><br>
                <table class="table border" id="dataTable">
                    <thead>
                        <tr class="bg-info">
                            <th>Código</th>
                            <th>Detalle</th>
                            <th>Categoria</th>
                            <th>Precio unitario</th>
                            <th>Existencias</th>
                            <th>Proveedor</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        include("./conexion.php");
                        $conexion->set_charset("utf8");
                        $sql = "SELECT codigo, detalle, categoria, precioUnitario, existencias, proveedor FROM productos WHERE existencias > $inicio AND existencias < $fin AND categoria = '$categoria'";
                        $ejecutar = mysqli_query($conexion, $sql);
                        while ($fila = mysqli_fetch_array($ejecutar)) {

                            ?>

                            <tr>
                                <td>
                                    <?php echo $fila[0] ?>
                                </td>
                                <td>
                                    <?php echo $fila[1] ?>
                                </td>
                                <td>
                                    <?php echo $fila[2] ?>
                                </td>
                                <td>
                                    <?php echo $fila[3] ?>
                                </td>
                                <td>
                                    <?php echo $fila[4] ?>
                                </td>
                                <td>
                                    <?php echo $fila[5] ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php }
        endif;
        ?>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap4.min.js"></script>
    <script src="js/datatables-demo.js"></script>
</body>

<footer class="bg-dark p-5">
    <p class="text-center text-white">Supermercado Villa Despensa © - 2024</p>
</footer>

</html>