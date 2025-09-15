@php $pageName = "leave"; $subpageName = "leave-setup"; @endphp

@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
         <h5 class="card-header">Leave Setup</h5><small class="text-muted float-end">Add Leave Category</small>
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
                      <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-home" aria-controls="navs-justified-home" aria-selected="true"><span class="d-none d-sm-block"><i class="tf-icons ti ti-home ti-sm me-1_5"></i>  Category <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger ms-1_5 pt-50">1</span></span><i class="ti ti-user ti-sm d-sm-none"></i></button>
                    </li>
                    <li class="nav-item">
                      <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-profile" aria-controls="navs-justified-profile" aria-selected="false"><span class="d-none d-sm-block"><i class="tf-icons ti ti-user ti-sm me-1_5"></i> Type<span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger ms-1_5 pt-50">2</span></span><i class="ti ti-home ti-sm d-sm-none"></i></button>
                    </li>
                    {{-- <li class="nav-item">
                      <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-messages" aria-controls="navs-justified-messages" aria-selected="false"><span class="d-none d-sm-block"><i class="tf-icons ti ti-message-dots ti-sm me-1_5"></i> Leave Type Setup<span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger ms-1_5 pt-50">3</span></span><i class="ti ti-message-dots ti-sm d-sm-none"></i></button>
                    </li> --}}
                      <li class="nav-item">
                      <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-cat" aria-controls="navs-justified-cat" aria-selected="false"><span class="d-none d-sm-block"><i class="tf-icons ti ti-tag-text ti-sm me-1_5"></i>Holiday Setup<span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger ms-1_5 pt-50">2</span></span><i class="ti ti-user ti-sm d-sm-none"></i></button>
                    </li>
                
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
                      <br><br>
                         <form id="form" method="post" enctype="multipart/form-data" autocomplete="off" action="{{route('create-leave-category-process')}}">
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
                                          <th>Status</th>
                                          <th>Action</th>
                                          
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @if($leaveCategory)
                                        @foreach($leaveCategory as $d)
                                        <tr>
                                            
                                            <td>{{ $d->name }}</td>
                                            <td>{{ $d->description ?? '' }}</td>
                                            <td>{{ $d->status }}</td>
                                            <td>
                                                <a href="{{route('edit-leave-category',Crypt::encrypt($d->id))}}" class="btn btn-sm  btn-info">
                                                   Edit
                                                </a>
                                                <a onclick="return confirm('Are you sure you want to delete this data ?')" href="{{url('delete-leave-category/'.$d->id)}}" class="btn btn-sm  btn-danger">
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
                      <form id="form" method="post" enctype="multipart/form-data" autocomplete="off" action="{{route('create-leave-type-process')}}">
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
                                    <label class="form-label" for="basic-default-fullname">Total Days</label>
                                    <input type="number" name="total_days"   class="form-control" placeholder="Enter Total Number of Days">
                                    @error('total_days')<small class="text-danger">{{$message}}</small> @enderror
                                </div>
                            
                            <div class="mb-3">
                              <label class="form-label" for="basic-default-fullname">Category</label>
                              <select class="form-select" name="category">
                                  <option selected disabled>--Choose Category--</option>
                                  @foreach($leaveCategory as $procats)
                          <option value="{{$procats->id}}">{{$procats->name}}</option>
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
                                      <th>Total Days</th>
                                      <th>Action</th>
                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @if($leaveType)
                                    @foreach($leaveType as $des)
                                    <tr>
                                        
                                        <td>{{ $des->name }}</td>
                                        <td>{{ $des->category->name }}</td>
                                        <td>{{ $des->total_days}}</td>
                                        <td>
                                            <a href="{{route('edit-leave-type',Crypt::encrypt($des->id))}}" class="btn btn-sm  btn-info">
                                               Edit
                                            </a>
                                            <a onclick="return confirm('Are you sure you want to delete this data ?')" href="{{url('delete-leave-type/'.$des->id)}}" class="btn btn-sm  btn-danger">
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
                    {{-- <div class="tab-pane fade" id="navs-justified-messages" role="tabpanel">
                      <br><br>
                        <form id="form" method="post" enctype="multipart/form-data" autocomplete="off" action="{{route('create-leave-type-setup-process')}}">
                            @csrf
                        <div class="row">
                    
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Name</label>
                                    <input type="text" name="name"   class="form-control" placeholder="Enter Name">
                                    @error('name')<small class="text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Total Days</label>
                                    <input type="number" name="total_days"   class="form-control" placeholder="Enter Total Number of Days">
                                    @error('total_days')<small class="text-danger">{{$message}}</small> @enderror
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
                                          
                                          <th>Total Days</th>
                                          <th>Status</th>
                                          <th>Action</th>
                                          
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @if($leaveTypeSetup)
                                        @foreach($leaveTypeSetup as $d)
                                        <tr>
                                            
                                            <td>{{ $d->name }}</td>
                                            <td>{{ $d->total_days }}</td>
                                            <td>{{ $d->status }}</td>
                                            <td>
                                                <a href="{{route('edit-leave-type-setup',Crypt::encrypt($d->id))}}" class="btn btn-sm  btn-info">
                                                   Edit
                                                </a>
                                                <a onclick="return confirm('Are you sure you want to delete this data ?')" href="{{url('delete-leave-type-setup/'.$d->id)}}" class="btn btn-sm  btn-danger">
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
                     
                    </div> --}}

                     <div class="tab-pane fade" id="navs-justified-cat" role="tabpanel">
                      <br><br>

                         <form id="form" method="post" enctype="multipart/form-data" autocomplete="off" action="{{route('create-holiday-process')}}">
                        @csrf
                    <div class="row">
                
                        <div class="col-md-6">
                           
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Name</label>
                                <input type="text" name="name"   class="form-control" placeholder="Enter Name">
                                @error('name')<small class="text-danger">{{$message}}</small> @enderror
                            </div>
                             <div class="row">
                                <div class="col-md-6">
                                     <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Description</label>
                                        <input type="text" name="description"  class="form-control" placeholder="Enter Description">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                      <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Date</label>
                                        <input type="date" name="date"   class="form-control">
                                        @error('date')<small class="text-danger">{{$message}}</small> @enderror
                                    
                                </div>
                                </div>

                            </div>
                              <div class="row">
                                 <div class="col-md-6">
                                      <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Category</label>
                                    <select class="form-select changecategory" name="category">
                                        <option selected disabled>--Choose Category--</option>
                                        @foreach($leaveCategory as $procats)
                                            <option value="{{$procats->id}}">{{$procats->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category')<small class="text-danger">{{$message}}</small> @enderror
                                    
                                </div>
                                </div>
                                <div class="col-md-6">
                                      <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Type</label>
                                    <select class="form-select leave_type" name="type">
                                        <option selected disabled>--Choose Type--</option>
                                        @foreach($leaveType as $procats)
                                            <option value="{{$procats->id}}">{{$procats->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('type')<small class="text-danger">{{$message}}</small> @enderror
                                    
                                </div>
                                </div>

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
                                      <th>Date</th>
                                      <th>Action</th>
                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @if($holidays)
                                    @foreach($holidays as $des)
                                    <tr>
                                        
                                        <td>{{ $des->name }}</td>
                                        <td>{{ $des->date }}</td>
                                        <td>
                                            <a href="{{route('edit-holiday',Crypt::encrypt($des->id))}}" class="btn btn-sm  btn-info">
                                               Edit
                                            </a>
                                            <a onclick="return confirm('Are you sure you want to delete this data ?')" href="{{url('delete-holiday/'.$des->id)}}" class="btn btn-sm  btn-danger">
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

@section('scripts')
   <script>
  $(document).ready(function(){
      $(document).on('change','.changecategory',function(){
    //    console.log("Hello world");
       var cat_id = $(this).val();
    //    console.log(cat_id);

       var div=$(this).parent();

       var op ='';
       $.ajax({
        type:'get',
        url:'{!!URL::to('findLeaveTypeData')!!}',
        data:{'id':cat_id},
        success:function(data){
         //console.log('success');
         console.log(data);

         op+='<option value="0" selected disabled>Select Type</option>';
    for(var i=0;i<data.length;i++){
    op+='<option value="'+data[i].id+'">'+data[i].name+'</option>';

          }
          $(".leave_type").html(op);
          
        },
        error:function(){
        }
       });
      });

  });
  </script>
@endsection