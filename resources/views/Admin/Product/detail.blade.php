@extends('Admin.Layouts.main')
@section('contents')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
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
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{asset($infoProduct->path_image)}}"style="width: 350px; height: 350px;"
                       alt="Product image">
                </div>

                <h3 class="profile-username text-center"><b>{{$infoProduct->name}}</b></h3>

                <p class="text-muted text-center"><b>Danh mục:</b> {{$infoProduct->category->name}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Price</b> <a class="float-right">{{number_format($infoProduct->price)}} VNĐ</a>
                  </li>
                  <li class="list-group-item">
                    <b>Quantity</b> <a class="float-right">{{number_format($infoProduct->quantity)}}</a>
                  </li>
                </ul>

                <a href="{{route('product.index')}}" class="btn btn-primary btn-block"><b>Danh sách</b></a>
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
                    <b>Description</b>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content " id="tab-content-description">
                    {!!$infoProduct->description!!}
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