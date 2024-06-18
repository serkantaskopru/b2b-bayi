@extends('app.layouts.app')
@section('header_title', 'Ürün Listesi')
@section('content')
    <form action="{{route('tenant.basket.add_to_basket')}}" method="post" data-ajax="true">
        @csrf
        <input name="product_id" value="{{$product->id}}" hidden>
        <div class="row row-sm mt-2">
            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                <div class="card box-shadow-0">
                    <div class="card-header"><h4 class="card-title mb-1">ÜRÜN GÖRSELLERİ</h4></div>
                    <div class="card-body">
                        <div class="fotorama" data-nav="thumbs">
                            <a
                                href="{{ $product->getImage() ?? '#' }}">
                                <img class="w-100"
                                     src="{{ $product->getImage() ?? '#' }}">
                            </a>

                            @foreach ($product->images as $image)
                                <a
                                    href="{{$image->getSrc() ?? '#'}}"><img
                                        class="w-100"
                                        src="{{$image->getSrc() ?? '#'}}"></a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xl-8 col-md-12 col-sm-12">
                <div class="card box-shadow-0">
                    <div class="card-header"><h4 class="card-title mb-1"><a class="text-primary" target="_blank"
                                                                            href="/urunler/detay/{{$product->product_id}}">{{$product->name}}
                                / {{$product->model}}</a></h4></div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="row">
                                <div class=" col-12 col-md-12 ">
                                    <div class="form-group row">
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label>Stok Adedi</label>
                                            <input type="number" class="form-control" value="{{$product->stock}}" disabled="">
                                        </div>
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label for="fiyat">Ürün Birim Fiyatı</label>
                                            <input type="text" class="form-control" name="fiyat" value="{{number_format($product->getPrice(), 2, '.', '')}}" id="birim-fiyat" disabled="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label for="piece"><span class="danger">*</span>Adet</label>
                                            <input type="number" class="form-control" name="piece" min="1" required="" max="{{$product->stock}}" onkeyup="imposeMinMax(this)">
                                        </div>
                                        <div class="col-12 col-lg-6 mb-3">
                                            <label for="price"><span class="danger">*</span>Adet Satış
                                                Fiyatı</label>
                                            <input type="number" class="form-control" step="0.01" name="price" required="">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="description">Açıklama</label>
                                        <textarea name="description" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="order_note">Sipariş Notu</label>
                                        <textarea name="order_note" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="kupon_kodu">Kupon Kodu ( DISABLED )</label>
                                        <input type="text" name="kupon_kodu" class="form-control"  disabled="">
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-12">
                                            <label for="images">Müşteri İstek Resimleri</label>
                                            <input type="file" class="form-control" id="images" name="images[]" onchange="loadOrderFiles(event)" multiple="">
                                        </div>
                                    </div>
                                    <div class="row table-responsive">
                                        <table id="tbl_order_images" class="table table-xs table-striped table-bordered compact dataTable" style="width: 100%;">
                                            <thead>
                                            <tr>
                                                <th style="width:60px">Resim</th>
                                                <th>Dosya Adı</th>
                                            </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{--<div class="@if(count($secenekler)>0 || count($ozel_secenekler)>0 || count($ozel_secenekler_liste )>0) col-12 col-md-6 @else col-12 col-md-12 @endif">
                                <div class="form-group row">
                                    <div class="col-12 col-lg-6 mb-3">
                                        <label for="stok">Stok Adedi</label>
                                        <input type="number" class="form-control" name="stok"
                                               value="{{$product->quantity}}" disabled>
                                    </div>
                                    <div class="col-12 col-lg-6 mb-3">
                                        <label for="fiyat">Ürün Birim Fiyatı</label>
                                        <input type="text" class="form-control" name="fiyat"
                                               value="{{str_replace('.0000','',$product->fiyat_hesapla())}}"
                                               id="birim-fiyat" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-lg-6 mb-3">
                                        <label for="adet"><span class="danger">*</span>Adet</label>
                                        <input type="number" class="form-control" name="adet" min="1" required
                                               max="{{$product->quantity}}" onkeyup="imposeMinMax(this)">
                                    </div>
                                    <div class="col-12 col-lg-6 mb-3">
                                        <label for="satis_fiyati"><span class="danger">*</span>Adet Satış
                                            Fiyatı</label>
                                        <input type="number" class="form-control" step="0.05" name="satis_fiyati"
                                               required>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="aciklama">Açıklama</label>
                                    <textarea name="aciklama" class="form-control"></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="order_note">Sipariş Notu</label>
                                    <textarea name="order_note" class="form-control"></textarea>
                                </div>
                                <div class="form-group mb-5">
                                    <label for="kupon_kodu">Kupon Kodu</label>
                                    <input type="text" name="kupon_kodu" class="form-control">
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-12">
                                        <label for="istek_resimler"> Müşteri İstek Resimleri</label>
                                        <input type="file" class="form-control" name="istek_resimler[]"
                                               onchange="loadOrderFiles(event)" multiple>
                                    </div>
                                </div>
                                <div class="row table-responsive">
                                    <table id="tbl_order_images"
                                           class="table table-xs table-striped table-bordered compact dataTable"
                                           style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th style="width:60px">Resim</th>
                                            <th>Dosya Adı</th>
                                        </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                            @if(count($secenekler)>0 || count($ozel_secenekler)>0 || count($ozel_secenekler_liste )>0)
                                <div class="col-12 col-md-6">

                                    @foreach($secenekler as $i => $s)
                                        @if($i == 0)
                                            <label for="secenek_ozel">{{$s->name}}</label>
                                        @endif
                                    @endforeach
                                    @if(!empty($secenekler) AND count($secenekler)>0)
                                        <select name="secenek_ozel" class="form-control form-select"
                                                id="secenek-select">
                                            @foreach($secenekler as $s)
                                                <option value="{{$s->id}}" data-price="{{$s->price}}"
                                                        @if(!empty($secenek_no) AND $secenek_no == $s->id) selected @endif>{{$s->value}}
                                                    (+{{$s->price}} TL)
                                                </option>
                                            @endforeach
                                        </select>
                                    @endif
                                    @foreach($ozel_secenekler as $s)
                                        @if($s->type == 'metin_kutusu')
                                            <div class="form-group">
                                                <label for="secenek{{$s->id}}">{{$s->name}}</label>
                                                <textarea class="form-control" name="secenek_alt[{{$s->id}}]"
                                                          id="inputText{{$s->id}}"></textarea>
                                            </div>
                                        @endif
                                    @endforeach
                                    @if(!empty($ozel_secenekler_liste))
                                        @foreach($ozel_secenekler_liste as $s)
                                            <div class="form-group">
                                                <label>{{$s->name ?? ''}}</label>
                                                <select name="secenek_alt[{{$s->id}}]"
                                                        class="form-control form-select">
                                                    <!-- <option value="">Seçiniz</option> -->
                                                    @if(!empty($s->secenekler))
                                                        @foreach($s->secenekler as $scnk)
                                                            <option value="{{ $scnk->name }}">{{$scnk->name ?? ''}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            @endif--}}
                        </div>

                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <button class="btn btn-primary">Sepete Ekle</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
    <script>
        var urun_fiyati = {{str_replace('.0000','',$product->getPrice())}};
        document.addEventListener("DOMContentLoaded", function () {
            $('#secenek-select').on('change', function () {
                var yeni_fiyat = urun_fiyati + parseFloat($(this).find(':selected').attr('data-price'))
                $('#birim-fiyat').val(yeni_fiyat.toFixed(2))
            });
        });
    </script>
@endpush
@push('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">

@endpush
