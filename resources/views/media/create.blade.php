@extends('layouts.app')

@section('styles')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
@endsection

@section('content')
<div class="container">
    <div class="row">
      @include('includes.sidebar')
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">All Posts</div>
                <div class="panel-body">
                  {!! Form::open(['method' => 'Post', 'action' => 'AdminMediasController@store', 'class'=> 'dropzone']) !!}

                  {!! Form::close() !!}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
@endsection
