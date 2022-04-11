$(document).ready(function() {

    $.fn.dataTable.ext.errMode = 'throw';

    $.fn.dataTable.moment('DD-MMM-YYYY HH:mm');

    var title = 'My title' + '\n' + 'by John';
    var message = 'The information in this table is copyright to BIOFARMA Electrical Inventory.';
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
                    },
                    messageTop: message,
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: exportcolumns
                    },
                    messageTop: message,
                    // title: title,
                },
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    exportOptions: {
                        columns: exportcolumns
                    },
                    messageTop: message,
                    // title: title,
                    customize: function(doc) {
                        doc.styles.title = {
                                color: 'black',
                                fontSize: '30',
                                background: '',
                                alignment: 'center'
                            },
                            doc.styles.message = {
                                color: 'black',
                                fontSize: '15',
                                background: '',
                                alignment: 'left'
                            }
                    }
                },
            ]
        }]
    });

});