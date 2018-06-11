<nav class="navbar navbar-static-top navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a href="{{site_url('mahasiswa/homepage')}}" class="navbar-brand"><img style="display:inline-block; margin-top: -7px; max-width:100px; margin-right: 3px" src="{{base_url('assets/image/logo.png')}}" width="34" alt=""> <b>777cartel</b></a>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
        <i class="fa fa-bars"></i>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse pull-right" id="navbar-collapse">
      <ul class="nav navbar-nav">
        <!-- <li class="active"><a href="#">Beranda <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Data Kuisioner</a></li>
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li> -->
      </ul>
      <div class="navbar-custom-menu">

        <?php $user = $this->ion_auth->user()->row(); ?>
        <ul class="nav navbar-nav"> 
          <li><a href="{{site_url('auth/logout')}}"><i class="fa fa-sign-out"></i> Sign Out</a></li>  

        </ul>
      </div>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>
