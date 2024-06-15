@extends('app.layouts.app')
@section('header_title', Str::limit($group->name ?? '#', 64) . ' - Bayi Grubu')
@section('content')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('tenant.dealer_group.update', $group->id)}}" method="post" data-ajax="true">
                        @csrf
                        <div class="row row-sm">
                            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="name">Adı</label>
                                    <input type="text" class="form-control" name="name" value="{{$group->name}}" placeholder="Grup adını yazın">
                                </div>
                            </div>
                            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="discount">İndirim Oranı (%)</label>
                                    <input type="number" class="form-control" name="discount" value="{{$group->discount}}" min="0" max="100" placeholder="İndirim oranını yüzde olarak yazın">
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
