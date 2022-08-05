@extends('Admin.Layouts.main')
@section('contents')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Admin new</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">User admin</li>
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
                                <h3 class="card-title">Thông tin admin</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="adminForm" method="POST" action="{{ route('admin.store') }}"
                                onsubmit="return false;">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select id="role" name="id_role" class="form-control">
                                            <option value="">--Lựa chọn--</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        <span id="errorRole" class="error invalid-feedback"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input name="name" type="text" class="form-control" id="name"
                                            placeholder="Enter name">
                                        <span id="errorName" class="error invalid-feedback"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Email</label>
                                        <input name="email" type="email" class="form-control" id="email"
                                            placeholder="Enter email">
                                        <span id="errorEmail" class="error invalid-feedback"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input name="password" type="password" class="form-control" id="password"
                                            placeholder="Enter password">
                                        <span id="errorPassword" class="error invalid-feedback"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input name="phone" type="text" class="form-control" id="phone"
                                            placeholder="Enter phone">
                                        <span id="errorPhone" class="error invalid-feedback"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">File input</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input name="image" type="file" class="custom-file-input"
                                                    id="image">
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                        </div>
                                        <div id="preview">

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- select -->
                                            <div class="form-group">
                                                <label for="city">City</label>
                                                <select id="city" name="id_city" class="form-control">
                                                    <option value="0">--Tỉnh/Thành phố--</option>
                                                    @foreach ($cities as $city)
                                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                    @endforeach
                                                </select>
                                                <span id="errorCity" class="error invalid-feedback"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- select -->
                                            <div class="form-group">
                                                <label for="district">District</label>
                                                <select id="district" name="id_district" class="form-control">
                                                    <option value="0">--Quận/Huyện--</option>
                                                </select>
                                                <span id="errorDistrict" class="error invalid-feedback"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- select -->
                                            <div class="form-group">
                                                <label for="ward">Ward</label>
                                                <select id="ward" name="id_ward" class="form-control">
                                                    <option value="0">--Xã/Phường--</option>
                                                </select>
                                                <span id="errorWard" class="error invalid-feedback"></span>
                                            </div>
                                        </div>
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
                        <a href="{{ route('admin.index') }}" class="btn btn-success">
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
            $('#city').change(function() {
                getDistrict('{{ route('getDistrict') }}', this.value, 'district');
                var id_district = $('#district').val();
                getWard('{{ route('getWard') }}', id_district, 'ward');
                $('#district').change(function() {
                    getWard('{{ route('getWard') }}', this.value, 'ward');
                })
            });
            $('#image').change(function(e){
                preview(e, 'preview');
            })
            $('#adminForm').submit(function() {
                var formData = new FormData(this);
                var nameElement = document.getElementById('name');
                var errorName = document.getElementById('errorName');
                var errors = getAjax("{{ route('admin.store') }}", formData);
                if (errors) {
                    nameElement.classList.add('is-invalid');
                    errorName.innerHTML = errors['name'];
                } else {
                    nameElement.classList.remove('is-invalid');
                    document.getElementById('roleForm').reset();
                }
            })
        });
    </script>
@endsection
