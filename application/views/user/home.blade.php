@layout('_layout/user/index') 

@section('title')Dashboard @endsection
 
@section('content') 

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box"> 
    <div class="box-body">
      <!-- Small boxes (Stat box) -->
      <div class="row"> 
        <div class="col-md-12">
          <h1 align="center">Selamat Datang {{$user->first_name}}</h1>
          <p align="center">anda login sebagai <strong>{{$user->group->description}}</strong></p>
        </div>
      </div>
    </div> 
    <!-- /.box-footer-->
  </div>
  <!-- /.box -->

  <div class="row"> 
      <div class="col-md-12">
        <div class="box box-success box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Ubah URL</h3> 
            <!-- /.box-tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            @if ($user->url == NULL)
              <form action="{{site_url('user/url/save')}}" method="post" class="form-horizontal">
                {{$csrf}}
                <div class="form-group">
                  <label for="url" class="col-sm-1 control-label">URL</label>
                  <div class="col-sm-6">
                    <input type="text" name="url" class="form-control" value="{{set_value('url')}}" id="url">
                  </div>
                </div> 
                
                <div class="form-group">
                  <div class="col-sm-offset-1 col-sm-10">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</button>
                  </div>
                </div>
              </form>
            @else    
              <form action="{{site_url('user/url/update')}}" method="post" class="form-horizontal">
                {{$csrf}}
                <div class="form-group">
                  <label for="url" class="col-sm-1 control-label">URL</label>
                  <div class="col-sm-6">
                    <input type="text" name="url" class="form-control" placeholder="{{$user->url}}" id="url">
                  </div>
                </div> 
                
                <div class="form-group">
                  <div class="col-sm-offset-1 col-sm-10">
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i> Ubah</button>
                  </div>
                </div>
              </form>
            @endif
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div> 
  </div>

</section>
<!-- /.content -->
@endsection