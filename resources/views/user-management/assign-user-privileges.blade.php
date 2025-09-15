@php 
$pageName = "user_managament"; 
$subpageName = "assign_privileges";
@endphp
@extends('layouts.app')
@section('content')
<div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4 class="fw-bold">User Management</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-divide mb-0">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                           <li class="breadcrumb-item"><a href="#">User Management</a></li>
                             
                            <li class="breadcrumb-item active" aria-current="page">Assign user privilege</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        	<!-- /product list -->
    <div class="card">
        
        <div class="card-body p-0">
            <div class="table-responsive">
                <form id="formValidationExamples" class="row g-6" action="#" method="POST">
                    @csrf
        
                    <table class="table table-striped table-bordered" style="width:100%">
                                    
                        <tr>
                            <td><label>Category:</label></td>
                            <td><select class="form-select" name="category" id="category">
                                    <option value="" disabled selected>--SELECT CATEGORY--</option>
                                    @foreach ($userCatList as $userCatList)
                                        <option value="{{ $userCatList->cat_id }}" @if (old('category') == $userCatList->cat_id) selected @endif>{{$userCatList->cat_name}}</option>
                                    @endforeach
                                </select>
                                <span id="caterror"></span>
                            </td>
                            <td><div><button type="submit" id="assign" class="btn btn-success"><i class="fa fa-check"></i></button></td>
                        </tr>
                    </table>
                    <br> <br>
                    <div align="center">
                        <p id="confirmation" style="text-align:center"></p>
                        <p align="center" style="display: none; color: limegreen;" id="wait"><img src="{{ asset('assets/img/spinner-grey.gif')}}" > saving privileges. Please wait....</p>
                        <p align="center" style="display: none; color: limegreen;" id="wait_fetch"><img src="{{ asset('assets/img/spinner-grey.gif')}}" > Fetching privileges for selected category. Please wait....</p>
                    </div>
                    @if ($parents != null)
                    <div id="listarea">
                        <table class="table table-bordered" style="width:100%">
                            @foreach ($parents as $mainlink)
                                <tr>
                                    <td colspan="2"> <b><small><?php echo $mainlink->link_name; ?></small></b> </td>
                                </tr>
                                    @foreach ($child as $subs)
                                        @if ($mainlink->link_id == $subs->link_parent)
                                            <tr>
                                                
                                                <td style="width: 60px;">
                                                    <div class="form-check form-check-md">
                                                            <input class="form-check-input" type="checkbox" name="priv_check[]" id="priv_check" value="{{$subs->link_id}}">
                                                    </div>
                                                </td>
                                                <td><small>{{$subs->link_name}}</small></td>
                                            </tr>
                                        @endif
                                    @endforeach
                            @endforeach
                        </table>
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
        
</div>    
@endsection
@section('scripts')
<script>
    $(document).on("change","#category",function(){

    var dropvalue = $("#category").val();

    $("#wait_fetch").css("display", "block");

    $.ajax({
        type: "POST",
        url: "{{ route('get-category-privileges') }}",
        data: $('#formValidationExamples').serialize(),
        success:function(data) {

            $('#listarea').html(data);
            $("#assign").removeAttr('disabled');
            $("#wait_fetch").css("display","none");

        }

    });
    });
</script>

<script>
       $(document).on("click", "#assign", function(e){
    e.preventDefault();

    $("#caterror").empty();
    var user_cat = $.trim($("#category").val());
    if(user_cat.length == 0){
        $("#caterror").html('<p><small style="color:red;">Choose an option</small></p>');
    }
    if(user_cat.length != 0){

    $("#wait").css("display","block");
    $("#assign").attr("disabled", "disabled");

    $.ajax({
        type: "POST",
        url: "{{ route('save-user-privileges') }}",
        data: $('#formValidationExamples').serialize(),
        success: function(e) {

            console.log(e)

            if(e=="d_fail"){

                $("#wait").css("display","none");
                $("#assign").removeAttr('disabled');


                $('#confirmation').html("<div align='center'><span class='alert alert-danger'><i class='icon icon-remove-sign'></i> User privilege assignment failed</span></div>");
                $("#confirmation").hide().fadeIn(2000).fadeOut(4000);

            }else if(e=="ok"){

                $("#wait").css("display","none");
                $("#assign").removeAttr('disabled');


                $('#confirmation').html("<div align='center'><span class='alert alert-success'><i class='icon icon-ok-sign'></i> User privileges were assigned successfully</span></div>");
                $("#confirmation").hide().fadeIn(2000).fadeOut(4000);

            }else if(e=="unchecked"){

                $("#wait").css("display","none");
                $("#assign").removeAttr('disabled');


                $('#confirmation').html("<div align='center'><span class='alert alert-danger'><i class='icon icon-remove-sign'></i> Privilege assignment failed. No option was checked before assigning privileges</span></div>");
                $("#confirmation").hide().fadeIn(2000);

            }else if(e=="unselected"){

                $("#wait").css("display","none");
                $("#assign").removeAttr('disabled');


                $('#confirmation').html("<div align='center'><span class='alert alert-danger'><i class='icon icon-remove-sign'></i>Privilege assignment failed. No user category was selected</span></div>");
                $("#confirmation").hide().fadeIn(2000);

           }


        }
    });
}
    return false;

});
</script>
@endsection