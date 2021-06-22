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

        <li class="menu-header">Main</li>
        <li class="{{ request()->is('admin/kategori') ? 'active' : '' }}">
          <a href="{{route('list.kategori')}}" class="nav-link"><i class="fas fa-fire"></i><span>Kategori</span></a>
        </li>
        <li class="{{ request()->is('admin/campaign') ? 'active' : '' }}">
          <a href="{{route('list.campaign')}}" class="nav-link"><i class="fas fa-fire"></i><span>Campaigns</span></a>
        </li>
        <li class="{{ request()->is('admin/donatur') ? 'active' : '' }}">
          <a href="{{route('list.donatur')}}" class="nav-link"><i class="fas fa-fire"></i><span>Donaturs</span></a>
        </li>
        <li class="{{ request()->is('admin/donation') ? 'active' : '' }}">
          <a href="{{route('list.donation')}}" class="nav-link"><i class="fas fa-fire"></i><span>Donations</span></a>
        </li>

        <li class="menu-header">Profil</li>
        <li class="{{ request()->is('admin/profil') ? 'active' : '' }}">
          <a href="{{ route('editProfile.user', ['id' =>  Auth::user()->id]) }}" class="nav-link"><i class="fas fa-fire"></i><span>Profil Saya</span></a>
        </li>

      <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
          <i class="fas fa-rocket"></i> Documentation
        </a>
      </div>        </aside>
  </div>
