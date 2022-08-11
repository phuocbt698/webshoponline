@extends('Admin.Layouts.main')
@section('contents')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Attribute update</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Attribute</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row d-flex justify-content-between">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thông tin Attribute</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="attributeForm" method="POST" action="{{route('attribute.update', $attribute->id)}}" onsubmit="return false;">
                @csrf
                @method('put')
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input value="{{$attribute->name}}" name="name" type="text" class="form-control" id="name" placeholder="Enter name">
                    <span id="errorName" class="error invalid-feedback"></span>
                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button id="submit" type="submit" class="btn btn-primary">Lưu lại</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <div class="col-ms-10">
            <a href="{{route('attribute.index')}}" class="btn btn-success">
                <i class="fas fa-list"></i>
                <span>Danh sách</span>
            </a>
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <script>
        $(document).ready(function(){
            $('#attributeForm').submit(function(){
                var data = new FormData(this);
                var nameElement = document.getElementById('name');
                var errorName = document.getElementById('errorName');
                var errors = getAjax("{{route('attribute.update', $attribute->id)}}", data, 'put');
                if(errors){
                    nameElement.classList.add('is-invalid');
                    errorName.innerHTML = errors['name'];
                }else{
                    nameElement.classList.remove('is-invalid');
                }
            })
        })
  </script>
@endsection