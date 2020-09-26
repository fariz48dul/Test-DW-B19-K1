@section('title', 'Edit Motor')

@extends('layouts.template')

@section('content')

<!-- Alert -->
@if (session('message-success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('message-success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<form action="{{route('produk.update', encrypt($produk->id))}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label>Nama Motor</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$produk->name}}">
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label>Importir</label>
        <select class="form-control @error('importir') is-invalid @enderror" name="importir">
            <option value=""> Select </option>
            @foreach ($importir as $imp)
            <option value="{{$imp->id}}" @if ($imp->id === $produk->importir_id)
                selected
                @endif
                >
                {{ $imp -> name }}
            </option>
            @endforeach
        </select>
        @error('importir')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label>Photo</label>
        <div class="form-group">
            <img class="image-thumbnail" src=" {{asset('assets/img/'. $produk->photo)}} " alt="A" style="max-width: 20%;">
            <input class="form-control @error('photo') is-invalid @enderror" type="file" name="photo" value="{{$produk->photho}}">
            @error('photo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label>Qty</label>
        <input type="text" name="qty" class="form-control @error('qty') is-invalid @enderror" value="{{$produk->qty}}">
        @error('qty')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label>Price</label>
        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{$produk->price}}">
        @error('price')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{route('produk.index')}}" class="btn btn-secondary">Cancel</a>
</form>

@endsection
