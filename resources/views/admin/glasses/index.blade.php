@extends('admin.layouts.base')

@section('documentTitle')
    Index bicchieri
@endsection

@section('content')
@if (session('status'))
    <div class="alert">
        {{session('status')}}
    </div>
@endif
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Name</th>
            <th scope="col">Type</th>
            <th colspan="3" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($glasses as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->type}}</td>
                    <td><a href="{{route('glasses.show', $item->id)}}">View</a></td>
                    <td><a href="{{route('glasses.edit', $item->id)}}">Edit</a></td>
                    <td>
                        <form action="{{route('glasses.destroy', $item->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="delete">
                            
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
</table>
@endsection