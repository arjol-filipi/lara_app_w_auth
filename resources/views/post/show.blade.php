@extends('layouts.app')

@section('content')
    <div class="mt-5">
            <div class="well">
                        <div class="col-md-4 col-sm-4">
                                        <img src="/storage/cover_images/{{ $post->cover_image }}" alt="{{$post->name}} image" style="width:100%">
                                    </div>
                                    <div class="col-md-8 col-sm-8">
                                                <h3>{{ $post->title }}</h3>
                                                <small>Writen on {{ $post->created_at }} by {{ $post->user->name}}</small>
                                                <!--  <p>{{ $post->body }}</p> shows the html without parsing -->
                                                <div class="container border">
                                                        {!! $post->body !!}
                                    </div>
                    
                    </div>
            </div>
            <a href="/post" class="btn btn-default">Go back</a>
    </div>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
    <div class="btn-group container ">
    <a href="/post/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
    {!! Form::open([ 'action'=>['PostController@destroy',$post->id],'method'=>'POST','class'=>"pull-right ml-8" ]) !!}
        {!! Form::hidden('_method', 'DELETE') !!}
        {!! Form::submit('Delete', ['class'=>'btn pull-right btn-danger']) !!}
{!! Form::close() !!}
    </div>
    @endif
    @endif
@endsection