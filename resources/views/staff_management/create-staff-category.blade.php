@php $pageName = "staff"; $subpageName = "application_forms"; @endphp

@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
         <h5 class="card-header">Staff Management</h5><small class="text-muted float-end">Add Staff Category</small>
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
                      <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-home" aria-controls="navs-justified-home" aria-selected="true"><span class="d-none d-sm-block"><i class="tf-icons ti ti-home ti-sm me-1_5"></i>  Classification <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger ms-1_5 pt-50">1</span></span><i class="ti ti-home ti-sm d-sm-none"></i></button>
                    </li>
                    <li class="nav-item">
                      <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-profile" aria-controls="navs-justified-profile" aria-selected="false"><span class="d-none d-sm-block"><i class="tf-icons ti ti-user ti-sm me-1_5"></i> Category<span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger ms-1_5 pt-50">2</span></span><i class="ti ti-user ti-sm d-sm-none"></i></button>
                    </li>
                    <li class="nav-item">
                      <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-messages" aria-controls="navs-justified-messages" aria-selected="false"><span class="d-none d-sm-block"><i class="tf-icons ti ti-message-dots ti-sm me-1_5"></i> Type<span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger ms-1_5 pt-50">3</span></span><i class="ti ti-message-dots ti-sm d-sm-none"></i></button>
                    </li>
                      <li class="nav-item">
                      <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-cat" aria-controls="navs-justified-cat" aria-selected="false"><span class="d-none d-sm-block"><i class="tf-icons ti ti-file-text ti-sm me-1_5"></i> Document Category<span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger ms-1_5 pt-50">2</span></span><i class="ti ti-user ti-sm d-sm-none"></i></button>
                    </li>
                    <li class="nav-item">
                      <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-type" aria-controls="navs-justified-type" aria-selected="false"><span class="d-none d-sm-block"><i class="tf-icons ti ti-tag ti-sm me-1_5"></i>Document Type<span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger ms-1_5 pt-50">3</span></span><i class="ti ti-message-dots ti-sm d-sm-none"></i></button>
                    </li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
                      <br><br>
                        <form   method="post" enctype="multipart/form-data" autocomplete="off" action="{{route('create-staff-class-process')}}">
                            @csrf
                        <div class="row mb-3">
                    
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Name</label>
                                    <input type="text" name="class_name"   class="form-control" placeholder="Enter Classification ">
                                    @error('class_name')<small class="text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Description</label>
                                    <input type="text" name="class_description"  class="form-control" placeholder="Enter Description">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Status</label>
                                    <select class="form-select" name="class_status">
                                        <option value="" selected>--Choose Option--</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                   @error('class_status')<small class="text-danger">{{$message}}</small> @enderror
                                </div>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                            <div class="col-md-6">
                                <div class="card-datatable text-nowrap">
                                  <table id="example" class="display" style="width:100%">
                                      <thead class="table-light">
                                        <tr>
                                          
                                          <th>Name</th>
                                          <th>Status</th>
                                          <th>Action</th>
                                          
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @if($regs)
                                        @foreach($regs as $reg)
                                         <tr>
                                            <td>{{ $reg->name }}</td>
                                            <td>{{ $reg->status }}</td>
                                            <td>
                                                <a href="{{route('edit-staff-class',Crypt::encrypt($reg->id))}}" class="btn btn-sm  btn-info">
                                                    Edit
                                                 </a>
                                                 <a onclick="return confirm('Are you sure you want to delete this data ?')" href="{{url('delete-staff-class/'.$reg->id)}}" class="btn btn-sm  btn-danger">
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
                        <form id="form" method="post" enctype="multipart/form-data" autocomplete="off" action="{{route('create-staff-category-process')}}">
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
                                          <th>Status</th>
                                          <th>Action</th>
                                          
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @if($data)
                                        @foreach($data as $d)
                                        <tr>
                                            
                                            <td>{{ $d->name }}</td>
                                            <td>{{ $d->status }}</td>
                                            <td>
                                                <a href="{{route('edit-staff-category',Crypt::encrypt($d->cat_id))}}" class="btn btn-sm  btn-info">
                                                   Edit
                                                </a>
                                                <a onclick="return confirm('Are you sure you want to delete this data ?')" href="{{url('delete-staff-category/'.$d->cat_id)}}" class="btn btn-sm  btn-danger">
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
                    <div class="tab-pane fade" id="navs-justified-messages" role="tabpanel">
                      <br><br>
                      <form id="form" method="post" enctype="multipart/form-data" autocomplete="off" action="{{route('create-staff-type-process')}}">
                        @csrf
                    <div class="row">
                
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Name</label>
                                <input type="text" name="type"   class="form-control" placeholder="Enter Type Name">
                                @error('type')<small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Description</label>
                                <input type="text" name="type_description"  class="form-control" placeholder="Enter Description">
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="basic-default-fullname">Category</label>
                              <select class="form-select" name="category">
                                  <option selected disabled>--Choose Category--</option>
                                  @foreach($data as $procats)
                          <option value="{{$procats->cat_id}}">{{$procats->name}}</option>
                          @endforeach
                              </select>
                             @error('category')<small class="text-danger">{{$message}}</small> @enderror
                              
                          </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Status</label>
                                <select class="form-select" name="type_status">
                                    <option value="" selected disabled>--Choose Option--</option>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                                @error('type_status')<small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <button type="submit" class="btn btn-success">Save</button>
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

                     <div class="tab-pane fade" id="navs-justified-cat" role="tabpanel">
                      <br><br>
                      <form id="form" method="post" enctype="multipart/form-data" autocomplete="off" action="{{route('create-document-category-process')}}">
                        @csrf
                    <div class="row">
                
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Name</label>
                                <input type="text" name="categoryName"   class="form-control" placeholder="Enter Document Category Name">
                                @error('categoryName')<small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Status</label>
                                <select class="form-select" name="category_status">
                                    <option value="" selected disabled>--Choose Option--</option>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                                @error('category_status')<small class="text-danger">{{$message}}</small> @enderror
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
                                    @if($docCats)
                                    @foreach($docCats as $docCat)
                                    <tr>
                                        
                                        <td>{{ $docCat->name }}</td>
                                        <td>
                                            <a href="{{route('edit-document-category',Crypt::encrypt($docCat->id))}}" class="btn btn-sm  btn-info">
                                               Edit
                                            </a>
                                            <a onclick="return confirm('Are you sure you want to delete this data ?')" href="{{url('delete-document-category/'.$docCat->id)}}" class="btn btn-sm  btn-danger">
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

                     <div class="tab-pane fade" id="navs-justified-type" role="tabpanel">
                      <br><br>
                      <form id="form" method="post" enctype="multipart/form-data" autocomplete="off" action="{{route('create-document-type-process')}}">
                        @csrf

                        <div class="row">
                
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Name</label>
                                <input type="text" name="docType"   class="form-control" placeholder="Enter Document Type">
                                @error('docType')<small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="basic-default-fullname">Document Category</label>
                              <select class="form-select" name="category">
                                  <option selected disabled>--Choose Category--</option>
                                  @foreach($docCats as $docCat)
                          <option value="{{$docCat->id}}">{{$docCat->name}}</option>
                          @endforeach
                              </select>
                             @error('category')<small class="text-danger">{{$message}}</small> @enderror
                              
                          </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Status</label>
                                <select class="form-select" name="type_status">
                                    <option value="" selected disabled>--Choose Option--</option>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                                @error('type_status')<small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <button type="submit" class="btn btn-success">Save</button>
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
                                    @if($docTypes)
                                    @foreach($docTypes as $docType)
                                    <tr>
                                        
                                        <td>{{ $docType->name }}</td>
                                        <td>{{ $docType->category->name }}</td>
                                        <td>
                                            <a href="{{route('edit-document-type',Crypt::encrypt($docType->id))}}" class="btn btn-sm  btn-info">
                                               Edit
                                            </a>
                                            <a onclick="return confirm('Are you sure you want to delete this data ?')" href="{{url('delete-document-type/'.$docType->id)}}" class="btn btn-sm  btn-danger">
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

@section('script')
    <script>
    
    </script> 
@endsection