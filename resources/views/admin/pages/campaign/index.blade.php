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
                            <button class="btn btn-primary" data-toggle="modal" data-target="#addCampaign">Tambah
                                Campaign</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="tabel-campaign">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Judul Campaign</th>
                                            <th>Kategori</th>
                                            <th>Target Donasi</th>
                                            <th>Tanggal Berahir</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($campaigns as $campaign)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$campaign->title}}</td>
                                            <td>{{$campaign->category->name}}</td>
                                            <td>{{moneyFormat($campaign->target_donation )}}</td>
                                            <td>{{$campaign->max_date }}</td>
                                            <td>
                                                <a href="{{route('admin.campaign.edit', $campaign->id)}}" class="btn btn-warning"> <i
                                                        class="fa fa-edit"></i> </a>
                                                <button onClick="destroy(this.id)" id="{{ $campaign->id }}" class="btn btn-danger"><i
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
<div class="modal fade" id="addCampaign" tabindex="-1" aria-labelledby="addCampaignLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCampaignLabel">Tambah Campaign</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admin.campaign.store')}}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    {{csrf_field()}}

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
                        <label>Judul Campaign</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                            value="{{ old('title') }}" required>
                    </div>
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="category_id" class="form-control  @error('category_id') is-invalid @enderror" value="{{ old('category_id') }}">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
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
                        <input type="number" class="form-control @error('target_donation') is-invalid @enderror" name="target_donation"
                            value="{{ old('target_donation') }}" required>
                    </div>
                    @error('target_donation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <div class="form-group">
                        <label>Tanggal Berahir</label>
                        <input type="date" class="form-control @error('max_date') is-invalid @enderror" name="max_date"
                            value="{{ old('max_date') }}" required>
                    </div>
                    @error('max_date')
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
                    url: `/admin/campaign/${id}`,
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
                                showConfirmButton: true,
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
      $('#tabel-campaign').DataTable();
    });
</script>


@endpush
