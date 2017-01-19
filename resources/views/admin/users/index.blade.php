@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <tr>
                          <td>Id</td>
                          <td>Name</td>
                          <td>Email</td>
                          <td>Role</td>
                          <td>Status</td>
                          <td>Created</td>
                          <td>Updated</td>
                        </tr>
                      </tr>
                    </thead>
                    <tbody>
                      @if($users)
                        @foreach($users as $user)
                          <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role->name}}</td>
                            <td>{{$user->is_active == 1 ? 'Active': 'Not Active'}}</td>
                            <td>{{$user->created_at->diffForHumans()}}</td>
                            <td>{{$user->updated_at->diffForHumans()}}</td>
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
