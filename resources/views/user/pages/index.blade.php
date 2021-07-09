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
                @if (Carbon\Carbon::parse( $campaign->max_date )->diffInDays( Carbon\Carbon::now())  >= 0)
                <div class="col-lg-3">
                    <div class="card shadow box-campaign">
                        <img class="img-campaign" src="{{($campaign->image)}}">
                        <div class="title-campaign">
                            <a href="#" data-toggle="modal" data-target="#campaignModalCenter">
                                <h3>{{($campaign->title)}}</h3>
                            </a>
                        </div>
                        <div class="body-campaign">
                            <div class="penggalang">
                                <p>{{($campaign->user->name)}}</p>
                            </div>
                            <div class="progress">
                                <div class="progress-bar"></div>
                            </div>
                            <p class="card-text deadline"><b>{{ moneyFormat($campaign->total) }}</b> terkumpul dari <b>{{ moneyFormat($campaign->target_donation) }}</b> </p>
                            <div class="deadline">
                                @if (\Carbon\Carbon::parse( $campaign->max_date )->diffInDays( Carbon\Carbon::now()) > 0)
                                <p><b>{{ \Carbon\Carbon::parse( $campaign->max_date )->diffInDays( Carbon\Carbon::now()) }}</b> Hari lagi</p>
                                @else
                                <p><b>{{ \Carbon\Carbon::parse( $campaign->max_date )->diffInHours( Carbon\Carbon::now()) }}</b> Jam Lagi</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @else

                @endif

                @endforeach
            </div>
        </div>
    </section><!-- End Campaign Section -->

    <!-- Section Penerima Manfaat -->
    <section id="penerima">
        <div class="container">
            <div class="section-header">
                <h2>Penerima Manfaat</h2>
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <div class="icon-box">
                        <h3>Rp 100.000.000</h3>
                        <p>Menerima Donasi</p>

                    </div>
                </div>
                <div class="col-lg-3">alskdj</div>
                <div class="col-lg-3">alskdj</div>
                <div class="col-lg-3">alskdj</div>
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
                        <div class="icon"><i class="fa fa-bar-chart"></i></div>
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
                <div class="col-lg-3">
                    <div class="card shadow-sm">
                        <div class="container-img-publikasi">
                            <img class="card-img-top" src="assets/img/testimonial-1.jpg" alt="Card image cap">
                            <div class="title-publikasi">kajshd</div>
                        </div>
                        <div class="card-body">
                            aksjhd
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">laksdjalksjd</div>
                <div class="col-lg-3">laksdjalksjd</div>
                <div class="col-lg-3">laksdjalksjd</div>
            </div>
        </div>
    </section>
</main>
{{-- modal --}}
<!-- Modal -->
<div class="modal fade" id="campaignModalCenter" tabindex="-1" role="dialog" aria-labelledby="campaignModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <h5 class="modal-title" id="campaignModalLongTitle">Modal title</h5> --}}
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-lg-12">
              
          </div>
        </div>
        <div class="modal-footer">
            <div class="col-lg-12 text-center">
          {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
          <button type="button" class="btn btn-primary">Donasi Sekarang !</button>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
