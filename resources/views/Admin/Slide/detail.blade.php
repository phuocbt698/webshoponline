@extends('Admin.Layouts.main')
@section('contents')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Slide</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Slide</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="mb-2 d-flex justify-content-end">
          <a href="{{route('slide.index')}}" class="btn btn-success">
            <i class="fas fa-list"></i>
            <span>Danh sách</span>
          </a>
        </div>
        <div class="row">
          <div class="col-md-5">
            
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid"
                       src="{{asset($infoSlide->path_image)}}"style="width: 350px; height: 350px;"
                       alt="Product image">
                </div>

                <h3 class="profile-username text-center"><b>{{$infoSlide->title}}</b></h3>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Time_start</b> <a class="float-right">{{date('d-m-Y', strtotime($infoSlide->time_start))}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Time_end</b> <a class="float-right">{{date('d-m-Y', strtotime($infoSlide->time_end))}}</a>
                  </li>
                </ul>

                <a href="{{route('slide.index')}}" class="btn btn-primary btn-block"><b>Danh sách</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-7">
            <div class="card">
              <div class="card-header p-2">
                <h3 class="description">
                    <b>Content</b>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content " id="tab-content-description">
                    {!!$infoSlide->content!!}
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection