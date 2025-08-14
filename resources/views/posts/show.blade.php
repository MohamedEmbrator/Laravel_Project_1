@extends('layouts.app')
@section('title', 'Show')
@section('content')
        <div class="card mt-4">
            <div class="card-header">
                Post Info
            </div>
            <div class="card-body">
                <h5 class="card-title">Title: {{$singlePost->title}}</h5>
                <p class="card-text">Description: {{$singlePost->description}}</p>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-header">
                Post Creator Info
            </div>
            <div class="card-body">
                <h5 class="card-title">Name: {{$singlePost->user->name}}</h5>
                <p class="card-text">Email: {{$singlePost->user->email}}</p>
                <a href="#" class="btn btn-primary">Created At: {{$singlePost->user->created_at}}</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
</html>
@endsection
