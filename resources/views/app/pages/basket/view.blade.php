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
                                                <img src="{{ $basket_product->product->getImage() ?? ""}}" alt="img"
                                                     class="h-60 w-100" style="max-height: 50px; object-fit: contain">
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
                                    <td class="text-center text-lg text-medium">{{number_format($basket_product->product->getPrice(), 2, '.', '')}}
                                        ₺
                                    </td>
                                    <td class="text-center text-lg text-medium">{{number_format($basket_product->price, 2, '.', '')}}
                                        ₺
                                    </td>
                                    <td class="text-center text-lg text-medium">{{number_format($basket_product->dealerCommission() ?? 0, 2, '.', '')}}
                                        ₺
                                    </td>
                                    <td class="text-center text-lg text-medium">{{number_format($basket_product->firmCommission() ?? 0, 2, '.', '')}}
                                        ₺
                                    </td>
                                    <td class="text-center text-lg text-medium">{{number_format($basket_product->getSubTotal() ?? 0, 2, '.', '')}}
                                        ₺
                                    </td>
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
                                <td class="text-center">{{number_format($total_dealer_commision ?? 0, 2, '.', '') }}₺
                                </td>
                                <td class="text-center">{{number_format($total_firm_commision ?? 0, 2, '.', '') }}₺
                                </td>
                                <td class="text-center">{{number_format($total_price ?? 0, 2, '.', '') }} ₺</td>
                                <td class="text-center"></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-5 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('tenant.order.create')}}" method="post" data-ajax="true">
                        @csrf
                        <div class="">
                            <div class="row mb-4">
                                <div class="col-md-6"><span
                                        class="text-danger">*</span>
                                    <label for="payment_method">Ödeme Yöntemi</label>
                                    <select class="form-control form-select form-select-sm" id="payment_method" name="payment_method">
                                        <option value="{{\App\PaymentMethod::PayAtTheDoor}}">Kapıda Ödeme</option>
                                        <option value="{{\App\PaymentMethod::CreditCard}}">Kredi Kartı</option>
                                        <option value="{{\App\PaymentMethod::AccountTransfer}}" selected>Hesabıma Havale / EFT</option>
                                        <option value="{{\App\PaymentMethod::TransferToCompany}}">Firma Hesabına Havale</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <span class="text-danger">*</span>
                                    <label for="cargo_firm">Kargo Firması</label>
                                    <select class="form-control form-select form-select-sm" id="cargo_firm" name="cargo_firm">
                                        <option value="{{\App\CargoFirm::Yurtici}}">Yurtiçi Kargo</option>
                                        <option value="{{\App\CargoFirm::Ptt}}">Ptt Kargo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-12"><span
                                        class="text-danger">*</span>
                                    <label for="customer_name">Müşteri Adı & Soyadı</label>
                                    <input type="text" class="form-control form-control-sm" name="customer_name" id="customer_name" placeholder="Müşteri adını yazın"
                                           required>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-6">
                                    <label for="customer_mail">Müşteri E-Posta</label>
                                    <input type="email" class="form-control form-control-sm" name="customer_mail" id="customer_mail" placeholder="E-Posta">
                                </div>
                                <div class="col-6"><span class="text-danger">*</span>
                                    <label for="customer_phone">Müşteri Telefonu (0 olmadan yazın)</label>
                                    <input type="text" class="form-control form-control-sm" name="customer_phone" id="customer_phone" placeholder="Telefon" minlength="10" maxlength="12"
                                           required>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-12">
                                    <div class="form-group skin skin-flat">
                                        <fieldset class="form-control d-flex align-items-center">
                                            <div class="form-check form-check-custom form-check-solid form-check-sm">
                                                <input class="form-check-input" type="checkbox" value="1" id="is_abroad"
                                                       name="is_abroad" onchange="toggleOptions($(this).val())"/>
                                                <label class="form-check-label" for="is_abroad">
                                                    Yurt Dışı Sipariş
                                                </label>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6"><span
                                        class="text-danger">*</span>
                                    <label>İl</label>
                                    <select class="form-select form-select-sm" id="city" name="city" required></select>
                                </div>
                                <div class="col-md-6"><span
                                        class="text-danger">*</span>
                                    <label>İlçe</label>
                                    <select class="form-select form-select-sm" id="county" name="county" required>
                                        <option>Seçiniz</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6"><span
                                        class="text-danger">*</span> <label>Köy</label>
                                    <select class="form-select form-select-sm" id="district" name="district" required>
                                        <option>Seçiniz</option>
                                    </select>
                                </div>
                                <div class="col-md-6"><span
                                        class="text-danger">*</span>
                                    <label>Mahalle</label>
                                    <select class="form-select form-select-sm" id="neighbourhood" name="neighbourhood" required>
                                        <option>Seçiniz</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-12"><span
                                        class="text-danger">*</span>
                                    <label for="customer_address">Adres</label>
                                    <textarea name="customer_address" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <label for="gift_message">Hediye Mesajı</label>
                                    <textarea name="gift_message" id="gift_message" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="form-group skin skin-flat">
                                        <fieldset class="form-control d-flex align-items-center">
                                            <label class="ckbox">
                                                <input name="invoice_send" type="checkbox" value="1">
                                                <span>Fatura Sipariş İle Birlikte Gönderilsin</span>
                                            </label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            {{--<div class="row mt-2">
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
                            </div>--}}
                        </div>
                        <div class="mt-5">
                            <button class="btn btn-primary pd-x-20" type="submit"><i
                                    class="ki-outline ki-basket text-white fs-3"></i> Sipariş Oluştur
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

        let togg = false;

        function toggleOptions(v) {
            togg = !togg;
            if (togg === true) {
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
