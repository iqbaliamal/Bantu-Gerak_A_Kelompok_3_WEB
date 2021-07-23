@extends('admin.layout.master')

@section('title', 'Admin - Program Kebaikan')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Program Kebaikan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('admin.dashboard.index')}}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{route('admin.program.index')}}">Program Kebaikan</a></div>
                <div class="breadcrumb-item">Edit Program Kebaikan</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('admin.program.update', $program->id)}}" method="post"
                                enctype="multipart/form-data">
                                {{csrf_field()}}
                                @method('PUT')
                                <div class="form-group">
                                    <label>Judul Program</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="title" value="{{ $program->title }}">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div>
                                    <img src="{{ $program->image }}" alt="{{ $program->name }}"
                                        class="img-prev-admin shadow mb-5">
                                </div>
                                <div class="form-group">
                                    <label>Gambar</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        name="image" value="{{ $program->image }}">
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <input type="text" class="form-control @error('description') is-invalid @enderror"
                                        name="description" value="{{ $program->description }}">
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="modal-footer">
                                    <a href="{{route('admin.program.index')}}" type="button"
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
