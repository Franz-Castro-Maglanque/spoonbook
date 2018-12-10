@extends('layouts/app')

@section('content')




<div class="container bootstrap snippet">
        <div class="row">
              <div class="col-sm-10"><h1 align="center">{{$posts->user->name}}</h1>
              </div>
        </div>
                    <div class="row">
                        <div class="col-sm-3"><!--left col-->

                            <div class="text-center">
                                    <hr><?php  $test = $posts->user->companylogo;  ?>
                            <img src="{{asset("storage/cover_images/$test")}}" class="avatar rounded-circle img-thumbnail" alt="avatar">
                            </div></hr><br>
                      
                    </div><!--/col-3-->
                    <div class="col-sm-9">
                            <hr>
         
                                    <div class="form-group">
                                        <div class="form-group">
                                                <div class="col-6">
                                                    <label for="password"><h4>Company Name</h4></label>
                                                <input type="text" class="form-control" name="password" value="{{$posts->user->company}}" readonly>
                                                </div>
                                    </div>
                      
                                    <div class="form-group">
                                      <div class="col-6">
                                          <label for="phone"><h4>Mobile Number</h4></label>
                                      <input type="text" class="form-control" value="{{$posts->user->mobilenumber}}" readonly>
                                      </div>
                                    </div>
        
                                    <div class="form-group">
                                      <div class="col-6">
                                          <label for="email"><h4>Email</h4></label>
                                      <input type="email" class="form-control" value="{{$posts->user->email}}" readonly>
                                      </div>
                                    </div>
        
                                  <div class="form-group">
                                      <div class="col-6">
                                          <label for="email"><h4>Address</h4></label>
                                      <input type="email" class="form-control" value="{{$posts->user->address}}" readonly>
                                      </div>
                                  </div>
        
                                 
                                   <hr>
                </div><!--/tab-pane-->
</div><!--/col-9-->
<a href="http://localhost/spoonbook/public/posts" class="btn btn-primary">Go Back</a>
@endsection