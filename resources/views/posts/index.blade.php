@extends('layouts.app')
@section('title', 'Index')
@section('content')
        <div class="text-center">
            <a class="btn btn-primary" href="{{route('posts.create')}}">Crate Post</a>
        </div>
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td>{{$post->title}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->created_at->format("Y-m-d")}}</td>
                        <td>
                            <a href="{{route('posts.show', $post->id)}}" class="btn btn-info">View</a>
                            <a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary">Edit</a>
                            <form method="POST" action="{{route('posts.destroy', $post->id)}}" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection
