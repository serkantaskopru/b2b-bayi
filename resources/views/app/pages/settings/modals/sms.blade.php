<div class="modal fade" tabindex="-1" id="smsmodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">SMS Ayarları</h3>
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                     aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
            </div>

            <div class="modal-body">
                <form id="sms-form" action="{{route('tenant.settings.update')}}" method="POST" data-ajax="true"
                      novalidate>
                    @csrf
                    <div class="form-group row">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="netgsm_username">Net Gsm Kullanıcı</label>
                            <input type="text" class="form-control" id="netgsm_username" name="netgsm_username" value="{{settings('netgsm_username')}}">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="netgsm_password">Net Gsm Şifre</label>
                            <input type="text" class="form-control" id="netgsm_password" name="netgsm_password" value="{{settings('netgsm_password')}}">
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Kapat</button>
                <button type="submit" class="btn btn-primary" form="sms-form">Değişiklikleri Kaydet</button>
            </div>
        </div>
    </div>
</div>
