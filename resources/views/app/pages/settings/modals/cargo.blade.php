<div class="modal fade" tabindex="-1" id="cargomodal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Kargo Ayarları</h3>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                     aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <form id="cargo-form" action="{{route('tenant.settings.update')}}" method="POST" data-ajax="true" novalidate>
                    @csrf
                    <div class="form-group row">
                        <h2 class="mt-4 mb-4">Yurtiçi Kargo</h2>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="yurtici_username">Yurtiçi Kargo Kullanıcı Adı</label>
                            <input type="text" class="form-control" id="yurtici_username" name="yurtici_username" value="{{settings('yurtici_username')}}">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="yurtici_password">Yurtiçi Kargo Kullanıcı Şifre</label>
                            <input type="text" class="form-control" id="yurtici_password" name="yurtici_password" value="{{settings('yurtici_password')}}">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="yurtici_tahsilat_username">Yurtiçi Kargo Tahsilatlı Kullanıcı Adı</label>
                            <input type="text" class="form-control" id="yurtici_tahsilat_username"
                                   name="yurtici_tahsilat_username" value="{{settings('yurtici_tahsilat_username')}}">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="yurtici_tahsilat_password">Yurtiçi Kargo Tahsilatlı Kullanıcı Şifre</label>
                            <input type="text" class="form-control" id="yurtici_tahsilat_password"
                                   name="yurtici_tahsilat_password" value="{{settings('yurtici_tahsilat_password')}}">
                        </div>
                        <div class="col-12 mb-3">
                            <span class="separator separator-dashed"></span>
                        </div>
                        <h2 class="mt-4 mb-4">PTT Kargo</h2>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="ptt_username">PTT Kargo Müşteri Numarası</label>
                            <input type="text" class="form-control" id="ptt_username" name="ptt_username" value="{{settings('ptt_username')}}">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="ptt_password">PTT Kargo Kullanıcı Şifre</label>
                            <input type="text" class="form-control" id="ptt_password" name="ptt_password" value="{{settings('ptt_username')}}">
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Kapat</button>
                <button type="submit" class="btn btn-primary" form="cargo-form">Değişiklikleri Kaydet</button>
            </div>
        </div>
    </div>
</div>
