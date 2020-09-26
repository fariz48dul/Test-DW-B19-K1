@section('title', 'Importir')

@extends('layouts.template')

@section('content')

<div class="row">
    <div class="left">
        <a href="{{route('importir.create')}}" class="btn btn-primary mb-2 ml-3">Tambah Importir</a>
    </div>
    <div class="right ml-auto">
        <a href="{{route('produk.index')}}" class="btn btn-primary mb-2 mr-3">Produk</a>
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

<table class="table">
    <thead class="thead-dark">
        <tr class="text-center">
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Address</th>
            <th scope="col">Phone</th>
            <th scope="col-2" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($importir as $no => $item)
        <tr>
            <th scope="row" class="text-center">{{$importir->firstItem()+$no}}</th>
            <td> {{$item->name}} </td>
            <td> {{$item->address}} </td>
            <td> {{$item->phone}} </td>
            <td class="text-center">
                <a href="{{route('importir.show', encrypt($item->id))}}" class="btn btn-info mx-1">Detail</a>
                <a href="{{route('importir.edit', encrypt($item->id))}}" class="btn btn-secondary mx-1">Edit</a>
                <form action="{{route('importir.destroy', encrypt($item->id))}}" method="POST" onclick="return confirm('Yakin ingin menghapus Data ini?')" style="display: inline;">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger mx-1" name="button">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    {{$importir->links()}}
</table>
@endsection
