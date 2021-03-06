@extends('layouts.admin')

@section('title')
    <title>Setting</title>

@endsection

@section('css')
    <link href="{{ asset('admins/setting/list.css') }}" rel="stylesheet" />
@endsection

@section('js')
<script src="{{ asset('vendor/sweetalert2/sweetalert2@10.js') }}"></script>
<script src="{{ asset('admins/main.js') }}"></script>
@endsection

@section('content')

<div class="content-wrapper">

    @include('partials.content-header', ['name' => 'Settings', 'key' => 'List'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            <div class="btn-group float-right right-padding">
                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                Add Setting
                <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('setting.create') . '?type=text' }}">Text</a></li>
                    <li><a href="{{ route('setting.create') . '?type=textarea' }}">TextArea</a></li>
                </ul>
            </div>
            <!-- <a href="{{ route('setting.create') }}" class="btn btn-success float-right m-2">Add</a> -->
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Config Key</th>
                  <th scope="col">Config Value</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($settings as $setting)
                  <tr>
                    <th scope="row">{{ $setting->id}}</th>
                    <td>{{ $setting->config_key }}</td>
                    <td>{{ $setting->config_value}}</td>
                    <td>
                      <a href="{{ route('setting.edit', ['id' => $setting->id]) .'?type='.$setting->type }}" class="btn btn-default">Edit</a>
                      <a data-url="{{ route('setting.delete', ['id' => $setting->id])}}" href="" class="btn btn-danger action_delete">Delete</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="col-md-12">
          {{ $settings->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>



@endsection