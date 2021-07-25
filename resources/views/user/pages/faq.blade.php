@extends('user.layout.master')

@section('content')
<section class="section-4 section" id="faq">
    <div class="container faq">
        <div class="row">
            <div class="col-lg-12">
                <div class="faq-title">
                    <h1 class="title-1">Frequently Answered Question</h1>
                </div>
                <div class="accordion accordion-flush" id="accordionFlushExample" data-aos="zoom-in-up">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                Apakah ada batasan usia untuk peserta yang mengikuti lomba Bisnis TIK?
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Tidak ada. Sejauh peserta terdaftar sebagai mahasiswa dibuktikan
                                dari kartu mahasiswa yang masih aktif.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
