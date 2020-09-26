@section('title', 'Tambah Motor')

@extends('layouts.template')

@section('content')
<form action="{{route('produk.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Nama Motor</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
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
            @foreach($importir as $imp)
            @if (old('importir') == $imp->id)
            <option value="{{ $imp -> id }}" selected>
                {{ $imp -> name }}
            </option>
            @else
            <option value="{{ $imp -> id }}">
                {{ $imp -> name }}
            </option>
            @endif
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
        <input class="form-control @error('photo') is-invalid @enderror" type="file" name="photo" value="{{old('photo')}}">
        @error('photo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label>Qty</label>
        <input type="text" name="qty" class="form-control @error('qty') is-invalid @enderror" value="{{old('qty')}}">
        @error('qty')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label>Price</label>
        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}">
        @error('price')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{route('index')}}" class="btn btn-secondary">Cancel</a>
</form>

@endsection
