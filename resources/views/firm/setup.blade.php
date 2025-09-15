@php $pageName = "firm"; $subpageName = "firm_setup"; @endphp

@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
         <h5 class="card-header">Firm Setup</h5>
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
                      <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-home" aria-controls="navs-justified-home" aria-selected="true"><span class="d-none d-sm-block"><i class="tf-icons ti ti-home ti-sm me-1_5"></i>  Department <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger ms-1_5 pt-50">1</span></span><i class="ti ti-user ti-sm d-sm-none"></i></button>
                    </li>
                    <li class="nav-item">
                      <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-profile" aria-controls="navs-justified-profile" aria-selected="false"><span class="d-none d-sm-block"><i class="tf-icons ti ti-user ti-sm me-1_5"></i> Unit<span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger ms-1_5 pt-50">2</span></span><i class="ti ti-home ti-sm d-sm-none"></i></button>
                    </li>
                      <li class="nav-item">
                      <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-cat" aria-controls="navs-justified-cat" aria-selected="false"><span class="d-none d-sm-block"><i class="tf-icons ti ti-tag-text ti-sm me-1_5"></i>Branch<span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger ms-1_5 pt-50">2</span></span><i class="ti ti-user ti-sm d-sm-none"></i></button>
                    </li>
                
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
                      <br><br>
                         <form id="form" method="post" enctype="multipart/form-data" autocomplete="off" action="{{route('firm-department-process')}}">
                            @csrf
                        <div class="row">
                    
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Name</label>
                                    <input type="text" name="name"   class="form-control" placeholder="Enter Category Name">
                                    @error('name')<small class="text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Description</label>
                                    <input type="text" name="description"  class="form-control" placeholder="Enter Description">
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
                                          <th>Description</th>
                                          {{-- <th>Status</th> --}}
                                          <th>Action</th>
                                          
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @if($firmDepartments)
                                        @foreach($firmDepartments as $d)
                                        <tr>
                                            
                                            <td>{{ $d->name }}</td>
                                            <td>{{ $d->description ?? '' }}</td>
                                            {{-- <td>{{ $d->status }}</td> --}}
                                            <td>
                                                <a href="{{route('edit-firm-department',Crypt::encrypt($d->id))}}" class="btn btn-sm  btn-info">
                                                   Edit
                                                </a>
                                                <a onclick="return confirm('Are you sure you want to delete this data ?')" href="{{url('delete-firm-department/'.$d->id)}}" class="btn btn-sm  btn-danger">
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
                      <form id="form" method="post" enctype="multipart/form-data" autocomplete="off" action="{{route('unit-process')}}">
                        @csrf
                    <div class="row">
                
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Name</label>
                                <input type="text" name="name"   class="form-control" placeholder="Enter Unit Name">
                                @error('name')<small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Description</label>
                                <input type="text" name="description"  class="form-control" placeholder="Enter Description">
                            </div>
                            
                            <div class="mb-3">
                              <label class="form-label" for="basic-default-fullname">Department</label>
                              <select class="form-select" name="department_id">
                                  <option selected disabled>--Choose Department--</option>
                                  @foreach($activeDepartments as $item)
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
                                      <th>Department</th>
                                      <th>Action</th>
                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @if($firmUnits)
                                    @foreach($firmUnits as $des)
                                    <tr>
                                        
                                        <td>{{ $des->name }}</td>
                                        <td>{{ $des->department->name }}</td>
                                        <td>
                                            <a href="{{route('edit-unit',Crypt::encrypt($des->id))}}" class="btn btn-sm  btn-info">
                                               Edit
                                            </a>
                                            <a onclick="return confirm('Are you sure you want to delete this data ?')" href="{{url('delete-unit/'.$des->id)}}" class="btn btn-sm  btn-danger">
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
                  
                     <div class="tab-pane fade" id="navs-justified-cat" role="tabpanel">
                      <br><br>

                <form id="form" method="post" enctype="multipart/form-data" autocomplete="off" action="{{route('branch-process')}}">
                        @csrf
                    <div class="row">
                
                        <div class="col-md-6">
                           
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Name</label>
                                <input type="text" name="name"   class="form-control" placeholder="Enter Name">
                                @error('name')<small class="text-danger">{{$message}}</small> @enderror
                            </div>
                             <div class="row">
                                     <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Description</label>
                                        <input type="text" name="description"  class="form-control" placeholder="Enter Description">
                                
                                </div>
                               

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
                                      <th>Action</th>
                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @if($firmBranches)
                                    @foreach($firmBranches as $des)
                                    <tr>
                                        
                                        <td>{{ $des->name }}</td>
                                        <td>
                                            <a href="{{route('edit-branch',Crypt::encrypt($des->id))}}" class="btn btn-sm  btn-info">
                                               Edit
                                            </a>
                                            <a onclick="return confirm('Are you sure you want to delete this data ?')" href="{{url('delete-branch/'.$des->id)}}" class="btn btn-sm  btn-danger">
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

