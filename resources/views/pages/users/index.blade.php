@extends('layouts.admin')

@php($title = 'Create User')
@push('title', yieldTitle($title))

@section('breadcrumb-title', $title)

@section('breadcrumb-link')
    <li class="breadcrumb-item active" aria-current="page">
        <a href="{{ route('users.create') }}">Users</a>
    </li>
@endsection

@section('breadcrumb-btn')
    <a class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5" href="{{ route('users.create') }}"><i data-feather="plus" class="wd-10 mg-r-5"></i>Create User</a>
@endsection

@section('breadcrumb')
    @include('components.breadcrumb')
@endsection

@push('content-class', 'content-fixed')
@push('container-class', 'container-fluid')



@section('content')
        
<form action="{{ route('users.index') }}" method="GET">
    @csrf
    <div class="bs-example container-fluid" data-example-id="striped-table">
    
         <div class="col-md-4">
             <div class="form-group">
                 <select name="filter_gender" id="filter_gender" class="form-control" >
                     <option value="">Select Gender</option>
                     <option value="Male">Male</option>
                     <option value="Female">Female</option>
                 </select>
             </div>
             
             <div class="form-group">
                 <button class="btn btn-success mg-r-1" id="filter" name="filter" type="submit" style= "float : left;">filter</button>
                 <a class="btn btn-warning" href="{{ route('users.index') }}">reset</a>
             </div>
     </div>
    </div>
 </form>  

 <form action="{{ route('users.index') }}" method="GET">
    @csrf
        <div class="card">
            <div class="card-body">
                <div class="bs-example container-fluid" data-example-id="striped-table">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>@sortablelink('name', 'Name')</th>
                            <th>@sortablelink('email', 'Email')</th>
                            <th>@sortablelink('profile-picture', 'Profile-Picture')</th>
                            <th>@sortablelink('status','Status')</th>
                            <th>@sortablelink('gender', 'Gender')</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
  
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <img src="/storage/users/{{ $user->id }}/{{ $user->profile }}" height="70px"
                                    width="70px" class="rounded">
                            </td>
                            <td>{{ $user->status }}</td>
                            <td>{{ $user->gender }}</td>
                            <td>
                                <a href="{{ route('users.edit', ['id' => $user->id ]) }}"><i data-feather="edit-2" width="18" height="18"></i></a>
                        
                                    
                                <a href="{{ route('users.delete',['id'=> $user->id ]) }}" >
                                <i data-feather="trash" width="18" height="18" stroke="red"></i></a>

                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                
                    </table>
                  </div>
            </div>
        </div>
 </form>

 <div class="mt-4">
    {!! $users->appends(\Request::except('page'))->render() !!}
</div>
        
      
@endsection

