@extends('admin.layout.master')

@section('title', 'Admin - Kategori')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Donatur</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Donatur</div>
            </div>
        </div>
        <div class="section-body">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.donation.filter') }}" method="GET">
                            <div class="form-row align-items-center">
                                <div class="col-lg-5 col-sm-auto">
                                    <label for="inlineFormInput">Tanggal Awal</label>
                                    <input type="date" class="form-control mb-2" name="date_from"
                                        value="{{ old('date_form') ?? request()->query('date_from') }}">
                                </div>
                                <div class="col-lg-5 col-sm-auto">
                                    <label for="inlineFormInput">Tanggal Ahir</label>
                                    <input type="date" class="form-control mb-2" name="date_to"
                                        value="{{ old('date_to') ?? request()->query('date_to') }}">
                                </div>
                                <div class="col-lg-2 col-sm-auto">
                                    <button class="btn btn-primary mt-3 btn-block">Filter</button>
                                </div>
                            </div>
                        </form>

                        @if ($donations ?? '')
                        @if (count($donations) > 0)
                        <div class="table-responsive">
                            <table class="table table-striped" id="tabel-donatur">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Donatur</th>
                                        <th>Campaign</th>
                                        <th>Tanggal</th>
                                        <th>Jumlah Donasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($donations as $donation)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$donation->user->name}}</td>
                                        <td>{{$donation->campaign->title}}</td>
                                        <td>{{$donation->created_at}}</td>
                                        <td>{{moneyFormat($donation->amount)}}</td>
                                    </tr>
                                    @empty
                                    <div class="alert alert-danger" role="alert">
                                        Data belum Tersedia!
                                    </div>
                                    @endforelse
                                    <tr class="border bg-dark">
                                        <td colspan="3" class="text-white">
                                            Total Donasi
                                        </td>
                                        <td colspan="3" class="text-white">
                                            <b>{{ moneyFormat($total) }}</b>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @endif
                        @endif
                    </div>

                </div>
            </div>

        </div>
    </section>
</div>
@endsection
