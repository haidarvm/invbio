$(document).ready(function() {

    $.fn.dataTable.ext.errMode = 'throw';

    $.fn.dataTable.moment('DD-MMM-YYYY HH:mm');
    $("#datatable").DataTable({
        colReorder: true,
        ordering: true,
        pageLength: pageshow,
        order: [
            [orderby, "desc"]
        ],
        columnDefs: [{
            target: orderby, //index of column
            type: 'datetime-moment'
        }],
        dom: "Bfrtip",
        buttons: [{
            extend: "collection",
            text: "Export",
            buttons: [{
                    extend: 'copyHtml5',
                    exportOptions: {
                        columns: exportcolumns
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: exportcolumns
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: exportcolumns
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: exportcolumns
                    }
                },
            ]
        }]
    });
    $('.btn').addClass("main-btn btn-hover");
});