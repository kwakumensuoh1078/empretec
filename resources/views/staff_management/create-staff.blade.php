@php $pageName = "staff"; $subpageName = "application_forms"; @endphp

@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('assets_two/vendor/libs/bs-stepper/bs-stepper.css')}}" />
    <link rel="stylesheet" href="{{asset('assets_two/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
        <link rel="stylesheet" href="{{ asset('assets_two/vendor/libs/%40form-validation/form-validation.css') }}" />
@endsection


@section('content')
  
   <div class="content">
    <div class="page-header">
        <div class="add-item d-flex">
            <div class="page-title">
                <h4 class="fw-bold">Financial Setup</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-divide mb-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Financial Setup</a></li>
                         
                        <li class="breadcrumb-item active" aria-current="page">Application Forms</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
        <!-- /product list -->
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
            <div class="search-set">
                    <h3>Add Application Form </h3>
            </div> 
        </div>
        <div class="card-body">
             @livewire('multi-step-form') 
        </div>
    </div>
</div>
@endsection



@section('scripts')
<script>
   $('#dobs').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
    });
    
</script>
<script>
  $(document).ready(function(){
      $(document).on('change','.changeregion',function(){
       //console.log("Hello world");
       var cat_id = $(this).val();
       //console.log(cat_id);

       var div=$(this).parent();

       var op ='';
       $.ajax({
        type:'get',
        url:'{!!URL::to('findRegionData')!!}',
        data:{'id':cat_id},
        success:function(data){
         //console.log('success');
         //console.log(data);

         op+='<option value="0" selected disabled>Choose District</option>';
    for(var i=0;i<data.length;i++){
    op+='<option value="'+data[i].id+'">'+data[i].name+'</option>';

          }
          $(".districtname").html(op);
          
        },
        error:function(){
        }
       });
      });

  });
  </script>
@endsection