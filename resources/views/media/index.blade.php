@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-2">
          @include('includes.sidebar')
        </div>
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">All Posts</div>

                <div class="panel-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <tr>
                          <td>Image</td>
                          <td>Id</td>
                          <td>Name</td>
                          <td>created_at</td>
                        </tr>
                      </tr>
                    </thead>
                    <tbody>
                      @if($photos)
                        @foreach($photos as $photo)
                          <tr>
                            <td><img style="height:25px;width:25px;border-radius:50%;"
                                     src="{{"/images/".$photo->file}}" alt=""></td>
                            <td>{{$photo->id}}</td>
                            <td>{{$photo->file}}</td>
                            <td>{{$photo->created_at->diffForHumans()}}</td>
                            <td>
              							<div class="btn-xs" style="display:inline-block">
              								{!! Form::open(['route' => ['medias.destroy', $photo->id], 'method' => 'DELETE']) !!}
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
