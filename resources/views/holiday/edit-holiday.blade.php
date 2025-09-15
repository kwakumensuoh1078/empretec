@php $pageName = "leave"; $subpageName = "application_forms";  @endphp

@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Edit Holiday</h5> <small class="text-muted float-end"><a  class = "btn btn-sm btn-warning" href="{{ route('create-leave-setup') }}"><i class="fa fa-plus"></i> Add Holiday</a></small>
      </div>
    <div class="card-body">
        <form id="form" method="post" enctype="multipart/form-data" autocomplete="off" action="{{route('edit-holiday-process',$id)}}">
            @csrf
           

             @if(Session::has('message'))
             <div class="alert alert-solid-success d-flex align-items-center" role="alert">
                <span class="alert-icon rounded">
                  <i class="ti ti-check"></i>
                </span>
                {{session('message')}}
              </div>
              @endif
              
                <div class="row mb-2">
                     <div class="col-md-6">
                        <label class="form-label" for="basic-default-fullname">Name</label>
                        <input type="text" name="name"   class="form-control" placeholder="Enter Holiday Name" value="{{ $data->name }}">
                         @error('name')<small class="text-danger">{{$message}}</small> @enderror
                     </div>
                       <div class="col-md-6">
                     </div>

                </div>
                 <div class="row mb-2">
                     <div class="col-md-6">
                        <label class="form-label" for="basic-default-fullname">Description</label>
                        <input type="text" name="description"  class="form-control" placeholder="Enter Description" value="{{ $data->description }}">
                     </div>
                    <div class="col-md-6">
                        <label class="form-label" for="basic-default-fullname">Date</label>
                        <input type="date" name="date"  class="form-control" value="{{ $data->date }}">
                         @error('date')<small class="text-danger">{{$message}}</small> @enderror
                     </div>
                </div>
                 <div class="row mb-2">
                     <div class="col-md-6">
                        <label class="form-label" for="basic-default-fullname">Leave Category</label>
                          <select class="form-select changecategory" name="category">
                              <option selected disabled>--Choose Leave Category--</option>
                              @foreach($leaveCat as $item)
                            <option @if($data->category_id==$item->id ) selected @endif value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                                </select>
                            </select>
                            @error('category')<small class="text-danger">{{$message}}</small> @enderror
                     </div>
                    <div class="col-md-6">
                       <label class="form-label" for="basic-default-fullname">Leave Type</label>
                          <select class="form-select leave_type" name="type">
                              <option selected disabled>--Choose Leave Type--</option>
                              @foreach($leaveType as $item)
                        <option @if($data->type_id==$item->id ) selected @endif value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                            </select>
                          </select>
                         @error('type')<small class="text-danger">{{$message}}</small> @enderror
                     </div>
                </div>
                  <div class="row mb-4">
                     <div class="col-md-6">
                        <label class="form-label" for="basic-default-fullname">Status</label>
                            <select class="form-select" name="status">
                                <option value="{{ $data->status }}" >{{$data->status}}</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                            @error('status')<small class="text-danger">{{$message}}</small> @enderror
                     </div>
                </div>
                 <div class="row mb-2">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>

                     </div>
        </form>
       
     
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