@php $pageName = "firm"; $subpageName = "location_setup"; @endphp

@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
         <h5 class="card-header">Location Setup</h5>
    </div>
    <div class="card-body">
        

             @if(Session::has('message'))
             <div class="alert alert-solid-success d-flex align-items-center" role="alert">
                <span class="alert-icon rounded">
                  <i class="ti ti-check"></i>
                </span>
                {{session('message')}}
              </div>
              @endif
              <div class="col-xl-12">
                
                <div class="nav-align-top nav-tabs-shadow mb-6">
                  <ul class="nav nav-tabs nav-fill" role="tablist">
                    <li class="nav-item">
                      <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-home" aria-controls="navs-justified-home" aria-selected="true"><span class="d-none d-sm-block"><i class="tf-icons ti ti-home ti-sm me-1_5"></i>  Region <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger ms-1_5 pt-50">1</span></span><i class="ti ti-user ti-sm d-sm-none"></i></button>
                    </li>
                    <li class="nav-item">
                      <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-profile" aria-controls="navs-justified-profile" aria-selected="false"><span class="d-none d-sm-block"><i class="tf-icons ti ti-user ti-sm me-1_5"></i> District<span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger ms-1_5 pt-50">2</span></span><i class="ti ti-home ti-sm d-sm-none"></i></button>
                    </li>
                      {{-- <li class="nav-item">
                      <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-cat" aria-controls="navs-justified-cat" aria-selected="false"><span class="d-none d-sm-block"><i class="tf-icons ti ti-tag-text ti-sm me-1_5"></i>Branch<span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger ms-1_5 pt-50">2</span></span><i class="ti ti-user ti-sm d-sm-none"></i></button>
                    </li> --}}
                
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
                      <br><br>
                         <form id="form" method="post" enctype="multipart/form-data" autocomplete="off" action="{{route('location-region-process')}}">
                            @csrf
                        <div class="row">
                    
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Name</label>
                                    <input type="text" name="name"   class="form-control" placeholder="Enter Region Name">
                                    @error('name')<small class="text-danger">{{$message}}</small> @enderror
                                </div>
                                   <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Country</label>
                                    <select class="form-select" name="country_id">
                                        <option selected disabled>--Choose Country--</option>
                                        @foreach($countries as $item)
                                <option value="{{$item->countries_id}}">{{$item->countries_name}}</option>
                                @endforeach
                                    </select>
                                    @error('country_id')<small class="text-danger">{{$message}}</small> @enderror
                                    
                                </div>
                               
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Status</label>
                                    <select class="form-select" name="status">
                                        <option value="" selected>--Choose Option--</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                    @error('status')<small class="text-danger">{{$message}}</small> @enderror
                                </div>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                            <div class="col-md-6">
                                <div class="card-datatable text-nowrap">
                                  <table  class="table" style="width:100%">
                                      <thead class="table-light">
                                        <tr>
                                          
                                          <th>Name</th>
                                          <th>Country</th>
                                          <th>Action</th>
                                          
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @if($regions)
                                        @foreach($regions as $d)
                                        <tr>
                                            
                                            <td>{{ $d->name}}</td>
                                            <td>{{ $d->country->countries_name ?? 'N/A' }}</td>
                                            
                                            {{-- <td>{{ $d->status }}</td> --}}
                                            <td>
                                                <a href="{{route('edit-location-region',Crypt::encrypt($d->id))}}" class="btn btn-sm  btn-info">
                                                   Edit
                                                </a>
                                                <a onclick="return confirm('Are you sure you want to delete this data ?')" href="{{url('delete-location-region/'.$d->id)}}" class="btn btn-sm  btn-danger">
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
                    <div class="tab-pane fade" id="navs-justified-profile" role="tabpanel">
                      <br><br>
                      <form id="form" method="post" enctype="multipart/form-data" autocomplete="off" action="{{route('location-district-process')}}">
                        @csrf
                    <div class="row">
                
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Name</label>
                                <input type="text" name="name"   class="form-control" placeholder="Enter District Name">
                                @error('name')<small class="text-danger">{{$message}}</small> @enderror
                            </div>
                           
                            <div class="mb-3">
                              <label class="form-label" for="basic-default-fullname">Region</label>
                              <select class="form-select" name="region_id">
                                  <option selected disabled>--Choose Region--</option>
                                  @foreach($regions as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                              </select>
                             @error('department_id')<small class="text-danger">{{$message}}</small> @enderror
                              
                          </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Status</label>
                                <select class="form-select" name="status">
                                    <option value="" selected disabled>--Choose Option--</option>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                                @error('status')<small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                        <div class="col-md-6">
                            <div class="card-datatable text-nowrap">
                              <table  class="table" style="width:100%">
                                  <thead class="table-light">
                                    <tr>
                                      
                                      <th>Name</th>
                                      <th>Region</th>
                                      <th>Action</th>
                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @if($districts)
                                    @foreach($districts as $des)
                                    <tr>
                                        
                                        <td>{{ $des->name }}</td>
                                        <td>{{ $des->region->name ?? '' }}</td>
                                        <td>
                                            <a href="{{route('edit-location-district',Crypt::encrypt($des->id))}}" class="btn btn-sm  btn-info">
                                               Edit
                                            </a>
                                            <a onclick="return confirm('Are you sure you want to delete this data ?')" href="{{url('delete-location-district/'.$des->id)}}" class="btn btn-sm  btn-danger">
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
                </div>
              </div>
   
    </div>
</div>

@endsection

