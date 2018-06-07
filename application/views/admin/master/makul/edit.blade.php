@layout('_layout/admin/index')

@section('title')Data Mata Kuliah@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Edit Data Mata Kuliah
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
      <form class="form-horizontal" action="{{site_url('admin/master/makul/update')}}" method="post" enctype="multipart/form-data">
      {{$csrf}}
      {{form_hidden('id', $data->id);}}

        <div class="form-group">
          <label for="nama" class="col-sm-2 control-label">Nama</label>
          <div class="col-sm-6">
            <input type="text" name="nama" class="form-control" value="{{$data->nama}}" id="nama">
          </div>
        </div>
        <div class="form-group">
          <label for="jenis" class="col-sm-2 control-label">Jenis Makul</label>
          <div class="col-sm-6">
            <select required name="jenis" id="jenis" class="form-control">
              <option value="">--Pilih Makul--</option>
              <option {{('0' == $data->jenis)?'selected':''}} value="0">TEORI</option>
              <option {{('1' == $data->jenis)?'selected':''}} value="1">PRAKTIKUM</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="no_telp" class="col-sm-2 control-label">Program Studi</label>
          <div class="col-sm-4">
            <select name="id_prodi" id="id_prodi" class="form-control">
              <option value="">--Pilih Program Studi--</option>
              @foreach ($prodi as $row)
                <option {{($row->id == $data->id_prodi)?'selected':''}} value="{{$row->id}}">{{$row->nama}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="no_telp" class="col-sm-2 control-label">Semester</label>
          <div class="col-sm-4">
            <select name="semester" id="semester" class="form-control">
              <option value="">--Pilih Semester--</option>
              @for ($i=1; $i < 8; $i++)
                <option {{($i == $data->semester)?'selected':''}} value="{{$i}}">{{$i}}</option>
              @endfor
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