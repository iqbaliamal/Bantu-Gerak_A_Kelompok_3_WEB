@extends('user.layout.master')

@section('content')
<main id="main">
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Publication List</h2>
                <ol>
                    <li><a href="/">Beranda</a></li>
                    <li>List Blog</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs Section -->
    <div class="container">
        @forelse ($blogs as $blog)
        <div class="row m-5">
            <div class="col-lg 12">
                <div class="card border-0 shadow">
                    <a href="blog/{{ $blog->slug }}"><img src=" {{asset($blog->image)}}" class="card-img-top" alt="..."
                            style="width: 100%;height: 200px; object-fit: cover; object-position: center"></a>
                    <div class="card-body">
                        <div class="card-head d-flex justify-content-between">
                            <a class="news-tag" href=""></a>
                            <p class="news-date">
                                @if (Carbon\Carbon::now()->diffInDays($blog->created_at) > 14)
                                {{ Carbon\Carbon::parse($blog->created_at)->format('d-m-Y') }}
                                @else
                                {{ Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}
                                @endif
                            </p>
                        </div>
                        <h5 class="card-title"><a href="blog/{{ $blog->slug }}">{{ $blog->title}}</a></h5>

                        <p class="card-text">{{ Str::substr(strip_tags($blog->content), 0, 100) }}....</p>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <p class="publisher"><i
                                    class="fas fa-user fa-sm"></i>&nbsp<span>{{ $blog->user->name}}</span></p>
                            <a href="blog/{{ $blog->slug }}" class="card-foot">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        Data Artikel Kosong
        @endforelse
        {{-- Pagination --}}
        <div class=" mt-5 d-flex justify-content-center">
            {{ $blogs->links() }}
        </div>
    </div>
</main>
@endsection
