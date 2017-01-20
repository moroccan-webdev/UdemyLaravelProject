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
                  </ol>
              </div>
          </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Edit User</div>
                <div class="panel-body">
                  {!! Form::model($user,['method' => 'Patch', 'action' => ['AdminUsersController@update',$user->id], 'files'=> true]) !!}
                    <div class="form-group">
                      {!! form::label('name', 'Name: ') !!}
                      {!! form::text('name', null,['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                      {!! form::label('email', 'Email: ') !!}
                      {!! form::email('email', null,['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                      {!! form::label('role_id', 'Role: ') !!}
                      {!! form::select('role_id',['' =>'Choose Option']+$roles,'0',['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                      {!! form::label('is_active', 'Status: ') !!}
                      {!! form::select('is_active', [1 =>'Active', 0 =>'Not Active'],null,['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                      {!! form::label('password', 'Password: ') !!}
                      {!! form::password('password',['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                      {!! form::label('photo_id', 'File : ') !!}
                      {!! form::file('photo_id',['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                      {!! form::submit('Update User', ['class'=>'btn btn-warning'])!!}
                    </div>
                  {!! Form::close() !!}

                    @include('includes.form_error')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
