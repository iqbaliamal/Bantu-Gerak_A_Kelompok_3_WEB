@extends('user.layout.master')

@section('content')
<main id="id">
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Detail Campaign</h2>
                <ol>
                    <li><a href="/">Beranda</a></li>
                    <li><a href="/list-campaign">List Campaign</a></li>
                    <li>{{$data->slug}}</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs Section -->
    <div class="container detail-page">
        <div class="img-detailpage img-detailpage-top">
            <img src="{{$data->image}}" alt="" class="img-fluid cover fixed-height-400">
        </div>
        <h1 class="title-detailpage mt-5">{{$data->title}}</h1>

        <div class="col-lg-12">
            <div class="penggalang mb-2">
                <strong>{{$data->user->name}}</strong>
            </div>
            <div class="progress">
                <div class="progress-bar" role="progressbar"
                    style="width: {{ percentage($danaSementara, $data->target_donation) }}%"
                    aria-valuenow="{{ percentage($danaSementara, $data->target_donation) }}" aria-valuemin="0"
                    aria-valuemax="100"></div>
            </div>
            <p class="card-text deadline"><b>{{ moneyFormat($danaSementara) }}</b> terkumpul dari
                <b>{{ moneyFormat($data->target_donation) }}</b> </p>
            <div class="row justify-content-between">
                <div class="col-auto">

                </div>
                <div class="col-auto">
                    @if (\Carbon\Carbon::parse( $data->max_date )->diffInDays( Carbon\Carbon::now()) > 0)
                    <p><b>{{ \Carbon\Carbon::parse( $data->max_date )->diffInDays( Carbon\Carbon::now()) }}</b> Hari
                        lagi
                    </p>
                    @else
                    <p><b>{{ \Carbon\Carbon::parse( $data->max_date )->diffInHours( Carbon\Carbon::now()) }}</b> Jam
                        Lagi
                    </p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-12 text-center mt-3 mb-5 ">
            @auth
            <a href="#" data-toggle="modal" data-target="#campaignModalCenter">
                <button type="button" class="btn btn-primary">Donasi Sekarang !</button>
            </a>
            @endauth

            @guest
            <a href="{{route('show.login')}}">
                <button type="button" class="btn btn-primary">Donasi Sekarang !</button>
            </a>
            @endguest
        </div>
        <h3><strong>Penggalang Dana</strong></h3>
        <h6><strong>{{$data->user->name}}</strong></h6>

        <h3><strong>Cerita</strong></h3>
        <p>{{$data->description}}</p>
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="campaignModalCenter" tabindex="-1" role="dialog" aria-labelledby="campaignModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="campaignModalLongTitle"><strong>Masukkan Nominal Donasi</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <form action="{{route('user.donasi.store')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="text" value="{{$data->slug}}" name="campaignSlug" hidden>
                            <label for="amount"><strong>Rp.</strong></label>
                            <input type="number" class="form-control @error('amount') is-invalid @enderror" id="amount"
                                name="amount" placeholder="0" value="{{ old('amount') }}">
                            <small class="form-text text-muted">Silahkan masukkan jumlah yang akan anda
                                donasikan.</small>
                        </div>

                        @error('amount')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <div class="form-group">
                            <label for="pray"><strong>Do'a</strong></label>
                            <textarea name="pray" id="pray" class="form-control @error('pray') is-invalid @enderror"
                                cols="30" rows="5">{{ old('pray') }}</textarea>
                        </div>
                        @error('pray')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="col-lg-12 text-center">
                            <button type="submit" class="btn btn-primary">Lanjut Pembayaran</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
