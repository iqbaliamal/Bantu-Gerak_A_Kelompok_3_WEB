<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{route('user.landingpage.index')}}">BANTU GERAK</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{route('user.landingpage.index')}}">BG</a>
      </div>
      <ul class="sidebar-menu">

        <li class="menu-header">Dashboard</li>
        <li class="{{ request()->is('admin') ? 'active' : '' }}">
          <a href="{{route('admin.dashboard.index')}}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        </li>

        <li class="menu-header">Main</li>
        <li class="{{ request()->is('admin/category') ? 'active' : '' }}">
          <a href="{{route('admin.category.index')}}" class="nav-link"><i class="fas fa-folder"></i><span>Kategori</span></a>
        </li>
        <li class="{{ request()->is('admin/campaign') ? 'active' : '' }}">
          <a href="{{route('admin.campaign.index')}}" class="nav-link"><i class="fas fa-flag"></i><span>Campaigns</span></a>
        </li>
        {{-- <li class="{{ request()->is('admin/donatur') ? 'active' : '' }}">
          <a href="{{route('list.donatur')}}" class="nav-link"><i class="fas fa-fire"></i><span>Donaturs</span></a>
        </li> --}}
        <li class="{{ request()->is('admin/donatur') ? 'active' : '' }}">
          <a href="{{route('admin.donatur.index')}}" class="nav-link"><i class="fas fa-users"></i><span>Donatur</span></a>
        </li>
        <li class="{{ request()->is('admin/donation') ? 'active' : '' }}">
          <a href="{{route('admin.donation.index')}}" class="nav-link"><i class="fas fa-chart-line"></i><span>Donations</span></a>
        </li>
        <li class="{{ request()->is('admin/program') ? 'active' : '' }}">
          <a href="{{route('admin.program.index')}}" class="nav-link"><i class="fas fa-bookmark"></i><span>Program Kebaikan</span></a>
        </li>
        <li class="{{ request()->is('admin/faq') ? 'active' : '' }}">
          <a href="#" class="nav-link"><i class="fas fa-question-circle"></i><span>FAQ</span></a>
        </li>

        <li class="menu-header">Blog</li>
        <li class="{{ request()->is('admin/publication') ? 'active' : '' }}">
          <a href="{{route('admin.publication.index')}}" class="nav-link"><i class="fas fa-newspaper"></i><span>Publication</span></a>
        </li>

        <li class="menu-header">Profil</li>
        <li class="{{ request()->is('admin/profil') ? 'active' : '' }}">
          <a href="{{route('admin.profile.index', ['id' =>  Auth::user()->id])}}" class="nav-link"><i class="fas fa-user-circle"></i><span>Profil Saya</span></a>
        </li>

      <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
          <i class="fas fa-rocket"></i> Documentation
        </a>
      </div>
    </aside>
  </div>
