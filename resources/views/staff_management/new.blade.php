@php $pageName = "staff";
$subpageName = "staff_record"; @endphp

@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-header">Staff Management</h5><small class="text-muted float-end"><a
                    class="btn btn-sm btn-warning" href="{{ route('create-staff') }}"><i class="fa fa-plus"></i> Add Staff
                </a></small>
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

                                <th>Fullname</th>
                                <th>Gender</th>
                                <th>Nationality</th>
                                <th>Employee ID</th>
                                <th>Phone</th>

                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if($data)
                                @foreach($data as $reg)
                                    <tr>

                                        <td> {{ $reg->surname }} {{ $reg->firstname }}</td>
                                        <td>{{ $reg->gender }}</td>
                                        <td>{{ $reg->nationality }}</td>
                                        <td>{{ $reg->employee_id }}</td>
                                        <td>{{ $reg->contact_num }}</td>

                                        <td>

                                            <a href="#" type="button" class="btn btn-sm  btn-success" data-bs-toggle="tooltip"
                                                data-bs-placement="top" data-bs-custom-class="tooltip-success"
                                                title="Attach Documents">
                                                <i class="tf-icons ti ti-edit" style="color: white"></i>
                                            </a>
                                            <a data-bs-toggle="modal" id="showmodal" data-bs-target="#basicModal" data-url=""
                                                type="button" class="btn btn-sm  btn-info" data-bs-toggle="tooltip"
                                                data-bs-placement="top" data-bs-custom-class="tooltip-info"
                                                title="Attach Documents">
                                                <i class="tf-icons ti ti-files" style="color: white"></i>
                                            </a>
                                            <a data-bs-toggle="modal" id="showmodals" data-bs-target="#smallModal"
                                                data-url="{{ route('staff-upload-image',$reg->staff_id)  }}" type="button"
                                                class="btn btn-sm  btn-warning" data-bs-toggle="tooltip" data-bs-placement="top"
                                                data-bs-custom-class="tooltip-warning" title="Add Supervisor">
                                                <i class="tf-icons ti ti-user" style="color: white"></i></a>
                                            <a href="{{route('staff-profile',Crypt::encrypt($reg->staff_id))}}" type="button"
                                                class="btn btn-sm  btn-primary" data-bs-toggle="tooltip" data-bs-placement="top"
                                                data-bs-custom-class="tooltip-primary" title="Staff Details">
                                                <i class="tf-icons ti ti-eye" style="color: white"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                    <form method="post" enctype="multipart/form-data" autocomplete="off" action="">
                        @csrf
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">Upload Staff Documents</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <div class="row g-4">
                                        <div class="col mb-0">
                                            <label for="nameBasic" class="form-label"><b>Name :</b></label>
                                            <span id="firstname"></span> <span id="surname"></span>
                                        </div>
                                        <div class="col mb-0">
                                            <label for="nameBasic" class="form-label"><b>Employee ID :</b></label>
                                            <span id="employeeid"></span>
                                        </div>
                                    </div>
                                    <div class="row g-4" style="margin-top:5px ">
                                        <div class="col mb-0">
                                            <label for="dobBasic" class="form-label"><b>Phone</b></label>
                                            <span id="phone"></span>
                                        </div>
                                        <div class="col mb-0">
                                            <label for="emailBasic" class="form-label"><b>Email</b></label>
                                            <span id="staffemail"></span>
                                        </div>

                                    </div>
                                    <hr />
                                    <div class="row g-4" style="margin-top:5px ">
                                        <div class="col mb-0">
                                            <label for="emailBasic" class="form-label"><b>Select Category</b></label>
                                            <select class="form-select" name="doc_cat">
                                                <option value="">--Select here--</option>
                                                @foreach($docCats as $docCat)
                                                    <option value="{{$docCat->id}}">{{$docCat->name}}</option>
                                                @endforeach
                                            </select>
                                            <small class="text-danger">@error('doc_cat'){{$message}}@enderror </small>
                                        </div>
                                        <div class="col mb-0">
                                            <label for="emailBasic" class="form-label"><b>Select Type</b></label>
                                            <select class="form-select" name="doc_type">
                                                <option value="">--Select here--</option>
                                                @foreach($docTypes as $docType)
                                                    <option value="{{$docType->id}}">{{$docType->name}}</option>
                                                @endforeach
                                            </select>
                                            <small class="text-danger">@error('doc_type'){{$message}}@enderror </small>
                                        </div>

                                    </div>
                                    <div class="col mb-0">
                                        <label for="dobBasic" class="form-label"><b>Title</b></label>
                                        <input type="text" name="title" class="form-control"
                                            placeholder="Enter title of document" />
                                        <small class="text-danger">@error('title'){{$message}}@enderror </small>
                                    </div>
                                    <div class="row g-4" style="margin-top:5px ">
                                        <label for="emailBasic" class="form-label"><b>Document</b></label>
                                        <input type="file" name="file_path" class="form-control" required />

                                    </div>
                                    <input type="hidden" name="staff_id" id="staffID" />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-label-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        </form>


        <div class="modal fade" id="smallModal" tabindex="-1" aria-hidden="true">
            <form method="post" enctype="multipart/form-data" autocomplete="off" action="">
                @csrf
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">Add Supervisor</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="row g-4">
                                <div class="col mb-0">
                                    <label for="nameBasic" class="form-label"><b>Name :</b></label>
                                    <span id="firstnames"></span> <span id="surnames"></span>
                                </div>
                                <div class="col mb-0">
                                    <label for="nameBasic" class="form-label"><b>Employee ID :</b></label>
                                    <span id="employeeids"></span>
                                </div>
                            </div>
                            <hr />
                            <div class="row g-4" style="margin-top:5px ">
                                <div class="col mb-0">
                                    <label for="emailBasic" class="form-label"><b>Email</b></label>
                                    <span id="staffemails"></span>
                                </div>
                                <div class="col mb-0">
                                    <label for="dobBasic" class="form-label"><b>Phone</b></label>
                                    <span id="phones"></span>
                                </div>
                            </div>
                            <hr />
                            <div class="row g-4">

                                <label class="form-label" for="emailSmall">Select Staff</label>
                                <select class="select2 form-select" data-allow-clear="true" name="supervisor_id">
                                    <option value="" selected disabled>--Choose Staff--</option>
                                    @foreach($data as $procats)
                                        <option value="{{$procats->staff_id}}">{{$procats->surname}} {{$procats->firstname}}
                                        </option>
                                    @endforeach
                                </select>
                                <small class="text-danger">@error('supervisor_id'){{$message}}@enderror </small>
                            </div>
                            <input type="hidden" name="staff_id" id="staffIDs" />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
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
        $(document).ready(function () {
            $('body').on('click', '#showmodal', function () {
                var userUrl = $(this).data('url');
                $.get(userUrl, function (data) {
                    $('#basicModal').modal('show');
                    $('#staffID').val(data.staff_id);
                    $('#surname').text(data.surname);
                    $('#firstname').text(data.firstname);
                    $('#employeeid').text(data.employee_id);
                    $('#staffemail').text(data.personal_email);
                    $('#phone').text(data.contact_num);

                })
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('body').on('click', '#showmodals', function () {
                var userUrl = $(this).data('url');
                $.get(userUrl, function (data) {
                    $('#smallModal').modal('show');
                    $('#staffIDs').val(data.staff_id);
                    $('#surnames').text(data.surname);
                    $('#firstnames').text(data.firstname);
                    $('#employeeids').text(data.employee_id);
                    $('#staffemails').text(data.personal_email);
                    $('#phones').text(data.contact_num);

                })
            });
        });
    </script>


    <script>
        $(document).ready(function () {
            $('body').on('click', '#showmodaledit', function () {
                var userUrl = $(this).data('url');
                $.get(userUrl, function (data) {
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
@endsection