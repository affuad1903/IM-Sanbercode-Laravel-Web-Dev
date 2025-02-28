@extends('layouts.master')
@section('title')
    GENRE
@endsection
@section('content')
<a href="{{url('/genre/create')}}" class="btn btn-primary">Tambah</a>
<table class="table">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col" style="display: inline">Actions</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($genre as $key=>$value)
            <tr>
                <td>{{$key + 1}}</th>
                <td>{{$value->name}}</td>
                <td>{{$value->description}}</td>
                <td class="d-flex justify-content-center align-items-center">
                    <a href="/genre/{{$value->id}}" class="btn btn-info">Show</a>
                    <a href="/genre/{{$value->id}}/edit" class="btn btn-primary">Edit</a>
                    <form action="/genre/{{$value->id}}" method="POST" onsubmit="return confirm('are you sure delete data?')" >
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger my-1" value="Delete">
                    </form>
                </td>
            </tr>
        @empty
            <tr colspan="3">
                <td>No data</td>
            </tr>  
        @endforelse              
    </tbody>
</table> 
@endsection
