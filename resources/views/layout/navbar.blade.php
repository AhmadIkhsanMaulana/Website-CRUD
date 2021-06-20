<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
        <li><a class="{{ request()->is('/') ? 'active' : '' }}" href="/"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li><a class="{{ request()->is('/guru') ? 'active' : '' }}" href="/guru"><i class="fa fa-book"></i> <span>Guru</span></a></li>
        <li><a class="{{ request()->is('/siswa') ? 'active' : '' }}" href="siswa"><i class="fa fa-book"></i> <span>Siswa</span></a></li>
</ul>

<!-- <li><a class="{{ request()->is('/user') ? 'active' : '' }}" href="/user"><i class="fa fa-book"></i> <span>User</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li> -->