<?php

namespace App\Http\Controllers\Firm;
use App\Models\FirmUnit;

use App\Models\FirmBranch;
use Illuminate\Http\Request;
use App\Models\FirmDepartment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Routing\Controllers\HasMiddleware;

class FirmSetupController extends Controller implements HasMiddleware
{
     public static function middleware(): array
    {
        return ['auth'];
    }
    public function firmSetupView()
    {
        $firmDepartments = FirmDepartment::orderBy('name','ASC')->get();
        $firmUnits = FirmUnit::orderBy('name','ASC')->get();
        $firmBranches = FirmBranch::orderBy('name','ASC')->get();
        $activeDepartments = FirmDepartment::where('status','Active')->orderBy('name','ASC')->get();
       
        return view('firm.setup',[
            'firmDepartments'=>$firmDepartments,'firmUnits'=>$firmUnits,'firmBranches'=>$firmBranches,'activeDepartments'=>$activeDepartments
        ]);
    }

     public function locationSetupView()
    {
       
        return view('location.setup',[
          
            // 'regs'=>$regs,'datas'=>$datas,'docCats'=>$docCats,'docTypes'=>$docTypes
        ]);
    }

     public function createDepartment(Request $request)
    {
        $validateData = $request;

        $validateData->validate([
            'name' => 'required',
            'status' => 'required'
        ]);

        $data = new FirmDepartment;
        $data->name = $validateData['name'];
        $data->description=$request->description;
        $data->status = $validateData['status'];
        $data->created_by = Auth::user()->id;
        $data->save();
        return back()->with('message','Departnent saved Successfully');
    }

     public function editDepartmentView ($id)
    {
       
        $decodeId = Crypt::decrypt($id);
        $datas = FirmDepartment::findOrFail($decodeId);
        return view('firm.edit-department',['datas'=>$datas,'id'=>$id]);
    }

      public function updateFirmDepartment(Request $request,$id)
    {
        // dd('perry');
        $decodeId = Crypt::decrypt($id);
        $validateData = $request;

        $validateData->validate([
            'name' => 'required',
            'status' => 'required'
        ]);
        
         
        $data =  FirmDepartment::findOrFail($decodeId);
        $data->name = $validateData['name'];
        $data->description=$request->description;
        $data->status = $validateData['status'];
        $data->updated_by = Auth::user()->id;
        $data->update();
        return redirect('firm-setup')->with('message','Department updated Successfully');
    }

      public function deleteDepartment(string $id)
        {
            FirmDepartment::findOrFail($id)->delete();
            return redirect('firm-setup')->with('message','Department  deleted successfully');
        }

        public function createUnit(Request $request){
              $validateData = $request;

        $validateData->validate([
            'name' => 'required',
            'department_id' => 'required',
            'status' => 'required'
        ]);

        $data = new FirmUnit;
        $data->name = $validateData['name'];
        $data->description=$request->description;
        $data->department_id = $validateData['department_id'];
        $data->status = $validateData['status'];
        $data->created_by = Auth::user()->id;
        $data->save();
        return back()->with('message','Unit saved Successfully');

        }

        public function editUnitView($id){
              $decodeId = Crypt::decrypt($id);
            $datas = FirmUnit::findOrFail($decodeId);
             $activeDepartments = FirmDepartment::where('status','Active')->orderBy('name','ASC')->get();
       
            return view('firm.edit-unit',['datas'=>$datas,'id'=>$id,'activeDepartments'=>$activeDepartments]);
        }

        public function updateUnit(Request $request,$id){
            $decodeId = Crypt::decrypt($id);
            $validateData = $request;

            $validateData->validate([
                'name' => 'required',
                'department_id' => 'required',
                'status' => 'required'
            ]);
             
            $data =  FirmUnit::findOrFail($decodeId);
            $data->name = $validateData['name'];
            $data->department_id = $validateData['department_id'];
            $data->description=$request->description;
            $data->status = $validateData['status'];
            $data->updated_by = Auth::user()->id;
            $data->update();
            return redirect('firm-setup')->with('message','Unit updated Successfully');
        }

        public function deleteUnit(string $id)
        {
            FirmUnit::findOrFail($id)->delete();
            return redirect('firm-setup')->with('message','Unit  deleted successfully');
        }

         public function createBranch(Request $request)
        {
            $validateData = $request;

            $validateData->validate([
                'name' => 'required',
                'status' => 'required'
            ]);

            $data = new FirmBranch;
            $data->name = $validateData['name'];
            $data->description=$request->description;
            $data->status = $validateData['status'];
            $data->created_by = Auth::user()->id;
            $data->save();
            return back()->with('message','Branch saved Successfully');
        }

         public function editBranchView($id){
              $decodeId = Crypt::decrypt($id);
            $datas = FirmBranch::findOrFail($decodeId);
            return view('firm.edit-branch',['datas'=>$datas,'id'=>$id]);
        }

        public function updateBranch(Request $request,$id){
            $decodeId = Crypt::decrypt($id);
            $validateData = $request;

            $validateData->validate([
                'name' => 'required',
                'status' => 'required'
            ]);
             
            $data =  FirmBranch::findOrFail($decodeId);
            $data->name = $validateData['name'];
            $data->description=$request->description;
            $data->status = $validateData['status'];
            $data->updated_by = Auth::user()->id;
            $data->update();
            return redirect('firm-setup')->with('message','Branch updated Successfully');
        }

        public function deleteBranch(string $id)
        {
            FirmBranch::findOrFail($id)->delete();
            return redirect('firm-setup')->with('message','Branch  deleted successfully');
        }




    




}
