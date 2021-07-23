@extends('admin.layout.master')

@section('title', 'Admin - Campaign')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Campaign</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('admin.dashboard.index')}}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{route('admin.campaign.index')}}">Campaign</a></div>
                <div class="breadcrumb-item">Edit Campaign</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('admin.campaign.update', $campaign->id)}}" method="post"
                                enctype="multipart/form-data">
                                {{csrf_field()}}
                                @method('PUT')

                                <div class="form-group">
                                    <div class="custom-file">
                                        <label>Gambar</label>
                                        <div>
                                            <img src="{{ $campaign->image }}" alt="{{ $campaign->name }}"
                                                class="img-prev-admin shadow">
                                        </div>
                                        <input type="file"
                                            class="custom-file-input @error('image') is-invalid @enderror" name="image"
                                            id="customFile" value="{{ $campaign->image }}">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Judul Campaign</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="title" value="{{ old('title', $campaign->title) }}">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select name="category_id"
                                        class="form-control  @error('category_id') is-invalid @enderror"
                                        value="{{ old('category_id') }}">
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}" @if($campaign->category_id == $category->id)
                                            selected @endif>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Target Donasi</label>
                                    <input type="number"
                                        class="form-control @error('target_donation') is-invalid @enderror"
                                        name="target_donation"
                                        value="{{ old('target_donation', $campaign->target_donation) }}"
                                        placeholder="Target Donasi, Ex: 10000000">
                                    @error('target_donation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Tanggal Berahir</label>
                                    <input type="date" class="form-control @error('max_date') is-invalid @enderror"
                                        name="max_date" value="{{ old('max_date', $campaign->max_date) }}" required>
                                    @error('max_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror"
                                        name="description">{{ old('description', $campaign->description) }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="modal-footer">
                                    <a href="{{route('admin.campaign.index')}}" type="button"
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
