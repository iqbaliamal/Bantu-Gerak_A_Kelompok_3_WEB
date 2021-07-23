@extends('admin.layout.master')

@section('title', 'Admin - Kategori')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Kategori</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Kategori</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('admin.category.update', $category->id)}}" method="post"
                                enctype="multipart/form-data">
                                {{csrf_field()}}
                                @method('PUT')
                                <div class="form-group">
                                    <label>Nama Kategori</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ $category->name }}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Gambar</label>
                                    <div>

                                        <img src="{{ $category->image }}" alt="{{ $category->name }}"
                                            class="img-prev-admin shadow">
                                    </div>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        name="image" value="{{ $category->image }}">
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <input type="text" class="form-control @error('description') is-invalid @enderror"
                                        name="description" value="{{ $category->description }}">
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="modal-footer">
                                    <a href="{{route('admin.category.index')}}" type="button"
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
