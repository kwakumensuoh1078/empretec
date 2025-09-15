@php $pageName = "dashboard"; $subpageName = ""; @endphp

@extends('layouts.app')


@section('content')
<div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-2">
					<div class="mb-3">
						<h1 class="mb-1">Welcome, {{auth()->user()->name}}</h1>
						<p class="fw-medium">Have a   great day !!!</p>
					</div>
					<div class="input-icon-start position-relative mb-3">
						<span class="input-icon-addon fs-16 text-gray-9">
							<i class="ti ti-calendar"></i>
						</span>
						<input type="text" class="form-control date-range bookingrange" placeholder="Search Product">
					</div>
				</div>

				<div class="alert bg-orange-transparent alert-dismissible fade show mb-4">
					<div>
						<span><i class="ti ti-info-circle fs-14 text-orange me-2"></i>Your Product </span> <span class="text-orange fw-semibold"> Apple Iphone 15 is running Low, </span> already below 5 Pcs., <a href="javascript:void(0);" class="link-orange text-decoration-underline fw-semibold" data-bs-toggle="modal" data-bs-target="#add-stock">Add Stock</a>
					</div>
					<button type="button" class="btn-close text-gray-9 fs-14" data-bs-dismiss="alert" aria-label="Close"><i class="ti ti-x"></i></button>
				</div>

				<div class="row">
					<div class="col-xl-3 col-sm-6 col-12 d-flex">
						<div class="card bg-primary sale-widget flex-fill">
							<div class="card-body d-flex align-items-center">
								<span class="sale-icon bg-white text-primary">
									<i class="ti ti-file-text fs-24"></i>
								</span>
								<div class="ms-2">
									<p class="text-white mb-1">Total</p>
									<div class="d-inline-flex align-items-center flex-wrap gap-2">
										<h4 class="text-white">00</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 col-12 d-flex">
						<div class="card bg-secondary sale-widget flex-fill">
							<div class="card-body d-flex align-items-center">
								<span class="sale-icon bg-white text-secondary">
									<i class="ti ti-repeat fs-24"></i>
								</span>
								<div class="ms-2">
									<p class="text-white mb-1">Total</p>
									<div class="d-inline-flex align-items-center flex-wrap gap-2">
										<h4 class="text-white">00</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 col-12 d-flex">
						<div class="card bg-teal sale-widget flex-fill">
							<div class="card-body d-flex align-items-center">
								<span class="sale-icon bg-white text-teal">
									<i class="ti ti-gift fs-24"></i>
								</span>
								<div class="ms-2">
									<p class="text-white mb-1">Total</p>
									<div class="d-inline-flex align-items-center flex-wrap gap-2">
										<h4 class="text-white">00</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 col-12 d-flex">
						<div class="card bg-info sale-widget flex-fill">
							<div class="card-body d-flex align-items-center">
								<span class="sale-icon bg-white text-info">
									<i class="ti ti-brand-pocket fs-24"></i>
								</span>
								<div class="ms-2">
									<p class="text-white mb-1">Expired Permits</p>
									<div class="d-inline-flex align-items-center flex-wrap gap-2">
										<h4 class="text-white">--</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
@endsection

@section('scripts')
    
@endsection