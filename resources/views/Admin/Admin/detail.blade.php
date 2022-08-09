@extends('Admin.Layouts.main')
@section('contents')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-md-center">
          <div class="col-md-10">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{asset($infoUser->path_image)}}"
                       alt="User profile picture" style="width: 350px; height: 350px;">
                </div>

                <h3 class="profile-username text-center">{{$infoUser->name}}</h3>

                <p class="text-muted text-center">{{$infoUser->role->name}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{$infoUser->email}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Phone</b> <a class="float-right">{{substr($infoUser->phone, 0, 4) . '.' . substr($infoUser->phone, 4, 3) . '.' . substr($infoUser->phone, 7)}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Address</b> <a class="float-right">{{$infoUser->nameWard . ', ' . $infoUser->nameDistrict . ', ' . $infoUser->nameCity}}</a>
                  </li>
                </ul>

                <a href="{{route('admin.index')}}" class="btn btn-primary btn-block"><b>Danh sách</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
