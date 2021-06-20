@extends('admin.layout.master')

@section('title', 'Admin - Dashboard')
@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Kegiatan</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="">Dashboard</a></div>
              <div class="breadcrumb-item">Tambah-Kegiatan</div>
            </div>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-body">
                      <form action="{{route('add.kegiatan')}}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group">
                              <label>Nama Kegiatan</label>
                              <input type="text" class="form-control @error('nama_kegiatan') is-invalid @enderror" name="nama_kegiatan" value="{{ old('nama_kegiatan') }}" required>
                              @error('nama_kegiatan')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                            </div>
                            <div class="form-group">
                                <label>Foto Kegiatan</label>
                                <input type="file" name="foto_kegiatan" class="form-control">
                            </div>
                            <div class="form-group">
                              <label>Deskripsi</label>
                              <textarea class="form-control" id="deskripsi_kegiatan" name="deskripsi_kegiatan" rows="" cols="20"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Kegiatan</label>
                                <input type="datetime-local" class="form-control @error('tanggal_kegiatan') is-invalid @enderror" name="tanggal_kegiatan" value="{{ old('tanggal_kegiatan') }}" required>
                                @error('tanggal_kegiatan')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                              </div>
                            <div class="form-group">
                              <button type="submit" class="btn btn-primary">Tambah</button>
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
