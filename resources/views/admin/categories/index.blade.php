@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-6">
          <div class="panel panel-default">
              <div class="panel-heading">Dashboard</div>
              <div class="panel-body">
                {!! Form::open(['method' => 'Post', 'action' => 'AdminCategoriesController@store', 'files'=> true]) !!}
                  <div class="form-group">
                    {!! form::label('name', 'Name: ') !!}
                    {!! form::text('name', null,['class'=>'form-control'])!!}
                  </div>
                  <div class="form-group">
                    {!! form::submit('Create category', ['class'=>'btn btn-primary'])!!}
                  </div>
                {!! Form::close() !!}

                  @include('includes.form_error')
              </div>
          </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">All Posts</div>

                <div class="panel-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <tr>
                          <td>Id</td>
                          <td>name</td>
                        </tr>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach($categories as $category)
                          <tr>
                            <td>{{$category->id}}</td>
                            <td><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a></td>
                            <td>{{$category->created_at->diffForHumans()}}</td>
                            <td>{{$category->updated_at->diffForHumans()}}</td>
                            <td>
              							<div class="btn-xs" style="display:inline-block">
              								{!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE']) !!}
              								<button type="submit" class="btn btn-danger btn-xs">delete</button>
              								{!! Form::close() !!}
              							</div>
              						</td>
                          </tr>
                        @endforeach

                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
