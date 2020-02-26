@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>Group ID</td>
                <td>Resource Name</td>
                <td>Resource Description</td>
                <td colspan="2">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($resources as $resource)
                <tr>
                    <td>{{$resource->id}}</td>
                    <td>{{$resource->group_id}}</td>
                    <td>{{$resource->name}}</td>
                    <td>{{$resource->description}}</td>
                    <td><a href="{{ route('resources.edit',$resource->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('resources.destroy', $resource->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                    <td><a href="/" class="btn btn-primary">Home</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
@endsection