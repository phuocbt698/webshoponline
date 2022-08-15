@extends('Admin.Layouts.main')
@section('contents')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Product new</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Product</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form id="productForm" method="POST" action="{{ route('product.store') }}" onsubmit="return false;">
                    @csrf
                    <div class="row d-flex justify-content-between">

                        <!-- left column -->
                        <div class="col-md-4">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Thông tin product</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select id="category" name="category" class="form-control">
                                            <option value="">--Lựa chọn--</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <span id="errorCategory" class="error invalid-feedback"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input name="name" type="text" class="form-control" id="name"
                                            placeholder="Enter name">
                                        <span id="errorName" class="error invalid-feedback"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">File input</label>
                                        <div class="input-group">
                                            <input name="image" type="file" class="custom-file-input" id="image">
                                            <span id="errorImage" class="error invalid-feedback"></span>
                                            <label class="custom-file-label" for="image">Choose image</label>
                                        </div>
                                        <div id="preview">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input name="price" type="text" class="form-control" id="price"
                                            placeholder="Enter price">
                                        <span id="errorPrice" class="error invalid-feedback"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity">Quantity</label>
                                        <input name="quantity" type="text" class="form-control" id="quantity"
                                            placeholder="Enter quantity">
                                        <span id="errorQuantity" class="error invalid-feedback"></span>
                                    </div>


                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button id="submit" type="submit" class="btn btn-primary">Thêm mới</button>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!--/.col (left) -->
                        <!-- right column -->
                        <div class="col-md-8">
                            <div class="card">
                                <a href="{{ route('product.index') }}" class="btn btn-info">
                                    <i class="fas fa-list"></i>
                                    <span>Danh sách</span>
                                </a>
                            </div>
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Description</h3>
                                </div>
                                <div class="card-body">
                                    <textarea rows="500" cols="25" class="form-control" name="description" id="description" cols="30"
                                        rows="10"></textarea>
                                    <span id="errorDescription" class="error invalid-feedback"></span>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- Form Element sizes -->

                    </div>
                    <!--/.col (right) -->
                </form>
                <!-- /.row -->
            </div> <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .then(editor => {})
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        $(document).ready(function() {
            $('#image').change(function(e) {
                preview(e, 'preview');
            });
            $('#productForm').submit(function() {
                var formData = new FormData(this);
                var errorTagArr = [
                    'category',
                    'name',
                    'price',
                    'quantity',
                    'description',
                    'image'
                ];
                var errors = getAjax("{{ route('product.store') }}", formData);
                if (errors) {
                    setError(errorTagArr, errors);
                } else {
                    removeError(errorTagArr);
                }
            });
        });
    </script>
@endsection
