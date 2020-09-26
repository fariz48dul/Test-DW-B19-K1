@section('title', 'Homepage')

@extends('layouts.template')

@section('content')

<div class="row mb-3">
    <div class="left">

    </div>
    <div class="right ml-auto mr-3">
        <a href="{{route('produk.create')}}">
            <span class="badge badge-primary mx-1 p-2">Tambah Produk</span>
        </a>
        <a href="{{route('importir.index')}}">
            <span class="badge badge-primary mx-1 p-2">Importir</span>
        </a>
    </div>
</div>

<!-- Alert -->
@if (session('message-success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('message-success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="row mb-2">

    @foreach ($produk as $item)
    <div class="col-md-6">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-1 text-primary"></strong>
                <h3 class="mb-0">{{$item->name}}</h3>
                <div class="mb-1 text-muted">{{$item->importir->name}}</div>
                <h4 class="card-text mt-1 mb-auto">Rp.{{$item->price}}</h4>
                <a href="{{route('produk.show', encrypt($item->id))}}" style="text-decoration: none; color: #000">View Detail</a>
            </div>
            <div class="col-auto d-none d-lg-block">
                <img class="bd-placeholder-img" width="200" height="250" src="{{asset('assets/img/'. $item->photo)}}" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
                </img>
            </div>
        </div>
    </div>
    @endforeach
</div>
{{$produk->links()}}

@endsection
