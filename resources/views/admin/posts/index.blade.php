@extends('layouts.app')

@section('content')
this is it
<div class="container">
    <div class="row">
      <div class="col-md-2">
          <div class="panel panel-default">
              <div class="panel-heading">Dashboard</div>
              <div class="panel-body">
                  <ol>
                    <li><a href="{{ route('users.index')}}">All Users</a></li>
                    <li><a href="{{ route('users.create')}}">New Users</a></li>
                    <li><a href="{{ route('users.index')}}">New Users</a></li>
                    <li><a href="{{ route('posts.create')}}">New Users</a></li>
                  </ol>
              </div>
          </div>
        </div>
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">All Posts</div>

                <div class="panel-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <tr>
                          <td>Id</td>
                          <td>User</td>
                          <td>Category</td>
                          <td>Photo</td>
                          <td>title</td>
                          <td>Body</td>
                          <td>Created</td>
                          <td>Updated</td>
                          <td>Actions</td>
                        </tr>
                      </tr>
                    </thead>
                    <tbody>
                      @if($posts)
                        @foreach($posts as $post)
                          <tr>
                            <td>{{$post->id}}</td>
                            <td><a href="{{route('posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
                            <td>{{$post->category ? $post->category->name : 'Not Exist' }}</td>
                            <td>{{$post->photo_id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{str_limit($post->body,25)}}</td>
                            <td>{{$post->created_at->diffForHumans()}}</td>
                            <td>{{$post->updated_at->diffForHumans()}}</td>
                            <td>
              							<div class="btn-xs" style="display:inline-block">
              								{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
              								<button type="submit" class="btn btn-danger btn-xs">delete</button>
              								{!! Form::close() !!}
              							</div>
              						</td>
                          </tr>
                        @endforeach
                      @endif
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
