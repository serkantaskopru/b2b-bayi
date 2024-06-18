let datatables_language_tr={
    'sDecimal':        ',',
    'sEmptyTable':     'Tabloda herhangi bir veri mevcut değil',
    'sInfo':           '_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor',
    'sInfoEmpty':      'Kayıt yok',
    'sInfoFiltered':   '(_MAX_ kayıt içerisinden bulunan)',
    'sInfoPostFix':    '',
    'sInfoThousands':  '.',
    'sLengthMenu':     '_MENU_',
    'sLoadingRecords': '<div class="spinner-border text-primary" role="status">\n' +
        '  <span class="visually-hidden">Loading...</span>\n' +
        '</div>',
    'sProcessing':     '<div class="spinner-border text-primary" role="status">\n' +
        '  <span class="visually-hidden">Loading...</span>\n' +
        '</div>',
    'sSearch':         '',
    'searchPlaceholder': 'Tabloda Arama Yapın',
    'sZeroRecords':    'Eşleşen kayıt bulunamadı',
    'oPaginate': {
        'sFirst':    '«',
        'sLast':     '»',
        'sNext':     '›',
        'sPrevious': '‹'
    },
    'oAria': {
        'sSortAscending':  ': artan sütun sıralamasını aktifleştir',
        'sSortDescending': ': azalan sütun sıralamasını aktifleştir'
    },
    'select': {
        'rows': {
            '_': '%d kayıt seçildi',
            '0': '',
            '1': '1 kayıt seçildi'
        }
    }
};
$(function() {
    let datatable_obj
    if (typeof datatables_conf !== 'undefined' && datatables_conf != null) {


        $('#' + datatables_conf.table_id + ' thead tr').clone(true).appendTo('#' + datatables_conf.table_id + ' thead');
        $('#' + datatables_conf.table_id + ' thead tr:eq(1) th').each(function (i) {
            let title = $(this).text()
            if (title !== '') {
                $(this).html('<input class="form-control input-xs" type="text" style="width:90%" placeholder="' + title + '" />')
                $('input', this).on('keyup change', function (e) {
                    if (datatable_obj.column(i).search() !== this.value) {
                        datatable_obj.column(i).search(this.value).draw()
                    }
                })
            }
        })

        datatable_obj = $('#' + datatables_conf.table_id).DataTable({
            ajax: {
                url: datatables_conf.ajax_url,
                type: datatables_conf.ajax_type,
                dataType: "json",
                dataSrc: datatables_conf.datasrc ? datatables_conf.datasrc : '',
                contentType: "application/json",
                /*headers: {'req_origin': "site"},*/
                data: datatables_conf.ajax_data,
                complete: function(xhr, responseText){
                    console.log(xhr);
                    console.log(responseText); //*** responseJSON: Array[0]
                }
            },
            deferRender: true,
            columns: datatables_conf.columns,
            select: datatables_conf.select ?? true,
            columnDefs: datatables_conf.columnDefs,
            order: datatables_conf.order,
            aaSorting: [],
            scrollX: true,
            processing: true,
            responsive: true,
            dom: '<"row mb-1 p-0" <"col-md-12 d-flex justify-content-between" <"col-md-6 p-0"Bl> <"col-md-6 "f> > >rt<"row mb-1" <"col-md-12" <"col-md-6 p-0"i><"col-md-6 "p> > >',
            stateDuration: 0,
            paging: true,
            pagingType: 'full_numbers',
            searching: true,
            orderCellsTop: true,
            ordering: true,
            language: datatables_language_tr, // head tag den geliyor
            buttons: [
                {
                    extend: 'excel',
                    text: '<i class="icon-cloud-download" ></i> Excel',
                    title: datatables_conf.export_file_name,
                    className: " btn btn-sm btn-outline-secondary btn-round",
                    init: function (api, node, config) {
                        $(node).removeClass('dt-button')
                        $(node).removeClass('buttons-excel')
                        $(node).removeClass('buttons-html5')
                    }
                },
                {
                    extend: 'pdf',
                    text: '<i class="icon-cloud-download" ></i> Pdf',
                    className: " btn btn-sm btn-outline-secondary btn-round",
                    init: function (api, node, config) {
                        $(node).removeClass('dt-button')
                        $(node).removeClass('buttons-excel')
                        $(node).removeClass('buttons-html5')
                    },
                    orientation: 'landscape',
                    title: datatables_conf.export_file_name,
                    exportOptions: {orthogonal: 'export'}
                }
            ],
            drawCallback: function () {
                var api = this.api();
                if (!jQuery.isEmptyObject(datatables_conf.context_menu)) {
                    $.contextMenu({
                        selector: '#' + datatables_conf.table_id + ' tbody tr td',
                        callback: function (key, options) {
                            var cellIndex = parseInt(options.$trigger[0].cellIndex);
                            row = datatable_obj.row(options.$trigger[0].parentNode);
                            data = row.data();
                            if (key != "iptal") {
                                datatables_conf.context_menu[key](row.data())
                            }
                        },
                        items: datatables_conf.context_menu.menu_options
                    });
                }
            },
        });
        $('.dataTables_filter input').unbind();
        $('.dataTables_filter input').bind('keyup change', function (e) {
            if (datatable_obj.search() !== this.value) {
                datatable_obj.search(this.value)
                    .draw();
            }
        });

        datatables_conf.callback(datatable_obj)

    }
});
$.fn.dataTable.ext.errMode = 'none';
$.fn.dataTable.ext.errMode = 'none';
