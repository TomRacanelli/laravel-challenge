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
                <td>Group Name</td>
                <td>Group Description</td>
                <td colspan="2">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($groups as $group)
                <tr>
                    <td>{{$group->id}}</td>
                    <td>{{$group->name}}</td>
                    <td>{{$group->description}}</td>
                    <td><a href="{{ route('groups.edit',$group->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('groups.destroy', $group->id)}}" method="post">
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