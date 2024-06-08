<?php
#$droot = $_SERVER['DOCUMENT_ROOT'];

require_once '../vendor/autoload.php';
use App\Core\Services\Implementations\MuebleServiceImpl;

$muebleService = new MuebleServiceImpl();
$registros = $muebleService->getAllMuebles();

?>

<html>
<head>
    <title>Muebles</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Archivos de estilo -->
    <link href="../lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../lib/bootstrap/bootstrap.css" rel="stylesheet">
    <link href="../lib/fontAwesome/css/all.min.css" rel="stylesheet">
    <link href="../lib/site/site.css" rel="stylesheet">
    <link href="../lib/site/site.css" rel="stylesheet">
    <!-- Archivos JavaScript -->
    <script src="../lib/JQuery/jquery.min.js"></script>
    <script src="../lib/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../lib/bootstrap/bootstrap.min.js"></script>
    <script src="../lib/fontAwesome/js/all.min.js"></script>
</head>

<div id="contenido" class="container-fluid">
    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?php echo $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['message']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
        // Eliminar el mensaje de la sesión
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
        ?>
    <?php endif; ?>
    <div id="seccionSuperior">
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
                        <div id="card-body-expandir" title="Expandir/Contraer formulario"></div>
                    </div>
                </div>
            </div>

            <div class="card-body" id="card-body-busqueda">
                <div class="form-row">
                    <div class="col text-right">

                        <button class="btn btn-outline-dark" data-toggle="modal"
                                onclick="window.location.assign('<?= '../src/views/muebles/create.php' ?>')"
                                data-bs-target="#exampleModal">
                            Agregar Mueble
                        </button>
                    </div>
                </div>
                <br>
                <?php if (!$registros) { ?>
                    <div class="form-row">
                        <div class="col text-center">
                            <p>No existen muebles disponibles</p>
                        </div>
                    </div>
                <?php } else { ?>
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Medida</th>
                            <th scope="col">Largo</th>
                            <th scope="col">Ancho</th>
                            <th scope="col">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($registros as $mueble) { ?>
                            <tr>
                                <td class="table-light fw-light lh-1 text-center">
                                    <?php echo $mueble->getNombre(); ?></td>
                                <td class="table-light fw-light lh-1 text-center text-break">
                                    <?php echo $mueble->getDescripcion(); ?></td>
                                <td class="table-light  fw-light lh-1 text-center text-break">
                                    <?php echo $mueble->getMedida(); ?></td>
                                <td class="table-light  fw-light lh-1 text-center text-break">
                                    <?php echo $mueble->getLargo(); ?></td>
                                <td class="table-light fw-light lh-1 text-center text-break text-capitalize">
                                    <?php echo $mueble->getAncho(); ?></td>

                                <td class="table-light fw-light">
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