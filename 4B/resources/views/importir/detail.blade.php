@section('title', 'Detail Importir')

@extends('layouts.template')

@section('content')
<div class="row">
    <div class="col-6">
        <div class="card p-5">
        <p>Nama Importir : <b>{{$importir->name}}</b></p>
        <p>Alamat : {{$importir->address}}</p>
        <p>Phone : {{$importir->phone}}</p>
        </div>
    </div>
</div>

<a href="{{route('importir.index')}}" class="btn btn-primary mt-3">Back</a>
@endsection