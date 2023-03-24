<ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="/"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        @if (auth()->user()->level==1)
        <li class="{{ request()->is('guru') ? 'active' : '' }}"><a href="/guru"><i class="fa fa-dashboard"></i> <span>Guru</span></a></li>
        <li class="{{ request()->is('siswa') ? 'active' : '' }}"><a href="/siswa"><i class="fa fa-dashboard"></i> <span>Siswa</span></a></li>
        @endif

        @if (auth()->user()->level==2)
        <li class="{{ request()->is('user') ? 'active' : '' }}"><a href="/user"><i class="fa fa-dashboard"></i> <span>User</span></a></li>
        @endif

        @if (auth()->user()->level==3)
        <!-- <li class="{{ request()->is('pelanggan') ? 'active' : '' }}"><a href="/pelanggan"><i class="fa fa-dashboard"></i> <span>Pelanggan</span></a></li> -->
        <li class="treeview">
          <a href="#">
         <i class="fa fa-share"></i> <span>Pelanggan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ request()->is('pelanggan') ? 'active' : '' }}"><a href="/penjualan"><i class="fa fa-circle-o"></i> Penjualan</a></li>
            <li class="{{ request()->is('pelanggan') ? 'active' : '' }}"><a href="/pelanggan"><i class="fa fa-circle-o"></i> Pelanggan</a></li>
          </ul>
        </li>
        @endif

       
       
     
        
      </ul>