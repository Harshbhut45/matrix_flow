@extends('layouts.admin') 

@php($title = 'Create Flow') 
@push('title',yieldTitle($title)) 

@section('breadcrumb-title', $title)

@section('breadcrumb-link')
<li class="breadcrumb-item active" aria-current="page">
    <a href="{{ route('flows.index') }}">Flows</a>
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
                    <form action="{{ isset($flow) ? route('flows.update',['id' => $flow->id]) : route('flows.store') }}" method="post" enctype="multipart/form-data">       
                      @csrf                
                        <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="first">Title: <span class="tx-danger">*</span></label>
                                <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="Title" id="first" name="title"  maxlength="30" value="{{isset($flow) ? $flow->title : old('title') }}" >
                                @if($errors->has('title'))
                                    <div class="error">{{ $errors->first('title') }}</div>
                                @endif
                              </div>
                            </div> 


                            <div class="col-md-4">
                                <div class="form-group">
                                  <label for="first">Depautment: <span class="tx-danger">*</span></label>
                                   <select id="multiple" class="form-control lokdayros-select__name {{ $errors->has('depautment') ? ' is-invalid' : '' }} city-district-select" id="district" name="depautment" >
                                    <option disabled selected>Select Depautment</option>
                                     @foreach($departments as $department)
                                          <option value="{{ $department->id }}" @if(isset($flow) && $flow->department_id == $department->id) selected @endif>{{ $department->name }}</option>
                                      @endforeach
                                    </select>
                                    @if($errors->has('depautment'))
                                        <div class="error">{{ $errors->first('depautment') }}</div>
                                    @endif
                                  
                                </div>
                            </div>
                       
                          <!--  row   -->
                        </div>

                        <div class="footer-button">
                            <a href="{{ route('flows.index') }}" class="btn btn-warning mg-r-1">Cancel</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
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
                       
                       
 