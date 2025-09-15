<?php

namespace App\Http\Controllers\Leave;

use Log;
use App\Models\Staff;
use App\Models\LeaveType;
use App\Models\StaffLeave;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Routing\Controllers\HasMiddleware;

class LeaveApplicationController extends Controller implements HasMiddleware
{
     public static function middleware(): array
    {
        return ['auth'];
    }
     public function index(){
        $userDepartment = Auth::user()?->department;
        $leaveTypes = LeaveType::orderBy('name','ASC')->get();
        $careTaker = Staff::where('status' ,'Active')->where('department',$userDepartment)->get();

        return view('leave.application',['leaveTypes' => $leaveTypes,'careTaker'=>$careTaker]); 
    }

      public function searchLeaveApplicant (Request $request){
        $field = $request->field;
        $operation = $request->operator;
        $parameter = $request->search_parameter;

        $table = "";

        // Base query with join
        $query = Staff::query();

        // Apply search condition
        if ($operation == "equal") {
            $result = $query->where($field, $parameter)->get();
        } else {
            $result = $query->where($field, 'LIKE', '%' . $parameter . '%')->get();
        }

        if($result->count() > 0){
  
            $table .= '<table id="example"  class="dt-select-table table">';
    
            $table .= '<thead> <tr>   <th><b>#</b></th> <th><b>Employee ID</b></th>  <th><b>Full Name</b></th><th><b>Telephone</b></th><th><b>Department</b></th> <th><b>Action</b></th> </tr></thead>';
    
            $table .= '<tbody>';

            $i = 1;
            foreach ($result as $item) {
                $table .= '<tr>';
                $table .= '<td>'.$i++.'</td>';
                $table .= '<td>'.($item->employee_id ?? 'N/A').'</td>';
                   $table .= '<td>'.($item->firstname ?? 'N/A'). ' '. $item->surname.'</td>';
                $table .= '<td>'.($item->contact_num ?? 'N/A').' </td>';
                $table .= '<td>'.($item->departmentName->name ?? 'N/A').'</td>';
                $table .= '<td><a id="commenceApplicationBtn" data-id="'.($item->staff_id ?? 'N/A').'" data-bs-toggle="modal" data-bs-target="#basicModal" style="color:white;" class="btn btn-success btn-sm"><i class="fa fa-check"></i> <small>Apply</small></a></td>';
                $table .= '</tr>';
             }
        
   
            $table .= '</tbody>';
    
            $table .='</table>';
    
            return $table;
    
    
           }else{
    
            return "no data";
    
           }
    }

     public function commenceApplication (Request $request){


        $data = Staff::find($request->formsID);

        return response()->json($data);
    }


      public function commenceApplicationProcess(Request $request){
   
       $validateData = $request;

        $validateData->validate([
            'staff_id_hidden' => 'required',
            'leave_type' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'caretaker_id' => 'required',
            'remarks' => 'required',
            'contact_person' => 'required',
            'relationship' => 'required',
            'contact_telephone' =>'required'
        ]);

        $data = new StaffLeave();
        $data->staff_id = $validateData['staff_id_hidden'];
        $data->leave_type = $validateData['leave_type'];
        $data->start_date = $validateData['start_date'];
        $data->end_date = $validateData['end_date'];
         $data->duration = $request->days_requested_hidden;
         $data->days_used = $request->days_used_hidden;
         $data->leave_entitlement = $request->remaining_days_hidden;
        $data->caretaker_id = $validateData['caretaker_id'];
        $data->remarks = $validateData['remarks'];
        $data->emergency_number = $validateData['contact_telephone'];
        $data->emergency_contact_name = $validateData['contact_person'];
        $data->relationship = $validateData['relationship'];
        $data->created_by = Auth::user()->id;
        $data->s_status = "Pending";
        $data->save();
        return redirect('leave-application')->with('message_success','Leave Application  saved successfully');
    }

      public function leaveApprovalView()
    {
        $data = StaffLeave::whereNot('s_status','Active')->orderBy('created_at','DESC')->get();
        // $docCats = DocumentCategory::where('status','Active')->get();
        // $docTypes = DocumentType::where('status','Active')->get();

        return view('leave.approval',['data'=>$data,
        // 'docCats'=>$docCats,'docTypes'=>$docTypes
    ]);
    }

    public function leaveApprovalProcess(Request $request){

        $status = $request->action === 'approve' ? 'approved' : 'rejected';

        $data = StaffLeave::find($request->staff_id);
        if ($status === 'approved') {
            $data->approved_days = $request->approved_days;
             $data->s_status = "On Leave";
        } else {
            $data->reject_reason = $request->reject_reason;
             $data->s_status = "Leave Rejected";
        }
        $data->updated_by = Auth::user()->id;
        $data->update();
        
         return redirect('leave-approval')->with('message','Leave approved successfully');
    }


    public function leaveResumptionProcess(Request $request){

        $data = StaffLeave::find($request->resumption_staff_id);
        $data->s_status = "Active";
        $data->resumption_date = $request->resumption_date;
        $data->updated_by = Auth::user()->id;
        $data->update();
        
         return redirect('leave-approval')->with('message','Leave resumed successfully');
    }

     public function fetchLeaveDetails($staff_id)
    {
        $data = StaffLeave::with(['staff','leaveType','caretaker'])->find($staff_id);
        return response()->json($data);
    }

}
