@extends('layouts.admin')

@section('title')
    <title>Home</title>

@endsection

@section('content')

<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'category', 'key' => 'Edit'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
            <form action="{{ route('categories.update', ['id' => $category->id]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Tên Danh Mục</label>
                    <input type="text" name="name" value="{{$category->name}}" class="form-control" placeholder="Nhập Danh Mục">
                </div>
                <div class="form-group">
                    <label>Chọn Danh Mục Cha</label>
                    <select class="form-control" name="parent_id">
                        <option value="0">Chọn danh mục cha</option>
                        {!! $htmlOption !!}
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