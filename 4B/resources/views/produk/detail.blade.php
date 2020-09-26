@section('title', 'Detail Importir')

@extends('layouts.template')

@section('content')
<div class="row mb-3">
    <div class="left">

    </div>
    <div class="right ml-auto mr-3">
        <a href="{{route('produk.index')}}">
            <span class="badge badge-primary mx-1 p-2">Produk</span>
        </a>
        <a href="{{route('importir.index')}}">
            <span class="badge badge-primary mx-1 p-2">Importir</span>
        </a>
    </div>
</div>
<div class="card">
    <img src="{{asset('assets/img/'. $produk->photo)}}" class="card-img-top" alt="img">
    <div class="card-body">
        <h5 class="card-title">{{$produk->name}}</h5>
        <p class="card-text">{{$produk->importir->name}}</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Harga : {{$produk->price}}</li>
        <li class="list-group-item">Qty : {{$produk->qty}}</li>
    </ul>
    <div class="card-body">
        <a href="{{route('produk.edit', encrypt($produk->id))}}" class="btn btn-secondary">Edit</a>
        <form action="{{route('produk.destroy', $produk->id)}}" method="POST" onclick="return confirm('Yakin ingin menghapus Data ini?')" style="display: inline;">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger mx-2">Delete</button>
        </form>
    </div>
</div>
@endsection
