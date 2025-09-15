@php 
$pageName = "user_managament"; 
$subpageName = "list-account";
@endphp

@extends('layouts.app')


@section('content')

<div class="content">
    <div class="page-header">
        <div class="add-item d-flex">
            <div class="page-title">
                <h4 class="fw-bold">User Management</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-divide mb-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">User Management</a></li>
                         
                        <li class="breadcrumb-item active" aria-current="page">List Accounts</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
        <!-- /product list -->
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
            <div class="search-set">
                    <h3>List Accounts</h3>
            </div>
                
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card-body">
                     
                    @if (session('success_message'))
                    <p class="alert alert-success" align="center">{{session('success_message')}}</p>
                  @endif
      
                  @if (session('error_message'))
                    <p class="alert alert-danger" align="center">{{session('error_message')}}</p>
                  @endif
      
                  <form id="formValidationExamples" class="row g-6" action="{{route('user-management-get-accounts')}}" method="POST">
                     @csrf
                      <div class="form-group row">
                          <div class="col-md-6">
                              <label class="form-label" for="category">USER CATEGORY</label>
                              <select id="category" name="category" class="form-select select2" data-allow-clear="true">
                                  <option value="">-- SELECT CATEGORY --</option>
                                  @foreach ($listCategory as $catItem)
                                     <option value="{{$catItem->cat_id}}">{{$catItem->cat_name}}</option> 
                                  @endforeach
                              </select>
                              @error('category')<small style="color: red">{{$message}}</small>@enderror
                          </div>
                          <div class="col-md-6" style="padding-top:26px;">
                              <button type="submit" name="submitButton" class="btn btn-success"><i class="fa fa-list"></i></button>
                          </div>
                      </div>
                     
                      @if ($userList != null)
                      <div class="table-responsive" style="margin-top: 30px">                                 
                            <table id="table" class="table text-nowrap"  >
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                        <th>Creation Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($userList as $userList)
                                        <tr>
                                            <td><b>{{$userList->name}}</b></td>
                                            <td>{{$userList->email}}</td>
                                            <td>{{$userList->getUserCategory()}}</td>
                                            <td><a style="color: white;" href="{{route('user-management-edit-user-account',Crypt::encrypt($userList->id))}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a></td>
                                            <td>{{$userList->created_at}}</td>
                                        </tr>   
                                    @endforeach
                                </tbody>
                            </table>
                      </div>
                      @else
                          <p class="alert alert-danger" align="center" style="margin-top: 30px">NO RECORDS FOUND</p>
                      @endif
                  
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
 
@endsection