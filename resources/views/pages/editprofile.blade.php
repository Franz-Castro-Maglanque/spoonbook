@extends('layouts/app')

@section('content')




<div class="container bootstrap snippet">
        <div class="row">
        <div class="col-sm-10"><h1 align="center">{{$user->name}}</h1>
              </div>
        </div>
                    <div class="row">
                        <div class="col-sm-3"><!--left col-->

                            <div class="text-center">
                                    <hr>
                                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar rounded-circle img-thumbnail" alt="avatar">
                                    <div >
                                        Change Photo
                                        <input type="file" name="file"/>
                                    </div>
                            </div></hr><br>
                        <ul class="list-group">
                            <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
                        </ul> 
                    </div><!--/col-3-->
                    <div class="col-sm-9">
                            <hr>
                                    <div class="form-group">
                                      <div class="col-6">
                                          <h5>First name</h5>
                                      <input type="" class="form-control" name="last_name" value="{{$user->name}}" readonly>
                                      </div>
                                    </div>
                      
                                    <div class="form-group">
                                      <div class="col-6">
                                          <label for="phone"><h4>Mobile Number</h4></label>
                                      <input type="text" class="form-control" value="{{$user->mobilenumber}}" readonly>
                                      </div>
                                    </div>
        
                                    <div class="form-group">
                                      <div class="col-6">
                                          <label for="email"><h4>Email</h4></label>
                                      <input type="email" class="form-control" value="{{$user->email}}" readonly>
                                      </div>
                                    </div>
        
                                  <div class="form-group">
                                      <div class="col-6">
                                          <label for="email"><h4>Address</h4></label>
                                      <input type="email" class="form-control" value="{{$user->address}}" readonly>
                                      </div>
                                  </div>
        
                                  <div class="form-group">
                                      <div class="col-6">
                                          <label for="password"><h4>Company</h4></label>
                                          <input type="password" class="form-control" name="password">
                                      </div>
                                  </div>
                                   <hr>
                </div><!--/tab-pane-->
</div><!--/col-9-->
@endsection