@extends('layouts.admin')

@section('title')
    <title>Add Product</title>

@endsection

@section('css')
    <link href="{{ asset('admins/role/add/add.css') }}" rel="stylesheet" />
@endsection

@section('content')

<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Role', 'key' => 'Add'])

    <form action="{{ route('roles.store') }}" method="POST" enctype="multipart/form-data">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                @csrf
                <div class="form-group">
                    <label>Tên vai trò</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Tên vai trò">

                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Mô tả vai trò</label>
                    <textarea class="form-control @error('display_name') is-invalid @enderror" name="display_name" id="display_name" rows="6">
                    {{ old('display_name') }}
                    </textarea>
                    @error('display_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <label>
                            <input type="checkbox" class="checkall">
                            Check all
                        </label>
                    </div>

                    @foreach($permissionParent as $permission)

                        <div class="card border-primary mb-3 col-md-12">
                            <div class="card-header">
                                <label>
                                    <input type="checkbox" value="" class="checkbox_wrapper" />
                                </label>
                                Module {{ $permission->name }}
                            </div>
                            <div class="row">
                                @foreach($permission->permissionChildrent as $child)
                                    <div class="card-body text-primary col-md-3">
                                        <h5 class="card-title">
                                        <label>
                                            <input class="checkbox_childrent" name="permission_id[]" type="checkbox" value="{{$child->id}}" />
                                        </label>
                                        {{$child->name}}</h5>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    @endforeach

                </div>


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
    <script src="{{ asset('admins/role/add/add.js') }}"></script>
@endsection