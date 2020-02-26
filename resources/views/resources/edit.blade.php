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
            <form method="post" action="{{ route('resources.update', $resource->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="group_id">Group ID:</label>
                    <select name="group_id">
                        @foreach ($groups->all() as $group)
                            <option value="{{$group->id}}" @if($group->id == $resource->group_id) selected @endif>{{$group->id}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Resource Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ $resource->name }}" />
                </div>
                <div class="form-group">
                    <label for="description">Resource Description :</label>
                    <input type="text" class="form-control" name="description" value="{{ $resource->description }}" />
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection