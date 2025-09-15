@php $pageName = "leave"; $subpageName = "leave_approval"; @endphp

@extends('layouts.app')

@section('content')

<div class="card">
<div class="card-header d-flex justify-content-between align-items-center">
<h5 class="card-header">Leave Approval</h5>
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

<div class="row">


<table id="example" class="table " style="width:100%">
<thead class="table-light">
<tr>
<th>No.</th>
<th>Employee ID</th>
<th>Fullname</th>
<th>Request Days</th>
<th>Leave Type</th>
<th>Days Left</th>
<th>Status</th>
<th>Action</th>

</tr>
</thead>
<tbody>
@if($data)
@foreach($data as $reg)
<tr>
<td>{{$loop->iteration}}</td>
<td>{{ $reg->staff->employee_id }}</td>
<td>  {{ $reg->staff->surname }} {{ $reg->staff->firstname }}</td>
<td >{{ $reg->duration }}</td>
<td>{{ $reg->leaveType->name }}</td>
<td>{{ $reg->leave_entitlement }}</td>
<td>{{ $reg->s_status }}</td>
{{-- <td>{{ $reg->gender }}</td> --}}
 
<td>
@if(strtolower($reg->s_status) === "pending")
<a data-bs-toggle="modal" id="showmodals" data-bs-target="#smallModal" data-url="{{ route('fetch-leave-details',$reg->id)  }}" type="button" class="btn btn-sm  btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-warning" title="Process">
<i class="tf-icons ti ti-loader" style="color: white"></i></a>
@elseif(strtolower($reg->s_status) === "on leave")
<a data-bs-toggle="modal" id="showmodal" data-bs-target="#basicModal" data-url="{{ route('fetch-leave-details',$reg->id)  }}" type="button" class="btn btn-sm  btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-warning" title="Resume">
<i class="tf-icons ti ti-refresh" style="color: white"></i></a>
@else
  <a href="#"></a>
@endif
</td>
</tr>
@endforeach
@endif
</tbody>
</table>
</div>

