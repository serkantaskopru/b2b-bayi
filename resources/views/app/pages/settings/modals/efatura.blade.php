<div class="modal fade" tabindex="-1" id="efaturamodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">E-Fatura Ayarları</h3>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                     aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <form id="efatura-form" action="{{route('tenant.settings.update')}}" method="POST" data-ajax="true"
                      novalidate>
                    @csrf
                    <div class="form-group row">
                        <div class="col-12 mb-3">
                            <label for="bizimhesap_api_key">Bizimhesap Api Anahtarı</label>
                            <input type="text" class="form-control" id="bizimhesap_api_key" name="bizimhesap_api_key" value="{{settings('bizimhesap_api_key')}}">
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Kapat</button>
                <button type="submit" class="btn btn-primary" form="efatura-form">Değişiklikleri Kaydet</button>
            </div>
        </div>
    </div>
</div>
