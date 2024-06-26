@extends('app.layouts.app')
@section('header_title', 'Yönetim')
@section('content')
    <div class="row row-sm">
        <div class="card mt-5" id="tabs-style2" style="padding: 0;
    border-radius: 0;
    box-shadow: none;
    border: none; width: 100%">
            <div class="card-body" style="padding:0">
                <div class="w-100 d-flex my-xl-auto justify-content-between mb-1 row">
                    <div class="col-md-4 col-lg-2 d-flex align-items-center">
                        <strong>Bugün'e Ait Veriler</strong>
                    </div>
                    <div class="col-md-8 col-lg-10 d-flex flex-wrap align-items-center up-buttons-container justify-content-start justify-content-lg-end">
                        <button id="btn_siparis_detay" class="btn btn-sm btn-secondary btn-round"
                                style="margin-bottom: 2px;"><i class="bi bi-cart mr-2"></i>Sipariş Detayı
                        </button>
                        @if(!empty($order_status) AND $order_status < 5)
                            @if(!empty(Auth::user()->dealer) AND Auth::user()->dealer->tur == 'kurumsal')
                                <button id="btn_fatura_gorsel_yukle" class="btn btn-sm btn-secondary btn-round"
                                        style="margin-bottom: 2px;"><i
                                        class="bi bi-file-earmark-arrow-up mr-2"></i> Fatura Görseli Yükle
                                </button>
                                <button id="btn_kargo_fisi_yukle" class="btn btn-sm btn-secondary btn-round"
                                        style="margin-bottom: 2px;"><i
                                        class="bi bi-box mr-2"></i> Kargo Fişi Yükle
                                </button>
                            @endif
                        @endif
                        @if(Auth::user()->isAdmin() || Auth::user()->isStaff())
                            @if(!empty($order_status) || $order_status >= 0)
                                @if($order_status == 0)
                                    <button id="btn_toplu_isleme_al" class="btn btn-sm btn-secondary btn-round" style="margin-bottom: 2px;"><i class="bi bi-gear mr-2"></i> İşleme Al
                                    </button>
                                @elseif($order_status == 1)
                                    <button id="btn_toplu_onaya_gonder" class="btn btn-sm btn-secondary btn-round"
                                            style="margin-bottom: 2px;"><i class="bi bi-plus-circle mr-2"></i> Onaya
                                        Gönder
                                    </button>
                                @elseif($order_status == 2)
                                    <button id="btn_toplu_onayla" class="btn btn-sm btn-secondary btn-round"
                                            style="margin-bottom: 2px;"><i class="bi bi-check-circle mr-2"></i>Onayla
                                    </button>
                                @elseif($order_status == 4)
                                    <button id="btn_toplu_kargoya_ver" class="btn btn-sm btn-secondary btn-round"
                                            style="margin-bottom: 2px;"><i class="bi bi-box mr-2"></i> Kargoya Ver
                                    </button>
                                @elseif($order_status == 5)
                                    <button id="btn_onay_resim_goster" class="btn btn-sm btn-secondary btn-round"
                                            style="margin-bottom: 2px;"><i class="bi bi-card-image mr-2"></i> Onay Resim
                                        Göster
                                    </button>
                                    <button id="btn_toplu_siparisi_tamamla" class="btn btn-sm btn-secondary btn-round"
                                            style="margin-bottom: 2px;"><i class="bi bi-check-circle mr-2"></i> Siparişi
                                        Tamamla
                                    </button>
                                @endif
                                @if($order_status >= 5 AND $order_status != 99)
                                    <button id="btn_kargo_durumu" class="btn btn-sm btn-secondary btn-round"
                                            style="margin-bottom: 2px;"><i class="bi bi-box mr-2"></i> Kargo Durumu
                                    </button>
                                @endif
                            @else
                                @if(Auth::user()->isAdmin() || Auth::user()->isStaff())
                                    <button id="btn_toplu_isleme_al" class="btn btn-sm btn-secondary btn-round"
                                            style="margin-bottom: 2px;"><i
                                            class="bi bi-gear mr-2"></i> İşleme Al
                                    </button>
                                @endif
                            @endif
                        @endif
                        @if($order_status == 2)
                            @if(Auth::user()->isAdmin() || Auth::user()->isStaff())
                                <button id="btn_toplu_onayla" class="btn btn-sm btn-secondary btn-round"
                                        style="margin-bottom: 2px;"><i class="bi bi-check-circle mr-2"></i>Onayla
                                </button>
                            @endif
                            <button id="btn_onay_resim_goster" class="btn btn-sm btn-secondary btn-round"
                                    style="margin-bottom: 2px;"><i class="bi bi-card-image mr-2"></i> Onay Resim
                                Göster
                            </button>
                        @endif
                        @if($order_status >= 4 AND (Auth::user()->isAdmin() || Auth::user()->isStaff()))
                            <button id="btn_fatura_gorsel_goster" class="btn btn-sm btn-secondary btn-round"
                                    style="margin-bottom: 2px;"><i
                                    class="bi bi-file-earmark-arrow-up mr-2"></i> Fatura Görseli Göster
                            </button>
                            @if($order_status >= 4)
                                <button id="btn_kargo_fisi_goster" class="btn btn-sm btn-secondary btn-round"
                                        style="margin-bottom: 2px;"><i
                                        class="bi bi-box mr-2"></i> Kargo Fişi Göster
                                </button>
                                <button id="btn_efatura_fatura_al" class="btn btn-sm btn-secondary btn-round"
                                        style="margin-bottom: 2px;"><i class="bi bi-receipt mr-2"></i> E-Fatura Al
                                </button>
                            @endif
                        @endif
                        <button id="btn_toplu_fatura_al" class="btn btn-sm btn-secondary btn-round"
                                style="margin-bottom: 2px;"><i class="bi bi-receipt mr-2"></i> Fatura Al
                        </button>
                        @if($order_status == 2 OR $order_status == 3)
                            @if(Auth::user()->isAdmin() || Auth::user()->isStaff())
                                <button id="btn_toplu_onayla" class="btn btn-sm btn-secondary btn-round"
                                        style="margin-bottom: 2px;"><i class="bi bi-check-circle mr-2"></i>Onayla
                                </button>
                            @endif
                        @endif
                        @if($order_status != 7)
                            <button id="btn_iptal" class="btn btn-sm btn-danger btn-round" style="margin-bottom: 2px;"><i
                                    class="bi bi-trash mr-2"></i> İptal Et
                            </button>
                        @endif
                        {{-- <button id="isleme_al" class="btn btn-sm btn-secondary btn-round"
                                style="margin-bottom: 2px;"><i class="bi bi-receipt mr-2"></i> İşleme Alma
                        </button> --}}
                    </div>


                </div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item"><a href="{{route('tenant.dashboard',['status' => \App\OrderStatus::DAY_HAS_PASSED])}}"
                                            class="nav-link @if($order_status == 90) active @endif">Günü Geçenler<span
                                class="badge @if($order_status == 90) bg-primary text-white @else bg-secondary @endif ms-2 me-2">{{$order_counts[8] ?? 0}}</span></a>
                    </li>
                    <li class="nav-item"><a href="{{route('tenant.dashboard',['status' => \App\OrderStatus::PENDING])}}"
                                            class="nav-link @if($order_status == 0) active @endif">Yeni Sipariş<span
                                class="badge @if($order_status == 0) bg-primary text-white @else bg-secondary @endif ms-2 me-2">{{$order_counts[0] ?? 0}}</span></a>
                    </li>
                    <li class="nav-item"><a href="{{route('tenant.dashboard',['status' => \App\OrderStatus::PREPARING])}}"
                                            class="nav-link @if($order_status == 1) active @endif">Hazırlanıyor<span
                                class="badge @if($order_status == 1) bg-primary text-white @else bg-secondary @endif ms-2 me-2">{{$order_counts[1] ?? 0}}</span></a>
                    </li>
                    <li class="nav-item"><a href="{{route('tenant.dashboard',['status' => \App\OrderStatus::WAITING_FOR_APPROVAL])}}"
                                            class="nav-link @if($order_status == 2) active @endif">Onay Bekliyor<span
                                class="badge @if($order_status == 2) bg-primary text-white @else bg-secondary @endif ms-2 me-2">{{$order_counts[2] ?? 0}}</span></a>
                    </li>
                    <li class="nav-item"><a href="{{route('tenant.dashboard',['status' => \App\OrderStatus::WAITING_FOR_PAYMENT])}}"
                                            class="nav-link @if($order_status == 3) active @endif">Ödeme Bekliyor<span
                                class="badge @if($order_status == 3) bg-primary text-white @else bg-secondary @endif ms-2 me-2">{{$order_counts[3] ?? 0}}</span></a>
                    </li>
                    <li class="nav-item"><a href="{{route('tenant.dashboard',['status' => \App\OrderStatus::APPROVED])}}"
                                            class="nav-link @if($order_status == 4) active @endif">Onaylandı<span
                                class="badge @if($order_status == 4) bg-primary text-white @else bg-secondary @endif ms-2 me-2">{{$order_counts[4] ?? 0}}</span></a>
                    </li>
                    <li class="nav-item"><a href="{{route('tenant.dashboard',['status' => \App\OrderStatus::SHIPPED])}}"
                                            class="nav-link @if($order_status == 5) active @endif">Kargoya Verildi<span
                                class="badge @if($order_status == 5) bg-primary text-white @else bg-secondary @endif ms-2 me-2">{{$order_counts[5] ?? 0}}</span></a>
                    </li>
                    <li class="nav-item"><a href="{{route('tenant.dashboard',['status' => \App\OrderStatus::DELIVERED])}}"
                                            class="nav-link @if($order_status == 6) active @endif">Teslim Edildi<span
                                class="badge @if($order_status == 6) bg-primary text-white @else bg-secondary @endif ms-2 me-2">{{$order_counts[6] ?? 0}}</span></a>
                    </li>
                    <li class="nav-item"><a href="{{route('tenant.dashboard',['status' => \App\OrderStatus::CANCELLED])}}"
                                            class="nav-link @if($order_status == 7) active @endif">İptal Edildi<span
                                class="badge @if($order_status == 7) bg-primary text-white @else bg-secondary @endif ms-2 me-2">{{$order_counts[7] ?? 0}}</span></a>
                    </li>
                </ul>
                <div class="text-wrap">
                    <div class="panel panel-primary tabs-style-2">
                        <div class="panel-body tabs-menu-body main-content-body-right border">
                            <div class="tab-content" style="padding: .8rem">
                                <div class="tab-pane active" id="tab4">
                                    <table id="tbl_orders_list"
                                           class="table table-xs table-striped table-bordered compact dataTable hover"
                                           style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>id</th>
                                            {{-- <th>Seç</th> --}}
                                            <th>Sipariş No</th>
                                            <th>Sipariş Tarihi</th>
                                            <th>Kargo No</th>
                                            <th>Bayi</th>
                                            <th>Müşteri</th>
                                            <th>Ödeme Yöntemi</th>
                                            <th>Fatura Gönderimi</th>
                                            <th>Yurtdışı</th>
                                            <th>Kargo Şirketi</th>
                                            <th>Bayi Komisyonu</th>
                                            <th>{{env('FIRMA_ADI')}} Komisyonu</th>
                                            <th>Sipariş Tutarı</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        datatables_conf = {
            table_id: "tbl_orders_list",
            datasrc: "data",
            ajax_url: "{{route('tenant.order.fetch_by_status',['status' => $order_status])}}",
            /*columnDefs: [ { type: 'date', 'targets': [2] } ],*/
            order: [[2, 'desc']],
            context_menu: {
                detail: (data) => {
                    window.open("/tenant/order/show/" + data.id, '_blank')
                }, islem: (data) => {
                    window.location.replace("/siparisler/isleme-al/" + data.id)
                }, fatura: (data) => {
                    window.open("/siparisler/fatura-al/" + data.id, '_blank')
                }, e_fatura: (data) => {
                    window.open("/siparisler/e-fatura-al/" + data.id, '_blank');
                }, kargo_durumu: (data) => {
                    window.open("/siparisler/kargo-durumu/" + data.id, '_blank')
                },

                menu_options: {
                    detail: {name: "Sipariş Detayı", icon: ""},
                    @if(!empty(Auth::user()) AND Auth::user()->role != 'bayi')
                    /*iptal: {name: "İptal Et", icon: ""},*/
                    fatura: {name: "Fatura Al", icon: ""},
                    @if($order_status >= 4)
                    e_fatura: {name: "E-Fatura Al", icon: ""},
                    @endif
                        @if($order_status > 4)
                    kargo_durumu: {name: "Kargo Durumu", icon: ""},
                    @endif
                    {{-- islem: {name: "İşleme Al", icon: ""}, --}}
                    @endif
                    /*sep1: "---------",
                    vazgec: {name: "Vazgeç", icon:""}*/
                }
            },
            columns: [

                {data: "id", visible: false},
                {
                    data: "order_no",
                    render: function (data, type, row, meta) {
                        return row.order_no ?? "#";
                    }
                }, {
                    data: "date",
                    render: function (data, type, row, meta) {
                        return row.date ?? "#";
                    }
                }, {
                    data: "cargo_barcode",
                    render: function (data, type, row, meta) {
                        if(row.cargo_barcode){
                            return '<span class="badge bg-success text-white">'+row.cargo_barcode+'</span>';
                        }
                        return '<span class="badge bg-light">-</span>';
                    }
                }, {
                    data: "dealer_name",
                    render: function (data, type, row, meta) {
                        return row.dealer?.name ?? "#";
                    }
                }, {
                    data: "customer_name",
                    render: function (data, type, row, meta) {
                        return row.customer_name ?? "#";
                    }
                }, {
                    data: "payment_method",
                    render: function (data, type, row, meta) {
                        return row.payment_method ?? "#";
                    }
                }, {
                    data: "invoice_send",
                    render: function (data, type, row, meta) {
                        if(row.invoice_send){
                            return '<span class="badge bg-success text-white">Gönderilsin</span>';
                        }
                        return '<span class="badge bg-danger text-white">Gönderilmesin</span>';
                    }
                }, {
                    data: "is_abroad",
                    render: function (data, type, row, meta) {
                        return row.is_abroad ? 'Yurtdışı':'Yurtiçi';
                    }
                }, {
                    data: "cargo_firm",
                    render: function (data, type, row, meta) {
                        return row.cargo_firm ?? "#";
                    }
                }, {
                    data: "dealer_commission",
                    render: function (data, type, row, meta) {
                        return row.dealer_commission ?? "#";
                    }
                }, {
                    data: "company_commission",
                    render: function (data, type, row, meta) {
                        return row.company_commission ?? "#";
                    }
                }, {
                    data: "total",
                    render: function (data, type, row, meta) {
                        return row.total ?? "#";
                    }
                },
            ],
            export_file_name: "Sipariş Listesi",
            select: {},
            callback: (table) => {
                $("#btn_toplu_siparisi_tamamla").click(function () {
                    if (table.rows({selected: true}).count() == 0) {
                        toastr.error("Herhangi Bir Kayıt Seçilmedi", 'HATA', {
                            'closeButton': true,
                            'progressBar': true, 'positionClass': 'toastr-top-center',
                        })
                        return
                    }
                    for (let i = 0; i < table.rows({selected: true}).count(); i++) {
                        if (table.rows({selected: true}).data()[i].odeme_yontemi != "kredi_karti") {
                            ajaxProcess('/siparisler/siparisi-tamamla/' + table.rows({selected: true}).data()[i].id, 'get', true)
                        }
                    }
                    setTimeout(function () {
                        window.location.reload();
                    }, 500);
                })
                $("#btn_toplu_kargoya_ver").click(function () {
                    if (table.rows({selected: true}).count() == 0) {
                        toastr.error("Herhangi Bir Kayıt Seçilmedi", 'HATA', {
                            'closeButton': true,
                            'progressBar': true, 'positionClass': 'toastr-top-center',
                        })
                        return
                    }
                    for (let i = 0; i < table.rows({selected: true}).count(); i++) {
                        ajaxProcess('/siparisler/kargoya-ver/' + table.rows({selected: true}).data()[i].id, 'get', false)
                    }
                })
                $("#siparis_dt").click(function () {

                    if (table.rows({selected: true}).count() == 0) {

                        toastr.error("Herhangi Bir Kayıt Seçilmedi", 'HATA', {
                            'closeButton': true,
                            'progressBar': true, 'positionClass': 'toastr-top-center',
                        })
                        return
                    }
                    window.open('/siparisler/detay/' + table.rows({selected: true}).data()[0].id, '_blank')
                })

                $("#btn_toplu_onayla").click(function () {
                    console.log('tt')
                    if (table.rows({selected: true}).count() == 0) {
                        toastr.error("Herhangi Bir Kayıt Seçilmedi", 'HATA', {
                            'closeButton': true,
                            'progressBar': true, 'positionClass': 'toastr-top-center',
                        })
                        return
                    } else {

                        if (table.rows({selected: true}).count() > 1) {
                            toastr.error("Bu işlem İçin Sadece Bir Kayıt Seçebilirsiniz.", 'HATA', {
                                'closeButton': true,
                                'progressBar': true, 'positionClass': 'toastr-top-center',
                            })
                            return
                        } else {
                            if (table.rows({selected: true}).data()[0].odeme_yontemi != "kredi_karti") {
                                ajaxProcess('/siparisler/onayla/' + table.rows({selected: true}).data()[0].id, 'get', true)
                            } else {
                                window.open('/siparisler/kart-ile-ode/' + table.rows({selected: true}).data()[0].id, '_blank');
                                return
                            }
                        }
                    }
                })
                $("#btn_toplu_onaya_gonder").click(function () {

                    if (table.rows({selected: true}).count() == 0) {
                        toastr.error("Herhangi Bir Kayıt Seçilmedi", 'HATA', {
                            'closeButton': true,
                            'progressBar': true, 'positionClass': 'toastr-top-center',
                        })
                        return
                    }

                    if (table.rows({selected: true}).count() == 1) {
                        $("#image_order_id").val(table.rows({selected: true}).data()[0].id)
                        const myModal = new bootstrap.Modal("#mdl_add_order_image", {
                            keyboard: false
                        }).show();
                    } else {
                        toastr.error("Bu işlem İçin Sadece Bir Kayıt Seçebilirsiniz.", 'HATA', {
                            'closeButton': true,
                            'progressBar': true, 'positionClass': 'toastr-top-center',
                        })
                        return
                    }
                })
                $("#btn_toplu_isleme_al").click(function () {

                    if (table.rows({selected: true}).count() == 0) {
                        toastr.error("Herhangi Bir Kayıt Seçilmedi", 'HATA', {
                            'closeButton': true,
                            'progressBar': true, 'positionClass': 'toastr-top-center',
                        })
                        return
                    }

                    for (let i = 0; i < table.rows({selected: true}).count(); i++) {
                        ajaxProcess('/siparisler/siparisleri-isleme-al/' + table.rows({selected: true}).data()[i].id, 'get', true)
                    }
                    setTimeout(function () {
                        window.location.reload();
                    }, 500);
                })

                $("#btn_iptal").click(function () {
                    if (table.rows({selected: true}).count() == 0) {
                        toastr.error("Herhangi Bir Kayıt Seçilmedi", 'HATA', {
                            'closeButton': true,
                            'progressBar': true, 'positionClass': 'toastr-top-center',
                        })
                        return
                    }

                    if (table.rows({selected: true}).count() > 1) {
                        toastr.error("Bu işlem İçin Sadece Bir Kayıt Seçebilirsiniz.", 'HATA', {
                            'closeButton': true,
                            'progressBar': true, 'positionClass': 'toastr-top-center',
                        })
                        return
                    }

                    $("#order_id").val(table.rows({selected: true}).data()[0].id)
                    const myModal = new bootstrap.Modal("#mdl_cancel_order", {
                        keyboard: false
                    }).show();
                })
                $("#btn_islem_aktif").click(function () {
                    if (table.rows({selected: true}).count() == 0) {
                        toastr.error("Herhangi Bir Kayıt Seçilmedi", 'HATA', {
                            'closeButton': true,
                            'progressBar': true, 'positionClass': 'toastr-top-center',
                        })
                        return
                    }

                    if (table.rows({selected: true}).count() > 1) {
                        toastr.error("Bu işlem İçin Sadece Bir Kayıt Seçebilirsiniz.", 'HATA', {
                            'closeButton': true,
                            'progressBar': true, 'positionClass': 'toastr-top-center',
                        })
                        return
                    }
                    ajaxProcess('/siparisler/siparisi-aktif-et/' + table.rows({selected: true}).data()[0].id, 'get', true)
                })
                $("#btn_fatura_gorsel_yukle").click(function () {
                    if (table.rows({selected: true}).count() == 0) {
                        toastr.error("Herhangi Bir Kayıt Seçilmedi", 'HATA', {
                            'closeButton': true,
                            'progressBar': true, 'positionClass': 'toastr-top-center',
                        })
                        return
                    }

                    if (table.rows({selected: true}).count() > 1) {
                        toastr.error("Bu işlem İçin Sadece Bir Kayıt Seçebilirsiniz.", 'HATA', {
                            'closeButton': true,
                            'progressBar': true, 'positionClass': 'toastr-top-center',
                        })
                        return
                    }

                    $("#fatura_gorsel_order_id").val(table.rows({selected: true}).data()[0].id)
                    const myModal = new bootstrap.Modal("#mdl_fatura_gorsel_yukle", {
                        keyboard: false
                    }).show();
                })
                $("#btn_kargo_fisi_yukle").click(function () {
                    if (table.rows({selected: true}).count() == 0) {
                        toastr.error("Herhangi Bir Kayıt Seçilmedi", 'HATA', {
                            'closeButton': true,
                            'progressBar': true, 'positionClass': 'toastr-top-center',
                        })
                        return
                    }

                    if (table.rows({selected: true}).count() > 1) {
                        toastr.error("Bu işlem İçin Sadece Bir Kayıt Seçebilirsiniz.", 'HATA', {
                            'closeButton': true,
                            'progressBar': true, 'positionClass': 'toastr-top-center',
                        })
                        return
                    }

                    $("#kargo_fisi_order_id").val(table.rows({selected: true}).data()[0].id)
                    const myModal = new bootstrap.Modal("#mdl_kargo_fisi_yukle", {
                        keyboard: false
                    }).show();
                })

                $("#btn_siparis_detay").click(function () {
                    if (table.rows({selected: true}).count() == 0) {
                        toastr.error("Herhangi Bir Kayıt Seçilmedi", 'HATA', {
                            'closeButton': true,
                            'progressBar': true, 'positionClass': 'toastr-top-center',
                        })
                        return
                    }

                    if (table.rows({selected: true}).count() > 1) {
                        toastr.error("Bu işlem İçin Sadece Bir Kayıt Seçebilirsiniz.", 'HATA', {
                            'closeButton': true,
                            'progressBar': true, 'positionClass': 'toastr-top-center',
                        })
                        return
                    }
                    window.open('/tenant/order/show/' + table.rows({selected: true}).data()[0].id, '_blank')
                })
                $("#btn_kargo_fisi_goster").click(function () {
                    if (table.rows({selected: true}).count() == 0) {
                        toastr.error("Herhangi Bir Kayıt Seçilmedi", 'HATA', {
                            'closeButton': true,
                            'progressBar': true, 'positionClass': 'toastr-top-center',
                        })
                        return
                    }

                    if (table.rows({selected: true}).count() > 1) {
                        toastr.error("Bu işlem İçin Sadece Bir Kayıt Seçebilirsiniz.", 'HATA', {
                            'closeButton': true,
                            'progressBar': true, 'positionClass': 'toastr-top-center',
                        })
                        return
                    }
                    window.open('/siparisler/kargo-fisi-getir/' + table.rows({selected: true}).data()[0].id, '_blank')
                })
                $("#btn_fatura_gorsel_goster").click(function () {
                    if (table.rows({selected: true}).count() == 0) {
                        toastr.error("Herhangi Bir Kayıt Seçilmedi", 'HATA', {
                            'closeButton': true,
                            'progressBar': true, 'positionClass': 'toastr-top-center',
                        })
                        return
                    }

                    if (table.rows({selected: true}).count() > 1) {
                        toastr.error("Bu işlem İçin Sadece Bir Kayıt Seçebilirsiniz.", 'HATA', {
                            'closeButton': true,
                            'progressBar': true, 'positionClass': 'toastr-top-center',
                        })
                        return
                    }
                    window.open('/siparisler/fatura-getir/' + table.rows({selected: true}).data()[0].id, '_blank')
                })
                $("#btn_onay_resim_goster").click(function () {
                    if (table.rows({selected: true}).count() == 0) {
                        toastr.error("Herhangi Bir Kayıt Seçilmedi", 'HATA', {
                            'closeButton': true,
                            'progressBar': true, 'positionClass': 'toastr-top-center',
                        })
                        return
                    }

                    if (table.rows({selected: true}).count() > 1) {
                        toastr.error("Bu işlem İçin Sadece Bir Kayıt Seçebilirsiniz.", 'HATA', {
                            'closeButton': true,
                            'progressBar': true, 'positionClass': 'toastr-top-center',
                        })
                        return
                    }
                    const myModal = new bootstrap.Modal($('#order-images-' + table.rows({selected: true}).data()[0].id), {
                        keyboard: false
                    }).show();
                })
                $("#btn_efatura_fatura_al").click(function () {
                    if (table.rows({selected: true}).count() == 0) {
                        toastr.error("Herhangi Bir Kayıt Seçilmedi", 'HATA', {
                            'closeButton': true,
                            'progressBar': true, 'positionClass': 'toastr-top-center',
                        })
                        return
                    }

                    if (table.rows({selected: true}).count() > 1) {
                        toastr.error("Bu işlem İçin Sadece Bir Kayıt Seçebilirsiniz.", 'HATA', {
                            'closeButton': true,
                            'progressBar': true, 'positionClass': 'toastr-top-center',
                        })
                        return
                    }
                    window.open("/siparisler/e-fatura-al/" + table.rows({selected: true}).data()[0].id, '_blank');
                })

                $("#btn_toplu_fatura_al").click(function () {
                    if (table.rows({selected: true}).count() == 0) {
                        toastr.error("Herhangi Bir Kayıt Seçilmedi", 'HATA', {
                            'closeButton': true,
                            'progressBar': true, 'positionClass': 'toastr-top-center',
                        })
                        return
                    }
                    let id_param = ""
                    for (let i = 0; i < table.rows({selected: true}).count(); i++) {
                        window.open("/siparisler/fatura-al/" + table.rows({selected: true}).data()[i].id, '_blank');
                        id_param = id_param + table.rows({selected: true}).data()[i].id + ","
                    }
                })
                $("#btn_kargo_durumu").click(function () {
                    if (table.rows({selected: true}).count() == 0) {
                        toastr.error("Herhangi Bir Kayıt Seçilmedi", 'HATA', {
                            'closeButton': true,
                            'progressBar': true, 'positionClass': 'toastr-top-center',
                        })
                        return
                    }

                    if (table.rows({selected: true}).count() > 1) {
                        toastr.error("Bu işlem İçin Sadece Bir Kayıt Seçebilirsiniz.", 'HATA', {
                            'closeButton': true,
                            'progressBar': true, 'positionClass': 'toastr-top-center',
                        })
                        return
                    }

                    let order = table.rows({selected: true}).data()[0]

                    window.open("/siparisler/kargo-durumu/" + order.id, '_blank')

                })
            }
        }

        function getDataFromTable() {
            var table = $('#tbl_orders_list').DataTable();
            console.log(table.rows({selected: true}).data()[0])
        }
    </script>
@endpush
