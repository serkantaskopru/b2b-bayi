<div class="modal fade" tabindex="-1" id="opencartmodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Opencart Ayarları</h3>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                     aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <form id="opencart-form" action="{{route('tenant.settings.update')}}" method="POST" data-ajax="true"
                      novalidate>
                    @csrf
                    <input name="act" value="opencart" hidden>
                <div class="form-group row">
                    <div class="col-12 mb-3">
                        <label for="opencart_url">API URL</label>
                        <input type="text" class="form-control" id="opencart_url" name="opencart_url" value="{{settings('opencart_url')}}">
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label for="opencart_username">Kullanıcı adı</label>
                        <input type="text" class="form-control" id="opencart_username" name="opencart_username" value="{{settings('opencart_username')}}">
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label for="opencart_password">Şifre</label>
                        <input type="text" class="form-control" id="opencart_password" name="opencart_password" value="{{settings('opencart_password')}}">
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <button type="button" class="btn btn-light">Bağlantıyı sına</button>
                    </div>
                    <div class="col-12 mb-3">
                        <span class="separator separator-dashed"></span>
                    </div>
                    <div class="col-12 mb-3">
                        <label>Aktarım ayarlarını yönetin</label>
                        <div class="form-check form-switch form-check-custom mt-2 mb-2">
                            <input class="form-check-input h-20px w-30px" type="checkbox" value="1" name="opencart_products" id="opencart_products" @checked(settings('opencart_products')) />
                            <label class="form-check-label" for="opencart_products">
                                Ürünleri aktar
                            </label>
                        </div>
                        <div class="form-check form-switch form-check-custom mt-2 mb-2">
                            <input class="form-check-input h-20px w-30px" type="checkbox" value="1" name="opencart_product_options" id="opencart_product_options" @checked(settings('opencart_product_options')) />
                            <label class="form-check-label" for="opencart_product_options">
                                Ürün Seçeneklerini aktar
                            </label>
                        </div>
                        <div class="form-check form-switch form-check-custom mb-2">
                            <input class="form-check-input h-20px w-30px" type="checkbox" value="1" name="opencart_categories" id="opencart_categories" @checked(settings('opencart_categories')) />
                            <label class="form-check-label" for="opencart_categories">
                                Kategorileri aktar
                            </label>
                        </div>
                        <div class="form-check form-check-custom form-check-solid mb-2">
                            <input class="form-check-input h-20px w-20px" type="radio" value="1" name="opencart_transfer_type" id="opencart_transfer_type" @checked(settings('opencart_transfer_type') == 1) />
                            <label class="form-check-label" for="opencart_transfer_type">
                                Sadece sistemde bulunmayan verileri aktar
                            </label>
                        </div>
                        <div class="form-check form-check-custom form-check-solid mb-2">
                            <input class="form-check-input h-20px w-20px" type="radio" value="2" name="opencart_transfer_type" id="opencart_transfer_type_2" @checked(settings('opencart_transfer_type') == 2) />
                            <label class="form-check-label" for="opencart_transfer_type_2">
                                Opencart üzerinden gelen verileri mevcut verilerin üzerine yaz
                            </label>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label>Aktarım tamamlanınca yapılacak işlemler</label>
                        <div class="form-check form-switch form-check-custom mt-2 mb-2">
                            <input class="form-check-input h-20px w-30px" type="checkbox" value="1" name="opencart_send_notification" id="opencart_send_notification" @checked(settings('opencart_send_notification')) />
                            <label class="form-check-label" for="opencart_send_notification">
                                Bildirim Gönder
                            </label>
                        </div>
                        <div class="form-check form-switch form-check-custom mt-2 mb-2">
                            <input class="form-check-input h-20px w-30px" type="checkbox" value="1" name="opencart_send_sms" id="opencart_send_sms" @checked(settings('opencart_send_sms')) />
                            <label class="form-check-label" for="opencart_send_sms">
                                SMS Gönder
                            </label>
                        </div>
                        <div class="form-check form-switch form-check-custom mt-2 mb-2">
                            <input class="form-check-input h-20px w-30px" type="checkbox" value="1" name="opencart_send_mail" id="opencart_send_mail" @checked(settings('opencart_send_mail')) />
                            <label class="form-check-label" for="opencart_send_mail">
                                Email Gönder
                            </label>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label>Sipariş aşamasında yapılacak işlemler</label>
                        <div class="form-check form-switch form-check-custom mt-2 mb-2">
                            <input class="form-check-input h-20px w-30px" type="checkbox" value="1" name="opencart_order_stock_update" id="opencart_order_stock_update" @checked(settings('opencart_order_stock_update')) />
                            <label class="form-check-label" for="opencart_order_stock_update">
                                Ürün stoğunu opencartta eşzamanlı düş
                            </label>
                        </div>
                        <div class="form-check form-switch form-check-custom mt-2 mb-2">
                            <input class="form-check-input h-20px w-30px" type="checkbox" value="1" name="opencart_order_send_sms" id="opencart_order_send_sms" @checked(settings('opencart_order_send_sms')) />
                            <label class="form-check-label" for="opencart_order_send_sms">
                                SMS Gönder
                            </label>
                        </div>
                        <div class="form-check form-switch form-check-custom mt-2 mb-2">
                            <input class="form-check-input h-20px w-30px" type="checkbox" value="1" name="opencart_order_send_email" id="opencart_order_send_email" @checked(settings('opencart_order_send_email')) />
                            <label class="form-check-label" for="opencart_order_send_email">
                                Email Gönder
                            </label>
                        </div>
                    </div>
                </div>
            </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Kapat</button>
                <button type="submit" class="btn btn-primary" form="opencart-form">Değişiklikleri Kaydet</button>
            </div>
        </div>
    </div>
</div>
