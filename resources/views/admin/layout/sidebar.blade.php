<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Stisla</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">

        <li class="menu-header">Dashboard</li>
        <li class="{{ request()->is('admin') ? 'active' : '' }}">
          <a href="/admin" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        </li>

        <li class="menu-header">Donasi</li>
        <li class="{{ request()->is('admin/donasi') || request()->is('admin/donatur') || request()->is('admin/ajukan-donasi')? 'active' : '' }} dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Donasi</span></a>
            {{-- <ul class="dropdown-menu">
              <li><a class="{{ request()->is('admin/donasi') ? 'active' : '' }} nav-link" href="{{route('list.donasi')}}">Donasi</a></li>
              <li><a class="{{ request()->is('admin/donatur') ? 'active' : '' }} nav-link" href="{{route('list.donatur')}}">Donatur</a></li>
              <li><a class="{{ request()->is('admin/ajukan-donasi') ? 'active' : '' }} nav-link" href="{{route('list.ajukan-donasi')}}">Ajukan Donasi</a></li>
            </ul> --}}
            <ul class="dropdown-menu">
              <li><a class="{{ request()->is('admin/donasi') ? 'active' : '' }} nav-link" href="">Donasi</a></li>
              <li><a class="{{ request()->is('admin/donatur') ? 'active' : '' }} nav-link" href="#">Donatur</a></li>
            </ul>
            <li><a class="{{ request()->is('admin/ajukan-donasi') ? 'active' : '' }} nav-link" href="#"><i class="fas fa-columns"></i><span>Ajukan Donasi</span></a></li>
        </li>

        <li class="menu-header">Kegiatan</li>
        <li class="{{ request()->is('admin/kegiatan') ? 'active' : '' }}">
          <a href="{{route('list.kegiatan')}}" class="nav-link"><i class="fas fa-fire"></i><span>Kegiatan</span></a>
        </li>

      <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
          <i class="fas fa-rocket"></i> Documentation
        </a>
      </div>        </aside>
  </div>
