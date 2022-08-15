@extends('Admin.Layouts.main')
@section('contents')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>150</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>44</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <div class="col">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Sales</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 487px;" width="487" height="250" class="chartjs-render-monitor"></canvas>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <div class="card card-success">
            <div class="card-header border-0">
              <h3 class="card-title">Selling Products</h3>
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table table-striped table-valign-middle">
                <thead>
                <tr>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Sales</th>
                  <th>More</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>
                    <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                    Some Product
                  </td>
                  <td>$13 USD</td>
                  <td>
                    <small class="text-success mr-1">
                      <i class="fas fa-arrow-up"></i>
                      12%
                    </small>
                    12,000 Sold
                  </td>
                  <td>
                    <a href="#" class="text-muted">
                      <i class="fas fa-search"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                    Another Product
                  </td>
                  <td>$29 USD</td>
                  <td>
                    <small class="text-warning mr-1">
                      <i class="fas fa-arrow-down"></i>
                      0.5%
                    </small>
                    123,234 Sold
                  </td>
                  <td>
                    <a href="#" class="text-muted">
                      <i class="fas fa-search"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                    Amazing Product
                  </td>
                  <td>$1,230 USD</td>
                  <td>
                    <small class="text-danger mr-1">
                      <i class="fas fa-arrow-down"></i>
                      3%
                    </small>
                    198 Sold
                  </td>
                  <td>
                    <a href="#" class="text-muted">
                      <i class="fas fa-search"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                    Perfect Item
                    <span class="badge bg-danger">NEW</span>
                  </td>
                  <td>$199 USD</td>
                  <td>
                    <small class="text-success mr-1">
                      <i class="fas fa-arrow-up"></i>
                      63%
                    </small>
                    87 Sold
                  </td>
                  <td>
                    <a href="#" class="text-muted">
                      <i class="fas fa-search"></i>
                    </a>
                  </td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- Left col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- ChartJS -->
<script src="{{asset('/access/admin')}}/plugins/chart.js/Chart.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      datasets: [
        {
          label               : 'Old Revenue',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90, 0, 0, 0, 0, 0]
        },
        {
          label               : 'New Revenue',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40, 0, 0, 0, 0, 0]
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: true
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : true,
          },
          scaleLabel: {
              display: true,
              labelString: "Month",
              fontFamily: "Montserrat",
              fontColor: "black",
          }
        }],
        yAxes: [{
          gridLines : {
            display : true,
          },
          scaleLabel: {
              display: true,
              labelString: "Revenue",
              fontFamily: "Montserrat",
              fontColor: "black",
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })
  })
</script>
@endsection
