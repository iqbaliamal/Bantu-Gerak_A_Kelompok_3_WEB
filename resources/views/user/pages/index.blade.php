@extends('user.layout.master')

@section('content')
<!-- ======= Intro Section ======= -->
<section id="intro">
    <div class="container">
        <div class="row align-items-center mt-5">
            <div class="col-lg-6">
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="hero-inner">
                    <h2>BANTU GERAK</h2>
                    <p>“Dampak yang luar biasa berawal dari langkah kecil dan kemauan untuk memulai”</p>
                    <h3>Tertarik Untuk Donasi?</h3>
                    <a href="#campaign" class="hero-btn">Donasi Sekarang!</a>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

</section><!-- End Intro Section -->

<main id="main">

    <!-- Section Campaign -->
    <section id="campaign">
        <div class="container">
            <div class="section-header">
                <h2>Mereka yang membutuhkan</h2>
            </div>

            <div class="row">
                @foreach ($campaigns as $campaign)
                @if (Carbon\Carbon::parse( $campaign->max_date )->diffInDays( Carbon\Carbon::now()) >= 0)
                <div class="col-lg-3">
                    <div class="card shadow border-0 box-campaign">
                        <img class="img-campaign" src="{{($campaign->image)}}">
                        <div class="title-campaign">
                            <a href="/list-campaign/{{$campaign->slug}}">
                                <h3>{{($campaign->title)}}</h3>
                            </a>
                        </div>
                        <div class="body-campaign">
                            <div class="penggalang">
                                <p>{{($campaign->user->name)}}</p>
                            </div>
                            <p class="card-text" style="margin: 0;"><strong>Donasi terkumpul</strong></p>

                            <p class="card-text deadline"><b>@foreach ($campaign->sumDonation as
                                    $total){{ moneyFormat($total->total) }} @endforeach</b> dari
                                <b>{{ moneyFormat($campaign->target_donation) }}</b>
                            </p>

                            <div class="deadline">
                                @if (\Carbon\Carbon::parse( $campaign->max_date )->diffInDays( Carbon\Carbon::now()) >
                                0)
                                <p><b>{{ \Carbon\Carbon::parse( $campaign->max_date )->diffInDays( Carbon\Carbon::now()) }}</b>
                                    Hari lagi</p>
                                @else
                                <p><b>{{ \Carbon\Carbon::parse( $campaign->max_date )->diffInHours( Carbon\Carbon::now()) }}</b>
                                    Jam Lagi</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @else

                @endif

                @endforeach
            </div>
            <div class="col-md-12 d-flex justify-content-center bot-section3">
                <a href="{{route('user.campaign.index')}}" class="btn btn-load">Load More</a>
            </div>
        </div>
    </section><!-- End Campaign Section -->

    <!-- Section Penerima Manfaat -->
    <section id="penerima">
        <div class="section-header">
            <div class="container">
                <h2>Penerima Manfaat</h2>
            </div>
        </div>
        <div class="section-count">
            <div class="container">

                <div class="row ">
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="card shadow border-0 p-5 recap-list">
                            <span class="recap-list-icon">
                                <img src="{{asset('user/img/icon/donasi.svg')}}" alt="">
                            </span>
                            <span class="recap-list-detail">
                                <h1 id="ododonasi" class="odometer odometer-auto-theme mb-1">{{$campaigns_count}}</h1>
                                <p>Penerima Manfaat</p>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="card shadow border-0 p-5 recap-list">
                            <span class="recap-list-icon">
                                <img src="{{asset('user/img/icon/relawan.svg')}}" alt="">
                            </span>
                            <span class="recap-list-detail">

                                <h4 id="odorelawan" class="odometer odometer-auto-theme mb-1"><strong>{{moneyFormat($sum_donations)}}</strong></h4>
                                <p>Total Donasi</p>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="card shadow border-0 p-5 recap-list">
                            <span class="recap-list-icon">
                                <img src="{{asset('user/img/icon/donatur.svg')}}" alt="">
                            </span>
                            <span class="recap-list-detail">

                                <h1 id="ododonatur" class="odometer odometer-auto-theme mb-1">{{$programs_count }}</h1>
                                <p>Program Kebaikan</p>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Peneima Section -->

    <!-- Section Program Kebaikan -->
    <section id="program">
        <div class="container">
            <div class="section-header">
                <h2>Program kebaikan</h2>
            </div>

            <div class="row">
                @foreach ($programs as $program)
                <div class="col-lg-4">
                    <div class="box wow fadeInLeft">
                        <div class="icon shadow-sm"><img src="{{$program->image}}" style="max-width: 75px;" alt="">
                        </div>
                        <h4 class="title"><a href="">{{$program->title}}</a></h4>
                        <p class="description">{{$program->description}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Program Section -->

    <!-- Section Publikasi -->
    <section id="publikasi">
        <div class="container">
            <div class="section-header">
                <h2>Publikasi</h2>
            </div>

            <div class="row">
                @foreach ($publications as $publication)
                <div class="col-md-4 col-sm-10 my-3">
                    <div class="card border-0 shadow">
                        <a href="blog/{{ $publication->slug }}"><img src=" {{asset($publication->image)}}"
                                class="card-img-top" alt="..."
                                style="width: 100%;height: 200px; object-fit: cover; object-position: center"></a>
                        <div class="card-body">
                            <div class="card-head d-flex justify-content-between">
                                <a class="news-tag" href=""></a>
                                <p class="news-date">
                                    @if (Carbon\Carbon::now()->diffInDays($publication->created_at) > 14)
                                    {{ Carbon\Carbon::parse($publication->created_at)->format('d-m-Y') }}
                                    @else
                                    {{ Carbon\Carbon::parse($publication->created_at)->diffForHumans() }}
                                    @endif
                                </p>
                            </div>
                            <h5 class="card-title"><a href="blog/{{ $publication->slug }}">{{ $publication->title}}</a>
                            </h5>

                            <p class="card-text">{{ Str::substr(strip_tags($publication->content), 0, 100) }}....</p>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <p class="publisher"><i
                                        class="fas fa-user fa-sm"></i>&nbsp<span>{{ $publication->user->name}}</span>
                                </p>
                                <a href="blog/{{ $publication->slug }}" class="card-foot">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-12 d-flex justify-content-center bot-section3">
                <a href="{{route('user.blog.index')}}" class="btn btn-load">Load More</a>
            </div>
        </div>
    </section>
</main>
@endsection
