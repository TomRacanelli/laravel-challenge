@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Edit Group
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('groups.update', $group->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name">Group Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ $group->name }}" />
                </div>
                <div class="form-group">
                    <label for="description">Group Description :</label>
                    <input type="text" class="form-control" name="description" value="{{ $group->description }}" />
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection