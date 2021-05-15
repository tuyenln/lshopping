@extends('layouts.admin')

@section('title')
    <title>Settings</title>

@endsection

@section('content')

<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Settings', 'key' => 'Add'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
            <form action="{{ route('setting.store') . '?type=' . request()->type }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Config Key</label>
                    <input type="text" value="{{ old('config_key') }}" name="config_key" class="form-control @error('config_key') is-invalid @enderror" placeholder="Nhập Key">

                    @error('config_key')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                </div>


                @if (request()->type === 'text')
                  <div class="form-group">
                      <label>Config Value</label>
                      <input type="text" value="{{ old('config_value') }}" name="config_value" class="form-control @error('config_value') is-invalid @enderror" placeholder="Nhập Value">

                      @error('config_value')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                  </div>
                  @elseif(request()->type === 'textarea')
                  <div class="form-group">
                      <label>Config Value</label>
                      <textarea class="form-control @error('config_value') is-invalid @enderror" name="config_value" id="config_value" rows="8">{{ old('config_value') }}</textarea>
                      @error('config_value')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                  </div>
                @endif
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
      </div>
    </div>
  </div>

@endsection