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
              <div class="card-body">
                <div class="text-center">
                  @php
                  $image = Auth::user()->image;
                  @endphp
                  <img class="profile-user-img img-fluid img-circle" src="{{ asset("/storage/image/$image") }}" alt="User profile picture">
                  <br>
                  
                  <h1 class="text-center">Welcome to Prescribe!</h1>
                  <h3 class="text-center">{{Auth::user()->name}}</h3>
                </div>

              </div>
        <!-- /.col -->
      </div>
      
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  </div>

        @endsection
    
        @section('script')
        <script type="text/javascript" src="{{ asset('assets/js/admin-dashboard.js') }}"></script>
        @endsection