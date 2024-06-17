@extends('app.layouts.app')
@section('header_title', 'Ürün Listesi')
@section('content')
    <div class="row row-sm w-100 justify-content-center">
        <div class="col-xl-12 col-lg-9 col-md-12">
            <div class="card mb-3">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-12 col-md-8 mb-3 mb-md-0">
                            <input type="text" class="form-control h-100" name="keyword"
                                   placeholder="ÜRÜN ADI VEYA KODU ..."
                                   @if(!empty($filtre)) value="{{$filtre}}" @endif/>
                        </div>
                        <div class="col-12 col-md-2 mb-3 mb-md-0">
                            <select name="kategori" data-control="select2" data-placeholder="Kategori seçin"
                                    class="form-select">
                                <option value="0">Tüm Kategoriler</option>
                                @if(!empty($categories))
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-12 col-md-2">
                            <button class="btn btn-sm btn-primary w-100 h-100" type="submit">
                                ARA
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-sm w-100">
                @foreach($products as $product)
                    <div class="col-md-6 col-lg-4 col-xl-3 col-sm-6 mb-3">
                        <div class="card">
                            <div class="card-body h-100">
                                <div class="pro-img-box">
                                    <div class="d-flex product-sale">
                                        <span class="badge bg-light-secondary mb-2">
                                            Stok: {{$product->stock}}</span>
                                        <i class="mdi mdi-heart-outline ms-auto wishlist"></i></div>
                                    <img class="w-100 h-200px" src="{{$product->getImage()}}"
                                         alt="product-image" style="object-fit: contain">
                                    @if($product->stock > 0)
                                        <div class="d-flex justify-content-center" style="width: 100%">
                                            <a class="btn btn-primary text-white mt-2"
                                               href="#">Sepete Ekle</a>
                                        </div>
                                    @endif
                                </div>
                                <div class="text-center pt-3"><h3
                                        class="h6 mb-2 mt-4 fw-bold text-uppercase">{{$product->model}}
                                        / {{$product->name}}</h3>
                                    <h4
                                        class="h5 mb-0 mt-2 text-center fw-bold text-danger">{{number_format($product->getPrice(), 2, '.', '')}}
                                        TL</h4>
                                    <span class="badge bg-light-secondary">
                                        KDV (%{{$product->getTaxRate()}}) - {{number_format($product->getTax(), 2, '.', '')}} TL
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{--<div class="mt-15 mb-15 d-flex justify-content-center">
                    {{$products->appends(request()->all())->links('vendor.pagination.custom')}}
                </div>--}}
            </div>
        </div>
    </div>
@endsection
@push('script')
@endpush
@push('style') @endpush
