@layout('_layout/admin/index')

@section('title')Data Penilaian @endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Hasil Penilaian Dosen {{$dosen->nama}}
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          
          <center><a href="{{site_url('admin/laporan/penilaian/statistik/'.$periode->periode->id.'/'.$dosen->id_prodi)}}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a></center> 

          <h4><b>Tahun Ajaran {{$periode->periode->tahun.' Semester '.$periode->periode->semester}}</b></h4>
        </div>
        <div class="box-body">  
          
          <div id="barchart_material" style="width: 900px; height: 500px;"></div>
 
        </div> 
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
 
@section('script') 
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://d19m59y37dris4.cloudfront.net/hub/1-3-0/vendor/jquery.cookie/jquery.cookie.js"> </script>
<script type="text/javascript">
  // Load the Visualization API and the line package.
  google.charts.load('current', {'packages':['bar']});
  // Set a callback to run when the Google Visualization API is loaded.
  google.charts.setOnLoadCallback(drawChart);

  $.ajaxSetup({
      data: {
          csrf_test_name: $.cookie('csrf_cookie_name')
      }
  }); 
  function drawChart() {

      $.ajax({
      type: 'POST', 
      url: '<?php echo site_url('admin/laporan/penilaian/detail/'.$periode->id_periode.'/'.$dosen->id.'/get_list'); ?>',
        
      success: function (data1) {
      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable();

      data.addColumn('string', 'Judul');
      data.addColumn('number', 'Sangat Baik');
      data.addColumn('number', 'Baik');
      data.addColumn('number', 'Cukup');
      data.addColumn('number', 'Kurang');
        
      var jsonData = $.parseJSON(data1);
      
      for (var i = 0; i < jsonData.length; i++) {
            data.addRow([jsonData[i].judul, parseInt(jsonData[i].sangat_baik), parseInt(jsonData[i].baik), parseInt(jsonData[i].cukup), parseInt(jsonData[i].kurang)]);
      }
      var options = {
        chart: {
          title: 'Statistik Seluruh Matakuliah yang diampu',
        },
        bars: 'horizontal',
        width: 900,
        height: 500,
        axes: {
          x: {
            0: {side: 'top'}
          }
        },
        colors: ['green', 'blue', 'yellow', 'red']
        
      };
      var chart = new google.charts.Bar(document.getElementById('barchart_material'));
      chart.draw(data, options);
      }
    });
  }
</script>
@endsection