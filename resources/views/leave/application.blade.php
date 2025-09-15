@php 

$pageName = "leave"; 

$subpageName = "leave_application";

@endphp

@extends('layouts.app')


@section('content')
<div class="content">
    <div class="content container-fluid">
				
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                     <h4 class="fw-bold">Leave Application</h4>
                    {{-- <ul class="breadcrumb">
                         <li ><a href="#">Dashboard</a>/ </li>
                        <li ><a href="#"> Application </a></li>
                    </ul> --}}
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        
       <!-- Tabs -->
       <section class="comp-section">
        {{-- <div class="section-header">
            <h3 class="section-title">Job Tracker</h3>
            <div class="line"></div>
        </div> --}}

        
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-white">
                    
                    <div class="card-body">
                       
                        <div class="tab-content">
                            <div class="tab-pane show active" id="solid-tab2">

                                @if (session('message_success'))
                                <p class="alert alert-success" align="center">{{session('message_success')}}</p>
                                @endif
                    
                                @if (session('message_error'))
                                <p class="alert alert-danger" align="center">{{session('message_error')}}</p>
                                @endif
                                

                                <div class="row">
                                    <div class="col-md-12">
                                        {{-- <div class="card bg-white"> --}}
                                            {{-- <div class="card-header">
                                                <h5 class="card-title">Leave Application</h5>
                                            </div> --}}
                                            <div class="card-body">
                                                
                                                <div class="tab-content">
                                                    <div class="tab-pane show active" id="solid-tab1">
                                                        <div class="row">
                                                            <div class="col-xl-12 d-flex">
                                                                <div class="card flex-fill">
                                                                    <div class="card-header">
                                                                        <h5 class="card-title">Search  Applications</h5>
                                                                    </div>
                                                                    <div class="card-body">
                                                                    
                                                                        <div class="table-responsive">
                                                                            <form id="form" method="POST">
                                                                                @csrf
                                                                                <table   class="table table-striped mb-0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td colspan="4" align="center"><label><b>Search Application</b> </label></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                
                                                                                                <select id="field" name="field" class="form-select">
                                                                                                    <option value="firstname" >First Name</option>
                                                                                                     <option value="surname" >Last Name</option>
                                                                                                     <option value = "employee_id"> Employee Number</option>
                                                                                                    <option value = "contact_num">Telephone Number</option>
                                                                                                   
                                                                                                    
                                                                                                </select>
                                                                                            
                                                                                            </td>
                                                                                            <td>
                                                                                                <select id="operator" name="operator" class="form-select">
                                                                                                    <option value="contain">Contains %</option>
                                                                                                    <option value="equal">Equal To ( = )</option>
                                                                                                    
                                                                                                </select>
                                                                                            </td>
                                                                                            <td><input type="text" class="form-control " id="search_parameter" name="search_parameter" placeholder="Search Parameter"><span id="perror" style="color: red;"></span></td>
                                                                                            <td><button type="submit" name="find" id="find" class="btn btn-success btn-sm" ><i class="fa fa-search"></i>  Search</button> </td>
                                                                                        </tr>
                                                                                    </tbody>    
                                                                                </table>
                                                                                
                                                                            </form>
                                                                            <br>
                                                                            <p align="center" style="display: none; color: limegreen;" id="wait"><img src="{{ asset('images/spinner-grey.gif')}}" >Please wait....</p>
                                                                        <br/><br/>
                                                                            <div id="result"></div>   
                                                                        </div>
                                                                            
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        
                                                        </div>
                                                    </div>
                                                    
                                                
                                                </div>
                                            </div>
                                        {{-- </div> --}}
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    <!-- /Tabs -->
        
    
    </div
</div>

