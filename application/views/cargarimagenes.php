<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Guía de Manejo Rápido</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 p-4">
                <a class="btn btn-danger" href="<?= base_url() ?>"> Regresar </a>
            </div>
            <div class="col-lg-9 p-4">
                <h2>GUÍA DE MANEJO RÁPIDO DE EQUIPOS MÉDICOS</h2>
                <?php if ($_GET['e'] == 1) { ?>
                    <div class="alert alert-success text-center" role="alert">
                        <h4>Imagen Guardada</h4>
                    </div>
                <?php } ?>
            </div>

            <div class="col-lg-4 p-4">
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    <h4>Imagen Principal</h4>
                                </div>
                                <div class="col-6 text-center my-auto">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        Agregar Información
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-4 p-4">
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    <h4>Partes del equipo</h4>
                                </div>
                                <div class="col-6 text-center my-auto">
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal2">
                                        Agregar Información
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-4 p-4">
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    <h4>Función del equipo</h4>
                                </div>
                                <div class="col-6 text-center my-auto">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal3">
                                        Agregar Información
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class=" col-lg-12 text-center">
                <a class="btn btn-primary" href="<?= base_url() ?>pdf">Generar Guía</a>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Imagen Principal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url() ?>insertarimagenprincipal" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="imagen">Por favor adjunta la imagen</label>
                                    <input type="file" name="imageInput" class="file" accept="image/png, image/gif, image/jpeg">
                                    <hr>
                                    <label for="imagen">Información del equipo</label>
                                    <textarea row="15" name="ImagenPrincipal" class="form-control"></textarea>
                                </div>

                                <center class="p-4">
                                    <button type="submit" class="btn btn-success">Cargar Imagen Principal</button>
                                </center>
                            </form>
                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Partes del equipo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url() ?>insertarpartes" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="imagen">Por favor adjunta la imagen</label>
                                    <input type="file" name="imageInput" class="file" accept="image/png, image/gif, image/jpeg">
                                    <hr>
                                    <label for="imagen">Información del equipo</label>
                                    <textarea row="15" name="informacionEquipo" class="form-control"></textarea>
                                </div>

                                <center class="p-4">
                                    <button type="submit" class="btn btn-success">Cargar Partes del equipo</button>
                                </center>
                            </form>
                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Funcionamiento del equipo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url() ?>insertarFunciones" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="imagen">Por favor adjunta la imagen</label>
                                    <input type="file" name="imageInputFunciones" class="file" accept="image/png, image/gif, image/jpeg">
                                    <hr>
                                    <label for="imagen">Funcionamiento del equipo</label>
                                    <textarea row="15" name="FunctionamientoEquipo" class="form-control"></textarea>
                                </div>

                                <center class="p-4">
                                    <button type="submit" class="btn btn-success">Cargar Funciones del equipo</button>
                                </center>
                            </form>
                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>public/app.js"></script>

</body>

</html>