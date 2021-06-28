@extends('admin.layout.master')

@section('title', 'Admin - Kategori')
@section('content')
<!-- Main Content -->
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
                        <div class="card-header">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#addKategori">Tambah
                                Kategori</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="tabel-kategori">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Kategori</th>
                                            <th>Gambar</th>
                                            <th>Deskripsi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $kategori)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$kategori->name}}</td>
                                            <td><img src="{{$kategori->image}}" style="width: 200px"></td>
                                            <td>{{$kategori->description}}</td>
                                            <td>
                                                <a href="{{route('admin.category.edit', $kategori->id)}}" class="btn btn-warning"> <i
                                                        class="fa fa-edit"></i> </a>
                                                <button onClick="destroy(this.id)" id="{{ $kategori->id }}" class="btn btn-danger"><i
                                                    class="fa fa-trash"></i></button>
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
<div class="modal fade" id="addKategori" tabindex="-1" aria-labelledby="addKategoriLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addKategoriLabel">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" required>
                    </div>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                            value="{{ old('image') }}" required>
                    </div>
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                            value="{{ old('description') }}" required></textarea>
                    </div>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach($data as $category2)
{{-- <div class="modal fade" id="edit{{ $loop->iteration }}" tabindex="-1" aria-labelledby="modalEdit"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEdit">Edit Kategori {{$category2->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admin.category.update')}}" method="post">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ $category2->name }}" required>
                    </div>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <div class="form-group">
                        <label>Gambar</label>
                        <img src="{{ $category2->image }}" alt="{{ $category2->name }}">
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                            value="{{ $category2->image }}" required>
                    </div>
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" name="description"
                            value="{{ $category2->description }}" required>
                    </div>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div> --}}

<div class="modal fade" id="delete{{ $loop->iteration }}" tabindex="-1" aria-labelledby="modalDelete"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDelete">Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah kamu yakin untuk menghapusnya ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="{{route('admin.category.destroy', $category2->id)}}" id="{{ $category2->id }}" type="button"
                    class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
<script>
    //ajax delete
    function destroy(id) {
        var id = id;
        var token = $("meta[name='csrf-token']").attr("content");

        Swal.fire({
            title: 'APAKAH KAMU YAKIN ?',
            text: "INGIN MENGHAPUS DATA INI!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'BATAL',
            confirmButtonText: 'YA, HAPUS!',
        }).then((result) => {
            if (result.isConfirmed) {
                //ajax delete
                jQuery.ajax({
                    url: `/admin/category/${id}`,
                    data: {
                        "id": id,
                        "_token": token
                    },
                    type: 'DELETE',
                    success: function (response) {
                        if (response.status == "success") {
                            Swal.fire({
                                icon: 'success',
                                title: 'BERHASIL!',
                                text: 'DATA BERHASIL DIHAPUS!',
                                showConfirmButton: false,
                                timer: 3000
                            }).then(function () {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'GAGAL!',
                                text: 'DATA GAGAL DIHAPUS!',
                                showConfirmButton: false,
                                timer: 3000
                            }).then(function () {
                                location.reload();
                            });
                        }
                    }
                });
            }
        })
    }
</script>
@endforeach

@endsection

@push('css-libraries')
<link rel="stylesheet" href="{{asset('backend/modules/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">
@endpush

@push('js-libraries')
<script src="{{asset('backend/modules/datatables/datatables.min.js')}}"></script>
<script src="{{asset('backend/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>
<script src="{{asset('backend/modules/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('backend/js/page/modules-datatables.js')}}"></script>

<script src="{{asset('backend/modules/sweetalert/sweetalert.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endpush

@push('customjs')
<script type="text/javascript">
    $(document).ready(function() {
      $('#tabel-kategori').DataTable();
    });
</script>


@endpush

