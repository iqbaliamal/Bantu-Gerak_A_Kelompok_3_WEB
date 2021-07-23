@extends('admin.layout.master')

@section('title', 'Admin - Edit Publication')

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Publication</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('admin.dashboard.index')}}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{route('admin.publication.index')}}">Publication</a></div>
                <div class="breadcrumb-item">Edit Publication</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('admin.publication.update', $publication->id)}}" method="post"
                                enctype="multipart/form-data">
                                {{csrf_field()}}
                                @method('PUT')

                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="title" value="{{ $publication->title }}">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="custom-file">
                                        <label>Gambar</label>
                                        <div>

                                            <img src="{{ $publication->image }}" alt="{{ $publication->title }}"
                                                class="img-prev-admin shadow">
                                        </div>
                                        <input type="file"
                                            class="custom-file-input @error('image') is-invalid @enderror" name="image"
                                            id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea id="summernote" name="content" class="summernote" rows=""
                                        cols="40">{{$publication->content}}</textarea>
                                    @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <a href="{{route('admin.publication.index')}}" type="button"
                                        class="btn btn-secondary">Batal</a>
                                    <button type="submit" class="btn btn-primary">Save</button>
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

@push('css-libraries')
<link rel="stylesheet" href="{{asset('backend/modules/summernote/summernote-bs4.css')}}">
@endpush

@push('js-libraries')
<script src="{{asset('backend/modules/summernote/summernote-bs4.js')}}"></script>
@endpush
