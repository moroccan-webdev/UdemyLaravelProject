@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                  {!! Form::open(['method' => 'Post', 'action' => 'AdminUsersController@store', 'files'=> true]) !!}
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
                      {!! form::select('is_active', [1 =>'Active', 0 =>'Not Active'],0,['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                      {!! form::label('password', 'Password: ') !!}
                      {!! form::password('password',['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                      {!! form::label('file', 'File : ') !!}
                      {!! form::file('file',['class'=>'form-control'])!!}
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
