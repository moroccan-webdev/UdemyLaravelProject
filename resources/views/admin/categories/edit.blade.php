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
                  {!! Form::model($category,['method' => 'PATCH', 'action' => ['AdminCategoriesController@update', $category->id],'files'=> true]) !!}
                    <div class="form-group">
                      {!! form::label('name', 'Name: ') !!}
                      {!! form::text('name', null,['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                      {!! form::submit('Update Category', ['class'=>'btn btn-primary'])!!}
                    </div>
                  {!! Form::close() !!}

                    @include('includes.form_error')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
