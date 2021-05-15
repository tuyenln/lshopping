@extends('layouts.admin')

@section('title')
    <title>Home</title>

@endsection

@section('content')

<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'permission', 'key' => 'Add'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <form action="{{ route('permissions.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Chọn Tên Module</label>
                    <select class="form-control" name="module_parent">
                    <option value="">Chọn Tên Module</option>
                        @foreach(config('permissions.table_module') as $module)
                            <option value="{{ $module }}">{{ $module }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <div class="row">
                    @foreach(config('permissions.module_childrent') as $child)
                        <div class="col-md-3">
                            <label>
                                <input name="module_childrent[]" type="checkbox" value="{{ $child }}" />
                                {{ $child }}
                            </label>
                        </div>
                    @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
      </div>
    </div>
  </div>



@endsection