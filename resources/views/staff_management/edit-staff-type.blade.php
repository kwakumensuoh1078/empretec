@php $pageName = "staff"; $subpageName = "application_forms";  @endphp

@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">About Management</h5> <small class="text-muted float-end"><a  class = "btn btn-sm btn-warning" href="{{ route('create-staff-category') }}"><i class="fa fa-plus"></i> Add Staff Type</a></small>
      </div>
    <div class="card-body">
        <form id="form" method="post" enctype="multipart/form-data" autocomplete="off" action="{{route('edit-staff-type-process',$id)}}">
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
                            <input type="text" name="type"   class="form-control" placeholder="Enter Type Name" value="{{ $data->name }}">
                            @error('type')<small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Description</label>
                            <input type="text" name="type_description"  class="form-control" placeholder="Enter Description" value="{{ $data->description }}">
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Category</label>
                          <select class="form-select" name="category">
                              <option selected disabled>--Choose Category--</option>
                              @foreach($bra as $procats)
                        <option @if($data->category_id==$procats->cat_id ) selected @endif value="{{$procats->cat_id}}">{{$procats->name}}</option>
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
                    <div class="col-md-6">
                        <div class="card-datatable text-nowrap">
                            <table  class="table" style="width:100%">
                                <thead class="table-light">
                                  <tr>
                                    
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                    
                                  </tr>
                                </thead>
                                <tbody>
                                  @if($data)
                                  @foreach($datas as $des)
                                  <tr>
                                      
                                      <td>{{ $des->name }}</td>
                                      <td>{{ $des->category->name }}</td>
                                      <td>
                                          <a href="{{route('edit-staff-type',Crypt::encrypt($des->id))}}" class="btn btn-sm  btn-info">
                                             Edit
                                          </a>
                                          <a onclick="return confirm('Are you sure you want to delete this data ?')" href="{{url('delete-staff-type/'.$des->id)}}" class="btn btn-sm  btn-danger">
                                              Delete
                                           </a>
                                      </td>
                                  </tr>
                                  @endforeach
                                   @endif
                                </tbody>
                              </table>
                          </div>
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