@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
                
            </div>
            <div class="container border">
                    <a class="btn btn-primary " href="/post/create">Make new entry</a>
            </div>
            
                <table class="table table-striped">
                    <tr>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Show</th>
                        <th>Delete</th>
                    </tr>
                    
                    @foreach  ($posts as $post)
                        <tr>
                            <th>{{ $post->title }}</th>
                            <th> <a href="/post/{{$post->id}}/edit" class="btn btn-success">Edit</a></th>
                            <th><a href="/post/{{$post->id}}" class="btn btn-primary">Show</a></th>
                            <th> {!! Form::open([ 'action'=>['PostController@destroy',$post->id],'method'=>'POST','class'=>"pull-right ml-8" ]) !!}
        {!! Form::hidden('_method', 'DELETE') !!}
        {!! Form::submit('Delete', ['class'=>'btn pull-right btn-danger']) !!}
{!! Form::close() !!}</th>
                        </tr>
                    @endforeach
                    
                </table>
            
        </div>
    </div>
</div>
@endsection
