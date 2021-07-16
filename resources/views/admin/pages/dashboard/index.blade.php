@extends('admin.layout.master')

@section('title', 'Admin - Dashboard')
@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Donaturs</h4>
                  </div>
                  <div class="card-body">
                    {{$donaturs}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="far fa-flag"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Campaign</h4>
                  </div>
                  <div class="card-body">
                    {{$campaigns}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Donation</h4>
                  </div>
                  <div class="card-body">
                    {{ moneyFormat($donations) }}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="section-body">
              <div class="row">
                  <div class="col-12">
                      <div class="card">
                        <div class="card-body">
                              <h3 class="text-center">Selamat Datang {{Auth::user()->name}}! Tetap Semangat 🔥</h3>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
    </section>
</div>
@endsection

@push('css-libraries')
<link rel="stylesheet" href="{{asset('admin/modules/ionicons/css/ionicons.min.css')}}">

@endpush

@push('js-libraries')
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="{{asset('admin/js/page/modules-ion-icons.js')}}"></script>

@endpush

@push('cutomcss')

@endpush

@push('customjs')

@endpush
