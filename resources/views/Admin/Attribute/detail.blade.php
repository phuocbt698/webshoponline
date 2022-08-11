@extends('Admin.Layouts.main')
@section('contents')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Attribute Value</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
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
                    <form id="valueForm" method="POST" action="{{ route('value.store') }}" onsubmit="return false;">
                        @csrf
                        <!-- left column -->
                        <div class="col-md-14">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Value Attribute {{ $infoAttribute->name }}</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->

                                <div class="card-body">
                                    <input name="id_attribute" type="hidden" class="form-control"
                                        value="{{ $infoAttribute->id }}">
                                    <div class="form-group">
                                        <label for="value">Value</label>
                                        <input value="{{(!empty($values)) ? $values->value : ''}}" name="value" type="text" class="form-control" id="value"
                                            placeholder="Enter value">
                                        <span id="errorValue" class="error invalid-feedback"></span>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button id="submit" type="submit" class="btn btn-primary">{{(!empty($values)) ? 'Lưu lại' : 'Thêm mới'}}</button>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </form>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-8">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Specifications</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <!-- checkbox -->
                                        <table id="dataTable" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Attribute</th>
                                                    <th>Value</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- Form Element sizes -->

                </div>
                <!--/.col (right) -->

                <!-- /.row -->
            </div> <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- DataTables  & Plugins -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/access/admin') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/access/admin') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('/access/admin') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('/access/admin') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('/access/admin') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('/access/admin') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('/access/admin') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('/access/admin') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('/access/admin') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('/access/admin') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('/access/admin') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('/access/admin') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        $(document).ready(function() {
            function getData() {
                var elementID = 'dataTable';
                var route = '{{ route('value.index') }}';
                var columns = [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'attribute',
                        name: 'attribute'
                    },
                    {
                        data: 'value',
                        name: 'value'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ];
                getDataTable(elementID, route, columns);
            }
            getData();
            $('#valueForm').submit(function() {
                var formData = new FormData(this);
                var errorTagArr = [
                    'value'
                ];
                var errors = getAjax("{{ (empty($values)) ? route('value.store') : route('value.update', $values->id) }}", formData);
                if (errors) {
                    setError(errorTagArr, errors);
                } else {
                    removeError(errorTagArr);
                    getData();
                }                
               
            })
        });
    </script>
@endsection
