@section('title', 'Edit Importir')

@extends('layouts.template')

@section('content')
<form action="{{route('importir.update', encrypt($importir->id))}}" method="POST">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label>Nama Importir</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$importir->name}}">
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label>Address</label>
        <textarea type="text" name="address" class="form-control @error('address') is-invalid @enderror">{{$importir->address}}</textarea>
        @error('address')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{$importir->phone}}">
        @error('phone')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{route('importir.index')}}" class="btn btn-secondary">Cancel</a>
</form>

@endsection