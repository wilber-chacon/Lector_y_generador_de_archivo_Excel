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
                <li class="nav-item ">
                    <a class="nav-link" href="index.php">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="generarReporte.php">Generar reporte</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="importar.php">Importar datos<span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container p-5 my-5 bg-light" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">

        <?php
        header('Content-Type: text/html; charset=UTF-8');
        require 'vendor/autoload.php';
        require 'conexion.php';
        $mysqli->set_charset("utf8");
        use PhpOffice\PhpSpreadsheet\IOFactory;

        use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

        $caminoTemp = $_FILES['uploadedFile']['tmp_name'];
        $NombreTemp = $_FILES['uploadedFile']['name'];

        $fileNameCmps = explode(".", $NombreTemp);
        $TipoArchivo = strtolower(end($fileNameCmps));

        if (isset($_POST["uploadBtn"])) {

            if ($TipoArchivo == "xlsx") {
                echo ("<div class='alert alert-success' role='alert'> Datos importados con exito!!! </div>");

                $nombreArchivo = $caminoTemp;
                $documento = IOFactory::load($nombreArchivo);
                $totalHojas = $documento->getSheetCount();

                $hojaActual = $documento->getSheet(0);
                $numeroDeFilas = $hojaActual->getHighestDataRow();
                $letra = $hojaActual->getHighestDataColumn();

                $numeroLetra = Coordinate::columnIndexFromString($letra);

                ?>

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

                        for ($indiceFila = 2; $indiceFila <= $numeroDeFilas; $indiceFila++) {
                            $valorA = $hojaActual->getCellByColumnAndRow(1, $indiceFila);
                            $valorB = $hojaActual->getCellByColumnAndRow(2, $indiceFila);
                            $valorC = $hojaActual->getCellByColumnAndRow(3, $indiceFila);
                            $valorD = $hojaActual->getCellByColumnAndRow(4, $indiceFila);
                            $valorE = $hojaActual->getCellByColumnAndRow(5, $indiceFila);
                            $valorF = $hojaActual->getCellByColumnAndRow(6, $indiceFila);

                            $sql = "INSERT INTO productos(codigo,detalle,categoria,precioUnitario,existencias,proveedor) VALUES ('$valorA','$valorB','$valorC','$valorD','$valorE','$valorF')";
                            $mysqli->query($sql);

                            ?>
                            <tr>
                                <td>
                                    <?php echo ($valorA); ?>
                                </td>


                                <td>
                                    <?php echo ($valorB); ?>
                                </td>


                                <td>
                                    <?php echo ($valorC); ?>
                                </td>


                                <td>
                                    <?php echo ($valorD); ?>
                                </td>


                                <td>
                                    <?php echo ($valorE); ?>
                                </td>


                                <td>
                                    <?php echo ($valorF); ?>
                                </td>

                            </tr>

                        <?php
                        }
            } else {
                echo ("<div class='alert alert-danger' role='alert'> El archivo que intento agregar no era un archivo de excel porfavor intente denuevo </div>");
            }
        }

        ?>

            </tbody>
        </table>

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