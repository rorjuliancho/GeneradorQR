<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <title>Guía de Manejo Rápido</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 p-4">
                <a class="btn btn-success" href="<?= base_url() ?>crearGuia">Crear Guía</a>
            </div>
            <div class="col-lg-9 p-4">
                <h2>GUÍA DE MANEJO RÁPIDO DE EQUIPOS MÉDICOS</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">

                <table class="table table-responsive table-striped" id="table_guias">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre Equipo</th>
                            <th scope="col">Descripción Equipo</th>
                            <th scope="col">Advertencia</th>
                            <!--   <th scope="col">Limpieza</th>
                            <th scope="col">Nota Limpieza</th> -->
                            <th scope="col">Fecha_creacion</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($informacion) { ?>
                            <?php foreach ($informacion as $i) { ?>
                                <tr id="<?= $i->id ?>">
                                    <th scope="row"><?= $i->id ?></th>
                                    <td width="0"><?= $i->nombre_equipo ?></td>
                                    <td width="0"><?= $i->descripcion ?></td>
                                    <td width="0"><?= $i->advertencias ?></td>
                                    <td width="0"><?= $i->fecha_creacion ?></td>
                                    <td align="left">
                                        <a class="btn btn-success btn-sm mb-2 btn-block" href="<?= base_url() ?>generarpdf/<?= $i->id ?>"><i class="fas fa fa-eye"></i> Ver</a>
                                        <a class="btn btn-primary btn-sm mb-2 btn-block" href="<?= base_url() ?>editarGuia/<?= $i->id ?>?e=0"><i class="fas fa fa-edit"></i> Editar</a>
                                        <button class="btn btn-danger btn-sm mb-2 btn-block remove"><i class="fas fa fa-trash"></i> Eliminar</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>public/app.js"></script>

</body>

</html>