@php $pageName = "staff"; $subpageName = "application_forms";  @endphp

@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">About Management</h5> <small class="text-muted float-end"><a  class = "btn btn-sm btn-warning" href="{{ route('create-staff-category') }}"><i class="fa fa-plus"></i> Add Staff Type</a></small>
      </div>
    <div class="card-body">
        <form id="form" method="post" enctype="multipart/form-data" autocomplete="off" action="{{route('edit-document-type-process',$id)}}">
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
                            <input type="text" name="type"   class="form-control" placeholder="Enter Document Type Name" value="{{ $data->name }}">
                            @error('type')<small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Document Category</label>
                          <select class="form-select" name="category">
                              <option selected disabled>--Choose Document Category--</option>
                              @foreach($docCats as $docCat)
                        <option @if($data->category_id==$docCat->id ) selected @endif value="{{$docCat->id}}">{{$docCat->name}}</option>
                        @endforeach
                            </select>
                          </select>
                         @error('category')<small class="text-danger">{{$message}}</small> @enderror
                          
                      </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Status</label>
                            <select class="form-select" name="type_status">
                                <option value="{{ $data->status }}" >{{$data->status}}</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                            @error('type_status')<small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Edit</button>
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