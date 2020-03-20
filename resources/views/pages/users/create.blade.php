@extends('layouts.admin') 

@php($title = 'Create User') 
@push('title',yieldTitle($title)) 

@section('breadcrumb-title', $title)

@section('breadcrumb-link')
<li class="breadcrumb-item active" aria-current="page">
    <a href="{{ route('users.index') }}">Users</a>
</li>

<li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
@endsection

@section('breadcrumb') 
    @include('components.breadcrumb') 
@endsection

@push('content-class', 'content-fixed')
@push('container-class','container-fluid')

@section('content')

<div class="card">
    <div class="card-body">
        <div>
            <div class="table-responsive">
                <div class="container-fluid">
                    <form action="{{ isset($user) ? route('users.update',['id' => $user->id]) : route('users.store') }}" method="post" enctype="multipart/form-data">       
                      @csrf                
                        <div class="row">
                          
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="first">Name: <span class="tx-danger">*</span></label>
                                <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Name" id="first" name="name"  maxlength="30" value="{{isset($user) ? $user->name : old('name') }}" >
                                @if($errors->has('name'))
                                    <div class="error">{{ $errors->first('name') }}</div>
                                @endif
                              </div>
                            </div> 


                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="first">Email: <span class="tx-danger">*</span></label>
                                <input type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" id="first" name="email"  maxlength="30" value="{{isset($user) ? $user->email : old('email') }}" >
                                @if($errors->has('email'))
                                    <div class="error">{{ $errors->first('email') }}</div>
                                @endif
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="Password">Password: <span class="tx-danger">*</span></label>
                                <input type="Password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="password" id="Password" name="password">
                                @if($errors->has('password'))
                                  <div class="error">{{ $errors->first('password') }}</div>
                                @endif
                              </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputGroupFile01">Profile Picture: <span class="tx-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id ="image"
                                                aria-describedby="inputGroupFileAddon01" name='profile' value="{{isset($user) ? $user->profile : old('profile') }}">
                                            <label class="custom-file-label upload-image" for="inputGroupFile01">Choose file</label>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="media-files-name" >
                                        @if (isset($user->profile))
                                            <input id="upload-demo-image" type="hidden" value="/storage/users/{{ $user->id }}/{{ $user->profile }}">
                                            
                                        @else
                                        <p>No image found</p>
                                        @endif
                                        <input type="hidden" id="profile_picture" name="profile_picture">
                                    </div>
                               
                      
                                <div class="col-md-12">
                                  <div class="row">
                                    <div class="col-md-4 text-center">
                                        <div id="upload-demo"></div>
                                    </div>
                                    <div class="col-md-4" style="padding:5%;"></div>
                                  </div>
                                </div>
                                
                              </div>
                           
                            
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="status">Status: <span class="tx-danger">*</span></label>
                                        <select class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }} user-status-select" id="status" name="status" >
                                            <option disabled selected value>Select Status</option>
                                            @foreach($statuses as $status)
                                                <option value="{{ $status }}" @if(isset($user) && $user->status == $status) selected @endif>{{ $status }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('status'))
                                           <div class="error">{{ $errors->first('status') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="gender">Gender: <span class="tx-danger">*</span></label>
                                        <div class="radio">
                                        <label>
                                            <input type="radio" name="gender" id="gender" value="male" @if(isset($user) && ($user->gender == "male")? $user->gender : null) checked @endif>Male
                                        </label>
                                        <div class="check"></div>
                                        </div>
                                        <div class="radio">
                                        <label>
                                            <input type="radio" name="gender" id="gender" value="female" @if(isset($user) && ($user->gender == "female")? $user->gender : null) checked @endif>Female
                                        </label>
                                        <div class="check">
                                            <div class="inside"></div>
                                        </div>
                                        </div>
                                        @if($errors->has('gender'))
                                           <div class="error">{{ $errors->first('gender') }}</div>
                                        @endif
                                    </div>  
                                </div>

                          <!--  row   -->
                        </div>

                        <div class="footer-button">
                            <a href="{{ route('users.index') }}" class="btn btn-warning mg-r-1">Cancel</a>
                            <button type="submit" class="btn btn-primary user-form">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- table-responsive -->
        </div>
        <!-- df-example -->
    </div>
</div>


@endsection
                       
                       
 