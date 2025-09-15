@php $pageName = "staff"; @endphp

@extends('layouts.app')

@section('content')
@if(Session::has('message'))
<div class="alert alert-solid-success d-flex align-items-center" role="alert">
<span class="alert-icon rounded">
<i class="ti ti-check"></i>
</span>
{{session('message')}}
</div>
@endif
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-header">Staff Management</h5><small class="text-muted float-end">Search Staff </small>
   </div>
    <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        
                        <form id="form" method="POST">
                            @csrf
                            <table align="center"  class="table table-bordered" style="width:900px;">
                                <tbody>
                                    <tr>
                                        <td colspan="4" align="center"><label>Search Staff </label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            
                                            <select id="field" name="field" class="form-select">
                                                <option value="surname">Surname</option>
                                                <option value="firstname">Firstname</option>
                                                <option value="contact_num">Mobile</option>
                                                <option value="employee_id">Employee ID</option>
                                            </select>
                                        
                                        </td>
                                        <td>
                                            <select id="operator" name="operator" class="form-select">
                                                <option value="equal">Equal To ( = )</option>
                                                <option value="contain">Contains %</option>
                                            </select>
                                        </td>
                                        <td><input type="text" class="form-control " id="search_parameter" name="search_parameter" placeholder="Search Parameter"><span id="perror" style="color: red;"></span></td>
                                        <td><button type="submit" name="find" id="find" class="btn btn-success btn-sm" ><i class="fa fa-search"></i>  Search</button> </td>
                                    </tr>
                                </tbody>    
                            </table>
                            
                        </form>
                        <br>
                         <p align="center" style="display: none; color: limegreen;" id="wait"><img src="{{ asset('assets/img/spinner.gif')}}" >Please wait....</p>
                       <br/><br/>
                         <div id="result"></div>
                    </div>

                </div>
            </div>
    </div>
</div>


</div>

<div class="modal fade" id="exLargeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel4">Next of Kin</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" enctype="multipart/form-data" autocomplete="off" action="{{route('next-of-kin-process')}}">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-4">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="nameExLarge" class="form-label">First Name</label>
                                <input type="text" name="firstname" class="form-control" placeholder="Enter First Name">
                            </div>
                            <div class="col-md-4">
                                <label for="nameExLarge" class="form-label">Surname</label>
                                <input type="text" name="surname" class="form-control" placeholder="Enter Surname">
                            </div>
                            <div class="col-md-4">
                                <label for="nameExLarge" class="form-label">Contact Number</label>
                                <input type="number" name="contact_num" class="form-control" placeholder="Enter Contact Number">
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-4">
                        <label for="nameExLarge" class="form-label">Notes on Next of Kin</label>
                        <textarea class="form-control" name="note"></textarea>
                    </div>
                </div>
            
                    <div class="col mb-4">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="nameExLarge" class="form-label">Contact Address</label>
                                <input type="text" name="contact_address" class="form-control" placeholder="Enter Contact Address">
                            </div>
                            <div class="col-md-4">
                                <label for="nameExLarge" class="form-label">Contact Address</label>
                                <input type="text" name="con_email" class="form-control" placeholder="Enter Email">
                            </div>
                            <div class="col-md-4">
                                <label for="nameExLarge" class="form-label">Relationship</label>
                                <select class="form-control" name="relation">
                                    <option value="" selected disabled>--Choose Option</option>
                                    <option value="Mother">Mother</option>
                                    <option value="Father">Father</option>
                                    <option value="Wife">Wife</option>
                                    <option value="Husband">Husband</option>
                                    <option value="Sister">Sister</option>
                                    <option value="Cousin">Cousin</option>
                                    <option value="Daughter">Daughter</option>
                                    <option value="Son">Son</option>
                                    <option value="Nephew">Nephew</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="staff_id" id="staffID"/>
                </div>
            
            
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      
        
      </div>
    </div>
  </div>


@endsection

@section('script')
<script>
    $(document).ready(function(){
    $('body').on('click', '#showmodal', function(){
    var userUrl = $(this).data('url');
    $.get(userUrl, function(data){
    $('#exLargeModal').modal('show');
    $('#staffID').val(data.staff_id);
    })
    });
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
              url:"{{route('staff_management.searchProcess')}}",
              data:form,
              success: function (d) {

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



@endsection