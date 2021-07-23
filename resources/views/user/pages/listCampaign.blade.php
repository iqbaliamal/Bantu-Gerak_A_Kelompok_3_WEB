@extends('user.layout.master')

@section('content')
<main id="main">
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Campaigns List</h2>
                <ol>
                    <li><a href="/">Beranda</a></li>
                    <li>Campaign List</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs Section -->
    <div class="container">
        @forelse ($campaigns as $list)
        <div class="row m-5">
            <div class="col-lg 12">
                <div class="card border-0 shadow box-campaign">
                    <a href="list-campaign/{{ $list->slug }}">
                        <img src=" {{asset($list->image)}}" class="card-img-top" alt="..."
                            style="width: 100%;height: 200px; object-fit: cover; object-position: center">
                    </a>
                    <div class="title-campaign mt-3">
                        <a href="list-campaign/{{$list->slug}}">
                            <h3>{{($list->title)}}</h3>
                        </a>
                    </div>
                    <div class="body-campaign">
                        <div class="penggalang">
                            <p> <i class="fas fa-user fa-sm"></i>&nbsp;{{($list->user->name)}}</p>
                        </div>
                        <p style="margin: 0;"><strong>Donasi terkumpul</strong></p>

                        <p><b>@foreach ($list->sumDonation as $total){{ moneyFormat($total->total) }} @endforeach</b>
                            dari <b>{{ moneyFormat($list->target_donation) }}</b>
                        </p>

                        <div class="deadline">
                            @if (\Carbon\Carbon::parse( $list->max_date )->diffInDays( Carbon\Carbon::now()) >
                            0)
                            <p><b>{{ \Carbon\Carbon::parse( $list->max_date )->diffInDays( Carbon\Carbon::now()) }}</b>
                                Hari lagi</p>
                            @else
                            <p><b>{{ \Carbon\Carbon::parse( $list->max_date )->diffInHours( Carbon\Carbon::now()) }}</b>
                                Jam Lagi</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        Data Campaign Kosong!
        @endforelse
        {{-- Pagination --}}
        <div class=" mt-5 d-flex justify-content-center">
            {{ $campaigns->links() }}
        </div>
    </div>
</main>
@endsection
