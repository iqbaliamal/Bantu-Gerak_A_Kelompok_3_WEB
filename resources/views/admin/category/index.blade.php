@extends('admin.layout.master')

@section('content')

<div class="container">
<div class="row">
<div class="col-10">
<h1 class="mt-3">Kategori</h1>

<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">id</th>
        <th scope="col">nama</th>
        <th scope="col">slug</th>
        <th scope="col">image</th> 
        <th scope="col">deskription</th>
    </tr>
    </thead>
    <tbody>
    @foreach($category as $ctg )
    <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $ctg->name }}</td>
        <td>{{ $ctg->slug }}</td>
        <td>{{ $ctg->image }}</td>
        <td>{{ $ctg->deskription }}</td>
        <td>
            <a href="category/{{ $ctg->id }}/edit" class="badge badge-success">edit</a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>

</div>
</div>
</div>
@endsection