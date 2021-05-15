@extends('layouts.admin')

@section('title')
    <title>Slider</title>

@endsection

@section('css')
<link href="{{ asset('admins/slider/index/index.css') }}" rel="stylesheet" />
@endsection

@section('js')
<script src="{{ asset('vendor/sweetalert2/sweetalert2@10.js') }}"></script>
<script src="{{ asset('admins/slider/index/index.js') }}"></script>
@endsection

@section('content')

<div class="content-wrapper">

    @include('partials.content-header', ['name' => 'Slider', 'key' => 'List'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{ route('slider.create') }}" class="btn btn-success float-right m-2">Add</a>
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Tên Slider</th>
                  <th scope="col">Description</th>
                  <th scope="col">Image</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($sliders as $slider)
                  <tr>
                    <th scope="row">{{$slider->id}}</th>
                    <td>{{$slider->name}}</td>
                    <td>{{$slider->description}}</td>
                    <td><img class="image_list_slider" src="{{$slider->image_path}}"></td>
                    <td>
                      <a href="{{ route('slider.edit', ['id' => $slider->id])}}" class="btn btn-default">Edit</a>
                      <a data-url="{{ route('slider.delete', ['id' => $slider->id])}}" href="" class="btn btn-danger action_delete">Delete</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="col-md-12">
          {{ $sliders->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection