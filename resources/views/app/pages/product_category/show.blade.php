@extends('app.layouts.app')
@section('header_title', Str::limit($category->name ?? '#', 64) . ' - Ürün Kategorisi')
@section('content')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('tenant.product_category.update', $category->id)}}" method="post" data-ajax="true">
                        @csrf
                        <div class="card-block pt-0">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-5">
                                                    <label for="name"><span class="danger">*</span>Kategori
                                                        Adı</label>
                                                    <input type="text" id="name" class="form-control"
                                                           name="name" required="" value="{{$category->name}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-5">
                                                    <label for="code"><span class="danger">*</span>Kategori</label>
                                                    <input type="text" id="code" class="form-control"
                                                           name="code" value="{{$category->code}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 pt-1">
                                        <button type="submit" class="btn btn-secondary">
                                            Güncelle
                                        </button>
                                    </div>
                                </div>
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
