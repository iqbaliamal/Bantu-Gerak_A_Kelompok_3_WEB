@extends('user.layout.master')

@section('content')
<main id="id">
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Publication Detail</h2>
                <ol>
                    <li><a href="/">Beranda</a></li>
                    <li><a href="/blog">List Blog</a></li>
                    <li>{{$blog->slug}}</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs Section -->
    <div class="container detail-page">
        <div class="img-detailpage img-detailpage-top">
            <img src="{{$blog->image}}" alt="" class="img-fluid cover fixed-height-400">
        </div>
        <h1 class="title-detailpage mt-5">{{$blog->title}}</h1>
        <p class="publisher"><i class="fas fa-user fa-sm"></i>&nbsp;{{ $blog->user->name}}</p>
        <p class="publisher">Created at: {{ Carbon\Carbon::parse($blog->created_at)->format('d-m-Y') }}</p>
        <hr>
        <div class="mt-4 mb-5 text-left">
            <h4><strong>{{$blog->title}}</strong></h4>
            <p>{!!$blog->content!!}</p>
        </div>
    </div>
</main>
@endsection
