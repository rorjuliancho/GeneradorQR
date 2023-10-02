$(document).ready(function () {
    $('#table_guias').DataTable({

    });

    $(".remove").click(function () {
        var id = $(this).parents("tr").attr("id");

        if (confirm('Está seguro de eliminar esta guía?')) {

            $.ajax({
                url: '/guiadeusorapido/Welcome/DeleteGuia/' + id,
                type: 'POST',
                error: function () {
                    alert('Something is wrong');
                },

                success: function (data) {
                    $("#" + id).remove();
                    alert("Guía Eliminada con éxito");

                }

            });

        }

    });
});


