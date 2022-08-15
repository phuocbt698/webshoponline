@extends('Admin.Layouts.main')
@section('contents')
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
            <li class="breadcrumb-item active">Role</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header d-flex justify-content-end">
              <a href="{{route('role.create')}}" class="btn btn-success">
                <i class="fas fa-plus-circle"></i>
                <span>Thêm mới</span>
              </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- DataTables  & Plugins -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="{{asset('/access/admin')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('/access/admin')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('/access/admin')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('/access/admin')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('/access/admin')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('/access/admin')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('/access/admin')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{asset('/access/admin')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('/access/admin')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('/access/admin')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('/access/admin')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('/access/admin')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
  $(document).ready(function(){
        var elementID = 'dataTable';
        var route = '{{ route('role.index') }}';
        var columns = [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'action', name: 'action'}
        ];
        
        getDataTable(elementID, route, columns);
    })
</script>
@endsection
