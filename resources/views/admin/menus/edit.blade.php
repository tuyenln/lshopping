@extends('layouts.admin')

@section('title')
    <title>Home</title>

@endsection

@section('content')

<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'menu', 'key' => 'Edit'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
            <form action="{{ route('menus.update', ['id' => $menu->id]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Tên Menu</label>
                    <input type="text" name="name" value="{{$menu->name}}" class="form-control" placeholder="Nhập Menu">
                </div>
                <div class="form-group">
                    <label>Chọn Menu Cha</label>
                    <select class="form-control" name="parent_id">
                        <option value="0">Chọn menu cha</option>
                        {!! $optionSelect !!}
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
      </div>
    </div>
  </div>



@endsection