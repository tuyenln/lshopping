@extends('layouts.admin')

@section('title')
    <title>Add Product</title>

@endsection

@section('css')
    <link href="{{ asset('admins/slider/add/add.css') }}" rel="stylesheet" />
@endsection

@section('content')

<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Slider', 'key' => 'Add'])

    <form action="{{ route('slider.update', ['id' => $slider->id]) }}" method="POST" enctype="multipart/form-data">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">

                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ $slider->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Name">

                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="8">{{ $slider->description }}</textarea>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input type="file" multiple name="image_path" class="form-control-file @error('image_path') is-invalid @enderror">

                    <div class="col-md-4">
                        <div class="row">
                            <img class="image_edit_slider" src="{{$slider->image_path}}" />
                        </div>
                    </div>

                    @error('image_path')
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
@endsection