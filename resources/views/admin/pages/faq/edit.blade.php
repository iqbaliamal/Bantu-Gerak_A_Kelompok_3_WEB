@extends('admin.layout.master')

@section('title', 'Admin - faq')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Faq</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{route('admin.faq.index')}}">Faq</a></div>
                <div class="breadcrumb-item">Edit Faq</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('admin.faq.update', $Faq->id)}}" method="post"
                                enctype="multipart/form-data">
                                {{csrf_field()}}
                                @method('PUT')
                                <div class="form-group">
                                    <label>Pertanyaan</label>
                                    <input type="text" class="form-control @error('pertanyaan') is-invalid @enderror"
                                        name="pertanyaan" value="{{ $Faq->pertanyaan }}">
                                    @error('pertanyaan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Jawaban</label>
                                    <input type="text" class="form-control @error('jawaban') is-invalid @enderror"
                                        name="jawaban" value="{{ $Faq->jawaban }}">
                                    @error('jawaban')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="modal-footer">
                                    <a href="{{route('admin.faq.index')}}" type="button"
                                        class="btn btn-secondary">Batal</a>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
