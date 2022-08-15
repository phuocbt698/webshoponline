@extends('Admin.Layouts.main')
@section('contents')
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
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Slide</li>
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
                                <h3 class="card-title">Thông tin slide</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="slideForm" method="POST" action="{{ route('slide.store') }}"
                                onsubmit="return false;">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input value="{{$slide->title}}" name="title" type="text" class="form-control" id="title"
                                            placeholder="Enter title">
                                        <span id="errorTitle" class="error invalid-feedback"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Content</label>
                                        <textarea class="form-control"  name="content" id="content" cols="30" rows="10" placeholder="Enter content">{{$slide->title}}</textarea>
                                        <span id="errorContent" class="error invalid-feedback"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">File input</label>
                                        <div class="input-group">
                                            <input name="image" type="file" class="custom-file-input" id="image">
                                            <span id="errorImage" class="error invalid-feedback"></span>
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                        <label for="imageOld">Image Old</label>
                                        <img id="imageOld" src="{{ asset($slide->path_image) }}" alt=""
                                            width='100%'>
                                        <div id="preview">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="time_start">Time_start</label>
                                        <input type="date" name="time_start" id="time_start" class="form-control" value="{{date('Y-m-d', strtotime($slide->time_start))}}">
                                        <span id="errorTime_start" class="error invalid-feedback"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="time_end">Time_end</label>
                                        <input type="date" name="time_end" id="time_end" class="form-control" value="{{date('Y-m-d', strtotime($slide->time_end))}}">
                                        <span id="errorTime_end" class="error invalid-feedback"></span>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button id="submit" type="submit" class="btn btn-primary">Thêm mới</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-ms-10">
                        <a href="{{ route('slide.index') }}" class="btn btn-success">
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
        $(document).ready(function() {
            $('#image').change(function(e) {
                const label = `<label for="imageNew"> Image New</label>`;
                document.getElementById('preview').insertAdjacentHTML('beforeend', label);
                preview(e, 'preview');
            })
            $('#slideForm').submit(function() {
                var formData = new FormData(this);
                var errorTagArr = [
                    'title',
                    'content',
                    'time_start',
                    'time_end',
                    'image'
                ];
                var errors = getAjax("{{ route('slide.update', $slide->id) }}", formData, 'put');;
                if (errors) {
                    setError(errorTagArr, errors);
                } else {
                    removeError(errorTagArr);
                }
            })
        });
    </script>
@endsection
