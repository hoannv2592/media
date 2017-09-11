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
    $('.js-exportable_dev').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        "columns": [
            { "width": "15%" },
            { "width": "15%" },
            { "width": "15%"},
            { "width": "15%" },
            { "width": "10%" }
        ]
    });

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        "columns": [
            { "width": "10%" },
            { "width": "10%" },
            { "width": "15%"},
            { "width": "20%" },
            { "width": "10%" },
            { "width": "10%" },
            { "width": "10%" }
        ]
    });
});