@extends('app.layouts.app')
@section('header_title', Str::limit($product->name ?? '#', 64) . ' - Ürün Detayı')
@section('content')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('tenant.product.update', $product->id)}}" method="post" data-ajax="true">
                        @csrf
                        <div class="card-block pt-0">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="form-section"><i class="ft-tag"></i> Ürün Bilgileri</h4>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mb-5">
                                                    <label for="name"><span class="danger">*</span>Ürün
                                                        Adı</label>
                                                    <input type="text" id="name" class="form-control"
                                                           name="name" required="" value="{{$product->name}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-5">
                                                    <label for="code"><span class="danger">*</span>Ürün
                                                        Kodu</label>
                                                    <input type="text" id="model" class="form-control"
                                                           name="model" required="" value="{{$product->model}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-5">
                                                    <label for="stock"><span class="danger">*</span>Stok Miktarı</label>
                                                    <input type="text" id="stock"
                                                           class="form-control decimal" name="stock"
                                                           required="" value="{{$product->stock}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <fieldset class="form-group mb-5">
                                                    <label for="categories"><span class="danger">*</span>Kategoriler</label>
                                                    <select class="form-select" id="categories" data-control="select2" data-placeholder="Bir kategori seçin"
                                                            multiple="multiple"
                                                            name="categories[]">
                                                        <option value="">Seçin</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}" {{ $product->categories->contains($category->id) ? 'selected' : '' }}>{!! $category->name !!} - {{$category->code ?? '[' . $category->id . ']'}}</option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-5">
                                                    <label for="price"><span class="danger">*</span>Ürün
                                                        Fiyatı</label>
                                                    <input type="text" id="price"
                                                           class="form-control decimal" name="price"
                                                           required="" value="{{$product->price ?? $product->price}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-5">
                                                    <label for="buy_price"><span class="danger">*</span>Alış
                                                        Fiyatı</label>
                                                    <input type="text" id="buy_price"
                                                           class="form-control decimal" name="buy_price"
                                                           required="" value="{{$product->buy_price}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-5">
                                                    <label for="sell_price"><span class="danger">*</span>Satış
                                                        Fiyatı</label>
                                                    <input type="text" id="sell_price"
                                                           class="form-control decimal" name="sell_price"
                                                           required="" value="{{$product->sell_price ?? $product->sell_price}}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group mb-5">
                                                    <label for="tax_rate">Kdv Oranı</label>
                                                    <input type="text" id="tax_rate" class="form-control decimal"
                                                           name="tax_rate" value="{{$product->tax_rate}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-5 skin skin-flat">
                                                    <label for="tax_include">KDV Durumu</label>
                                                    <fieldset class="form-control">
                                                        <div class="form-check">
                                                            <input class="form-check-input" name="tax_include" type="checkbox" value="1" id="tax_include" {{$product->tax_include ? 'checked':''}}/>
                                                            <label class="form-check-label" for="tax_include">
                                                                Kdv Fiyata Dahil
                                                            </label>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-5">
                                                    <label for="desi">Desi</label>
                                                    <input type="text" id="desi" class="form-control decimal"
                                                           name="desi" value="{{$product->desi}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-5 skin skin-flat">
                                                    <label for="status">Ürün Durumu</label>
                                                    <fieldset class="form-control">
                                                        <div class="form-check">
                                                            <input class="form-check-input" name="status" type="checkbox" value="1" id="status" {{$product->status ? 'checked':''}}/>
                                                            <label class="form-check-label" for="status">
                                                                Satışa Açık
                                                            </label>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group mb-5">
                                                    <label for="description">Açıklama</label>
                                                    <textarea type="text" id="description" class="form-control"
                                                              rows="3"
                                                              name="description">{!! $product->description !!}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="form-section mb-5"><i class="ft-image"></i> Ürün Resmi </h4>
                                        <div class="row">
                                            <div class="col-md-6 mt-3">
                                                <div class="form-group mb-5">
                                                    <input type="file" accept="image/*" id="image"
                                                           name="image"
                                                           class="form-control"
                                                           placeholder="Fotoğraf seçin"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-3">
                                                <img
                                                    class="border bordered"
                                                    style="height:50px"
                                                    src="{{ $product->getImage() ?? '#' }}">
                                            </div>
                                        </div>
                                        <h4 class="form-section"><i class="ft-image"></i> Diğer Ürün Resimleri
                                        </h4>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mb-5">
                                                    <input type="file" accept="image/*" id="images"
                                                           onchange="loadOrderFiles(event)" class="form-control"
                                                           name="images[]"
                                                           placeholder="Birden Fazla Dosya Seçilebilir"
                                                           multiple=""/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12"
                                                 style=" height: 375px; overflow-y: auto; overflow-x: hidden;">
                                                <table id="tbl_order_images"
                                                       class="table table-xs table-striped table-bordered compact dataTable"
                                                       style="width: 100%;">
                                                    <thead>
                                                    <tr>
                                                        <th style="width:60px">Resim</th>
                                                        <th>İşlem</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($product->images as $image)
                                                        <tr>
                                                            <td style="text-align:center;width:60px"><img
                                                                    style="height:50px"
                                                                    src="{{$image->getSrc() ?? '#'}}">
                                                            </td>
                                                            <td>
                                                                <button type="button"
                                                                        onclick="approveAjax('{{route('tenant.product.destroy_product_image',$image->id)}}')"
                                                                        class="btn btn-sm btn-danger">Sil
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
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
