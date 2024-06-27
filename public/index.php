<?php
require_once '../vendor/autoload.php';
use Services\MuebleServiceImpl;

$muebleService = new MuebleServiceImpl();
$registros = $muebleService->getAllMuebles();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Muebles</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../lib/fontAwesome/css/all.min.css" rel="stylesheet">
    <link href="../lib/site/site.css" rel="stylesheet">
    <script src="../lib/JQuery/jquery.min.js"></script>
    <script src="../lib/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../lib/fontAwesome/js/all.min.js"></script>
</head>
<body>

<div id="contenido" class="container-fluid">
    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?php echo $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['message']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
        ?>
    <?php endif; ?>

    <div>
        <div class="form-row mt-2">
            <div class="col text-left">
                <h1>Bienvenidos a Muebles de Calidad</h1>
            </div>
        </div>

        <div class="card border-dark mt-2 mb-2">
            <div class="card-header bg-dark text-white">
                <div class="form-row">
                    <div class="col">
                        Muebles Disponibles
                    </div>
                    <div class="col text-right">
                        <button class="btn btn-outline-light" data-toggle="modal" onclick="window.location.assign('<?= '../src/views/muebles/create.php' ?>')">
                            Agregar Mueble
                        </button>
                    </div>
                </div>
            </div>

            <div class="card-body" id="card-body-busqueda">
                <?php if (!$registros) { ?>
                    <div class="form-row">
                        <div class="col text-center">
                            <p>No existen muebles disponibles</p>
                        </div>
                    </div>
                <?php } else { ?>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th class='text-center' scope="col">Nombre</th>
                            <th class='text-center' scope="col">Descripción</th>
                            <th class='text-center' scope="col">Medida</th>
                            <th class='text-center' scope="col">Largo</th>
                            <th class='text-center' scope="col">Ancho</th>
                            <th class='text-center' scope="col">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($registros as $mueble) { ?>
                            <tr>
                                <td class="table-light text-center">
                                    <?php echo $mueble->getNombre(); ?></td>
                                <td class="table-light text-center">
                                    <?php echo $mueble->getDescripcion(); ?></td>
                                <td class="table-light text-center">
                                    <?php echo $mueble->getMedida(); ?></td>
                                <td class="table-light text-center">
                                    <?php echo $mueble->getLargo(); ?></td>
                                <td class="table-light text-center">
                                    <?php echo $mueble->getAncho(); ?></td>
                                <td class="table-light text-center">
                                    <button type="button" class='btn btn-outline-info btn-detalle'
                                            onclick="window.location.assign('<?= '../src/views/muebles/edit.php?id=' . $mueble->getMuebleId() ?>')">
                                        <i class='far fa-edit'></i>
                                    </button>
                                    <button type="button" class='btn btn-outline-danger btn-delete'
                                            onclick="window.location.assign('<?= '../src/views/muebles/delete.php?id=' . $mueble->getMuebleId() ?>')">
                                        <i class='far fa-trash-alt'></i>
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(url) {
        if (confirm("¿Estás seguro de que deseas eliminar este mueble?")) {
            window.location.href = url;
        }
    }
</script>

</body>
</html>