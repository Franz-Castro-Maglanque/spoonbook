
@if($count != 0)

@foreach($posts as $post)
<div class="card bg-faded">
        
    <div class="row">
        
        <div class="col-md-4 col-sm-4">
            
            {{-- <img style="width:200px;" src="/storage/cover_images/{{$post->cover_image}}"> --}}
            <img style="width:200px;" src="{{asset("storage/cover_images/$post->cover_image")}}">
        </div>
        <div class="col-md-8 col-sm-8">
            <h3><a href="posts/{{$post->id}}">{{$post->title}}</a></h3>
        <small>Written On {{$post->created_at}} by {{$post->user->name}}</small>
        </div>
    </div>
</div>
@endforeach

@else
<h1>No Records Found</h1>

@endif  


