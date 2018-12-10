@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-primary">Go Back</a>
    <h1 align="center">{{$post->title}}</h1>
    {{-- <img style="width:200px;" src="/storage/cover_images/{{$post->cover_image}}"> --}}
    <img style="width:200px;" src="{{asset("storage/cover_images/$post->cover_image")}}">
    <br><br>
<p>Posted By <a href="http://localhost/spoonbook/public/profile/{{$post->id}}">{{$post->user->name}}</a></p>
    <hr>
    <div>
            <p><b>Inclusions:</b> </p>{!!$post->inclusions!!}
            <hr>
    </div>
    <div>
        <p>Description: {!!$post->description!!}</p>
        <hr>
        <p>Category: {!!$post->category!!}</p>
        <br>
        <p>Price: {!!$post->price!!}</p>
    </div>
    
    <hr>
<small>Written on {{$post->created_at}}</small><br>





<div class="row">
@foreach($post->photos as $posts)
<div class="column">
<img  class="img" src="{{asset("storage/cover_images/$posts->name")}}"  style="width:100%">

</div>

@endforeach


    <hr>
        @if(!Auth::guest())
            @if(Auth::user()->id == $post->user_id)
                <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>

                {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                {!!Form::close()!!}
            @endif
        @endif


        
@endsection
