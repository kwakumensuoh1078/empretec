@php $pageName = "firm"; $subpageName = "application_forms"; @endphp

@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Edit District </h5> <small class="text-muted float-end">
      </div>
    <div class="card-body">
        <form id="form" method="post" enctype="multipart/form-data" autocomplete="off" action="{{route('edit-location-district-process',$id)}}">
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
                            <input type="text" name="name"   class="form-control" placeholder="Enter Name" value="{{ $data->name }}">
                            @error('name')<small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Reion</label>
                          <select class="form-select" name="region_id">
                              <option selected disabled>--Choose Region--</option>
                              @foreach($regions as $item)
                        <option @if($data->region_id==$item->id ) selected @endif value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                            </select>
                          </select>
                         @error('region_id')<small class="text-danger">{{$message}}</small> @enderror
                          
                      </div>
                     
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Status</label>
                            <select class="form-control" name="status">
                                <option value="{{ $data->status }}" >{{ $data->status }}</option>
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