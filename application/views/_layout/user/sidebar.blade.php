  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <?php $page     = $this->uri->segment(2); ?>
      <?php $sub_page = $this->uri->segment(3); ?>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">DAFTAR MENU</li>
        <li class="{{($page == '' || $page == 'homepage')?'active':''}}"><a href="{{site_url('user/homepage')}}"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>  
        <li class="{{($page == 'url')?'active':''}}"><a target="_BLANK" href="{{site_url('user/url')}}"><i class="fa fa-external-link"></i> <span>Open URL</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