<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
  <form method="post" enctype="multipart/form-data" autocomplete="off" action="{{route('leave-resumption-process')}}">
    @csrf
         <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">Resumption</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                 <div class="modal-body">
                                  <div class="row g-4">
                                      <div class="col mb-0">
                                            <label for="nameBasic" class="form-label"><b>Employee ID: </b></label>
                                            <span id="resumption_employeeids"></span> 
                                      </div>
                                      <div class="col mb-0">
                                            <label for="nameBasic" class="form-label"><b>Name: </b></label>
                                            <span id="resumption_staff_title"></span><span id="resumption_firstnames"></span> <span id="resumption_surnames"></span>
                                      </div>
                                        <div class="col mb-0">
                                      <label for="dobBasic" class="form-label"><b>Phone: </b></label>
                                      <span id="resumption_contact_num"></span> 
                                      </div>
                                    
                                  </div>
                                  <div class="row g-4">
                                      <div class="col mb-0">
                                      <label  class="form-label"><b>Leave Type: </b></label>
                                      <span id="resumption_leave_type"></span> 
                                      </div>
                                      <div class="col mb-0">
                                      <label  class="form-label"><b>Start Date: </b></label>
                                      <span id="resumption_start_date"></span> 
                                      </div>
                                      
                                      <div class="col mb-0">
                                      <label  class="form-label"><b>End Date: </b></label>
                                      <span id="resumption_end_date"></span> 
                                      </div>
                                    
                                  </div>
                                  <div class="row g-4">
                                      <div class="col mb-0">
                                      <label  class="form-label"><b>Days Used: </b></label>
                                      <span id="resumption_days_used"></span> 
                                      </div>
                                      <div class="col mb-0">
                                      <label  class="form-label"><b>Days Left: </b></label>
                                      <span id="resumption_days_left"></span> 
                                      </div>
                                      
                                      <div class="col mb-0">
                                      <label  class="form-label"><b>Requested Days: </b></label>
                                      <span id="resumption_requested_days"></span> 
                                      </div>
                                    
                                  </div>
                                  <div class="row g-4">
                                      <div class="col mb-0">
                                      <label  class="form-label"><b>Caretaker: </b></label>
                                      <span id="resumption_caretaker_title"></span> <span id="resumption_caretaker_firstname"></span> <span id="resumption_caretaker_surname"></span>
                                  
                                      </div>
                                      <div class="col mb-0">
                                      <label  class="form-label"><b>Contact Person: </b></label>
                                      <span id="resumption_contact_person"></span> 
                                      </div>
                                      
                                      <div class="col mb-0">
                                      <label  class="form-label"><b>Relationship: </b></label>
                                      <span id="resumption_relationship"></span> 
                                      </div>
                                    
                                  </div>
                                    <div class="row g-4">
                                      <div class="col mb-0">
                                      <label  class="form-label"><b>Contact Phone: </b></label>
                                      <span id="resumption_contact_telephone"></span> 
                                      </div>
                                        <div class="col mb-0">
                                          <label  class="form-label"><b>Approved Days:</b></label>
                                          <span id="resumption_approved_days"></span> 
                                          </div>
                                      <div class="col mb-0">
                                      <label  class="form-label"><b></b></label>
                                      <span></span> 
                                      </div>
                                      
                                    
                                    
                                  </div>
                                  <hr/>
                                  <div class="row g-4" >
                                          
                                            <div class="col-lg-4 mb-0">
                                        <label class="form-label"><b>Resumption Date</b></label>
                                        <input type="date" id="resumption_date" name="resumption_date" class="form-control"
                                            required/>
                                      
                                    </div>
                                    </div>
                           
                                      
                                
                                  <input type="hidden" name="resumption_staff_id" id="resumption_staffIDs"/>
                            </div>

                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-label-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Resume</button>
                                </div>
                            </div>
                        </div>
          </div>
          </div>
        </div>
      </form>

      <div class="modal fade" id="smallModal" tabindex="-1" aria-hidden="true">
        <form method="post" enctype="multipart/form-data" autocomplete="off" action="{{route('leave-approval-process')}}" >
          @csrf
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Approval</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                      <div class="modal-body">
                            <div class="row g-4">
                                <div class="col mb-0">
                                      <label for="nameBasic" class="form-label"><b>Employee ID: </b></label>
                                      <span id="employeeids"></span> 
                                </div>
                                <div class="col mb-0">
                                      <label for="nameBasic" class="form-label"><b>Name: </b></label>
                                      <span id="staff_title"></span><span id="firstnames"></span> <span id="surnames"></span>
                                </div>
                                  <div class="col mb-0">
                                <label for="dobBasic" class="form-label"><b>Phone: </b></label>
                                <span id="contact_num"></span> 
                                </div>
                              
                            </div>
                            <div class="row g-4">
                                <div class="col mb-0">
                                <label  class="form-label"><b>Leave Type: </b></label>
                                <span id="leave_type"></span> 
                                </div>
                                <div class="col mb-0">
                                <label  class="form-label"><b>Start Date: </b></label>
                                <span id="start_date"></span> 
                                </div>
                                
                                <div class="col mb-0">
                                <label  class="form-label"><b>End Date: </b></label>
                                <span id="end_date"></span> 
                                </div>
                              
                            </div>
                             <div class="row g-4">
                                <div class="col mb-0">
                                <label  class="form-label"><b>Days Used: </b></label>
                                <span id="days_used"></span> 
                                </div>
                                <div class="col mb-0">
                                <label  class="form-label"><b>Days Left: </b></label>
                                <span id="days_left"></span> 
                                </div>
                                
                                <div class="col mb-0">
                                <label  class="form-label"><b>Requested Days: </b></label>
                                <span id="requested_days"></span> 
                                </div>
                              
                            </div>
                             <div class="row g-4">
                                <div class="col mb-0">
                                <label  class="form-label"><b>Caretaker: </b></label>
                                 <span id="caretaker_title"></span> <span id="caretaker_firstname"></span> <span id="caretaker_surname"></span>
                             
                                </div>
                                <div class="col mb-0">
                                <label  class="form-label"><b>Contact Person: </b></label>
                                <span id="contact_person"></span> 
                                </div>
                                
                                <div class="col mb-0">
                                <label  class="form-label"><b>Relationship: </b></label>
                                <span id="relationship"></span> 
                                </div>
                              
                            </div>
                              <div class="row g-4">
                                <div class="col mb-0">
                                <label  class="form-label"><b>Contact Telephone: </b></label>
                                <span id="contact_telephone"></span> 
                                </div>
                                {{-- <div class="col mb-0">
                                <label  class="form-label"><b>Contact Person</b></label>
                                <span id="contact_person"></span> 
                                </div> --}}
                                
                                {{-- <div class="col mb-0">
                                <label  class="form-label"><b>Relationship</b></label>
                                <span id="relationship"></span> 
                                </div> --}}
                              
                            </div>
                            <hr/>
                             <div class="row g-4" >
                              <div class="col mb-0">
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="action" id="approveFlexRadio" value="approve" checked>
                                  <label class="form-check-label" for="approveFlexRadio">Approve</label>
                                </div>
                                 <div class="form-check">
                                  <input class="form-check-input" type="radio" name="action" id="rejectFlexRadio" value="reject" >
                                  <label class="form-check-label" for="rejectFlexRadio">Reject</label>
                                </div>
                              </div>

                              <div class="col mb-0">
                                    <div class="col mb-0" id="approveInput" style="display: block;">
                                      <label class="form-label"><b>Approved Days</b></label>
                                        <input type="number" id="approved_days" name="approved_days" class="form-control"
                                            required/>
                                    </div>
                                     <div class="col mb-0" id="rejectInput" style="display: none;">
                                      <label for="rejectReason"><b>Rejection Reason:</b></label>
                                        <textarea id="rejectReason" name="reject_reason" placeholder="Enter reason for rejection" class="form-control"></textarea>
                                        
                                    </div>
                              </div>
                               <div class="col mb-0">
                               </div>
                                 
                                       

                                    </div>

                               
                           
                            <input type="hidden" name="staff_id" id="staffIDs"/>
                      </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </div>
                </div>
                </div>
                </div>
              </div>
            </form>

     
