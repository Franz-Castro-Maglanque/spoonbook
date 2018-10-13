@extends('layouts/app')
    @section('content')
        <h1>Edit Post</h1>
    {{Form::open(['action' => ['PostsController@update',$posts->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])}}
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title',$posts->title,['class' =>'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('description','Description')}}
            {{Form::textarea('description',$posts->description,['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('','Price')}}
            {{Form::number('price',$posts->price)}}
        </div>
        <div class="form-group">
            {{Form::label('','Category')}}
            {{Form::select('category', ['birthday' => 'Birthday', 'debu' => 'Debu'],$posts->category)}}
        </div>
        <div class="form-group">
            {{Form::label('','Upload Package Image')}}
            {{Form::file('cover_image')}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
    {{Form::close()}}
    @endsection