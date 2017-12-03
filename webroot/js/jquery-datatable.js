$(function () {
    $('.js-basic-example').DataTable({
        dom: 'Bfrtip',
        "scrollX": false,
        responsive: true,
        "columns": [
            { "width": "1%" },
            { "width": "15%" },
            { "width": "20%" },
            { "width": "15%" },
            // { "width": "15%"},
            { "width": "15%" },
        ],
        "language": {
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": "Không tìm thấy dữ liệu",
            "info": "Hiển thị trang _PAGE_ / _PAGES_",
            "infoEmpty": "Không có dữ liệu nào phù hợp",
            "infoFiltered": "(_MAX_ dữ liệu)",
            "search": "Tìm kiếm :"
        }
    });

    $('.js-basic-example_ad').DataTable({
        dom: 'Bfrtip',
        "scrollX": false,
        responsive: true,
        "columns": [
            { "width": "1%" },
            { "width": "10%" },
            { "width": "10%" },
            { "width": "10%" },
            { "width": "15%" },
            { "width": "15%" },
            { "width": "15%"},
            { "width": "15%"},
            { "width": "10%"},

        ],
        "language": {
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": "Không tìm thấy dữ liệu",
            "info": "Hiển thị trang _PAGE_ / _PAGES_",
            "infoEmpty": "Không có dữ liệu nào phù hợp",
            "infoFiltered": "(_MAX_ dữ liệu)",
            "search": "Tìm kiếm :"
        }
    });
    $('.js-exportable_dev').DataTable({
        dom: 'Bfrtip',
        "scrollX": false,
        responsive: true,
        "columns": [
            { "width": "15%" },
            { "width": "15%" },
            { "width": "15%"},
            { "width": "10%" },
            { "width": "15%" }
        ],
        "language": {
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": "Không tìm thấy dữ liệu",
            "info": "Hiển thị trang _PAGE_ / _PAGES_",
            "infoEmpty": "Không có dữ liệu nào phù hợp",
            "infoFiltered": "(_MAX_ dữ liệu)",
            "search": "Tìm kiếm :"
        }
    });
    $('.js-exportable_has').DataTable({
        dom: 'Bfrtip',
        "scrollX": false,
        responsive: true,
        "columns": [
            { "width": "1%" },
            { "width": "8%" },
            { "width": "8%" },
            { "width": "8%" },
            { "width": "8%" },
            { "width": "8%"},
            { "width": "8%"},
            { "width": "8%"},
            { "width": "8%"},
            { "width": "8%"},
            { "width": "8%"},
            { "width": "10%" }
        ],
        "language": {
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": "Không tìm thấy dữ liệu",
            "info": "Hiển thị trang _PAGE_ / _PAGES_",
            "infoEmpty": "Không có dữ liệu nào phù hợp",
            "infoFiltered": "(_MAX_ dữ liệu)",
            "search": "Tìm kiếm :"
        }
    });

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        "scrollX": false,
        responsive: true,
        "columns": [
            { "width": "1%" },
            { "width": "15%" },
            { "width": "10%" },
            { "width": "15%"},
            { "width": "15%" },
            { "width": "10%" },
            { "width": "10%" },
            { "width": "8%" }
        ],
        "language": {
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": "Không tìm thấy dữ liệu",
            "info": "Hiển thị trang _PAGE_ / _PAGES_",
            "infoEmpty": "Không có dữ liệu nào phù hợp",
            "infoFiltered": "(_MAX_ dữ liệu)",
            "search": "Tìm kiếm :"
        },
        'rowsGroup': [1]
    });

    //Exportable table
    $('.js-exportable_partner').DataTable({
        dom: 'Bfrtip',
        "scrollX": false,
        responsive: true,
        "columns": [
            { "width": "1%" },
            { "width": "10%" },
            { "width": "10%" },
            { "width": "10%" },
            { "width": "10%" },
            { "width": "10%" },
            { "width": "10%" },
            { "width": "10%" },
            { "width": "8%" }
        ],
        "language": {
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": "Không tìm thấy dữ liệu",
            "info": "Hiển thị trang _PAGE_ / _PAGES_",
            "infoEmpty": "Không có dữ liệu nào phù hợp",
            "infoFiltered": "(_MAX_ dữ liệu)",
            "search": "Tìm kiếm :"
        },
        'rowsGroup': [1]
    });
    //Exportable table
    $('.js-exportable_log').DataTable({
        dom: 'Bfrtip',
        "scrollX": false,
        responsive: true,
        "columns": [
            { "width": "1%" },
            { "width": "10%" },
            { "width": "10%" },
            { "width": "10%" }
        ],
        "language": {
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": "Không tìm thấy dữ liệu",
            "info": "Hiển thị trang _PAGE_ / _PAGES_",
            "infoEmpty": "Không có dữ liệu nào phù hợp",
            "infoFiltered": "(_MAX_ dữ liệu)",
            "search": "Tìm kiếm :"
        },
        'rowsGroup': [1]
    });
    //Exportable table
    $('.js-exportable_c').DataTable({
        dom: 'Bfrtip',
        "scrollX": false,
        responsive: true,
        "columns": [
            { "width": "1%" },
            { "width": "8%" },
            { "width": "10%" },
            { "width": "10%" },
            { "width": "10%" },
            { "width": "5%" },
            { "width": "10%" },
            { "width": "10%" },
            { "width": "10%" },
            { "width": "10%" }
        ],
        "language": {
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": "Không tìm thấy dữ liệu",
            "info": "Hiển thị trang _PAGE_ / _PAGES_",
            "infoEmpty": "Không có dữ liệu nào phù hợp",
            "infoFiltered": "(_MAX_ dữ liệu)",
            "search": "Tìm kiếm :"
        },
        'rowsGroup': [1]
    });
    //Exportable table
    $('.exportable_partner_voucher').DataTable({
        dom: 'Bfrtip',
        "scrollX": false,
        responsive: true,
        "columns": [
            { "width": "1%" },
            { "width": "8%" },
            { "width": "10%" },
            { "width": "10%" },
            { "width": "10%" },
            { "width": "10%" },
            { "width": "10%" },
            { "width": "10%" }
        ],
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "language": {
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": "Không tìm thấy dữ liệu",
            "info": "Hiển thị trang _PAGE_ / _PAGES_",
            "infoEmpty": "Không có dữ liệu nào phù hợp",
            "infoFiltered": "(_MAX_ dữ liệu)",
            "search": "Tìm kiếm :"
        },
        'rowsGroup': [1]
    });
});