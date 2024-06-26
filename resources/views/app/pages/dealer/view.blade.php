@extends('app.layouts.app')
@section('header_title', 'Bayi Listesi')
@section('content')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between"><h4 class="card-title mg-b-0">Bayi Listesi</h4> <i class="mdi mdi-dots-horizontal text-gray"></i></div>
                    <div class="card-toolbar">
                        <a id="delete-btn" class="btn btn-sm btn-primary text-white me-2">Sil</a>
                        <a id="detail-btn" class="btn btn-sm btn-primary text-white me-2">Düzenle</a>
                        <a href="{{route('tenant.dealer.add')}}" class="btn btn-sm btn-primary text-white me-2">Ekle</a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="tbl_dealer_list" class="table table-xs table-striped table-bordered compact dataTable hover" style="width: 100%;">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Bayi Adı</th>
                            <th>Bakiye</th>
                            <th>Grup</th>
                            <th>Email</th>
                            <th>Telefon</th>
                            <th>Vergi Dairesi</th>
                            <th>Vergi No</th>
                            <th>Kimlik No</th>
                            <th>Adres</th>
                            <th>Ödeme Zamanı</th>
                            <th>İban</th>
                            <th>Not</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        datatables_conf = {
            table_id : "tbl_dealer_list",
            select: true,
            datasrc: "data",
            ajax_url: "{{route('tenant.dealer.fetch')}}",
            ajax_type: "GET",
            context_menu : {
                detail: (data) => {
                    window.open("/tenant/dealer/show/"+data.id,'_blank')
                },
                delete: (data) => {
                    Swal.fire({
                        html: `Dikkat, seçtiğiniz veri <strong>silinecektir</strong>. Devam etmek istiyorsanız sil butonuna tıklayın.`,
                        icon: "warning",
                        buttonsStyling: false,
                        showCancelButton: true,
                        reverseButtons: true,
                        cancelButtonText: 'İptal Et',
                        confirmButtonText: "Sil",

                        customClass: {
                            cancelButton: 'btn btn-light',
                            confirmButton: "btn btn-danger",

                        }
                    }).then((e) => {
                        if (e.isConfirmed) {
                            ajaxProcess('/tenant/dealer/destroy/'+data.id,'get',true);
                        }
                    });
                },
                menu_options:{
                    detail: {name: "Detay", icon: ""},
                    delete:{name: "Sil", icon: ""},
                    sep1: "---------",
                    iptal: {name: "İptal", icon:""}
                }
            },
            columns: [
                { data: "id", visible:false},
                {
                    data: "name",
                    render: function(data, type, row, meta){
                        return row.name ?? '#';
                    }
                },{
                    data: "balance",
                    render: function(data, type, row, meta){
                        return row.balance ? row.balance + ' TL' : '#';
                    }
                },{
                    data: "grup",
                    render: function(data, type, row, meta){
                        return row.group?.name ?? '<span class="badge badge-danger">Grup Yok</span>';
                    }
                },{
                    data: "email",
                    render: function(data, type, row, meta){
                        return row.email ?? '#';
                    }
                },{
                    data: "phone",
                    render: function(data, type, row, meta){
                        return row.phone ?? '#';
                    }
                },{
                    data: "tax_office",
                    render: function(data, type, row, meta){
                        return row.tax_office ?? '#';
                    }
                },{
                    data: "tax_number",
                    render: function(data, type, row, meta){
                        return row.tax_number ?? '#';
                    }
                },{
                    data: "identity_number",
                    render: function(data, type, row, meta){
                        return row.identity_number ?? '#';
                    }
                },{
                    data: "address",
                    render: function(data, type, row, meta){
                        return row.address ?? '#';
                    }
                },{
                    data: "payment_date",
                    render: function(data, type, row, meta){
                        return row.payment_date ?? '#';
                    }
                },{
                    data: "iban",
                    render: function(data, type, row, meta){
                        return row.iban ?? '#';
                    }
                },{
                    data: "notes",
                    render: function(data, type, row, meta){
                        return row.notes ?? '#';
                    }
                },
            ],
            export_file_name:"Bayi Listesi",
            callback:(table)=>{
                $("#delete-btn").click(function () {

                    if (table.rows({selected: true}).count() === 0) {

                        toastr.error("Herhangi Bir Kayıt Seçilmedi", 'HATA', {
                            'closeButton': true,
                            'progressBar': true, 'positionClass': 'toastr-top-center',
                        })
                        return
                    }
                    Swal.fire({
                        html: `Dikkat, seçtiğiniz veri <strong>silinecektir</strong>. Devam etmek istiyorsanız sil butonuna tıklayın.`,
                        icon: "warning",
                        buttonsStyling: false,
                        showCancelButton: true,
                        reverseButtons: true,
                        cancelButtonText: 'İptal Et',
                        confirmButtonText: "Sil",

                        customClass: {
                            cancelButton: 'btn btn-light',
                            confirmButton: "btn btn-danger",

                        }
                    }).then((e) => {
                        if (e.isConfirmed) {
                            ajaxProcess('/tenant/dealer/destroy/'+table.rows({selected: true}).data()[0].id,'get',true);
                        }
                    });
                })
                $("#detail-btn").click(function () {

                    if (table.rows({selected: true}).count() === 0) {

                        toastr.error("Herhangi Bir Kayıt Seçilmedi", 'HATA', {
                            'closeButton': true,
                            'progressBar': true, 'positionClass': 'toastr-top-center',
                        })
                        return
                    }
                    window.open('/tenant/dealer/show/'+table.rows({selected: true}).data()[0].id, "_blank");
                })
            }
        }
    </script>
@endpush
@push('style') @endpush
