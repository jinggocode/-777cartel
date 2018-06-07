@layout('_layout/admin/index')

@section('title')Data Pengampu Mata Kuliah@endsection


@section('style') 
<!-- Select2 -->
<link rel="stylesheet" href="{{base_url()}}assets/admin/bower_components/select2/dist/css/select2.min.css">
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Edit Data Pengampu Mata Kuliah
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box box-success">
  <div class="box-header with-border">
  </div>
    <div class="box-body">
      <div class="row">
        <div class="col-sm-6 col-lg-12">
          <!-- form alert -->
          @if (!empty(validation_errors()))
          <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            <h4><strong>Peringatan</strong></h4>
            <p>{{validation_errors()}}</p>
          </div>
          @endif
        </div>
        <!-- end form alert -->
      </div>
      <form class="form-horizontal" action="{{site_url('admin/master/pengampu/update')}}" method="post" enctype="multipart/form-data">
      {{$csrf}} 
      {{form_hidden('id', $data->id)}} 
        <div class="form-group">
          <label for="id_prodi" class="col-sm-2 control-label">Prodi</label>
          <div class="col-sm-4">
            <select name="id_prodi" id="id_prodi" class="form-control">
              <option value="">--Pilih Prodi--</option>
              @foreach ($prodi as $row)
                <option {{($row->id == $makul->id_prodi)?'selected':''}} value="{{$row->id}}">{{$row->nama}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="id_kelas" class="col-sm-2 control-label">Kelas</label>
          <div class="col-sm-4">
            <select name="id_kelas" id="id_kelas" class="form-control"> 
              
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="id_makul" class="col-sm-2 control-label">Mata Kuliah</label>
          <div class="col-sm-4">
            <select name="id_makul" id="id_makul" class="form-control select2">

            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="id_dosen" class="col-sm-2 control-label">Dosen</label>
          <div class="col-sm-4">
            <select name="id_dosen" id="id_dosen" class="form-control select2">
              
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->
@endsection

@section('script')  
<!-- Page script -->
<script>
$(function () {
  //Initialize Select2 Elements
  $('.select2').select2() 
})
</script>

<script src="https://d19m59y37dris4.cloudfront.net/hub/1-3-0/vendor/jquery.cookie/jquery.cookie.js">
</script>

<script> 
$(document).ready(function(){

  $.ajaxSetup({
      data: {
          csrf_test_name: $.cookie('csrf_cookie_name')
      }
  });

  var id_kelas = <?php echo $data->id_kelas; ?>; 
  var id_makul = <?php echo $data->id_makul; ?>; 
  var id_dosen = <?php echo $data->id_dosen; ?>; 
  var id_prodi = <?php echo $makul->id_prodi; ?>; 

  // ambil data kelas
  $.ajax({
      type : 'GET',
      url : '<?php echo base_url('admin/master/pengampu/get_row/getProdi'); ?>', 
      data :  {'id_kelas' : id_kelas, 'id_prodi' : id_prodi}, 
      success: function (data) {  
        $("#id_kelas").html(data); 
      }
  });

  // ambil data makul
  $.ajax({
      type : 'GET',
      url : '<?php echo base_url('admin/master/pengampu/get_row/getMakul'); ?>', 
      data :  {'id_makul' : id_makul, 'id_prodi' : id_prodi}, 
      success: function (data) {  
        $("#id_makul").html(data);
      }
  });

  // ambil data dosen
  $.ajax({
      type : 'GET',
      url : '<?php echo base_url('admin/master/pengampu/get_row/getDosen'); ?>',
      data :  {'id_dosen' : id_dosen, 'id_prodi' : id_prodi}, 
      success: function (data) {  
        $("#id_dosen").html(data);
      }
  });
  
  // fungsi dibawah bila terdapat perubahan
  $('#id_prodi').change(function(){ 
    var id_prodi = $('#id_prodi').val(); 
    
    $.ajax({
        type : 'GET',
        url : '<?php echo base_url('admin/master/pengampu/get/getProdi'); ?>',
        data :  'id_prodi=' + id_prodi,
        success: function (data) {  
          $("#id_kelas").html(data); 
        }
    });
  });

  $('#id_kelas').change(function(){ 
    var id_prodi = $('#id_prodi').val(); 
    
    $.ajax({
        type : 'GET',
        url : '<?php echo base_url('admin/master/pengampu/get/getMakul'); ?>',
        data :  'id_prodi=' + id_prodi,
        success: function (data) {  
          $("#id_makul").html(data);
        }
    });
  }); 
 
  $('#id_makul').change(function(){ 
    var id_prodi = $('#id_prodi').val(); 
    
    $.ajax({
        type : 'GET',
        url : '<?php echo base_url('admin/master/pengampu/get/getDosen'); ?>',
        data :  'id_prodi=' + id_prodi,
        success: function (data) {  
          $("#id_dosen").html(data);
        }
    });
  }); 
});
</script>
@endsection