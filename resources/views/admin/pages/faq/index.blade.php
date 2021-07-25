@extends('admin.layout.master')

@section('title', 'Admin - faq')
@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Faq</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('admin.dashboard.index')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Faq</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#addFaq">Tambah
                                Faq</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="tabel-faq">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Pertanyaan</th>
                                            <th>Jawaban</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $Faq)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$Faq->name}}</td>
                                            <td><img src="{{$Faq->image}}" style="width: 200px"></td>
                                            <td>{{$Faq->description}}</td>
                                            <td>
                                                <a href="{{route('admin.faq.edit', $Faq->id)}}"
                                                    class="btn btn-warning"> <i class="fa fa-edit"></i> </a>
                                                <button onClick="destroy(this.id)" id="{{ $Faq->id }}"
                                                    class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
<div class="modal fade" id="addFaq" tabindex="-1" aria-labelledby="addFaqLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addKategoriLabel">Tambah Faq</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admin.faq.store')}}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Pertanyaan</label>
                        <input type="text" class="form-control @error('pertanyaan') is-invalid @enderror" name="pertanyaan"
                            value="{{ old('pertanyaan') }}">
                        @error('pertanyaan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Jawaban</label>
                        <textarea class="form-control @error('jawaban') is-invalid @enderror" name="jawaban"
                            value="{{ old('jawaban') }}"></textarea>
                        @error('jawaban')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
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
                    url: `/admin/faq/${id}`,
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

@endsection

@push('css-libraries')
<link rel="stylesheet" href="{{asset('backend/modules/datatables/datatables.min.css')}}">
<link rel="stylesheet"
    href="{{asset('backend/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
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
    $(document).ready(function () {
        $('#tabel-faq').DataTable();
    });

</script>


@endpush
