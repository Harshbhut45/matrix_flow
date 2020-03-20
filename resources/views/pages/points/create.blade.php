@extends('layouts.admin') 

@php($title = 'Create Point') 
@push('title',yieldTitle($title)) 

@section('breadcrumb-title', $title)

@section('breadcrumb-link')
<li class="breadcrumb-item active" aria-current="page">
    <a href="{{ route('points.index') }}">Points</a>
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
                    <form action="{{ isset($point) ? route('points.update',['id' => $point->id]) : route('points.store') }}" method="post" enctype="multipart/form-data">     
                      @csrf                
                        <div class="row">
                          <div class="col-md-12">
                            <div class="col-md-8 p-l-2">
                              <div class="form-group">
                                <label for="first">Content: <span class="tx-danger">*</span></label>
                                <textarea  id="froala-editor"  class="form-control characters-count {{ $errors->has('content') ? ' is-invalid' : '' }}" id="article" data-maxlength="800" placeholder="Content" name="content" style="margin-top: 0px; margin-bottom: 0px; height: 140px;">{{isset($point) ? $point->content : old('content') }}</textarea>
                                @if($errors->has('content'))
                                    <strong class="error">{{ $errors->first('content') }}</strong>
                                @endif
                              </div>
                            </div> 
                          </div> 
                          
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="first">Version: <span class="tx-danger">*</span></label>
                                <input type="text" class="form-control {{ $errors->has('version') ? ' is-invalid' : '' }}" placeholder="Number" id="first" name="version"  value="{{isset($point) ? $point->version : old('version') }}"  >
                                @if($errors->has('version'))
                                   <div class="error">{{ $errors->first('version') }}</div>
                                @endif
                              </div>
                            </div> 

                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="first">Flow: <span class="tx-danger">*</span></label>
                                 <select id="multiple" class="form-control {{ $errors->has('flow') ? ' is-invalid' : '' }}" id="district" name="flow" value="{{isset($point) ? $point->flow : old('flow') }}">
                                   <option>Select Flow</option>
                                   @foreach($flows as $flow)
                                        <option value="{{ $flow->id }}" @if(isset($point) && $point->flow_id == $flow->id) selected @endif>{{ $flow->title }}</option>
                                    @endforeach
                                  </select>
                                  @if($errors->has('flow'))
                                    <div class="error">{{ $errors->first('flow') }}</div>
                                  @endif
                                
                              </div>
                          </div>
                        </div>
                          <!--  row   -->
                        </div>

                        <div class="footer-button">
                            <a href="{{ route('points.index') }}" class="btn btn-warning mg-r-1">Cancel</a>
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
                       
                       
