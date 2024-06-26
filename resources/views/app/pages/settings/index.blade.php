@extends('app.layouts.app')
@section('header_title', 'Ayarlar')
@section('content')
    <div class="row">
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card mb-5">
                <div class="card-body">
                    <div class="d-flex flex-column">
                        <img width="64" src="https://setap.com.tr/wp-content/uploads/2021/07/e-fatura_345x345.png">
                        <h2 class="mt-4 mb-4">E-Fatura Ayarları</h2>
                        <div class="text-2xl mb-4">
                            Able Pro - Boost your project's visual appeal and functionality with our Bootstrap 5 dashboard template.
                        </div>
                        <div class="">
                            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#efaturamodal">Görüntüle</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card mb-5">
                <div class="card-body">
                    <div class="d-flex flex-column">
                        <img width="64" src="https://cdn-icons-png.freepik.com/256/552/552486.png?semt=ais_hybrid">
                        <h2 class="mt-4 mb-4">Mail & İletişim Ayarları</h2>
                        <div class="text-2xl mb-4">
                            Able Pro - Boost your project's visual appeal and functionality with our Bootstrap 5 dashboard template.
                        </div>
                        <div class="">
                            <a href="#" class="btn btn-light">Görüntüle</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card mb-5">
                <div class="card-body">
                    <div class="d-flex flex-column">
                        <img width="64" src="https://d1nhio0ox7pgb.cloudfront.net/_img/g_collection_png/standard/512x512/sms.png">
                        <h2 class="mt-4 mb-4">SMS Ayarları</h2>
                        <div class="text-2xl mb-4">
                            Able Pro - Boost your project's visual appeal and functionality with our Bootstrap 5 dashboard template.
                        </div>
                        <div class="">
                            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#smsmodal">Görüntüle</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card mb-5">
                <div class="card-body">
                    <div class="d-flex flex-column">
                        <img width="64" src="https://play-lh.googleusercontent.com/xFGKpoda9WjWZT-EKNu5YwyFd3qLlox0zkXLBNqFPYTxwjsIS3QYjRKQFI_csKDUT96K">
                        <h2 class="mt-4 mb-4">Ödeme Ayarları</h2>
                        <div class="text-2xl mb-4">
                            Able Pro - Boost your project's visual appeal and functionality with our Bootstrap 5 dashboard template.
                        </div>
                        <div class="">
                            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#paymentmodal">Görüntüle</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card mb-5">
                <div class="card-body">
                    <div class="d-flex flex-column">
                        <img width="64" src="https://www.mutluadim.com/image/catalog/simge/kargo-icon.jpg">
                        <h2 class="mt-4 mb-4">Kargo Ayarları</h2>
                        <div class="text-2xl mb-4">
                            Able Pro - Boost your project's visual appeal and functionality with our Bootstrap 5 dashboard template.
                        </div>
                        <div class="">
                            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#cargomodal">Görüntüle</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card mb-5">
                <div class="card-body">
                    <div class="d-flex flex-column">
                        <img width="64" src="https://w7.pngwing.com/pngs/537/580/png-transparent-bell-notification-communication-information-icon.png">
                        <h2 class="mt-4 mb-4">Bildirim Ayarları</h2>
                        <div class="text-2xl mb-4">
                            Able Pro - Boost your project's visual appeal and functionality with our Bootstrap 5 dashboard template.
                        </div>
                        <div class="">
                            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#notificationmodal">Görüntüle</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card mb-5">
                <div class="card-body">
                    <div class="d-flex flex-column">
                        <img width="64" src="https://cdn.sendcloud.com/app-store-media/images/app-logos/6945cc6e-c9c9-48c1-b916-726a30c8fb31.png">
                        <h2 class="mt-4 mb-4">Opencart Ayarları</h2>
                        <div class="text-2xl mb-4">
                            Able Pro - Boost your project's visual appeal and functionality with our Bootstrap 5 dashboard template.
                        </div>
                        <div class="">
                            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#opencartmodal">Görüntüle</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('app.pages.settings.modals.efatura')
    @include('app.pages.settings.modals.opencart')
    @include('app.pages.settings.modals.cargo')
    @include('app.pages.settings.modals.payment')
    @include('app.pages.settings.modals.sms')
    @include('app.pages.settings.modals.notification')

@endsection
@push('script')
@endpush
@push('style')
@endpush
