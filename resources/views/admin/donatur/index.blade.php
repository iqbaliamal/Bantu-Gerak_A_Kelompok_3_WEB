@extends('layouts.app')

@section('content')

<div class="container">
<div class="row">
<div class="col-10">
<h1 class="mt-3">Daftar Donatur</h1>

<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">no</th>
        <th scope="col">nama</th>
        <th scope="col">email</th>
        <th scope="col">avatar</th> 
        <th scope="col">action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($donatur as $dnt )
    <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $dnt->name }}</td>
        <td>{{ $dnt->email }}</td>
        <td>{{ $dnt->avatar }}</td>
        <td>
            <a href="donatur/{{ $dnt->id }}/edit" class="badge badge-success">edit</a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>

</div>
</div>
</div>
@endsection