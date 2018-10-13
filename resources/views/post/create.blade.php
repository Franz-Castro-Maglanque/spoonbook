




       @extends('layouts/app')
    @section('content')
       <h1>Create Package</h1>
       {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST','enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title', '', ['class' => 'form-control','placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body','Description')}}
            {{Form::textarea('description', '', ['class' => 'form-control','placeholder' => 'Place Description Here'])}}
        </div>
        <div class="form-group">
                {{Form::label('', 'Price: ')}}
                {{Form::number('price','', ['placeholder' => 'Enter Price here'])}}
        </div>
        <div class="form-group">
            {{Form::label('', 'Category')}}
            {{Form::select('category', ['birthday' => 'Birthday', 'debu' => 'Debu'])}}
        </div>
        <div class="form-group">
            {{Form::label('','Upload Package Image')}}
            {{Form::file('cover_image')}}
        </div>
            {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
       {!! Form::close() !!}
    @endsection
