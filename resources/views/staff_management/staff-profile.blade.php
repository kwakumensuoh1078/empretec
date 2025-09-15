@php $pageName = "staff"; $subpageName = "application_forms"; @endphp

@extends('layouts.app')

@section('css')

<style>
    .displayContent {
        display: none;
    }

    .displayContent.active {
        display: block;
    }
</style>

@endsection

@section('content')
   
<div class="content" style="transform: none;">
				<div class="row" style="transform: none;">
					<!-- Page Header -->
					<div class="col-md-12">
						<div class="d-md-flex d-block align-items-center justify-content-between mb-3">
							<div class="my-auto mb-2">
								<h3 class="page-title mb-1">Staff Details</h3>
								<nav>
									<ol class="breadcrumb mb-0">
										<li class="breadcrumb-item">
											<a href="index.html">Dashboard</a>
										</li>
										<li class="breadcrumb-item">
											<a href="students.html">HRM</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">Staff Details</li>
									</ol>
								</nav>
							</div>
							<div class="d-flex my-xl-auto right-content align-items-center  flex-wrap">
								<a href="{{route('editstaff',Crypt::encrypt($data->staff_id))}}" class="btn btn-primary d-flex align-items-center mb-2"><i class="ti ti-edit-circle me-2"></i>Edit Staff</a>
							</div>
						</div>

					</div>
					<!-- /Page Header -->
					<div class="col-xxl-3 col-lg-4 " style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
						
						

					<div class="" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;"><div class="card border-white">
							<div class="card-header">
								<div class="d-flex align-items-center  row-gap-3">
									<div class="d-flex align-items-center justify-content-center avatar avatar-xxl border border-dashed me-2 flex-shrink-0 text-dark frames">
										<img src="{{ asset($data->picture) }}" class="img-fluid" alt="img">
									</div>
									<div>
										<span class="badge badge-soft-success d-inline-flex align-items-center mb-1"><i class="ti ti-circle-filled fs-5 me-1"></i>{{ $data->status }}</span>
										<h5 class="mb-1">{{ $data->title ?? '' }} {{ $data->surname ?? '' }} {{ $data->firstname ?? ''}}</h5>
										<p class="text-primary m-0">{{ $data->employee_id ?? '' }}</p>
							
									</div>
								</div>
							</div>
							<div class="card-body">
								<h5 class="mb-3">Basic Information</h5>
								<dl class="row mb-0">
									<dt class="col-6 fw-medium text-dark mb-3"><b>Staff ID</b></dt>
									<dd class="col-6  mb-3">{{ $data->employee_id ?? '' }}</dd>
									<dt class="col-6 fw-medium text-dark mb-3"><b>Gender</b></dt>
									<dd class="col-6  mb-3">{{ $data->gender ?? '' }}</dd>
									<dt class="col-6 fw-medium text-dark mb-3"><b>Position</b></dt>
									<dd class="col-6  mb-3">{{ $data->position ?? 'N/A' }}</dd>
									<dt class="col-6 fw-medium text-dark mb-3"><b>Nationality</b></dt>
									<dd class="col-6  mb-3">{{ $data->nationality ?? 'N/A' }}</dd>
									<dt class="col-6 fw-medium text-dark mb-3"><b>Date Of Birth</b></dt>
									<dd class="col-6  mb-3">{{ $data->dob ?? 'N/A' }}</dd>
									<dt class="col-6 fw-medium text-dark mb-3"><b>Marital Status</b></dt>
									<dd class="col-6  mb-3">{{$data->marital_status_id ?? 'N/A'}}</dd>
                                    <dt class="col-6 fw-medium text-dark mb-3"><b>Region</b></dt>
									<dd class="col-6  mb-3">{{ $data->regionName->name ?? 'N/A' }}</dd>
                                     <dt class="col-6 fw-medium text-dark mb-3"><b>District</b></dt>
									<dd class="col-6  mb-3">{{ $data->districtName->name ?? 'N/A' }}</dd>
									<dt class="col-6 fw-medium text-dark mb-3"><b>Hometown</b></dt>
									<dd class="col-6  mb-3">{{ $data->hometown ?? 'N/A' }}</dd>
								
								</dl>
							</div>
						</div><div class="card border-white">
							
						</div><div dir="ltr" class="resize-sensor" style="pointer-events: none; position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden; max-width: 100%;"><div class="resize-sensor-expand" style="pointer-events: none; position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden; max-width: 100%;"><div style="position: absolute; left: 0px; top: 0px; transition: all; width: 324px; height: 736px;"></div></div><div class="resize-sensor-shrink" style="pointer-events: none; position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden; max-width: 100%;"><div style="position: absolute; left: 0px; top: 0px; transition: all; width: 200%; height: 200%;"></div></div></div></div></div>

					<div class="col-xxl-9 col-lg-8">
						<div class="row">
							<div class="col-md-12" id="sidebar-menu5">
								<ul class="nav nav-tabs nav-tabs-bottom mb-4">
									<li data-target="content1">
										<a class="nav-link" href="javascript:void(0);"><i class="tf-icons ti ti-users ti-sm me-1_5"></i>Employment</a>
									</li>
									<li data-target="content2">
										<a class="nav-link" href="javascript:void(0);"><i class="tf-icons ti ti-phone ti-sm me-1_5"></i>Employee Contact</a>
									</li>
									<li data-target="content3"> 
										<a class="nav-link" href="javascript:void(0);"><i class="ti ti-calendar-due me-2"></i>Document Manager</a>
									</li>
                                    	<li data-target="content4"> 
										<a class="nav-link" href="javascript:void(0);"><i class="ti ti-building-bank me-2"></i>Bank Details</a>
									</li>
									
								</ul>
							</div>
						</div>
                         <div id="tab-content">
                            <div id="content1" class="displayContent active">
                        
                                <div class="row">
                                
                                    <!-- Bank Details -->
                                    <div class="col-xxl-12 d-flex">
                                        <div class="card flex-fill">
                                            <div class="card-header">
                                                <h5>Employment</h5>
                                            </div>
                                            <div class="card-body pb-1">
                                                <div class="row">
                                                    <div class="col-md-4 mb-3">
                                                        <div class="mb-3">
                                                            <p class="mb-1 fw-medium text-dark "><b>Staff ID</b></p>
                                                            <p>{{ $data->employee_id ?? 'N/A' }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <div class="mb-3">
                                                            <p class="mb-1 fw-medium text-dark "><b>Staff Classification</b></p>
                                                            <p>{{ $data->staff_class ?? 'N/A' }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <div class="mb-3">
                                                            <p class="mb-1 fw-medium text-dark "><b>Staff Category</b></p>
                                                            <p>{{ $data->staffCat->name ?? 'N/A' }}</p>
                                                        </div>
                                                    </div>
                                                    
                                                   <div class="col-md-4 mb-3">
                                                        <div class="mb-3">
                                                            <p class="mb-1 fw-medium text-dark "><b>Staff Branch</b></p>
                                                            <p>{{$data->branchName->branch_name ?? 'N/A'}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <div class="mb-3">
                                                            <p class="mb-1 fw-medium text-dark "><b>Department</b></p>
                                                            <p>{{$data->departmentName->name ?? 'N/A'}}</p>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-4 mb-3">
                                                        <div class="mb-3">
                                                            <p class="mb-1 fw-medium text-dark "><b>Unit</b></p>
                                                            <p>{{ $data->unit ?? 'N/A' }}</p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Bank Details -->

                                
                                </div>
                            </div>
                            <div id="content2" class="displayContent">
                        
                                <div class="row">
                                  
                                    <div class="col-xxl-12 d-flex">
                                        <div class="card flex-fill">
                                            <div class="card-header">
                                                <h5>Employee Contact</h5>
                                            </div>
                                            <div class="card-body pb-1">
                                                <div class="row">
                                                    <div class="col-md-4 mb-3">
                                                        <div class="mb-3">
                                                            <p class="mb-1 fw-medium text-dark "><b>Official Email Address</b></p>
                                                            <p>{{ $data->corporate_email ?? '' }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <div class="mb-3">
                                                            <p class="mb-1 fw-medium text-dark "><b>Personal Email</b></p>
                                                            <p>{{ $data->personal_email ?? '' }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <div class="mb-3">
                                                            <p class="mb-1 fw-medium text-dark "><b>Mobile Number</b></p>
                                                            <p>{{ $data->contact_num ?? ''}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3" >
                                                        <div class="mb-3">
                                                            <p class="mb-1 fw-medium text-dark "><b>Official Number</b></p>
                                                            <p>{{ $data->office_num ?? 'N/A'}}</p>
                                                        </div>
                                                    </div>
                                                  
                                                   

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Bank Details -->

                                      <!-- Address -->
                                    <div class="col-xxl-6 d-flex">
                                        <div class="card flex-fill">
                                            <div class="card-header">
                                                <h5>Address </h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-3">
                                                    <span class="avatar avatar-md bg-light-300 rounded me-2 flex-shrink-0 text-default"><i class="ti ti-map-pin-up"></i></span>
                                                    <div>
                                                        <p class="mb-1 fw-medium text-dark ">Residential Address</p>
                                                        <p>{{ $data->personal_address ?? 'N/A' }}</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar avatar-md bg-light-300 rounded me-2 flex-shrink-0 text-default"><i class="ti ti-map-pins"></i></span>
                                                    <div>
                                                        <p class="mb-1 fw-medium text-dark ">Residential Digital Address</p>
                                                         <p>{{ $data->digital_address ?? 'N/A'}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Address -->

                                
                                </div>
                            </div>
                            <div id="content3" class="displayContent">
                        
                                 	<div class="row">
                                    <!-- Address -->
                                    <div class="col-xxl-8 d-flex">
                                        <div class="card flex-fill">
                                            <div class="card-header">
                                                <h5>Documents</h5>
                                            </div>
                                            <div class="card-body">
                                                @foreach($staffDocs as $item)
                                                <div class="d-flex align-items-center mb-3">
                                                    <div>
                                                        <p class="mb-1 fw-medium text-dark "><b>Title: </b>{{$item->title ?? 'N/A'}}</p>
                                                        <p class="mb-1 fw-medium text-dark "><b>Category: </b>{{$item->category->name ?? 'N/A'}}</p>
                                                         <p class="mb-1 fw-medium text-dark "><b>Type: </b>{{$item->type->name ?? 'N/A'}}</p>
                                                    </div>
                                                    <div style="text-align: right; margin-left: auto;">
                                                        <a  href="{{asset($item->file_path ?? '')}}" target="_blank" class="btn btn-dark btn-icon btn-sm"><i class="ti ti-download"></i></a>
                                                    </div>
                                                    
                                                </div>
                                                @endforeach
                                              
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Address -->

                                

                                
                                </div>
                            </div>

                             <div id="content4" class="displayContent">
                        
                                <div class="row">
                                
                                    <!-- Bank Details -->
                                    <div class="col-xxl-12 d-flex">
                                        <div class="card flex-fill">
                                            <div class="card-header">
                                                <h5>Bank Details</h5>
                                            </div>
                                            <div class="card-body pb-1">
                                                <div class="row">
                                                    <div class="col-md-4 mb-3">
                                                        <div class="mb-3">
                                                            <p class="mb-1 fw-medium text-dark "><b>Account Name</b></p>
                                                            <p>{{ $bankDetails->account_name ?? 'N/A' }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <div class="mb-3">
                                                            <p class="mb-1 fw-medium text-dark "><b>Account Number</b></p>
                                                            <p>{{ $bankDetails->account_number ?? 'N/A' }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <div class="mb-3">
                                                            <p class="mb-1 fw-medium text-dark "><b>Bank Name</b></p>
                                                            <p>{{ $bankDetails->bank_name ?? 'N/A' }}</p>
                                                        </div>
                                                    </div>
                                                    
                                                   <div class="col-md-4 mb-3">
                                                        <div class="mb-3">
                                                            <p class="mb-1 fw-medium text-dark "><b>Branch Name</b></p>
                                                            <p>{{$bankDetails->branch_name ?? 'N/A'}}</p>
                                                        </div>
                                                    </div>
                                                  

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Bank Details -->

                                
                                </div>
                            </div>
                           
                         </div>   
					</div>
				</div>
			</div>

@endsection

@section('scripts')
    <script>
        const items = document.querySelectorAll("#sidebar-menu5 li[data-target]");
        const contents = document.querySelectorAll("#tab-content .displayContent");

        items.forEach(item => {
            item.addEventListener("click", () => {
                const targetId = item.getAttribute("data-target");

                contents.forEach(content => content.classList.remove("active"));

                const target = document.getElementById(targetId);
                if (target) {
                    target.classList.add("active");
                } else {
                    console.warn("No element found with ID:", targetId);
                }
            });
        });

    </script>
@endsection