</div>

<div class="modal fade" id="exLargeModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel4">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
 
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
    $('body').on('click', '#showmodal', function(){
    var userUrl = $(this).data('url');
    $.get(userUrl, function(data){
    $('#basicModal').modal('show');
    $('#resumption_staffIDs').val(data.id);
    $('#resumption_staff_title').text(data.staff.title);
    $('#resumption_surnames').text(data.staff.surname);
    $('#resumption_firstnames').text(data.staff.firstname);
    $('#resumption_contact_num').text(data.staff.contact_num);
    $('#resumption_leave_type').text(data.leave_type.name);

    $('#resumption_employeeids').text(data.staff.employee_id);
    $('#resumption_start_date').text(data.start_date);
    $('#resumption_end_date').text(data.end_date);
    $('#resumption_days_used').text(data.days_used);
     $('#resumption_approved_days').text(data.approved_days);
    $('#resumption_requested_days').text(data.duration);
    $('#resumption_days_left').text(data.leave_entitlement);
    $('#caretaker_title').text(data.caretaker.title);
    $('#resumption_caretaker_firstname').text(data.caretaker.firstname);
    $('#resumption_caretaker_surname').text(data.caretaker.surname);
    $('#resumption_approved_days').val(data.duration);
    $('#contact_telephone').text(data.emergency_number);
    $('#resumption_contact_person').text(data.emergency_contact_name);
    $('#resumption_relationship').text(data.relationship);
    
    })
    });
    });
</script> 

<script>
  $(document).ready(function(){
  $('body').on('click', '#showmodals', function(){
  var userUrl = $(this).data('url');
  $.get(userUrl, function(data){
  $('#smallModal').modal('show');
  $('#staffIDs').val(data.id);
  $('#staff_title').text(data.staff.title);
   $('#surnames').text(data.staff.surname);
  $('#firstnames').text(data.staff.firstname);
  $('#contact_num').text(data.staff.contact_num);
  $('#leave_type').text(data.leave_type.name);

  $('#employeeids').text(data.staff.employee_id);
  $('#start_date').text(data.start_date);
  $('#end_date').text(data.end_date);
  $('#days_used').text(data.days_used);
  $('#requested_days').text(data.duration);
  $('#days_left').text(data.leave_entitlement);
  $('#caretaker_title').text(data.caretaker.title);
  $('#caretaker_firstname').text(data.caretaker.firstname);
  $('#caretaker_surname').text(data.caretaker.surname);
   $('#approved_days').val(data.duration);
  $('#contact_telephone').text(data.emergency_number);
    $('#contact_person').text(data.emergency_contact_name);
    $('#relationship').text(data.relationship);
  
  })
  });
  });
</script>


<script>
  $(document).ready(function(){
  $('body').on('click', '#showmodaledit', function(){
  var userUrl = $(this).data('url');
  $.get(userUrl, function(data){
  $('#fullscreenModal').modal('show');
  $('#staff_ID').val(data.staff_id);
  $('#title').val(data.title);
  $('#first_name').val(data.firstname);
  $('#sur_name').val(data.surname);
  $('#other_name').val(data.othername);
  $('#gender').val(data.gender);
  $('#dob').val(data.dob);
  $('#marital_status_id').val(data.marital_status_id);
  $('#nationality').val(data.nationality);
  $('#other_name').val(data.othername);
  $('#other_name').val(data.othername);

   
  })
  });
  });
</script>

<script>
  const approveRadio = document.getElementById('approveFlexRadio');
  const rejectRadio = document.getElementById('rejectFlexRadio');
  const approveInput = document.getElementById('approveInput');
  const rejectInput = document.getElementById('rejectInput');

  function toggleInputs() {
    if (approveRadio.checked) {
      approveInput.style.display = 'block';
      rejectInput.style.display = 'none';
    } else if (rejectRadio.checked) {
      approveInput.style.display = 'none';
      rejectInput.style.display = 'block';
    }
  }

  toggleInputs();

  approveRadio.addEventListener('change', toggleInputs);
  rejectRadio.addEventListener('change', toggleInputs);
</script>


@endsection