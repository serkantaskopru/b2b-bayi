@extends('app.layouts.app')
@section('header_title', Str::limit($personnel->name ?? '#', 64) . ' - Personeli Düzenle')
@section('content')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('tenant.personnel.update', $personnel->id)}}" method="post" data-ajax="true">
                        @csrf
                        <div class="row row-sm">
                            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="name">Personel Adı</label>
                                    <input type="text" class="form-control" name="name" value="{{$personnel->name}}" placeholder="Personel adını yazın">
                                </div>
                            </div>
                            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="email">E-Posta</label>
                                    <input type="email" class="form-control" name="email" value="{{$personnel->email}}" placeholder="E-posta adresini yazın">
                                </div>
                            </div>
                            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="password">Şifre</label>
                                    <input type="password" class="form-control" name="password" value="{{old('password')}}" placeholder="Şifre yazın" minlength="6">
                                </div>
                            </div>
                            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="password_confirmation">Şifre Tekrarı</label>
                                    <input type="password" class="form-control" name="password_confirmation" value="{{old('password_confirmation')}}" placeholder="Şifreyi tekrar yazın" minlength="6">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-10">
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-sm btn-primary">Güncelle</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
@endpush
@push('style') @endpush
