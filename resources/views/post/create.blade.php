@extends('layouts.app')

@section('content')
    <div class="mt-5">
            <div class="well">
                    <h2>Create a post</h2>
            </div>
            <div class="container">
                    {!! Form::open(['action' => 'PostController@store','method' => 'POST','enctype'=>'multipart/form-data']) !!}
                        <div class="form-group ">
                            {{Form::label('title','Title')}}
                            {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}

                        </div>
                        <div class="form-group ">
                                {{Form::label('body','Body')}}
                                {{Form::textarea('body','',['class'=>'form-control','placeholder'=>'Body','id'=>'article-ckeditor'])}}
                                
                        </div>
                        <div class="form-group">
                                 
                                {!! Form::file('cover_image') !!}
                                 
                        </div>
                        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
                    {!! Form::close() !!}
            </div>
            <a href="/post" class="btn btn-default">Go back</a>
    </div>
@endsection