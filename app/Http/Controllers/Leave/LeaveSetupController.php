<?php

namespace App\Http\Controllers\Leave;

use Carbon\Carbon;
use App\Models\Holiday;
use App\Models\LeaveType;
use App\Models\StaffLeave;
use Illuminate\Http\Request;
use App\Models\LeaveCategory;
use App\Models\LeaveTypeSetup;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class LeaveSetupController extends Controller implements HasMiddleware
{
     public static function middleware(): array
    {
        return ['auth'];
    }
    public function leaveSetupView()
    {
        $leaveCategory = LeaveCategory::orderBy('name','ASC')->get();
        $leaveType = LeaveType::orderBy('name','ASC')->get();
         $holidays = Holiday::orderBy('date','ASC')->get();
        // $regs = StaffClassification::all();
        // $docCats = DocumentCategory::orderBy('name','ASC')->get();
        // $docTypes = DocumentType::orderBy('name','ASC')->get();
        return view('leave.setup',[
             'leaveCategory'=>$leaveCategory,
             'leaveType' => $leaveType,
             'holidays' => $holidays,
            // 'regs'=>$regs,'datas'=>$datas,'docCats'=>$docCats,'docTypes'=>$docTypes
        ]);
    }

    public function createCategory(Request $request)
    {
        $validateData = $request;

        $validateData->validate([
            'name' => 'required',
            'status' => 'required'
        ]);

        $data = new LeaveCategory;
        $data->name = $validateData['name'];
        $data->description=$request->description;
        $data->status = $validateData['status'];
        $data->created_by = Auth::user()->id;
        $data->save();
        return back()->with('message','Leave Category saved Successfully');
    }

    public function editCategoryView ($id)
    {
        $data = LeaveCategory::all();
        $decodeId = Crypt::decrypt($id);
        $datas = LeaveCategory::findOrFail($decodeId);
        return view('leave.edit-leave-category',['data'=>$data,'datas'=>$datas,'id'=>$id]);
    }

      public function updateLeaveCategory(Request $request,$id)
    {
        $decodeId = Crypt::decrypt($id);
        $validateData = $request;

        $validateData->validate([
            'name' => 'required',
            'status' => 'required'
        ]);
         
        $data =  LeaveCategory::findOrFail($decodeId);
        $data->name = $validateData['name'];
        $data->description=$request->description;
        $data->status = $validateData['status'];
        $data->status = $validateData['status'];
        $data->update();
        return redirect('create-leave-setup')->with('message','Leave Category updated Successfully');
    }


    public function deleteLeaveCategory(string $id)
    {
        LeaveCategory::findOrFail($id)->delete();
        return redirect('create-leave-setup')->with('message','Leave Category  deleted successfully');
    }

      public function editLeaveTypeView ($id)
     {
         $leaveCat = LeaveCategory::all();
         $decodeId = Crypt::decrypt($id);
         $data = LeaveType::find($decodeId);
         return view( 'leave.edit-leave-type',['data'=>$data,'leaveCat'=>$leaveCat, 'id'=>$id]);
     }

      public function createLeaveType(Request $request)
    {
        
        $validateData = $request;
        $data = new LeaveType;
        $data->name = $validateData['type'];
        $data->description=$request->type_description;
        $data->total_days = $validateData['total_days'];
        $data->category_id = $validateData['category'];
        $data->status = $validateData['type_status'];
        $data->created_by = Auth::user()->id;
        $data->save();
        return back()->with('message','Leave Type saved Successfully');
    }

     public function updateLeaveType(Request $request,$id)
    {
        $decodeId = Crypt::decrypt($id);
        $validateData = $request;
 
        $data =  LeaveType::find($decodeId);
        $data->name = $validateData['type'];
        $data->description=$request->description;
        $data->category_id = $validateData['category'];
        $data->total_days = $validateData['total_days'];
        $data->status = $validateData['type_status'];
        $data->updated_by = Auth::user()->id;
        $data->update();
        return redirect('create-leave-setup')->with('message','Leave Type updated Successfully');
    }

    public function deleteLeaveType(string $id)
    {
        LeaveType::findOrFail($id)->delete();
        return redirect('create-leave-setup')->with('message','Leave Type  deleted successfully');
    
    }

    
    //   public function editLeaveTypeSetupView ($id)
    //  {
    //      $decodeId = Crypt::decrypt($id);
    //      $data = LeaveTypeSetup::find($decodeId);
    //      return view( 'leave.edit-leave-type-setup',['data'=>$data, 'id'=>$id]);
    //  }

    //   public function createLeaveTypeSetup(Request $request)
    // {
        
    //     $validateData = $request;
    //     $data = new LeaveTypeSetup;
    //     $data->name = $validateData['name'];
    //     $data->total_days = $validateData['total_days'];
    //     $data->description=$request->description;
    //     $data->status = $validateData['status'];
    //     $data->created_by = Auth::user()->id;
    //     $data->save();
    //     return back()->with('message','Leave Type Setup saved Successfully');
    // }

    //  public function updateLeaveTypeSetup(Request $request,$id)
    // {
    //     $decodeId = Crypt::decrypt($id);
    //     $validateData = $request;
 
    //     $data =  LeaveTypeSetup::find($decodeId);
    //     $data->name = $validateData['name'];
    //     $data->total_days = $validateData['total_days'];
    //     $data->description=$request->description;
    //     $data->status = $validateData['status'];
    //     $data->updated_by = Auth::user()->id;
    //     $data->update();
    //     return redirect('create-leave-setup')->with('message','Leave Type Setup updated Successfully');
    // }

    // public function deleteLeaveTypeSetup(string $id)
    // {
    //     LeaveTypeSetup::findOrFail($id)->delete();
    //     return redirect('create-leave-setup')->with('message','Leave Type Setup deleted successfully');
    
    // }

      
    public function findLeaveTypeData(Request $request){
        $data = LeaveType::select('name','id')->where('category_id',$request->id)->get();
        return response()->json($data);
    }

      public function findLeaveDays(Request $request){
        $currentYear = Carbon::now()->year;
        $data = LeaveType::select('total_days')->where('id',$request->type_id)->first();
        $daysUsed = StaffLeave::where('staff_id',$request->staff_id)->where('leave_type',$request->type_id)->whereYear('start_date', $currentYear)->sum('approved_days');
        if(!$daysUsed){
            $daysUsed = 0;
        }
         return response()->json([
        'data' => $data ? $data->total_days : 0,
        'days_used' => $daysUsed
    ]);
    }




}
