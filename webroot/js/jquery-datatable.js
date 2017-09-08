$(function () {
    $('.js-basic-example').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        "columns": [
            { "width": "15%" },
            { "width": "20%" },
            { "width": "15%"},
            { "width": "15%" }
        ]
    });

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        responsive: true
    });
});