@extends('app.layouts.app')
@section('header_title', Str::limit($dealer->name ?? '#', 64) . ' - Bayi')
@section('content')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('tenant.dealer.update', $dealer->id)}}" method="post" data-ajax="true">
                        @csrf
                        <div class="row row-sm">
                            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="name">Adı</label>
                                    <input type="text" class="form-control" name="name" value="{{$dealer->name}}">
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-lg-6">
                                        <label for="dealer_group_id">Bayi Grubu</label>
                                        <select name="dealer_group_id" class="form-control form-select"
                                                data-control="select2" data-placeholder="Bir bayi grubu seçin"
                                                data-hide-search="true">
                                            @foreach($groups as $group)
                                                <option value="{{ $group->id }}" @if(!empty($dealer->group) && $dealer->group->id == $group->id) selected @endif>{{ $group->name ?? '#' }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="payment_date">Ödeme Tarihi</label>
                                        <input type="date" class="form-control" name="payment_date"
                                               value="{{$dealer->payment_date}}">
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-12 col-lg-6">
                                        <label for="tax_office">Vergi Dairesi</label>
                                        <input type="text" class="form-control" name="tax_office"
                                               value="{{$dealer->tax_office}}">
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="tax_number">Vergi Numarası</label>
                                        <input type="text" class="form-control" name="tax_number"
                                               value="{{$dealer->tax_number}}">
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-12 col-lg-6">
                                        <label for="iban">Iban Numarası</label>
                                        <input type="text" class="form-control" name="iban" value="{{$dealer->iban}}">
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="identity_number">TC Kimlik Numarası</label>
                                        <input type="text" class="form-control" name="identity_number"
                                               placeholder="11111111111"
                                               value="{{$dealer->identity_number}}">
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="notes">Bayi Notu</label>
                                    <textarea name="notes" class="form-control">{{$dealer->notes}}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                                <div class="form-group row">
                                    <div class="col-12 col-lg-6">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" value="{{$dealer->email}}">
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="phone">Telefon</label>
                                        <input type="text" class="form-control" name="phone" value="{{$dealer->phone}}">
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="address">Adres</label>
                                    <textarea name="address" class="form-control">{{$dealer->address}}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="username">Kullanıcı Adı</label>
                                    <input type="text" class="form-control form-control-solid" name="username" value="{{$dealer->user->name ?? '#'}}" readonly>
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
