  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <?php $page     = $this->uri->segment(2); ?>
      <?php $sub_page = $this->uri->segment(3); ?>
      <?php $user = $this->ion_auth->user()->row();?>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">DAFTAR MENU</li>
        <li class="{{($page == '' || $page == 'homepage')?'active':''}}"><a href="{{site_url('admin/homepage')}}"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li> 
        <li class="{{($page == 'users')?'active':''}}"><a href="{{site_url('admin/users')}}"><i class="fa fa-user"></i> <span>Data Pengguna Aplikasi</span></a></li>
        <li class="{{($page == 'mirror')?'active':''}}"><a target="_BLANK" href="{{site_url('mirror/view/'.$user->id)}}"><i class="fa fa-external-link"></i> <span>Open URL</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
