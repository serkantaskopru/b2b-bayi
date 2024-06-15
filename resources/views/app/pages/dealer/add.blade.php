@extends('app.layouts.app')
@section('header_title', 'Bayi Ekle')
@section('content')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('tenant.dealer.store')}}" data-ajax="true">
                        @csrf
                        <div class="row row-sm">
                            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="name">Adı</label>
                                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-lg-6">
                                        <label for="dealer_group_id">Bayi Grubu</label>
                                        <select name="dealer_group_id" class="form-control form-select"
                                                data-control="select2" data-placeholder="Bir bayi grubu seçin"
                                                data-hide-search="true">
                                            @foreach($groups as $group)
                                                <option value="{{ $group->id }}" @if(!empty(old('dealer_group_id')) && old('dealer_group_id') == $group->id) selected @endif>{{ $group->name ?? '#' }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="payment_date">Ödeme Tarihi</label>
                                        <input type="date" class="form-control" name="payment_date"
                                               value="{{old('payment_date')}}">
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-12 col-lg-6">
                                        <label for="tax_office">Vergi Dairesi</label>
                                        <input type="text" class="form-control" name="tax_office"
                                               value="{{old('tax_office')}}">
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="tax_number">Vergi Numarası</label>
                                        <input type="text" class="form-control" name="tax_number"
                                               value="{{old('tax_number')}}">
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-12 col-lg-6">
                                        <label for="iban">Iban Numarası</label>
                                        <input type="text" class="form-control" name="iban" value="{{old('iban')}}">
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="identity_number">TC Kimlik Numarası</label>
                                        <input type="text" class="form-control" name="identity_number"
                                               placeholder="11111111111"
                                               value="{{old('identity_number') ?? '11111111111'}}">
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="notes">Bayi Notu</label>
                                    <textarea name="notes" class="form-control">{{old('notes')}}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                                <div class="form-group row">
                                    <div class="col-12 col-lg-6">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" value="{{old('email')}}">
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="phone">Telefon</label>
                                        <input type="text" class="form-control" name="phone" value="{{old('phone')}}">
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="address">Adres</label>
                                    <textarea name="address" class="form-control">{{old('address')}}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="username">Kullanıcı Adı</label>
                                    <input type="text" class="form-control" name="username" value="{{old('username')}}">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="password">Şifre</label>
                                    <input type="password" class="form-control" name="password" minlength="6">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="password_confirmation">Şifre Tekrarı</label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                           minlength="6">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-10">
                            {{--<div class="col-12">
                                <h6 class="h6"><strong>Yetkiler</strong></h6>
                            </div>
                            <hr>
                            @foreach($permissions as $permission)
                                <div class="col-12 col-md-4 col-lg-3 mb-3">
                                    <div class="form-check form-switch form-check-custom form-check-solid">
                                        <input class="form-check-input h-20px w-30px" type="checkbox" value="1"
                                               name="permission[{{$permission->slug}}]"
                                               id="perm-{{$permission->id}}"/>
                                        <label class="form-check-label" for="perm-{{$permission->id}}">
                                            {{$permission->name ?? ""}}
                                        </label>
                                    </div>
                                </div>
                            @endforeach--}}
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-sm btn-primary">Kaydet</button>
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
