@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-2">
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
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <tr>
                          <td>Id</td>
                          <td>Photo</td>
                          <td>Name</td>
                          <td>Email</td>
                          <td>Role</td>
                          <td>Status</td>
                          <td>Created</td>
                          <td>Updated</td>
                          <td>Actions</td>
                        </tr>
                      </tr>
                    </thead>
                    <tbody>
                      @if($users)
                        @foreach($users as $user)
                          <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->photo ? $user->photo->file: 'Not Exist'}}</td>
                            <td><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role->name}}</td>
                            <td>{{$user->is_active == 1 ? 'Active': 'Not Active'}}</td>
                            <td>{{$user->created_at->diffForHumans()}}</td>
                            <td>{{$user->updated_at->diffForHumans()}}</td>
                            <td>
              							<div class="btn-xs" style="display:inline-block">
              								{!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE']) !!}
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
