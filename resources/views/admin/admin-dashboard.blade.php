@extends('layout.app-layout')
@section('style')
@php
$image = Auth::user()->image;
@endphp
<style type="text/css">
.profile_image_preview {
width: 300px;
height: 300px;
background:url('{{asset("storage/image/$image") }}');
background-size: 100% 100%;
}
</style>
@endsection
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">

      <div class="row">
        <div class="col-12">
          <div class="card card-info card-outline card-tabs">

            <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs">

                  <li class="nav-item">
                    <a href="{{url('laptop/list')}}" class="nav-link active">User List</a>
                  </li>
                </ul>
              </div>

            <div class="card-body text-sm" style="padding-bottom: 0px;">

              <div class="btn-group" id="divAddNew">
                <button class="btn btn-danger" data-toggle="modal" data-target="#modal-add"><i class="fa fa-fw fa-plus"></i><span class="hide-on-mobile">&nbsp;&nbsp;Add User</span></button>
              </div>
              @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
            <!-- /.card-header -->
            <div class="card-body text-sm" style="overflow: auto; margin-top: 0px;">
              <table id="table-computer" class="table table-bordered dataTable">
                <thead>
                  <tr>
                    <th class="text-nowrap" width="10%">Image</th>
                    <th class="text-nowrap">Role</th>
                    <th class="text-nowrap">Name</th>
                    <th class="text-nowrap">Email</th>
                    <th class="td-limit">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($user as $item)
                  <tr>  
                    <td class="text-center mid">

                     <img class="img-circle img-55" src="{{asset("/storage/image/$item->image")}}">
                    
                    </td>
                    <td class="text-nowrap mid">{{$item->role}}</td>
                    <td class="text-nowrap mid">{{$item->name}}</td>
                    <td class="text-nowrap mid">{{$item->email}}</td>
                    <td class="text-norwrap mid">
                      
                      <a href="#" data-id="{{$item->id}}" data-role="{{$item->role}}" data-name="{{$item->name}}" data-email="{{$item->email}}" data-image="{{$item->image}}" data-toggle="modal" data-target="#modal-edit"><i class="fa fa-fw fa-edit"></i></a>
                      <a href="#" data-id="{{$item->id}}" data-toggle="modal" data-target="#modal-delete"><i class="fa fa-fw fa-trash"></i></a>
                    </td>
                @endforeach 
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  </div>

        <!-- ADD MODAL -->
        @include('admin.modal-add')
        <!-- ADD MODAL -->

        <!-- EDIT MODAL -->
        @include('admin.modal-edit')
        <!-- EDIT MODAL -->

        <!-- DELETE MODAL -->
        @include('admin.modal-delete')
        <!-- DELETE MODAL -->
        @endsection
    
        @section('script')
        <script type="text/javascript" src="{{ asset('assets/js/admin-dashboard.js') }}"></script>
        @endsection