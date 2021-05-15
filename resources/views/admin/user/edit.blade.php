@extends('layouts.admin')

@section('title')
    <title>Edit User</title>

@endsection

@section('css')
    <link href="{{ asset('vendor/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admins/product/add/add.css') }}" rel="stylesheet" />
@endsection


@section('js')
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
    <script >
        $('.select2_init').select2({
            'placeholder': 'Chọn vai trò'
        });
    </script>
@endsection
@section('content')

<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'User', 'key' => 'Edit'])

    <form action="{{ route('users.update', ['id' => $user->id ])}}" method="POST" enctype="multipart/form-data">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">

                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Name">

                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email">

                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" value="{{ $user->password }}" class="form-control @error('password') is-invalid @enderror" placeholder="Password">

                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Vai Trò</label>
                    <select name="role_id[]" class="form-control select2_init" multiple>
                        <option value=""></option>

                        @foreach($roles as $role)
                            <option
                            {{$userRoles->contains('id', $role->id) ? 'selected' : ''}}
                            value= "{{ $role->id }}" > {{ $role->name }}</option>
                        @endforeach
                    </select>
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