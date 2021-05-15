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
    @include('partials.content-header', ['name' => 'product', 'key' => 'Add'])

    <!-- <div class="col-md-12">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div> -->

    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">

                @csrf
                <div class="form-group">
                    <label>Product name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Product Name">

                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input type="text" name="price" value="{{ old('price') }}" class="form-control @error('price') is-invalid @enderror" placeholder="Product Price">

                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="feature_image_path" class="form-control-file">
                </div>

                <div class="form-group">
                    <label>Image Thumbnail</label>
                    <input type="file" multiple name="image_path[]" class="form-control-file">
                </div>

                <div class="form-group">
                    <label>Chọn Categories</label>
                    <select class="form-control select2_init @error('category_id') is-invalid @enderror" name="category_id">
                        <option value="">Chọn category</option>
                        {!! $htmlOption !!}
                    </select>
                    @error('category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Tags</label>
                    <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">

                    </select>
                </div>

            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control tinymce_editor_init @error('content') is-invalid @enderror" name="content" id="content" rows="8">
                    {{ old('content') }}
                    </textarea>
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
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