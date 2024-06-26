<div class="modal fade" tabindex="-1" id="paymentmodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Ödeme Ayarları</h3>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                     aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <form id="payment-form" action="{{route('tenant.settings.update')}}" method="POST" data-ajax="true"
                      novalidate>
                    @csrf
                <div class="form-group row">
                    <div class="col-12 mb-3">
                        <label for="paytr_merchant_id">PayTR Mağaza No</label>
                        <input type="text" class="form-control" id="paytr_merchant_id" name="paytr_merchant_id" value="{{settings('paytr_merchant_id')}}">
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label for="paytr_merchant_key">PayTR Mağaza Parola</label>
                        <input type="text" class="form-control" id="paytr_merchant_key" name="paytr_merchant_key" value="{{settings('paytr_merchant_key')}}">
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label for="paytr_merchant_salt">PayTR Mağaza Gizli Anahtar</label>
                        <input type="text" class="form-control" id="paytr_merchant_salt" name="paytr_merchant_salt" value="{{settings('paytr_merchant_salt')}}">
                    </div>
                    <div class="col-12 mb-3">
                        <span class="separator separator-dashed"></span>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="bank_account_info">Banka Hesap Bilgileri</label>
                        <textarea class="form-control" rows="5" name="bank_account_info">{{settings('bank_account_info')}}</textarea>
                    </div>
                </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Kapat</button>
                <button type="submit" class="btn btn-primary" form="payment-form">Değişiklikleri Kaydet</button>
            </div>
        </div>
    </div>
</div>
