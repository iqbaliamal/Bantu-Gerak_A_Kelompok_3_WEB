@extends('user.layout.master')

@section('content')
<main id="main">
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Riwayat Donasi</h2>
                <ol>
                    <li><a href="/">Beranda</a></li>
                    <li>Riwayat Donasi</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs Section -->
    <div class="container">
        @forelse ($riwayatDonasi as $riwayat)
        <div class="card border-0 shadow box-campaign">
            <div class="row m-5">
                <div class="col-lg-4">
                    <a href="list-campaign/slug-slug">
                        <img src="{{$riwayat->campaign->image}}" class="card-img-top" alt="..." style="width: 100%;height:
                        200px; object-fit: cover; object-position: center">
                        {{-- <img src="{{asset('user/img/bg-hero.png')}}" alt="..."
                        style="width: 300px;height: 100%; object-fit: cover; object-position: center"> --}}
                    </a>
                </div>
                <div class="col-lg-6">
                    <div class="title-campaign mt-3">
                        <a href="list-campaign/slug-slug">
                            <h3>{{$riwayat->campaign->title}}</h3>
                        </a>
                    </div>
                    <div class="detail-riwayat">
                        <div class="mt-5 mb-5 ml-3">
                            <p>{{Carbon\Carbon::parse($riwayat->created_at)->isoFormat('D MMMM Y')}}</p>
                            <p><strong>{{moneyFormat($riwayat->amount)}}</strong></p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        @if ($riwayat->status == 'success')
                        @else
                        <button class="btn btn-riwayat" onclick="pay_button(this.id)"
                            id="{{$riwayat->snap_token}}">BAYAR SEKARANG</button>
                        @endif
                    </div>
                </div>
                <div class="col-lg-2">
                    @if ($riwayat->status == 'pending')
                    <div class="alert badge-warning" role="alert">
                        <strong>PENDING</strong>
                    </div>
                    @elseif ($riwayat->status == 'success')
                    <div class="alert badge-success" role="alert">
                        <strong>SUCCESS</strong>
                    </div>
                    @elseif ($riwayat->status == 'failed')
                    <div class="alert badge-danger" role="alert">
                        <strong>FAILED</strong>
                    </div>
                    @else
                    <div class="alert badge-expired" role="alert">
                        <strong>EXPIRED</strong>
                    </div>
                    @endif
                </div>
            </div>
        </div>


        <script type="text/javascript">
            function pay_button(id) {
                var coba = id;
                // SnapToken acquired from previous step
                snap.pay(coba, {
                    // Optional
                    onSuccess: function (result) {
                        // console.log(result);
                        // $.ajax({
                        // url: `/donasi/notificationHandler`,
                        // type: 'POST',
                        // data: {
                        //     getContent : JSON.stringify(result, null, 2)
                        // },
                        // success: function(info){
                        //     console.log(info);
                        // }

                        // });

                        // var data = $(this).data(JSON.stringify(result, null, 2));
                        var base = '{!! route('
                        user.donasi.index ') !!}';
                        // var url = base+'?data='+data ;

                        window.location.href = base;
                        // window.location.href = "{{ route('user.donasi.handler')}}";
                        // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                        // window.location.href = {{ route('user.donasi.handler') }} += JSON.stringify(result, null, 2);
                    },
                    // Optional
                    onPending: function (result) {
                        console.log(result);

                        // $.ajax({
                        // url: `/donasi/notificationHandler`,
                        // type: 'POST',
                        // // data: JSON.stringify(result, null, 2),
                        // data: {
                        //     getContent : JSON.stringify(result, null, 2)
                        // },
                        // success: function(info){
                        //     console.log(info);
                        // }

                        // });
                        // var data = $(this).data(JSON.stringify(result, null, 2));
                        var base = '{!! route('
                        user.donasi.index ') !!}';
                        // var url = base+'?data='+data ;

                        window.location.href = base;
                        // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    },
                    // Optional
                    onError: function (result) {
                        console.log(result);

                        // $.ajax({
                        // url: `/donasi/notificationHandler`,
                        // type: 'POST',
                        // // data: JSON.stringify(result, null, 2),
                        // data: {
                        //     getContent : JSON.stringify(result, null, 2)
                        // },
                        // success: function(info){
                        //     console.log(info);
                        // }

                        // });
                        // var data = $(this).data(JSON.stringify(result, null, 2));
                        var base = '{!! route('
                        user.donasi.index ') !!}';
                        // var url = base+'?data='+data ;

                        window.location.href = base;
                        // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    }
                });
            };

        </script>
        @empty
        Data Riwayat Donasi Kosong!
        @endforelse
        {{-- Pagination --}}
        {{-- <div class=" mt-5 d-flex justify-content-center">
            {{ $campaigns->links() }}
    </div> --}}
    </div>
</main>

@endsection

@push('midtrans')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-0H--sK_7opBV4J_s"></script>
@endpush
