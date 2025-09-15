@php $pageName = "firm"; $subpageName = "firm_setup"; @endphp

@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Edit Department </h5>
      </div>
    <div class="card-body">
        <form id="form" method="post" enctype="multipart/form-data" autocomplete="off" action="{{route('edit-firm-department-process',$id)}}">
            @csrf
           

             @if(Session::has('message'))
             <div class="alert alert-solid-success d-flex align-items-center" role="alert">
                <span class="alert-icon rounded">
                  <i class="ti ti-check"></i>
                </span>
                {{session('message')}}
              </div>
              @endif
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Name</label>
                            <input type="text" name="name"   class="form-control" placeholder="Enter Department" value="{{ $datas->name }}">
                            @error('name')<small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Description</label>
                            <input type="text" name="description"  class="form-control" placeholder="Enter Description" value="{{ $datas->description }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Status</label>
                            <select class="form-control" name="status">
                                <option value="{{ $datas->status }}" >{{ $datas->status }}</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                            @error('status')<small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                   
                </div>
        </form>
       
     
    </div>
</div>

@endsection

@section('script')
    <script>
    
    </script> 
@endsection