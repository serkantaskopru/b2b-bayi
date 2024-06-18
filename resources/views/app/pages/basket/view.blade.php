@extends('app.layouts.app')
@section('header_title', 'Ürün Listesi')
@section('content')
    <div class="row">
        <div class="col-xl-7 col-md-12">
            <div class="card">
                <div class="card-body"> <!-- Shopping Cart-->
                    <div class="product-details table-responsive text-nowrap">
                        <table class="table table-bordered table-striped mb-0 text-nowrap table-fit">
                            <thead>
                            <tr>
                                <th class="text-start">Ürün</th>
                                <th>Adet</th>
                                <th>Birim Fiyatı</th>
                                <th>Bayi Fiyatı</th>
                                <th>Bayi Komisyon</th>
                                <th>Firma Komisyon</th>
                                <th class="w-150 w-auto">Toplam</th>
                                <th class="w-150 w-auto"></th>
                            </tr>
                            </thead>
                            <tbody class="custom-cls-no-br">
                            @foreach($products as $basket_product)
                                <tr>
                                    <td width="200" style="min-width: 300px">
                                        <div class="row">
                                            <div class="col-4">
                                                <img src="{{ $basket_product->product->getImage() ?? ""}}" alt="img" class="h-60 w-100" style="max-height: 50px; object-fit: contain">
                                            </div>
                                            <div class="col-8">
                                                <p style="word-wrap: break-word;white-space: break-spaces;">{{$basket_product->product->name}}</p>
                                                {{--@if(!empty($urun->secenek->secenek))
                                                    <p style="word-wrap: break-word;white-space: break-spaces;"><span style="font-weight: 600">{{$urun->secenek->secenek->value ?? ''}} - ({{$urun->secenek->secenek->price ?? ''}} TL)</span></p>
                                                @endif--}}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        {{$basket_product->piece}}
                                    </td>
                                    <td class="text-center text-lg text-medium">{{$basket_product->product->getPrice()}}₺</td>
                                    <td class="text-center text-lg text-medium">{{$basket_product->price}} ₺</td>
                                    <td class="text-center text-lg text-medium">{{$basket_product->dealerCommission()}} ₺</td>
                                    <td class="text-center text-lg text-medium">{{$basket_product->firmCommission()}} ₺</td>
                                    <td class="text-center text-lg text-medium">{{$basket_product->getSubTotal()}} ₺</td>
                                    <td class="text-center">
                                        <button class="btn btn-danger btn-icon text-white w-35px h-35px"
                                                onclick="ajaxProcess('{{route('tenant.basket.destroy',$basket_product->id)}}', 'get', true)">
                                            <i
                                                class="ki-outline ki-basket text-white fs-6"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                                <td class="text-center">Toplam bayi tutar ₺</td>
                                <td class="text-center">Toplam firma tutar ₺</td>
                                <td class="text-center">Toplam tutar ₺</td>
                                <td class="text-center"></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-5 col-md-12">
            <div class="card" data-select2-id="9">
                <div class="card-body" data-select2-id="8">
                    <div class="main-content-label mg-b-5">Teslimat Bilgileri</div>
                    <form action="#" method="post" data-ajax="true"
                          class="parsley-style-1" id="selectForm2"
                          name="selectForm2" novalidate="" data-select2-id="selectForm2">
                        <div class="">
                            <div class="row mg-b-20">
                                <div class="col-md-6"><span
                                        class="tx-danger">*</span>
                                    <label>Ödeme Yöntemi</label>
                                    <select class="form-control form-select" name="odeme_yontemi">
                                        <option value="kapida_odeme">Kapıda Ödeme</option>
                                        <option value="kredi_karti">Kredi Kartı</option>
                                        <option value="hesabima_havale" selected>Havale / EFT</option>
                                        <option value="firmaya_havale">{{env('FIRMA_ADI')}} Hesabına Havale</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                    <span class="tx-danger">*</span><label>Kargo Firması</label>
                                    <select class="form-control form-select" name="kargo_firmasi">
                                        {{--@foreach($kargo_firmalari as $firma)
                                            <option value="{{$firma->id}}">{{$firma->ad}}</option>
                                        @endforeach--}}
                                    </select>
                                </div>
                            </div>
                            <div class="row mg-b-20">
                                <div class="col-12"><span
                                        class="tx-danger">*</span>
                                    <label>Müşteri</label>
                                    <input type="text" class="form-control" name="musteri" placeholder="Müşteri"
                                           required>
                                </div>
                            </div>
                            <div class="row mg-b-20">
                                <div class="col-6">
                                    <label>E-Posta</label>
                                    <input type="email" class="form-control" name="email" placeholder="E-Posta"
                                           required>
                                </div>
                                <div class="col-6"><span class="tx-danger">*</span>
                                    <label>Telefon (0 olmadan yazın)</label>
                                    <input type="tel" class="form-control" name="telefon" placeholder="Telefon"
                                           required>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="form-group skin skin-flat">
                                        <fieldset class="form-control d-flex align-items-center">
                                            <label class="ckbox">
                                                <input data-parsley-class-handler="#cbWrapper2"
                                                       data-parsley-errors-container="#cbErrorContainer2"
                                                       data-parsley-mincheck="2" name="yurt_disi"
                                                       onchange="toggleOptions($(this).val())"
                                                       type="checkbox"> <span>Yurt Dışı Sipariş</span> </label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="row mg-b-20">
                                <div class="col-md-6"><span
                                        class="tx-danger">*</span>
                                    <label>İl</label>
                                    <select class="form-select" id="city" name="city">
                                        {{--@foreach($iller as $il)
                                            <option value="{{$il->id}}">{{$il->il_adi}}</option>
                                        @endforeach--}}
                                    </select>
                                </div>
                                <div class="col-md-6"><span
                                        class="tx-danger">*</span>
                                    <label>İlçe</label>
                                    <select class="form-select" id="county" name="county">
                                        <option>Seçiniz</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mg-b-20">
                                <div class="col-md-6"><span
                                        class="tx-danger">*</span>
                                    <label>Köy</label>
                                    <select class="form-select" id="district" name="district">
                                        <option>Seçiniz</option>
                                    </select>
                                </div>
                                <div class="col-md-6"><span
                                        class="tx-danger">*</span>
                                    <label>Mahalle</label>
                                    <select class="form-select" id="neighbourhood" name="neighbourhood">
                                        <option>Seçiniz</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mg-b-20">
                                <div class="col-md-12"><span
                                        class="tx-danger">*</span>
                                    <label>Adres</label>
                                    <textarea name="adres" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row mg-b-20">
                                <div class="col-md-12">
                                    <label>Hediye Mesajı</label>
                                    <textarea name="hediye_mesaji" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="form-group skin skin-flat">
                                        <fieldset class="form-control d-flex align-items-center">
                                            <label class="ckbox">
                                                <input data-parsley-class-handler="#cbWrapper2"
                                                       data-parsley-errors-container="#cbErrorContainer2"
                                                       data-parsley-mincheck="2" name="fatura_siparis_ile_gonder"
                                                       type="checkbox"> <span>Fatura Sipariş İle Birlikte Gönderilsin</span>
                                            </label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="form-group skin skin-flat">
                                        <fieldset class="form-control d-flex align-items-center">
                                            <label class="ckbox">
                                                <input data-parsley-class-handler="#cbWrapper2"
                                                       data-parsley-errors-container="#cbErrorContainer2"
                                                       data-parsley-mincheck="2" name="muhatap_musteri"
                                                       type="checkbox"> <span>Siparişin Muhatabı Müşteridir</span>
                                            </label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="form-group skin skin-flat">
                                        <fieldset class="form-control d-flex align-items-center">
                                            <label class="ckbox">
                                                <input data-parsley-class-handler="#cbWrapper2"
                                                       data-parsley-errors-container="#cbErrorContainer2"
                                                       data-parsley-mincheck="2" name="musteri_sms_gitsin"
                                                       type="checkbox"> <span>Müşteriye sms bilgilendirmesi gönderilsin</span>
                                            </label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <button class="btn btn-primary pd-x-20" type="submit"><i
                                    class="bi bi-bag-check fs-1 me-2"></i> Sipariş Oluştur
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        var city_select = document.getElementById('city')
        $.ajax({
            url: '{{route('tenant.geozone.cities')}}',
            type: 'GET',
            contentType: "application/json",
            dataType: "JSON",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data, status, request) {
                for (var i = 0; i < data.length; i++) {
                    item = data[i];
                    var opt = document.createElement("option");
                    opt.value = item.id;
                    opt.innerHTML = item.name;
                    city_select.appendChild(opt);
                }
                $("#city").select2();
                $("#city").trigger('change');
            },
            error: function (error) {
                Notification('error', error.responseJSON.message);
            }
        })

        var togg = false;

        function toggleOptions(v) {
            togg = !togg;
            if (togg == true) {
                $("#city").attr('disabled', true)
                $("#county").attr('disabled', true)
                $("#district").attr('disabled', true)
                $("#neighbourhood").attr('disabled', true)
            } else {
                $("#city").attr('disabled', false)
                $("#county").attr('disabled', false)
                $("#district").attr('disabled', false)
                $("#neighbourhood").attr('disabled', false)
            }
        }

        $(function () {
            $("#city").select2();
            $("#city").change(function () {
                var district_select = document.getElementById('county')
                $(district_select)
                    .find('option')
                    .remove()
                    .end();
                $.ajax({
                    url: '{{route('tenant.geozone.counties')}}',
                    type: 'GET',
                    data: {'city_id': this.value},
                    contentType: "application/json",
                    dataType: "JSON",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data, status, request) {
                        for (var i = 0; i < data.length; i++) {
                            item = data[i];
                            var opt = document.createElement("option");
                            opt.value = item.id;
                            opt.innerHTML = item.name;
                            district_select.appendChild(opt);
                        }
                        $("#county").select2();
                        $("#county").trigger('change');
                        /*$("#district").trigger('change');
                        $("#neighbourhood").trigger('change');*/
                    },
                    error: function (error) {
                        Notification('error', error.responseJSON.message);
                    }
                })
            });
            /*$("#city").trigger('change');*/
            $("#county").change(function () {
                var district_select = document.getElementById('district')
                $(district_select)
                    .find('option')
                    .remove()
                    .end();
                $.ajax({
                    url: '{{route('tenant.geozone.districts')}}',
                    type: 'GET',
                    data: {'county_id': this.value},
                    contentType: "application/json",
                    dataType: "JSON",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data, status, request) {
                        for (var i = 0; i < data.length; i++) {
                            item = data[i];
                            var opt = document.createElement("option");
                            opt.value = item.id;
                            opt.innerHTML = item.name;
                            district_select.appendChild(opt);
                        }
                        $("#district").select2();
                        $("#district").trigger('change');
                       /* $("#neighbourhood").trigger('change');*/
                    },
                    error: function (error) {
                        Notification('error', error.responseJSON.message);
                    }
                })
            });
            /*setTimeout(function () {
                $("#county").trigger('change');
            }, 1000)*/

            $("#district").change(function () {
                var district_select = document.getElementById('neighbourhood')
                $(district_select)
                    .find('option')
                    .remove()
                    .end();
                $.ajax({
                    url: '{{route('tenant.geozone.neighbourhoods')}}',
                    type: 'GET',
                    data: {'district_id': this.value},
                    contentType: "application/json",
                    dataType: "JSON",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data, status, request) {
                        for (var i = 0; i < data.length; i++) {
                            item = data[i];
                            var opt = document.createElement("option");
                            opt.value = item.id;
                            opt.innerHTML = item.name;
                            district_select.appendChild(opt);
                        }
                        $("#neighbourhood").select2();
                        /*$("#neighbourhood").trigger('change');*/
                    },
                    error: function (error) {
                        Notification('error', error.responseJSON.message);
                    }
                })
            });
            /*setTimeout(function () {
                $("#district").trigger('change');
            }, 1500)*/

        });
    </script>
@endpush
@push('style')
@endpush
