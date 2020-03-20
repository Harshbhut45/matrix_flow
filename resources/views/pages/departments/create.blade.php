@extends('layouts.admin') 

@php($title = 'Create Department') 
@push('title',yieldTitle($title)) 

@section('breadcrumb-title', $title)

@section('breadcrumb-link')
<li class="breadcrumb-item active" aria-current="page">
    <a href="{{ route('departments.index') }}">Departments</a>
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
                    <form action="{{ isset($department) ? route('departments.update',['id' => $department->id]) : route('departments.store') }}" method="post" enctype="multipart/form-data">     
                      @csrf                
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                  <label for="first">Name: <span class="tx-danger">*</span></label>
                                  <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Name" id="name" name="name"  maxlength="30" value="{{isset($department) ? $department->name : old('name') }}" >
                                  @if($errors->has('name'))
                                      <div class="error">{{ $errors->first('name') }}</div>
                                  @endif
                                </div>
                              </div> 
                            
                        
                          <!--  row   -->
                        </div>

                        <div class="footer-button">
                            <a href="{{ route('departments.index') }}" class="btn btn-warning mg-r-1">Cancel</a>
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
                       
                       
