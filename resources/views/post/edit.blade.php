@extends('layouts.app')

@section('content')
    <div class="mt-5">
            <div class="well">
                    <h2>Edit post</h2>
            </div>
            <div class="container">
                    {!! Form::open(['action' => ['PostController@update',$post->id],'method' => 'POST','enctype'=>'multipart/form-data']) !!}
                        <div class="form-group ">
                            {{Form::label('title','Title')}}
                            {{Form::text('title',$post->title,['class'=>'form-control','placeholder'=>'Title'])}}

                        </div>
                        <div class="form-group ">
                                {{Form::label('body','Body')}}
                                {{Form::textarea('body',$post->body,['class'=>'form-control','placeholder'=>'Body','id'=>'article-ckeditor'])}}
                                
                        </div>
                        <div class="form-group">
                                 
                                        {!! Form::file('cover_image') !!}
                                         
                                </div>
                        <!-- hidden submit to simulate put request -->
                        {{Form::hidden('_method','PUT')}}
                        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
                    {!! Form::close() !!}
            </div>
            <a href="/post" class="btn btn-default">Go back</a>
    </div>
@endsection