<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
    <form method="post" autocomplete="off" action="{{route('commence-application-process')}}">
      @csrf
          <div class="modal-dialog modal-lg" role="document" style="width: 100%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Application</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body">

                        

                        <p align="center" style="display: none; color: limegreen;" id="wait"><img src="{{ asset('images/spinner-grey.gif')}}" > fetching information, please wait ....</p>
                        


                     
                          <div class="row g-4">
                                        <div class="col mb-0">
                                            <label for="nameBasic" class="form-label"><b>Employee ID :</b></label>
                                            <span id="employeeid"></span>
                                            <input type="hidden" id="staff_id_hidden" name="staff_id_hidden">
                                        </div>
                                        <div class="col mb-0">
                                            <label for="nameBasic" class="form-label"><b>Full Name :</b></label>
                                            <span id="firstname"></span> <span id="surname"></span>
                                        </div>
                                         <div class="col mb-0">
                                            <label for="dobBasic" class="form-label"><b>Phone :</b></label>
                                            <span style="margin-left: 0;padding-left:0;" id="phone"></span>
                                        </div>
                                       
                                    </div>
                                    <div class="row g-4" >
                                       
                                        <div class="col mb-0">
                                            <label for="leavedays" class="form-label"><b>Leave Days :</b></label>
                                            <span id="leave_days" style="color:blue"></span>
                                        </div>
                                          <div class="col mb-0">
                                            <label for="emailBasic" class="form-label"><b>Days Used :</b></label>
                                            <span id="days_used" style="color: blue"></span>
                                            <input type="hidden" name="days_used_hidden" id="days_used_hidden" class="form-control"> 
                                        </div>
                                        <div class="col mb-0">
                                            <label for="emailBasic" class="form-label"><b>Days Left :</b></label>
                                             <span id="remaining_days" style="color: blue"></span>
                                            <input type="number" id="remaining_days_hidden" name="remaining_days_hidden" class="form-control" hidden>
                                           
                                        </div>

                                    </div>
                                    <br>
                                    <div class="row g-4" style="">
                                          <div class="col mb-0 text-center" id="days_error" style="color: red;display: none;">
                                                 Days requested cannot be more than remaining leave left.
                                          </div>
                                    </div>
                                    <hr />
                                      <div class="row g-4" >
                                        <div class="col mb-0">
                                            <label for="emailBasic" class="form-label"><b>Select Type</b></label>
                                            <select class="form-select doc_type changeleavetype" name="leave_type" id="leave_type" required>
                                                <option value="">--Select here--</option>
                                                @foreach($leaveTypes as $leaveType)
                                                    <option value="{{$leaveType->id}}">{{$leaveType->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                         <div class="col mb-0">
                                            <label class="form-label"><b>Start Date</b></label>
                                            <input type="date" class="form-control" name="start_date" id="start_date" required>
                                        </div>
                                           <div class="col mb-0">
                                            <label class="form-label"><b>End Date</b></label>
                                            <input type="date" class="form-control" name="end_date" id="end_date" required>
                                        </div>

                                    </div>
                                    <br>
                                    <div class="row g-4" >
                                         <div class="col mb-0">
                                            <label class="form-label"><b>Days Requested</b></label><br>
                                            <span class="p-2" id="days_requested" style="color:blue"></span>
                                            <input type="hidden" name="days_requested_hidden" id="days_requested_hidden">
                                        </div>
                                        <div class="col mb-0">
                                            <label class="form-label"><b>Select Caretaker</b></label>
                                            <select class="form-select" name="caretaker_id" id="caretaker_id" required>
                                                <option>--Select here--</option>
                                                @foreach($careTaker as $careTakers)
                                                    <option value="{{$careTakers->staff_id}}">{{$careTakers->firstname}} {{$careTakers->surname}}</option>
                                                @endforeach
                                            
                                            </select>
                                        </div>
                                           <div class="col mb-0">
                                            <label class="form-label"><b>Remarks</b></label>
                                            <textarea required name="remarks" id="" cols="1" class="form-control"></textarea>
                                        </div>

                                    </div>
                                    <br>
                                      <div class="row g-4" >
                                         <div class="col mb-0">
                                            <label for="emailBasic" class="form-label"><b>Contact Person</b></label>
                                            <input type="text" class="form-control" name="contact_person" id="contact_person" required placeholder="Name of Emergency Contact">
                                        </div>
                                        <div class="col mb-0">
                                             <label for="relationship" class="form-label"><b>Select Relationship</b></label>
                                            <select name="relationship" id="relationship" class="form-select" required>
                                           <option value="">--Select here--</option>
                                           <option value="Parent">Parent</option>
                                           <option value="Spouse">Spouse</option>
                                           <option value="Sibling">Sibling</option>
                                           <option value="Child">Child</option>
                                           <option value="Friend">Friend</option>
                                           <option value="Other">Other</option>
                                           </select>
                                        </div>
                                           <div class="col mb-0">
                                            <label for="emailBasic" class="form-label"><b>Contact Telephone</b></label>
                                            <input type="text" class="form-control" name="contact_telephone" id="contact_telephone" required placeholder="Contact of Emergency Person">
                              
                                        </div>

                                    </div>
                                    <br>
                        {{-- <table class="table table-striped table-bordered table-responsive">
                            <tbody>
                                <tr>
                                <td> <label>Amount Paid:</label> <input type="text" class="form-control" id="amountPaid" name="amountPaid" required/></td>
                                <td> <label>Bill Type:</label>
                                    <select required class="form-select" id="bill_type" name="bill_type" required><option value="" selected disabled>--Choose Option--</option>
                                        @foreach ($billTypeList as $billTypeListItem)
                                           <option value="{{ $billTypeListItem->id }}">{{ $billTypeListItem->name }}</option>
                                        @endforeach
                                 
                             
                                  </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td> <label>Payment Mode:</label><select class="form-select" id="payment_mode" name="payment_mode" required><option value="" selected disabled>--Choose Option--</option>
                                     <option value="Cheque">Cheque</option>
                                      <option value="Cash">Cash</option></select>
                                      </td>
                                    </tr>
                                <tr>
                                <td colspan="2"><label>Comment/Cheque No:</label><textarea class="form-control" id="comment" name="comment"></textarea></td>
                                </tr>
                            </tbody>
                         </table> --}}
                         <input type="hidden" id="formId" name="formId">
                        
                        <div class="modal-footer">
                            <div class="float-start">
                                 <button type="button" class="btn btn-danger mb-3" data-bs-dismiss="modal">Close</button>
                            </div>
                           <div class="float-end">
                                 <button style="color: white;" type="submit" id="submit_btn" class="btn btn-info mb-3"><small>Apply</small></button>
                           </div>
                           
                        </div>
                    </div>
                    
                </div>
            </div>
    </form>
</div>


@endsection

@section('scripts')
 
<script>
    $('#dob').datepicker({
       format: "yyyy-mm-dd",
       autoclose: true
   });
 
</script> 
 
 
<script>
    $(document).on("click","#find",function(e){
      e.preventDefault();
      $("#perror").empty();
      document.getElementById("find").disabled = true;

      $("#wait").css("display","block");
      var parameter  = $("#search_parameter").val();
      var form  = $("#form").serialize();
      if(parameter === ''){
          $("#perror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
          $("html, body").animate({ scrollTop: 0 }, "slow");
          $("#wait").css("display","none");
      }
      else{

          $.ajax({
              type:"POST",
              url:"{{route('leave.searchLeaveApplicant')}}",
              data:form,
              success: function (d) {
                    // console.log(d);

                   document.getElementById("find").disabled = false;

                  if(d === "no data"){
                      $("#result").html('<p class=" alert alert-danger" align="center"> Sorry no data found.</p>');
                      $("html, body").animate({ scrollTop: 0 }, "slow");
                      $("#wait").css("display","none");
                  }
                  else{
                      $("#result").html(d);
                      $("html, body").animate({ scrollTop: 0 }, "slow");
                      $("#wait").css("display","none");
                  }
              }
          });
      }
  });
</script> 

 <script>
        $(document).on('click','#commenceApplicationBtn',function(e){
            e.preventDefault();
            let formsID = $(this).data('id');
            $('#formId').val(formsID);
            $("#wait").css("display","block");
            document.getElementById("commenceApplicationBtn").disabled = true;


            $.ajax({
            type:"POST",
            url:"{{ route('commence-application') }}",
            data:{
                "_token": "{{ csrf_token() }}",
                'formsID': formsID
            },
            success:function (d) {

                // console.log(d);

                $("#wait").css("display","none");

                document.getElementById("commenceApplicationBtn").disabled = false;

             
                $('#firstname').html(d.firstname );
                $('#surname').html(d.surname);
                $('#employeeid').html(d.employee_id);
                $('#staff_id_hidden').val(d.staff_id);
                $('#phone').html(d.contact_num);
                $('#formId').html(d.staff_id);
                
            }

            });
  
        });
    </script>

    <script>
        let holidays = [];

        function isWeekend(date) {
            const day = date.getDay();
            return day === 0 || day === 6;
        }

        function isHoliday(dateStr) {
            return holidays.includes(dateStr);
        }

        function formatDate(date) {
            const year = date.getFullYear();
            const month = (date.getMonth() + 1).toString().padStart(2, '0');
            const day = date.getDate().toString().padStart(2, '0');
            return `${year}-${month}-${day}`;
        }

        function calculateDaysRequested() {
            const start = document.getElementById("start_date").value;
            const end = document.getElementById("end_date").value;
            const remaining = parseInt(document.getElementById("remaining_days_hidden").value);
            const errorBox = document.getElementById("days_error");
            const submitBtn = document.getElementById("submit_btn");
            const endInput = document.getElementById("end_date");

            if (start) {
                endInput.min = start;
            }

            if (start && end) {
                const startDate = new Date(start);
                const endDate = new Date(end);

                if (endDate >= startDate) {
                    let count = 0;
                    let current = new Date(startDate);

                    while (current <= endDate) {
                        const formatted = formatDate(current);

                        if (!isWeekend(current) && !isHoliday(formatted)) {
                            count++;
                        }

                        current.setDate(current.getDate() + 1);
                    }

                    // document.getElementById("days_requested").value = count;
                        $('#days_requested').html(count + ' days');
                        $('#days_requested_hidden').val(count);

                    if (count > remaining) {
                        errorBox.style.display = 'block';
                        submitBtn.disabled = true;
                    } else {
                        errorBox.style.display = 'none';
                        submitBtn.disabled = false;
                    }

                } else {
                      $('#days_requested').html('');
                        $('#days_requested_hidden').val(0);
                    // document.getElementById("days_requested").value = '';
                    errorBox.style.display = 'none';
                    submitBtn.disabled = false;
                }
            } else {
                 $('#days_requested').html('');
                   $('#days_requested_hidden').val(0);
                // document.getElementById("days_requested").value = '';
                errorBox.style.display = 'none';
                submitBtn.disabled = false;
            }
        }

        // Attach events
        document.getElementById("start_date").addEventListener("change", calculateDaysRequested);
        document.getElementById("end_date").addEventListener("change", calculateDaysRequested);

        // Load holidays from backend
        fetch('/get-holidays')
            .then(response => response.json())
            .then(data => {
                holidays = data;
            //    console.log(data);
            });
    </script>

     <script>
        $(document).ready(function(){
            $(document).on('change','.changeleavetype',function(){
                
            var type_id = $(this).val();
            var staff_id = $('#staff_id_hidden').val();
                console.log(type_id);
            console.log(staff_id);

            $.ajax({
                type:'get',
                url:'{!!URL::to('findLeaveDays')!!}',
                data:{'type_id':type_id,'staff_id':staff_id},
                success:function(data){
                // console.log(data.data);
                // console.log(data.days_used);
                $('#days_used').html(data.days_used + ' days');
                $('#days_used_hidden').val(data.days_used);
                $('#leave_days').html(data.data + ' days ') ;
                $('#remaining_days').html(data.data - data.days_used + ' days');
                $('#remaining_days_hidden').val(data.data - data.days_used);
                
                },
                error:function(){
                }
            });
            });

        });
  </script>



@endsection