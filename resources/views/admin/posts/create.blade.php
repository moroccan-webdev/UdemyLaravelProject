@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-4">
          <div class="panel panel-default">
              <div class="panel-heading">Dashboard</div>
              <div class="panel-body">
                  <ol>
                    <li><a href="{{ route('users.index')}}">All Users</a></li>
                    <li><a href="{{ route('users.create')}}">New Users</a></li>
                    <li><a href="{{ route('users.index')}}">New Users</a></li>
                    <li><a href="{{ route('posts.create')}}">New Posts</a></li>
                  </ol>
              </div>
          </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                  {!! Form::open(['method' => 'Post', 'action' => 'AdminPostsController@store', 'files'=> true]) !!}
                    <div class="form-group">
                      {!! form::label('title', 'Title: ') !!}
                      {!! form::text('title', null,['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                      {!! form::label('category_id', 'category: ') !!}
                      {!! form::select('category_id',[1 =>'php', 2 =>'laravel'], null,['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                      {!! form::label('body', 'Body: ') !!}
                      {!! form::textarea('body',null,['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                      {!! form::label('photo_id', 'File : ') !!}
                      {!! form::file('photo_id',['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                      {!! form::submit('Create Post', ['class'=>'btn btn-primary'])!!}
                    </div>
                  {!! Form::close() !!}

                    @include('includes.form_error')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
