@extends('Admin.Layouts.main')
@section('contents')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Slide new</h1>
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
                            <form id="adminForm" method="POST" action="{{ route('slide.store') }}"
                                onsubmit="return false;">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input name="title" type="text" class="form-control" id="title"
                                            placeholder="Enter title">
                                        <span id="errorTitle" class="error invalid-feedback"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Content</label>
                                        <textarea class="form-control"  name="content" id="content" cols="30" rows="10" placeholder="Enter content"></textarea>
                                        <span id="errorContent" class="error invalid-feedback"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">File input</label>
                                        <div class="input-group">
                                            <input name="image" type="file" class="custom-file-input" id="image">
                                            <span id="errorImage" class="error invalid-feedback"></span>
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                        <div id="preview">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="time_start">Time_start</label>
                                        <input type="date" name="time_start" id="time_start" class="form-control">
                                        <span id="errorTime_start" class="error invalid-feedback"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="time_end">Time_end</label>
                                        <input type="date" name="time_end" id="time_end" class="form-control">
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
        ClassicEditor
            .create(document.querySelector('#content'))
            .then(editor => {})
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        $(document).ready(function() {
            $('#image').change(function(e) {
                preview(e, 'preview');
            })
            $('#adminForm').submit(function() {
                var formData = new FormData(this);
                var errorTagArr = [
                    'title',
                    'content',
                    'time_start',
                    'time_end',
                    'image'
                ];
                var errors = getAjax("{{ route('slide.store') }}", formData);
                if (errors) {
                    setError(errorTagArr, errors);
                } else {
                    removeError(errorTagArr);
                }
            })
        });
    </script>
@endsection
