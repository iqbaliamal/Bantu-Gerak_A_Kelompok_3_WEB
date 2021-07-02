@extends('admin.layout.master')

@section('title', 'Admin - Kategori')
@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Donatur</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Donatur</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#addCampaign">Tambah
                                Donatur</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="tabel-donatur">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Lengkap</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($donaturs as $donatur)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$donatur->name}}</td>
                                            <td>{{$donatur->email}}</td>
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
      $('#tabel-donatur').DataTable();
    });
</script>


@endpush
