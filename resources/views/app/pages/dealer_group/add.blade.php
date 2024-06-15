@extends('app.layouts.app')
@section('header_title', 'Bayi Grubu Ekle')
@section('content')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('tenant.dealer_group.store')}}" data-ajax="true">
                        @csrf
                        <div class="row row-sm">
                            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="name">Adı</label>
                                    <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Grup adını yazın">
                                </div>
                            </div>
                            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="discount">İndirim Oranı (%)</label>
                                    <input type="number" class="form-control" name="discount" value="{{old('discount')}}" min="0" max="100" placeholder="İndirim oranını yüzde olarak yazın">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-10">
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
