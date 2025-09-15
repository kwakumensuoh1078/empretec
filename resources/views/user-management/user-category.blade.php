@php 
$pageName = "user_managament"; 
$subpageName = "user-category";
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
                         
                        <li class="breadcrumb-item active" aria-current="page">Create User Category</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
        <!-- /product list -->
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
            <div class="search-set">
                    <h3>Create Category</h3>
            </div>
                
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card-body">
                     
                    @if (session('message_success'))
                    <p class="alert alert-success" align="center">{{session('message_success')}}</p>
                    @endif
        
                    @if (session('message_error'))
                    <p class="alert alert-danger" align="center">{{session('message_error')}}</p>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ route('user-management-add-category-process') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">
                                        First Name  
                                    </label>
                                    <input type="text" class="form-control" name="category_name" value="{{ old('category_name') }}">
                                    @error('category_name') <small style="color:red"> {{ $message}}</small> @enderror
                                
                                </div>
                                
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-xl-6 d-flex">
                            <div class="card flex-fill">
                                <div class="card-header">
                                    <h5 class="card-title">List Category</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive no-search">
										<table id="myTable" class="table ">
											<thead class="thead-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $i=1;
                                                @endphp
                                                @foreach ($listCategory as $catItem)
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{$catItem->cat_name}}</td>
                                                    <td><a style="color:white;" href="{{ route('user-management-add-category-edit', Crypt::encrypt($catItem->cat_id)) }}" class="btn btn-success"><i class="fa fa-edit"></i></a></td>
                                                </tr>
                                                @php
                                                $i++;
                                                @endphp
                                                @endforeach
                                                
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
 
@endsection