@php 
$pageName = "user_managament"; 
$subpageName = "create-account";
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
                         
                        <li class="breadcrumb-item active" aria-current="page">Create User</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
        <!-- /product list -->
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
            <div class="search-set">
                    <h3>Create User</h3>
            </div>
                
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card-body">
                    <form id="formValidationExamples" method="POST" action="{{route('create-account-process')}}">
                        @csrf
            
                        @if (session('success_message'))
                          <p class="alert alert-success" align="center">{{session('success_message')}}</p>
                        @endif
            
                        @if (session('error_message'))
                          <p class="alert alert-danger" align="center">{{session('error_message')}}</p>
                        @endif
    
                        <div class="form-group row">
                    
                        <div class="col-md-6">
                            <label class="form-label" for="users">User</label>
                            <select id="users" name="users" class="form-select select2" data-allow-clear="true">
                                <option value="">-- SELECT USER --</option>
                                @foreach ($listStaff as $staff)
                                    <option value="{{$staff->staff_id}}">{{$staff->title}} {{$staff->firstname}} {{$staff->surname}}</option>
                                @endforeach 
                            </select>
                            @error('users')<small style="color: red">{{$message}}</small>@enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="category">Category</label>
                            <select id="category" name="category" class="form-select select2" data-allow-clear="true">
                                <option value="">-- SELECT CATEGORY --</option>
                                @foreach ($userCategoryList as $catItem)
                                   <option value="{{$catItem->cat_id}}">{{$catItem->cat_name}}</option> 
                                @endforeach
                                
                            </select>
                            @error('category')<small style="color: red">{{$message}}</small>@enderror
                        </div>
                        </div>
                        <div class="form-group row">
                    
                        <div class="col-md-6">
                            <div class="form-password-toggle">
                                <label class="form-label" for="email">User email</label>
                                <div class="input-group input-group-merge">
                                    <input @readonly(true)  class="form-control" type="text" id="email" name="email" placeholder="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-password-toggle">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="password" id="password" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="multicol-confirm-password2" />
                                    
                                </div>
                                @error('password')<small style="color: red">{{$message}}</small>@enderror
                            </div>
                        </div>
                    </div>
                    
                        <!-- Personal Info -->
                    <br>
                        <div class="text-end">
                            <button type="submit" name="submitButton" class="btn btn-primary">Create Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).on('change','#users',function(e){
        e.preventDefault();

        let id = $(this).val();

        $.ajax({
            type:'POST',
            url:'get-user-email-process',
            data:{
                "_token": "{{ csrf_token() }}",
                'users': id
            },
            success:function(data){

                $('#email').val(data);
            }
        });

        
    });
</script>
@endsection