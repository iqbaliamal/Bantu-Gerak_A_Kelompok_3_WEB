@extends('user.layout.master')

@section('content')
<section class="section-4 section" id="faq">
    <div class="container faq">
        <div class="row">
            <div class="col-lg-12">
                <div class="faq-title">
                    <h1 class="title-1">Frequently Answered Question</h1>
                </div>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    @foreach ($faq as $list)
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="flush-heading{{$loop->iteration}}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$loop->iteration}}" aria-expanded="false" aria-controls="flush-collapse{{$loop->iteration}}">
                          # {{$list->pertanyaan}}
                        </button>
                      </h2>
                      <div id="flush-collapse{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$loop->iteration}}" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">{{$list->jawaban}}</div>
                      </div>
                    </div>
                    @endforeach
                  </div>
            </div>
        </div>
    </div>
</section>
@endsection


@push('custom-js')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endpush
