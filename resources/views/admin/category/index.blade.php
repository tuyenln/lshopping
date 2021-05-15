@extends('layouts.admin')

@section('title')
    <title>Home</title>

@endsection

@section('content')

<div class="content-wrapper">

    @include('partials.content-header', ['name' => 'category', 'key' => 'List'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            @can('category-add')
            <a href="{{ route('categories.create') }}" class="btn btn-success float-right m-2">Add</a>
            @endcan
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Tên Danh Mục</th>
                  <th scope="col">Slug</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categories as $cate)
                  <tr>
                    <th scope="row">{{ $cate->id}}</th>
                    <td>{{ $cate->name }}</td>
                    <td>{{ $cate->slug }}</td>
                    <td>
                      @can('category-edit')
                      <a href="{{ route('categories.edit', ['id' => $cate->id])}}" class="btn btn-default">Edit</a>
                      @endcan

                      @can('category-delete')
                      <a href="{{ route('categories.delete', ['id' => $cate->id])}}" class="btn btn-danger">Delete</a>
                      @endcan
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="col-md-12">
              {{ $categories->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>



@endsection