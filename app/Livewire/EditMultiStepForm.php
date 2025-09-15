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

class EditMultiStepForm extends Component
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
    public $staff_id;

    public $totalSteps = 3;
    public $currentStep = 1;
    
 

    public function mount($staff_id)
    {
 
        $this->currentStep = 1;

        $staff = Staff::find($staff_id);
        if($staff){
           $this->staff_id = $staff->staff_id;
           $this->surname = $staff->surname;
           $this->firstname = $staff->firstname;
        }
        else{
            return redirect()->to('/list-staff');
        }
    }

     public function render()
    {
        //$decodeId = Crypt::decrypt($staff_id);
        //$datas = Staff::find($decodeId);
        $data = Nationality::all();
        $regs = Region::all();
        $clas = StaffClassification::all();
        $cat = StaffCategory::all();
        $bra = Branch::all();
        $dep = BusClass::all();
       
        return view('livewire.edit-multi-step-form',['data'=>$data,'regs'=>$regs,'clas'=>$clas,'cat'=>$cat,'bra'=>$bra,'dep'=>$dep]);
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
            "reg_id"=>$this->region,
            "mmda_id"=>$this->district,
            "staff_class"=>$this->staff_class,
            "unit"=>$this->unit,
            "reg_id"=>$this->region,
            "department"=>$this->department,
            "corporate_email"=>$this->corporate_email,
            "personal_email"=>$this->personal_email,
            "contact_num"=>$this->contact_num,
            "office_num"=>$this->office_num,
            "personal_address"=>$this->residence,
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
