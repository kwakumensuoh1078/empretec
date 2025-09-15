<?php

namespace App\Livewire;

use App\Models\Branch;
use App\Models\BusClass;
use App\Models\Nationality;
use App\Models\Region;
use App\Models\Staff;
use App\Models\StaffCategory;
use App\Models\StaffClassification;
use Livewire\Component;

class MultiStepForm extends Component
{
     public $surname;
    public $firstname;
    public $othername;
    public $title;
    public $gender;
    public $residence;
    public $staff_category;
    public $staff_class;
    public $dob;
    public $nationality;
    public $hometown;
    public $region;
    public $district;
    public $town;
    public $corporate_email;
    public $personal_email;
    public $employee_id;
    public $branch;
    public $department;
    public $unit;
    public $office_num;
    public $digital_address;
    public $e_region;
    public $contact_num;
    public $marital_status_id;
    public $status;

    public $totalSteps = 3;
    public $currentStep = 1;

    public function mount()
    {
        $this->currentStep = 1;

    }

      public function render()
    {
        $data = Nationality::all();
        $regs = Region::all();
        $clas = StaffClassification::all();
        $cat = StaffCategory::all();
        $bra = Branch::all();
        $dep = BusClass::all();
        return view('livewire.multi-step-form',['data'=>$data,'regs'=>$regs,'clas'=>$clas,'cat'=>$cat,'bra'=>$bra,'dep'=>$dep]);
    }

    public function decreaseStep(){
        $this->resetErrorBag();
         
        $this->currentStep--;
        if($this->currentStep < 1){
            $this->currentStep = 1;
        }

    }

    public function increaseStep(){
        $this->resetErrorBag();
        $this->validateData();
        $this->currentStep++;
        if($this->currentStep > $this->totalSteps){
            $this->currentStep = $this->totalSteps;
        }

    }


        public function validateData(){

        if($this->currentStep == 1)
        {
            $this->validate([
           'firstname'=>'required|string',
           'title'=>'required',
           'surname'=>'required|string',
           'region'=>'required',
           'gender'=>'required',
           'dob'=>'required',
           'nationality'=>'required',
           'marital_status_id'=>'required',
           'hometown'=>'required',
           'district'=>'required',
           'status'=>'required'
            ]);

        }
        elseif($this->currentStep == 2){
            $this->validate([
                'employee_id'=>'required',
                'staff_class'=>'required',
                'staff_category'=>'required',
                'branch'=>'required',
                'department'=>'required',
                'unit'=>'required'
                 

            ]);
            
        }
    }
    public function registerStaff(){
        $this->resetErrorBag();
        if($this->currentStep == 3){
            $this->validate([
                'corporate_email'=>'required|email|unique:staff',
                'personal_email'=>'required|email|unique:staff',
                'contact_num'=>'required',
                'office_num'=>'required',
                'residence'=>'required',
                'digital_address'=>'required',
              
                'e_region'=>'required'

            ]);
        }
        $values = array(
            "title"=>$this->title,
            "surname"=>$this->surname,
            "firstname"=>$this->firstname,
            "othername"=>$this->othername,
            "gender"=>$this->gender,
            "dob"=>$this->dob,
            "nationality"=>$this->nationality,
            "employee_id"=>$this->employee_id,
            "branch"=>$this->branch,
            "marital_status_id"=>$this->marital_status_id,
            "staff_cat_id"=>$this->staff_category,
            "region_id"=>$this->region,
            "mmda_id"=>$this->district,
            "staff_class"=>$this->staff_class,
            "unit"=>$this->unit,
            "region_id"=>$this->region,
            "department"=>$this->department,
            "corporate_email"=>$this->corporate_email,
            "personal_email"=>$this->personal_email,
            "contact_num"=>$this->contact_num,
            "office_num"=>$this->office_num,
            "personal_address"=>$this->residence,
            "hometown"=>$this->hometown,
            "town"=>$this->town,
            "digital_address"=>$this->digital_address,
            "e_region"=>$this->e_region,
            "status"=>$this->status,

        );
        Staff::insert($values);
        $this->reset();
        $this->currentStep = 1;
        return back()->with('message','Staff added Successfully');

    }


}
