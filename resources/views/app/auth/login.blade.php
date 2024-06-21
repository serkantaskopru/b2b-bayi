@extends('layouts.guest')
@section('content')
    <!--begin::Wrapper-->
    <div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">

        <form class="form w-100 needs-validation" id="kt_sign_in_form" method="post" action="{{ route('login') }}">
            @csrf
            <!--begin::Heading-->
            <div class="text-center mb-11">
                <!--begin::Title-->
                <h1 class="text-gray-900 fw-bolder mb-3">
                    Tekrar hoş geldin!
                </h1>
                <!--end::Title-->
            </div>
            <!--begin::Heading-->
            <!--begin::Input group--->
            <div class="fv-row mb-8">
                <label class="mb-2">E-posta Adresi</label>
                <!--begin::Email-->
                <input type="text" placeholder="E-posta adresinizi girin..." name="email" autocomplete="off" class="form-control bg-transparent @error('email') is-invalid @enderror"/>

                <!--end::Email-->
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <!--end::Input group--->
            <div class="fv-row mb-3">
                <label class="mb-2">Şifre</label>
                <!--begin::Password-->
                <input type="password" placeholder="Şifrenizi girin..." name="password" autocomplete="off" class="form-control bg-transparent @error('password') is-invalid @enderror"/>
                <!--end::Password-->
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <!--end::Input group--->
            @if (Route::has('password.request'))
                <!--begin::Wrapper-->
                <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                    <div></div>

                    <!--begin::Link-->
                    <a href="{{ route('password.request') }}" class="link-primary">
                        {{ __('Şifremi Unuttum') }}
                    </a>
                    <!--end::Link-->
                </div>
                <!--end::Wrapper-->
            @endif



            <!--begin::Submit button-->
            <div class="d-grid mb-10">
                <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">

                    <!--begin::Indicator label-->
                    <span class="indicator-label">
    {{ __('Giriş Yap') }}</span>
                    <!--end::Indicator label-->

                    <!--begin::Indicator progress-->
                    <span class="indicator-progress">
    Please wait...    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
</span>
                    <!--end::Indicator progress-->        </button>
            </div>
            <!--end::Submit button-->

            <!--begin::Sign up-->
            <div class="text-gray-500 text-center fw-semibold fs-6">
                Hesabınız yok mu?

                <a href="{{ route('register') }}" class="link-primary">
                    Ücretsiz Hesap Oluşturun
                </a>
            </div>
            <!--end::Sign up-->
        </form>

    </div>
    <!--end::Wrapper-->
@endsection
