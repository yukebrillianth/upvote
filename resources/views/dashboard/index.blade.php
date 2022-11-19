@extends('vendor.adminLTE.master')

@section('title', 'Dashboard')

@section('header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0">Dashboard</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
@endsection

@section('content')
<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{$data['peserta']}}</h3>

        <p>Jumlah Peserta</p>
      </div>
      <div class="icon">
        <i class="fas fa-users"></i>
      </div>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3 id="onlineUsers">{{$data['online_users']}}</h3>

        <p>Peserta Online</p>
      </div>
      <div class="icon">
        <i class="fas fa-signal"></i>
      </div>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>{{$data['sudah_memilih']}}</h3>

        <p>Peserta Sudah Memilih</p>
      </div>
      <div class="icon">
        <i class="fas fa-user-check"></i>
      </div>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>{{$data['belum_memilih']}}</h3>

        <p>Peserta Belum Memilih</p>
      </div>
      <div class="icon">
        <i class="fas fa-user-clock"></i>
      </div>
    </div>
  </div>
  <!-- ./col -->
</div>
<!-- /.row -->

<!-- Online users -->
<!-- interactive chart -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">
      <i class="far fa-chart-bar"></i>
      Peserta Online
    </h3>

    <div class="card-tools">
      Real time
      <div class="btn-group" id="realtime" data-toggle="btn-toggle">
        <button type="button" class="btn btn-default btn-sm active" data-toggle="on">On</button>
        <button type="button" class="btn btn-default btn-sm" data-toggle="off">Off</button>
      </div>
    </div>
  </div>
  <div class="card-body">
    <div id="interactive" style="height: 300px;"></div>
  </div>
  <!-- /.card-body-->
</div>
<!-- /.card -->

<div class="card">
  <div class="card-header border-transparent">
    <h3 class="card-title">Latest User Activities</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>

  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table m-0">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Alamat Ip</th>
            <th>Details</th>
          </tr>
        </thead>
        <tbody id="lastActivity">
          @foreach ($data['userActivity'] as $key => $item)
          <tr id="{{$key}}">
            <td>{{$item->user->name}}</td>
            <td>{{$item->userIp}}</td>
            <td>{{$item->details}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>

  <div class="card-footer clearfix">
    <a href="{{route('peserta')}}" class="btn btn-sm btn-info float-left">Lihat Semua Peserta</a>
  </div>

</div>
@endsection

@push('scripts')
<!-- FLOT CHARTS -->
<script src="{{{ asset('adminLTE/plugins/flot/jquery.flot.js')}}}"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="{{ asset('adminLTE/plugins/flot/plugins/jquery.flot.resize.js')}}"></script>
<script>
  $(function () {
      /*
       * Flot Interactive Chart
       * -----------------------
       */
      // We use an inline data source in the example, usually data would
      // be fetched from a server
      var data        = [],
          totalPoints = 60
  
      function getRandomData() {
  
        if (data.length > 0) {
          data = data.slice(1)
        }

        let onlineUsers = [];
            $.ajax({
                url : '/dashboard/online',
                type: 'GET',
                async: false,
                success : function(res) {
                  $('#onlineUsers').text(res)
                  onlineUsers.push(res)
                }
            });
  
        // Do a random walk
        while (data.length < totalPoints) {
            let y = onlineUsers

            if (y < 0) {
                y = 0
            } else if (y > onlineUsers) {
                y = onlineUsers
            }
    
            data.push(y)
        }
  
        // Zip the generated y values with the x values
        var res = []
        for (var i = 0; i < data.length; ++i) {
          res.push([i, data[i]])
        }
  
        return res
      }
  
      var interactive_plot = $.plot('#interactive', [
          {
            data: getRandomData(),
          }
        ],
        {
          grid: {
            borderColor: '#f3f3f3',
            borderWidth: 1,
            tickColor: '#f3f3f3'
          },
          series: {
            color: '#3c8dbc',
            lines: {
              lineWidth: 2,
              show: true,
              fill: true,
            },
          },
          yaxis: {
            min: 0,
            max: 100,
            show: true
          },
          xaxis: {
            show: true
          }
        }
      )
  
      var updateInterval = 1000 //Fetch data ever x milliseconds
      var realtime       = 'on' //If == to on then fetch data every x seconds. else stop fetching
      function update() {
  
        interactive_plot.setData([getRandomData()])
  
        // Since the axes don't change, we don't need to call plot.setupGrid()
        interactive_plot.draw()
        if (realtime === 'on') {
          setTimeout(update, updateInterval)
        }
      }
  
      //INITIALIZE REALTIME DATA FETCHING
      if (realtime === 'on') {
        update()
      }
      //REALTIME TOGGLE
      $('#realtime .btn').click(function () {
        if ($(this).data('toggle') === 'on') {
          realtime = 'on'
        }
        else {
          realtime = 'off'
        }
        update()
      })
    })
  
    /*
     * Custom Label formatter
     * ----------------------
     */
    function labelFormatter(label, series) {
      return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
        + label
        + '<br>'
        + Math.round(series.percent) + '%</div>'
    }
</script>
<script>
  const lastActivity = $('#lastActivity');

  function doAjax() {
      $.ajax({
              type: 'GET',
              url: 'dashboard/lastactivity.json',
              data: $(this).serialize(),
              dataType: 'json',
              success: function (data) {
                  lastActivity.children().remove();
                  data.map((key) => {
                    lastActivity.append(
                      `
                      <tr id="${key.id}">
                        <td>${key.user.name}</td>
                        <td>${key.userIp}</td>
                        <td>${key.details}</td>
                      </tr>
                      `
                    );
                  });
              },
              complete: function (data) {
                      // Schedule the next
                      setTimeout(doAjax, 2000);
              }
      });
  }
  setTimeout(doAjax, 2000);
    
</script>
@endpush