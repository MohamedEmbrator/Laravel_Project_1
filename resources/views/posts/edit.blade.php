@extends('layouts.app')
@section('title', 'Edit')
@section('content')
    <form method="POST" action="{{route('posts.update', $post_data->id)}}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input name="title"  type="text" class="form-control" value="{{$post_data->title}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3">{{$post_data->description}}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Post Creator</label>
            <select name="post_creator" class="form-control">
                @foreach ($users as $user)
                    <option value="{{$user->id}}" @selected($post_data->user_id === $user->id)>{{$user->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
