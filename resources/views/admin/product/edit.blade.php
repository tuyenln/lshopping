@extends('layouts.admin')

@section('title')
    <title>Add Product</title>

@endsection

@section('css')
    <link href="{{ asset('vendor/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admins/product/add/add.css') }}" rel="stylesheet" />
@endsection

@section('content')

<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'product', 'key' => 'Edit'])

    <form action="{{ route('product.update', ['id' => $product->id ]) }}" method="POST" enctype="multipart/form-data">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">

                @csrf
                <div class="form-group">
                    <label>Product name</label>
                    <input type="text" name="name" class="form-control" placeholder="Product Name" value="{{$product->name}}">
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input type="text" name="price" class="form-control" placeholder="Product Price" value="{{$product->price}}">
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="feature_image_path" class="form-control-file">
                    <div class="col-md-12 container_image_detail">
                        <div class="row">
                            <img style="width:50%;" src="{{ $product->feature_image_path }}" >
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Image Thumbnail</label>
                    <input type="file" multiple name="image_path[]" class="form-control-file">

                    <div class="col-md-12 container_image_detail">
                        <div class="row">
                            @foreach($product->productImages as $productImage)
                            <div class="col-md-3">
                                <img style="width:100%;" src="{{ $productImage->image_path }}" >
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Chọn Categories</label>
                    <select class="form-control select2_init" name="category_id">
                        <option value="">Chọn category</option>
                        {!! $htmlOption !!}
                    </select>
                </div>
                <div class="form-group">
                    <label>Tags</label>
                    <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">
                    @foreach($product->tags as $productTag)
                        <option value="{{ $productTag->name }}" selected>{{$productTag->name}}</option>
                    @endforeach
                    </select>
                </div>

            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control tinymce_editor_init" name="content" id="content" rows="8">{{$product->content}}</textarea>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
      </div>
    </div>
    </form>
  </div>



@endsection

@section('js')
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    <!-- <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script> -->
    <script src="{{ asset('admins/product/add/add.js') }}"></script>
@endsection