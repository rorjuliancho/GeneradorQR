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
    <title>Guía de Manejo Rápido</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php if ($_GET['e'] == 1) { ?>
                    <div class="alert alert-success text-center mt-3" role="alert">
                        <h4>Información Actualizada</h4>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 p-4">
                <a class="btn btn-danger" href="<?= base_url() ?>"> Regresar </a>
            </div>
            <div class="col-lg-9 p-4">
                <h2>GUÍA DE MANEJO RÁPIDO DE EQUIPOS MÉDICOS</h2>
            </div>



            <div class="col-lg-12 p-4">
                <?php foreach ($guiaGeneral as $gg) { ?>
                    <form id="myFormData" class="form-control" action="<?= base_url() ?>updateGuia" method="POST" enctype="multipart/form-data">
                        <input type="text" hidden name="idGuia" value="<?= $gg->id ?>">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>
                                    <h5>Nombre del equipo</h5>
                                </label>
                                <input type="text" name="nombreEquipo" class="form-control" value="<?= $gg->nombre_equipo ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">
                                        <h5>Descripción</h5>
                                    </label>
                                    <textarea rows="7" name="descripcion" class="form-control"><?= $gg->descripcion ?></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">
                                        <h5>Advertencias</h5>
                                    </label>
                                    <textarea rows="7" name="advertencias" class="form-control"><?= $gg->advertencias ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row ">
                                <div class="form-group col-md-6">
                                    <h4>Limpieza y desinfección</h4>
                                    <textarea rows="5" name="limpiezaEquipo" type="text" class="form-control"><?= $gg->limpieza ?></textarea>
                                    <label for="inputAddress">Nota</label>
                                    <textarea rows="3" name="notaLimpieza" type="text" class="form-control"><?= $gg->nota_limpieza ?></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <h4>Biblioteca de Medicamentos</h4>
                                    <textarea rows="5" name="bibliotecaMedicamentos" type="text" class="form-control"><?= $gg->biblioteca_medicamentos ?></textarea>
                                </div>
                            </div>
                        </div>
                        <center class="p-4">
                            <button type="submit" class="btn btn-primary" id="submitBtn">Actualizar información </button>
                        </center>
                    </form>
                <?php } ?>
                <div class="text-center p-4">
                    <h2>Actualizar imagenes de la guía</h2>
                </div>

                <!-- Imagen Principal -->
                <?php foreach ($encontrarGuiaIdPrincipal as $iP) { ?>
                    <form action="<?= base_url() ?>updateImagenPrincipal" method="POST" enctype="multipart/form-data">
                        <input type="text" hidden name="idImagen" value="<?= $iP->idimagen_guia ?>">
                        <input type="text" hidden name="idGuia" value="<?= $iP->idguia ?>">

                        <h3>Imagen principal</h3>
                        <div class="card mt-2">
                            <div class="card-body text-center">
                                <div class="form-row">
                                    <div class="form-group col-md-6 my-auto">
                                        <img src="<?= base_url() ?>uploads/principal/<?= $iP->nombre_img ?>" class="img-fluid" alt="">
                                    </div>
                                    <div class="form-group col-md-6 my-auto">
                                        <label for="imagen">Por favor adjunta la imagen</label>
                                        <input type="file" name="imageInput" required class="file" accept="image/png, image/gif, image/jpeg">
                                        <center class="p-3">
                                            <button type="submit" class="btn btn-success">Actualizar Imagen</button>
                                        </center>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </form>
                <?php } ?>
                <div class="p-2">
                    <h3>Imagenes Partes</h3>
                </div>

                <!-- Imagen Partes -->
                <?php foreach ($encontrarGuiaIdPartes as $iPt) { ?>
                    <form action="<?= base_url() ?>updateImagenPartes" method="POST" enctype="multipart/form-data">
                        <input type="text" hidden name="idImagen" value="<?= $iPt->idimagen_guia ?>">
                        <input type="text" hidden name="idGuia" value="<?= $iPt->idguia ?>">
                        <div class="card mt-4">
                            <div class="card-body text-center">
                                <div class="form-row">
                                    <div class="form-group col-md-6 my-auto">
                                        <img src="<?= base_url() ?>uploads/partes/<?= $iPt->nombre_img ?>" class="img-fluid" alt="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="imagen">Por favor adjunta la imagen</label>
                                        <input type="file" name="imageInputPartes" class="file" accept="image/png, image/gif, image/jpeg">
                                        <hr>
                                        <label for="imagen">Información del equipo</label>
                                        <textarea row="15" name="informacionEquipo" class="form-control"><?= $iPt->descripcion ?></textarea>
                                        <center class="p-3">
                                            <button type="submit" class="btn btn-success">Actualizar Imagen</button>
                                        </center>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </form>
                <?php } ?>

                <div class="p-2">
                    <h3>Imagenes Funciones</h3>
                </div>

                <!-- Imagen Funciones -->
                <?php foreach ($encontrarGuiaIdFunciones as $iF) { ?>
                    <form action="<?= base_url() ?>updateImagenFunciones" method="POST" enctype="multipart/form-data">
                        <input type="text" hidden name="idImagen" value="<?= $iF->idimagen_guia ?>">
                        <input type="text" hidden name="idGuia" value="<?= $iF->idguia ?>">
                        <div class="card mt-4">
                            <div class="card-body text-center">
                                <div class="form-row">
                                    <div class="form-group col-md-6 my-auto">
                                        <img src="<?= base_url() ?>uploads/funciones/<?= $iF->nombre_img ?>" class="img-fluid" alt="">
                                    </div>
                                    <div class="form-group col-md-6 ">
                                        <label for="imagen">Por favor adjunta la imagen</label>
                                        <input type="file" name="imageInputFunciones" class="file" accept="image/png, image/gif, image/jpeg">
                                        <hr>
                                        <label for="imagen">Funcionamiento del equipo</label>
                                        <textarea row="15" name="FunctionamientoEquipo" class="form-control"><?= $iF->descripcion ?></textarea>
                                        <center class="p-3">
                                            <button type="submit" class="btn btn-success">Actualizar Imagen</button>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>public/app.js"></script>

</body>

</html>