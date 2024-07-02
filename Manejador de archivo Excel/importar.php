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

<body style="height: 100vh;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Villa Despensa</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="generarReporte.php">Generar reporte</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="importar.php">Importar datos <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container p-5 my-5 bg-light" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">

        <form method="POST" action="leer.php" enctype="multipart/form-data">
            <div class="custom-file">

                <input type="file" class="custom-file-input" id="customFile" name="uploadedFile" />
                <label class="custom-file-label" for="customFile">Archivo de Excel</label>
            </div><br><br>
            <input class="btn btn-primary" type="submit" name="uploadBtn" value="Importar" />
        </form>


    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap4.min.js"></script>
    <script src="js/datatables-demo.js"></script>
</body>

<footer class="bg-dark p-5" style="position: fixed; bottom: 0; width: 100%;">
    <p class="text-center text-white">Supermercado Villa Despensa © - 2024</p>
</footer>

</html>