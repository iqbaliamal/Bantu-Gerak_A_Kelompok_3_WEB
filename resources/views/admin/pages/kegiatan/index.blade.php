@extends('admin.layout.master')

@section('title', 'Admin - Dashboard')
@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        {{-- <h1>{{$title}}</h1> --}}
        <div class="section-header">
            <h1>List Artikel</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">List-Artikel</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{route('tambah.kegiatan')}}" class="btn btn-primary">Tambah Kegiatan</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="tabel-artikel">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Kegiatan</th>
                                            <th>Gambar</th>
                                            <th>Deskripsi</th>
                                            <th>Tanggal Kegiatan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $kegiatan)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$kegiatan->nama_kegiatan}}</td>
                                            <td><img src="{{asset($kegiatan->foto_kegiatan)}}" alt="foto" width="100px" height="100px"></td>
                                            <td>{{$kegiatan->deskripsi_kegiatan}}</td>
                                            <td>{{$kegiatan->tanggal_kegiatan}}</td>
                                            <td>
                                                <a href="{{route('edit.kegiatan', ['id' => $kegiatan->id])}}"
                                                    class="btn btn-warning"> <i class="fa fa-edit"></i> </a>
                                                <a href="#" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#exampleModal{{ $loop->iteration }}"> <i
                                                        class="fa fa-trash"></i> </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@foreach($data as $artikel2)
<div class="modal fade" id="exampleModal{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">
            Apakah kamu yakin untuk menghapusnya ?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <a href="{{ route('delete.kegiatan', ['id' => $artikel2->id])}}" type="submit" class="btn btn-danger">Hapus</a>
          </div>
      </div>
    </div>
  </div>
  @endforeach
@endsection

