@extends('app.layouts.app')
@section('header_title', 'Sipariş Detayı')
@section('content')
    <div class="row row-sm justify-content-center">
        <div class="col-lg-8 col-md-12 col-sm-12 row">
            <div class="col-lg-6">
                <div class="card box-shadow-0 mb-5">
                    <div class="card-header"><h4 class="card-title mb-1">SİPARİŞ DETAYI</h4></div>
                    <div class="card-body p-0">
                        <table id="tbl_order_list"
                               class="table table-xs table-striped table-bordered compact dataTable hover"
                               style="width: 100% !important;">
                            <tbody>
                            <tr>
                                <td>Sipariş No</td>
                                <td>{{$order->order_no}}</td>
                            </tr>
                            <tr>
                                <td>Sipariş Tarihi</td>
                                <td>{{$order->created_at}}</td>
                            </tr>
                            <tr>
                                <td>Sipariş Durumu</td>
                                <td>
                                    {{$order->status}}
                                </td>
                            </tr>
                            <tr>
                                <td>Siparişi Veren Bayi</td>
                                <td>{{$order->dealer->name ?? 'bilinmiyor'}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card box-shadow-0 mb-5">
                    <div class="card-header"><h4 class="card-title mb-1">ÖDEME BİLGİLERİ</h4></div>
                    <div class="card-body p-0">
                        <table id="tbl_order_list"
                               class="table table-xs table-striped table-bordered compact dataTable hover"
                               style="width: 100% !important;">
                            <tbody>
                            <tr>
                                <td style="padding-left: 1.5rem !important;width:200px">Ödeme Türü</td>
                                <td>{{$order->getPaymentMethodName() ?? "-"}}</td>
                            </tr>
                            <tr>
                                <td style="padding-left: 1.5rem !important;width:200px">Bayi Komisyonu</td>
                                <td>{{$order->dealer_commission}} ₺</td>
                            </tr>
                            <tr>
                                <td style="padding-left: 1.5rem !important;width:200px">{{env('APP_NAME')}} Komisyonu
                                </td>
                                <td>{{$order->company_commission}} ₺</td>
                            </tr>
                            <tr>
                                <td style="padding-left: 1.5rem !important;width:200px">Toplam Satış Tutarı</td>
                                <td>{{$order->total}} ₺</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card box-shadow-0 mb-5">
                    <div class="card-header"><h4 class="card-title mb-1">TESLİMAT BİLGİLERİ</h4></div>
                    <div class="card-body p-0">
                        <table id="tbl_order_list"
                               class="table table-xs table-striped table-bordered compact dataTable hover"
                               style="width: 100% !important;">
                            <tbody>
                            <tr>
                                <td style="padding-left: 1.5rem !important;width:200px">Müşteri Adı</td>
                                <td>{{$order->customer_name}}</td>
                            </tr>
                            <tr>
                                <td style="padding-left: 1.5rem !important;width:200px">Müşteri Telefon</td>
                                <td>{{$order->customer_phone}}</td>
                            </tr>
                            <tr>
                                <td style="padding-left: 1.5rem !important;width:200px">Adres</td>
                                <td>{{$order->customer_address}}</td>
                            </tr>
                            <tr>
                                <td style="padding-left: 1.5rem !important;width:200px">Kargo Şirketi</td>
                                <td>{{$order->getCargoFirmName() ?? 'bilinmiyor'}}</td>
                            </tr>
                            <tr>
                                <td style="padding-left: 1.5rem !important;width:200px">Kargo Numarası</td>
                                <td>{{$order->cargo_barcode ?? "Kargoya verilmemiş"}}</td>
                            </tr>
                            {{--<tr>
                                <td style="padding-left: 1.5rem !important;width:200px">Kargo Takip Link</td>
                                <td>{{$order->takip_link ?? "-"}}</td>
                            </tr>--}}
                            <tr>
                                <td style="padding-left: 1.5rem !important;width:200px">Hediye Mesajı</td>
                                <td><strong>{{$order->gift_message}}</strong></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card mb-5">
                    <div class="card-header">
                        <h4 class="card-title">ÜRÜN BİLGİLERİ</h4>
                    </div>
                    <div class="card-body p-0">
                        @if(!empty($order->products))
                            @foreach($order->products as $order_product)
                                <div class="mb-15 bg-white">
                                    <table id="tbl_order_list"
                                           class="table table-xs table-striped table-bordered compact dataTable hover mb-4"
                                           style="width: 100% !important;">
                                        <tbody>
                                        <tr>
                                            <td rowspan="11" style="width:80px"><img
                                                    style="max-height:80px;max-width:80px"
                                                    src="{{$order_product->product->getImage()}}">
                                            </td>
                                            <td style="padding-left: 1.5rem !important;width:200px">Ürün Kodu/Adı
                                            </td>
                                            <td>{{$order_product->product->model}}
                                                / {{$order_product->name}}</td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left: 1.5rem !important;width:200px">Ürün Birim
                                                Fiyatı
                                            </td>
                                            <td>{{$order_product->price}} ₺</td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left: 1.5rem !important;width:200px">Bayi Birim Satış
                                                Fiyatı
                                            </td>
                                            <td>{{$order_product->price}} ₺</td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left: 1.5rem !important;width:200px">Adet</td>
                                            <td>{{$order_product->piece}}</td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left: 1.5rem !important;width:200px">Toplam Satış
                                                Fiyatı
                                            </td>
                                            <td>{{$order_product->total_sales_price}} ₺</td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left: 1.5rem !important;width:200px">Bayi Komisyon
                                            </td>
                                            <td>{{$order_product->dealer_commission}} ₺</td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left: 1.5rem !important;width:200px">{{env('APP_NAME')}}
                                                Komisyon
                                            </td>
                                            <td>{{$order_product->company_commission}} ₺</td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left: 1.5rem !important;width:200px">Açıklama</td>
                                            <td><strong>{{$order_product->description}}</strong></td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left: 1.5rem !important;width:200px">Not</td>
                                            <td><strong>{{$order_product->product_note}}</strong></td>
                                        </tr>

                                        <tr>
                                            <td style="padding-left: 1.5rem !important;width:200px">Ürün Seçenekleri
                                            </td>
                                            <td>
                                                <table class="table table-xs table-striped table-bordered compact"
                                                       style="width: 100% !important;">
                                                    <tbody>
                                                    @if(!empty($order_product->secenekler) && count($order_product->secenekler) > 0)
                                                        @foreach($order_product->secenekler as $secenek)
                                                            <tr>
                                                                <td style="padding-left: .5rem !important;">{{$secenek->secenek->name ?? ''}}</td>
                                                                <td>{{$secenek->deger ?? ''}}</td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        -
                                                    @endif
                                                    @if(!empty($order_product->ozel_secenekler) && count($order_product->ozel_secenekler) > 0)
                                                        @foreach($order_product->ozel_secenekler as $secenek)
                                                            <tr>
                                                                @if(!empty($secenek->ust_secenek))
                                                                    <td style="padding-left: .5rem !important;">{{$secenek->ust_secenek->name ?? ''}}</td>
                                                                @else
                                                                    <td style="padding-left: .5rem !important;">{{$secenek->secenek->name ?? ''}}</td>
                                                                @endif
                                                                <td>{{$secenek->deger ?? ''}}</td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        -
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left: 1.5rem !important;width:200px">Müşteri İstek
                                                Resimleri
                                            </td>
                                            <td>
                                                @if(!empty($order_product->images) && count($order_product->images)>0)
                                                    <div class="row mt-5">
                                                        <div class="col-12">
                                                            <h5>Müşteri İstek Resimleri</h5>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="row">
                                                                @foreach($order_product->images as $i => $image)
                                                                    <div class="col-12 col-lg-3">
                                                                        <a href="/storage/{{$image}}"
                                                                           data-fancybox="product{{$i}}">
                                                                            <img
                                                                                src="/storage/{{$image}}"
                                                                                style="max-width: 100%;">
                                                                        </a>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            @if(!empty($order->transactions) && count($order->transactions) > 0)
            <div class="col-12">
                <div class="card box-shadow-0 mb-5">
                    <div class="card-header"><h4 class="card-title mb-1">CARİ İŞLEMLER</h4></div>
                    <div class="card-body p-0">
                        <table id="tbl_order_list"
                               class="table table-xs table-striped table-bordered compact dataTable hover"
                               style="width: 100% !important;">
                            <thead>
                            <th>İşlem Tutarı</th>
                            <th>İşlem Tarihi</th>
                            <th>İşlem Açıklaması</th>
                            </thead>
                            <tbody>
                                @foreach($order->transactions as $transaction)
                                    <tr>
                                        <td>{{$transaction->amount}} TL</td>
                                        <td>{{$transaction->created_at}}</td>
                                        <td>{{$transaction->description}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection
@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
@endpush
@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css"/>
@endpush
