<div class="modal fade" tabindex="-1" id="notificationmodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Bildirim Ayarları</h3>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                     aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <form id="notification-form" action="{{route('tenant.settings.update')}}" method="POST" data-ajax="true"
                      novalidate>
                    @csrf
                    <input name="act" value="notification" hidden>
                    <div class="form-group row">
                        <div class="form-check form-switch form-check-custom mt-2 mb-2">
                            <input class="form-check-input h-20px w-30px" type="checkbox" value="1" name="order_send_admin_notification" id="order_send_admin_notification" @checked(settings('order_send_admin_notification')) />
                            <label class="form-check-label" for="order_send_admin_notification">
                                Yöneticilere Bildirim Gönder
                            </label>
                        </div>
                        <div class="form-check form-switch form-check-custom mt-2 mb-2">
                            <input class="form-check-input h-20px w-30px" type="checkbox" value="1" name="order_send_personnel_notification" id="order_send_personnel_notification" @checked(settings('order_send_personnel_notification')) />
                            <label class="form-check-label" for="order_send_personnel_notification">
                                Personellere Bildirim Gönder
                            </label>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Kapat</button>
                <button type="submit" class="btn btn-primary" form="notification-form">Değişiklikleri Kaydet</button>
            </div>
        </div>
    </div>
</div>
