@extends('layouts.admin')

@php($title = 'Create Point')
@push('title', yieldTitle($title))

@section('breadcrumb-title', $title)

@section('breadcrumb-link')
    <li class="breadcrumb-item active" aria-current="page">
        <a href="{{ route('departments.create') }}">Departments</a>
    </li>
@endsection

@section('breadcrumb-btn')
    <a class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5" href="{{ route('departments.create') }}"><i data-feather="plus" class="wd-10 mg-r-5"></i>Create Department</a>
@endsection

@section('breadcrumb')
    @include('components.breadcrumb')
@endsection

@push('content-class', 'content-fixed')
@push('container-class', 'container-fluid')



@section('content')
 
        <div class="card">
            <div class="card-body">
                <div class="bs-example container-fluid" data-example-id="striped-table">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>@sortablelink('name', 'Name')</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
  
                        @foreach ($departments as $department)
                        <tr>
                            <td>{{ $department->id }}</td>
                            <td>{{ $department->name }}</td>
                            <td>
                                <a href="{{ route('departments.edit', ['id' => $department->id ]) }}"><i data-feather="edit-2" width="18" height="18"></i></a>
                        
                                    
                                <a href="{{ route('departments.delete',['id'=> $department->id ]) }}" >
                                <i data-feather="trash" width="18" height="18" stroke="red"></i></a>

                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                
                    </table>
                </div>
            </div>
        </div>



        
        <div class="mt-4">
            {!! $departments->appends(\Request::except('page'))->render() !!}
        </div>
@endsection

