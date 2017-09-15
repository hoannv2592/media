$(function () {
    $('.js-basic-example').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        "columns": [
            { "width": "15%" },
            { "width": "20%" },
            { "width": "15%"},
            { "width": "15%" }
        ],
        "language": {
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": "Không tìm thấy dữ liệu",
            "info": "Hiển thị trang _PAGE_ / _PAGES_",
            "infoEmpty": "Không có người dùng nào phù hợp",
            "infoFiltered": "(_MAX_ người dùng)",
            "search": "Tìm kiếm :"
        }
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
        ],
        "language": {
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": "Không tìm thấy dữ liệu",
            "info": "Hiển thị trang _PAGE_ / _PAGES_",
            "infoEmpty": "Không có người dùng nào phù hợp",
            "infoFiltered": "(_MAX_ người dùng)",
            "search": "Tìm kiếm :"
        }
    });

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        "columns": [
            { "width": "15%" },
            { "width": "10%" },
            { "width": "15%"},
            { "width": "20%" },
            { "width": "10%" },
            { "width": "10%" },
            { "width": "8%" }
        ],
        "language": {
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": "Không tìm thấy dữ liệu",
            "info": "Hiển thị trang _PAGE_ / _PAGES_",
            "infoEmpty": "Không có người dùng nào phù hợp",
            "infoFiltered": "(_MAX_ người dùng)",
            "search": "Tìm kiếm :",
        }
    });
});