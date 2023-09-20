<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>GUÍA DE MANEJO RÁPIDO DE EQUIPOS MÉDICOS </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }

        .img-fuild {
            height: auto;
            width: 30%;
        }

        body {
            margin: 0;
            margin-bottom: 40px;
        }

        footer {
            background-color: #eb3e41;
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 80px;
            color: white;
            text-align: center;
        }

        .red {
            border: 2px solid #eb3e41;
        }

        .bg-advertencia {
            background-color: #FCFF00;
        }

        .p-4 {
            padding: 10px;
        }
    </style>
</head>

<body>
    <table border="2" width="100%">
        <tr>
            <td align="center">
                <h1> GUÍA DE MANEJO RÁPIDO DE EQUIPO MÉDICO</h1>
            </td>
        </tr>
    </table>

    <?php foreach ($informcionGeneral as $v) { ?>

        <table border="1" width="100%">
            <tr>
                <td align="center">
                    <h4>
                        <?= $v->nombre_equipo ?>
                    </h4>
                </td>
            </tr>
        </table>
    <?php } ?>
    <table border="1" width="100%">
        <tr>
            <td align="center">
                <img class="img-fuild" src="<?= $imagenPrincipal ?>" />
            </td>
        </tr>
    </table>

    <table border="1" width="100%">
        <tr>
            <td align="center">
                <img class="img-fuild" src="<?= $imagenprueba ?>" />
            </td>
        </tr>
    </table>



    <?php foreach ($informcionGeneral as $v) { ?>
        <table border="1" width="100%">
            <tr>
                <td align="center">
                    <h3 class="p-4">
                        <?= $v->descripcion ?>
                    </h3>
                </td>
            </tr>
        </table>
        <table border="1" width="100%" class="bg-advertencia">
            <tr>
                <td align="center">
                    <h2><strong>Advertencia</strong></h2>
                    <h3 class="p-4"><?= $v->advertencias ?>
                    </h3>
                </td>
            </tr>
        </table>
    <?php } ?>

    <table border="1" width="100%">
        <tr>
            <td align="center">
                <h3 class="p-4">En esta guía se muestra la información básica para hacer uso adecuado del equipo, si requiere mayor información comuníquese al (310) 552-4551 </h3>
            </td>
        </tr>
    </table>

    <table border="1" width="100%">
        <tr>
            <td align="center">
                <h3>Funciones </h3>
            </td>
        </tr>

        <?= $htmlarryFuncines[0] ?>


    </table>




    <footer>

    </footer>
</body>

</html>