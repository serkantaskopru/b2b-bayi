@extends('app.layouts.app')
@section('header_title', 'Ürün Listesi')
@section('content')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between"><h4 class="card-title mg-b-0">Ürün Listesi</h4> <i class="mdi mdi-dots-horizontal text-gray"></i></div>
                    <div class="card-toolbar">
                        <a id="product-delete" class="btn btn-sm btn-primary text-white me-2">Sil</a>
                        <a id="product-edit" class="btn btn-sm btn-primary text-white me-2">Düzenle</a>
                        <a id="product-detail" class="btn btn-sm btn-primary text-white me-2">Detay</a>
                        <a href="#" class="btn btn-sm btn-primary text-white me-2">Ürün Ekle</a>
                        <a href="#" class="btn btn-sm btn-primary text-white">XML ile güncelle</a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="tbl_prod_list" class="table table-xs table-striped table-bordered compact dataTable hover" style="width: 100%;">
                        <thead>
                        <tr>
                            <th>product_id</th>
                            <th>Foto</th>
                            <th>Ürün Kodu</th>
                            <th>Ürün Adı</th>
                            <th>Alış Fiyatı</th>
                            <th>Satış Fiyatı</th>
                            <th>Durum</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Desi</th>
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
            table_id : "tbl_prod_list",
            datasrc: "data",
            ajax_url: "{{route('tenant.product.fetch')}}",
            ajax_type: "GET",
            @if(Auth::user()->role == 'admin')
            context_menu : {
                update: (data) => {
                    window.open("/tenant/product/duzenle/"+data.id,'_blank')
                },
                detail: (data) => {
                    window.open("/tenant/product/show/"+data.id,'_blank')
                },
                secenek_ekle: (data) => {
                    window.open("/urunler/secenek-ekle/"+data.id,'_blank')
                },
                aktifpasif: (data) => {
                    ajaxProcess("/urunler/aktif-pasif/"+data.product_id)
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
                            ajaxProcess('/tenant/product/destroy/'+data.id,'get',true);
                        }
                    });
                },
                menu_options:{
                    update: {name: "Güncelle", icon: ""},
                    detail: {name: "Detay", icon: ""},
                    aktifpasif: {name: "Aktif / Pasif", icon: ""},
                    secenek_ekle: {name: "Seçenek Ekle", icon: ""},
                    delete:{name: "Sil", icon: ""},
                    sep1: "---------",
                    iptal: {name: "İptal", icon:""}
                }
            },
            @else
            context_menu : {
                detail: (data) => {
                    window.location.replace("/tenant/product/show/"+data.id)
                },
                menu_options:{
                    detail: {name: "Detay", icon: ""},
                    sep1: "---------",
                    iptal: {name: "İptal", icon:""}
                }
            },
            @endif
            columns: [
                {
                    data: "product_id",
                    orderable:false,
                    visible:false,
                },
                {
                    data: "image",
                    orderable:false,
                    searchable: false,
                    className: 'dt-body-center',
                    render: function(data, type, row, meta){
                        if(row.image != null){
                            if(row.image_source != 'external'){
                                data = '<a href="/tenant/product/show/'+row.id+'"><img load="lazy" style="height:50px" src="{{env('APP_URL')}}'+row.image+'" /></a>';
                            }else{
                                data = '<a href="/tenant/product/show/'+row.id+'"><img load="lazy" style="height:50px" src="'+row.image+'" /></a>';
                            }
                        }else{
                            data = '<img load="lazy" style="height:50px" src="/images/product.jpg" />';
                        }
                        return data;
                    }
                },
                {
                    data: "model",
                    render: function(data, type, row, meta){
                        if(row.model == null){
                            data = ""
                        }else{
                            data = '<a href="/tenant/product/show/'+row.id+'" class="text-primary">'+row.model+'</a>';
                        }
                        return data;
                    }
                },{
                    data: "name",
                    render: function(data, type, row, meta){
                        if(row.name == null){
                            data = ""
                        }else{
                            data = '<a href="/tenant/product/show/'+row.id+'" class="text-primary">'+row.name+'</a>';
                        }
                        return data;
                    }
                },{
                    data: "buy_price",
                    render: function(data, type, row, meta){
                        if(row.buy_price == null){
                            data = ""
                        }else{
                            data = row.buy_price;
                        }
                        return data;
                    }
                },{
                    data: "sell_price",
                    render: function(data, type, row, meta){
                        if(row.sell_price == null){
                            data = row.sell_price + '(Alış Fiyatından)'
                        }else{
                            data = row.sell_price;
                        }
                        return data;
                    }
                },{
                    data: "status",
                    render: function(data, type, row, meta){
                        if(row.status == 1){
                            data = '<span class="badge badge-success">Aktif</span>'
                        }else{
                            data = '<span class="badge badge-danger">Pasif</span>'
                        }
                        return data;
                    }
                },{
                    data: "kategori",
                    render: function(data, type, row, meta){
                        if(row.category_name == null){
                            data = ""
                        }else{
                            data = row.category_name;
                        }
                        return data;
                    }
                },{
                    data: "stock",
                    render: function(data, type, row, meta){
                        if(row.stock == null){
                            data = ""
                        }else{
                            data = row.stock;
                        }
                        return data;
                    }
                },{
                    data: "desi",
                    render: function(data, type, row, meta){
                        if(row.desi == null){
                            data = ""
                        }else{
                            data = row.desi;
                        }
                        return data;
                    }
                }

            ],
            export_file_name:"Ürün Listesi",
            select: {},
            callback:(table)=>{
                $("#product-delete").click(function () {

                    if (table.rows({selected: true}).count() == 0) {

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
                            ajaxProcess('/tenant/product/destroy/'+table.rows({selected: true}).data()[0].id,'get',true);
                        }
                    });
                })
                $("#product-edit").click(function () {

                    if (table.rows({selected: true}).count() == 0) {

                        toastr.error("Herhangi Bir Kayıt Seçilmedi", 'HATA', {
                            'closeButton': true,
                            'progressBar': true, 'positionClass': 'toastr-top-center',
                        })
                        return
                    }
                    window.open('/urunler/duzenle/'+table.rows({selected: true}).data()[0].id, "_blank");
                })
                $("#product-detail").click(function () {

                    if (table.rows({selected: true}).count() == 0) {

                        toastr.error("Herhangi Bir Kayıt Seçilmedi", 'HATA', {
                            'closeButton': true,
                            'progressBar': true, 'positionClass': 'toastr-top-center',
                        })
                        return
                    }
                    window.open('/tenant/product/show/'+table.rows({selected: true}).data()[0].id, "_blank");
                })
            }
        }
    </script>
@endpush
@push('style') @endpush
