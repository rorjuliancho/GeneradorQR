$(document).ready(function () {
    bsCustomFileInput.init();
    var contadorPartes = 1;
    var contadorFuncionamiento = 1;
    $('#agregar_campos_partes').on('click', function () {
        if (contadorPartes < 20) {
            var content = ' <div class="form-row">' +
                '<div class="form-group col-md-6 my-auto">' +
                '<h5>Carga la imagen del equipo</h5>' +
                '<input type="file" name="imagenEquipo' + contadorPartes + '[]"' + '"class="form-control">' +
                '</div>' +
                '<div class="form-group col-md-6 text-center ">' +
                '<textarea rows="5" name="informacionEquipo' + contadorPartes + '"' + '"type="text" class="form-control" placeholder="Información del equipo"></textarea>' +
                '</div>' +
                '</div>' +
                '</div>';
            $('#nuevos_campos_partes').append(content);
            contadorPartes++;
        }
        return false;
    });


    $('#agregar_funcionamiento').on('click', function () {
        if (contadorFuncionamiento < 20) {
            var content = '<div class="form-row">' +
                '<div class="form-group col-md-6 my-auto">' +
                '<input type="file" name="imagenEquipoFuncion' + contadorFuncionamiento + '[]"' + '"class="form-control">' +
                '</div>' +
                '<div class="form-group col-md-6 text-center ">' +
                '<textarea rows="5" name="informacionEquipoFuncion' + contadorFuncionamiento + '"' + '"type="text" class="form-control" placeholder="Funcionamiento del equipo"></textarea>' +
                '</div>' +
                '</div>' +
                '</div>';
            $('#nuevo_funcionamiento').append(content);
            contadorFuncionamiento++;
        }
        return false;
    });


    

});


