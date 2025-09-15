<div>
    <form wire:submit.prevent="registerStaff">

        <!--Step One-->
        @if ($currentStep == 1)
            
        @if(Session::has('message'))
             <div class="alert alert-solid-success d-flex align-items-center" role="alert">
                <span class="alert-icon rounded">
                  <i class="ti ti-check"></i>
                </span>
                {{session('message')}}
              </div>
              @endif
        <div class="step-one">
            <div class="bs-stepper wizard-numbered mt-2">
                <div class="bs-stepper-header">
                    <div class="step" data-target="#account-details">
                        <button type="button" class="step-trigger">
                        <span class="bs-stepper-circle" style="background: #7367f0;color:white">1</span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Personal Profile </span>
                        </span>
                        </button>
                    </div>
                    <div class="line">
                        <i class="ti ti-chevron-right"></i>
                    </div>
                    <div class="step" data-target="#personal-info">
                        <button type="button" class="step-trigger">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Employee Details</span>
                            {{-- <span class="bs-stepper-subtitle">Add personal info</span> --}}
                        </span>
            
                        </button>
                    </div>
                    <div class="line">
                        <i class="ti ti-chevron-right"></i>
                    </div>
                    <div class="step" data-target="#social-links">
                        <button type="button" class="step-trigger">
                        <span class="bs-stepper-circle">3</span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Employee Contact</span>
                            {{-- <span class="bs-stepper-subtitle">Add social links</span> --}}
                        </span>
                        </button>
                    </div>
                </div>
            
                <div class="row g-6 mb-3" style="margin-left: 10px;margin-right:10px;margin-top:10px">
                    <div class="content-header mb-4">
                        <h6 class="mb-0">Personal Details</h6>
                        <small>Enter Your Personal Details.</small>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label" for="username">Title</label>
                        <select class="form-select"  wire:model="title">
                            <option value="" selected >--Choose Title--</option>
                            <option value="Mr">Mr</option>
                            <option value="Mrs">Mrs</option>
                            <option value="Miss">Miss</option>
                            <option value="Dr">Dr</option>
                            <option value="Prof">Prof</option>
                        </select>   
                        <small class="text-danger">@error('title'){{$message}}@enderror </small>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label" for="surname">Surname</label>
                        <input type="text"  class="form-control" placeholder="Enter Surnaname"/ wire:model="surname"> 
                        <small class="text-danger">@error('surname'){{$message}}@enderror </small> 
                    </div>
                    <div class="col-sm-4 form-password-toggle">
                        <label class="form-label" for="firstname">Firstname</label>
                            <input type="firstname"   class="form-control" placeholder="Enter Firstname"" / wire:model="firstname">
                            <small class="text-danger">@error('firstname'){{$message}}@enderror </small> 
                    </div>
                </div>
                <div class="row g-6 mb-3" style="margin-left: 10px;margin-right:10px;margin-top:2px">
                    <div class="col-sm-4">
                        <label class="form-label" for="confirm-password">Othername</label>
                        <input type="text"   class="form-control" placeholder="Enter Other Name" / wire:model="othername">
                            
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label" for="confirm-password">Gender</label>
                        <select class="form-select"  wire:model="gender">
                            <option value="" selected >--Choose Gender--</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>     
                        <small class="text-danger">@error('gender'){{$message}}@enderror </small>  
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label" for="confirm-password">Date of Birth</label>
                        <input type="date"   class="form-control dob-picker" placeholder="YYYY-MM-DD" / wire:model="dob">
                        <small class="text-danger">@error('dob'){{$message}}@enderror </small>   
                    </div>
                </div>
                <div class="row g-6 mb-3" style="margin-left: 10px;margin-right:10px;margin-top:2px">
                    <div class="col-sm-4">
                        <label class="form-label" for="confirm-password">Nationality</label>
                        <select   class="select2 form-select" data-allow-clear="true" wire:model="nationality">
                            <option value="" selected >--Choose Nationality--</option>
                            @foreach($data as $procats)
                            <option value="{{$procats->nationality}}">{{$procats->nationality}}</option>
                            @endforeach
                        </select> 
                        <small class="text-danger">@error('nationality'){{$message}}@enderror </small> 
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label" for="confirm-password">Marital Status</label>
                        <select class="form-select"  wire:model="marital_status_id">
                            <option value="" selected >--Choose Option--</option>
                            <option value="Married">Married</option>
                            <option value="Single">Single</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Widow">widow</option>
                            <option value="Widower">Widower</option>
                        </select> 
                        <small class="text-danger">@error('marital_status_id'){{$message}}@enderror </small> 
                    </div>
                </div>
                <div class="row g-6 mb-3" style="margin-left: 10px;margin-right:10px;margin-top:2px;">
                    <div class="col-sm-4">
                        <label class="form-label" for="confirm-password">Home Twon</label>
                        <input type="text"   class="form-control" placeholder="Enter Hometown" wire:model="hometown">
                        <small class="text-danger">@error('hometown'){{$message}}@enderror </small> 
                    </div>
            
                    <div class="col-sm-4">
                        <label class="form-label" for="confirm-password">Region</label>
                        <select   class="select2 form-select changeregion" data-allow-clear="true" wire:model="region">
                            <option value="" selected>--Choose Region--</option>
                            @foreach($regs as $reg)
                            <option value="{{$reg->id}}">{{$reg->name}}</option>
                            @endforeach
                        </select> 
                        <small class="text-danger">@error('region'){{$message}}@enderror </small> 
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label" for="confirm-password">District</label>
                        <select id="multicol-country"   class="select2 form-select districtname" data-allow-clear="true" wire:model="district">
                            <option value="" selected disabled>--Choose District--</option>
                            
                        </select> 
                        <small class="text-danger">@error('district'){{$message}}@enderror </small> 
                    </div>
                </div>
                <div class="row g-6 mb-3" style="margin-left: 10px;margin-right:10px;margin-top:2px;">
                    <div class="col-md-3">
                        <label class="form-label" for="confirm-password">Status</label>
                        <select class="form-select" wire:model="status">
                            <option value="" selected >--Choose Status--</option>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                            <option value="Suspended">Suspended</option>
                        </select>
                        <small class="text-danger">@error('status'){{$message}}@enderror </small> 
                    </div>
                </div>
                
                <br/>
            </div>
        </div>
        @endif
        {{-- Step 2 --}}
        @if ($currentStep == 2)
            
       
        <div class="step-two">
            
            <div class="bs-stepper wizard-numbered mt-2">
                <div class="bs-stepper-header">
                    <div class="step" data-target="#account-details">
                        <button type="button" class="step-trigger">
                        <span class="bs-stepper-circle" >1</span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Personal Profile </span>
                        </span>
                        </button>
                    </div>
                    <div class="line">
                        <i class="ti ti-chevron-right"></i>
                    </div>
                    <div class="step" data-target="#personal-info">
                        <button type="button" class="step-trigger">
                        <span class="bs-stepper-circle" style="background: #7367f0;color:white">2</span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Employee Details</span>
                            {{-- <span class="bs-stepper-subtitle">Add personal info</span> --}}
                        </span>
            
                        </button>
                    </div>
                    <div class="line">
                        <i class="ti ti-chevron-right"></i>
                    </div>
                    <div class="step" data-target="#social-links">
                        <button type="button" class="step-trigger">
                        <span class="bs-stepper-circle">3</span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Employee Contact</span>
                            {{-- <span class="bs-stepper-subtitle">Add social links</span> --}}
                        </span>
                        </button>
                    </div>
                </div>
                <div class="row g-6 mb-3" style="margin-left: 10px;margin-right:10px;margin-top:10px">
                    <div class="content-header mb-4">
                        <h6 class="mb-0">Employee Details</h6>
                        <small>Enter Your Employee Details.</small>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="confirm-password">Employee ID</label>
                        <input type="text" class="form-control" placeholder="Enter Employee ID" wire:model="employee_id">
                        <small class="text-danger">@error('employee_id'){{$message}}@enderror </small> 
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label" for="confirm-password">Staff Classification</label>
                        <select    class="select2 form-select " data-allow-clear="true" wire:model="staff_class">
                            <option value="" selected>--Choose Classification--</option>
                            @foreach($clas as $class)
                            <option value="{{$class->name}}">{{$class->name}}</option>
                            @endforeach
                        </select> 
                        <small class="text-danger">@error('staff_class'){{$message}}@enderror </small> 
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label" for="confirm-password">Staff Category</label>
                        <select   class="select2 form-select " data-allow-clear="true" wire:model="staff_category">
                            <option value="" selected>--Choose Category--</option>
                            @foreach($cat as $cats)
                            <option value="{{$cats->cat_id}}">{{$cats->name}}</option>
                            @endforeach
                        </select> 
                        <small class="text-danger">@error('staff_category'){{$message}}@enderror </small> 
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label" for="confirm-password">Branch</label>
                        <select id="multicol-country"   class="select2 form-select " data-allow-clear="true" wire:model="branch">
                            <option value="" selected>--Choose Branch--</option>
                            @foreach($bra as $bras)
                            <option value="{{$bras->id}}">{{$bras->branch_name}}</option>
                            @endforeach
                        </select> 
                        <small class="text-danger">@error('branch'){{$message}}@enderror </small> 
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label" for="confirm-password">Department</label>
                        <select  class="select2 form-select" data-allow-clear="true" wire:model="department">
                            <option value="" selected>--Choose Department--</option>
                            @foreach($dep as $deps)
                            <option value="{{$deps->id}}">{{$deps->name}}</option>
                            @endforeach
                        </select> 
                        <small class="text-danger">@error('department'){{$message}}@enderror </small> 
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="confirm-password">Staff Unit</label>
                        <input type="text"   class="form-control" placeholder="Enter Unit" wire:model="unit">
                        <small class="text-danger">@error('unit'){{$message}}@enderror </small> 
                    </div>
                </div><br/>
            </div>
        
        </div>
        @endif
        {{-- Step 3 --}}
        @if ($currentStep == 3)
            
        
        <div class="step-three">
            
            <div class="bs-stepper wizard-numbered mt-2">
                <div class="bs-stepper-header">
                    <div class="step" data-target="#account-details">
                        <button type="button" class="step-trigger">
                        <span class="bs-stepper-circle" >1</span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Personal Profile </span>
                        </span>
                        </button>
                    </div>
                    <div class="line">
                        <i class="ti ti-chevron-right"></i>
                    </div>
                    <div class="step" data-target="#personal-info">
                        <button type="button" class="step-trigger">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Employee Details</span>
                            {{-- <span class="bs-stepper-subtitle">Add personal info</span> --}}
                        </span>
            
                        </button>
                    </div>
                    <div class="line">
                        <i class="ti ti-chevron-right"></i>
                    </div>
                    <div class="step" data-target="#social-links">
                        <button type="button" class="step-trigger">
                        <span class="bs-stepper-circle"  style="background: #7367f0;color:white">3</span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Employee Contact</span>
                            {{-- <span class="bs-stepper-subtitle">Add social links</span> --}}
                        </span>
                        </button>
                    </div>
                </div>
                <div class="row g-6 mb-3" style="margin-left: 10px;margin-right:10px;margin-top:10px">
                    <div class="content-header mb-4">
                        <h6 class="mb-0">Employee Contact Details</h6>
                        <small>Enter Your Contact Details.</small>
                    </div>
                   <div class="col-md-4  mb-3">
                        <label class="form-label" for="confirm-password">Official Email Address</label>
                        <input type="text"   class="form-control" placeholder="Enter Official Email Address" wire:model="corporate_email">
                        <small class="text-danger">@error('corporate_email'){{$message}}@enderror </small> 
                   </div>
                   <div class="col-md-4  mb-3">
                        <label class="form-label" for="confirm-password">Personal Email Address</label>
                        <input type="text"  class="form-control" placeholder="Enter Personal Email Address" wire:model="personal_email">
                        <small class="text-danger">@error('personal_email'){{$message}}@enderror </small> 
                   </div>
            
                    <div class="col-md-4  mb-3">
                        <label class="form-label" for="confirm-password"> Mobile Number </label>
                        <input type="text"  class="form-control" placeholder="Enter Mobile Number" wire:model="contact_num">
                        <small class="text-danger">@error('contact_num'){{$message}}@enderror </small> 
                    </div>
                </div>
                <div class="row g-6 mb-3" style="margin-left: 10px;margin-right:10px;margin-top:10px">
                    <div class="col-md-4">
                        <label class="form-label" for="confirm-password">Official Number </label>
                        <input type="text"  class="form-control" placeholder="Enter Official Number " wire:model="office_num">
                        <small class="text-danger">@error('office_num'){{$message}}@enderror </small> 
                   </div>
                   <div class="col-md-4  mb-3">
                        <label class="form-label" for="confirm-password">Residential Address</label>
                        <input type="text"   class="form-control" placeholder="Enter Residential  Address" wire:model="residence">
                        <small class="text-danger">@error('residence'){{$message}}@enderror </small> 
                   </div>
            
                    <div class="col-md-4  mb-3">
                        <label class="form-label" for="confirm-password"> Residential Digital Address  </label>
                        <input type="text"   class="form-control" placeholder="Enter Residential Digital Address " wire:model="digital_address">
                        <small class="text-danger">@error('digital_address'){{$message}}@enderror </small> 
                    </div>
                </div>
                <div class="row g-6 mb-3" style="margin-left: 10px;margin-right:10px;margin-top:10px">
                    <div class="col-md-4">
                        <label class="form-label" for="confirm-password">Town </label>
                        <input type="text"  class="form-control" placeholder="Enter Town/Suburb " wire:model="town">
                   </div>
                   <div class="col-sm-4 m">
                    <label class="form-label" for="confirm-password">Region</label>
                    <select   class="select2 form-select" data-allow-clear="true" wire:model="e_region">
                        <option value="" selected disabled>--Choose Region--</option>
                        @foreach($regs as $reg)
                        <option value="{{$reg->id}}">{{$reg->name}}</option>
                        @endforeach
                    </select> 
                    <small class="text-danger">@error('e_region'){{$message}}@enderror </small> 
                </div>
                </div><br/>
            </div>
        </div><br/>
        @endif
        <br/>
        <div class="action-buttons d-flex justify-content-between bg-white pt-2 pb-2" >
            @if ($currentStep == 1)
                <div></div>
            @endif
            @if ($currentStep == 2 || $currentStep == 3)
            <button type="button" class="btn btn-dark" wire:click="decreaseStep()">Previous</button>
            @endif
            @if ($currentStep == 1 || $currentStep == 2)
            <button type="button" class="btn btn-primary" wire:click="increaseStep()">Next</button>
            @endif
            @if ($currentStep == 3 )
            <button type="submit" class="btn btn-success">Submit</button>
            @endif
            
        </div>
    </form>
    
</div>
