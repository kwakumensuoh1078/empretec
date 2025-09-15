<?php

namespace App\Http\Controllers\Holiday;

use Carbon\Carbon;
use App\Models\Holiday;
use App\Models\LeaveType;
use Illuminate\Http\Request;
use App\Models\LeaveCategory;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class HolidaySetupController extends Controller implements HasMiddleware
{
     public static function middleware(): array
    {
        return ['auth'];
    }

    public function getHolidays()
    {
        $currentYear = Carbon::now()->year;
       $today = Carbon::today();
        $holidays = Holiday::whereYear('date', $currentYear)
                ->where('date', '>=', $today)
                ->pluck('date')
                ->map(fn($date) => Carbon::parse($date)->format('Y-m-d'));

        return response()->json($holidays->values());
    }
    
    public function createHoliday(Request $request)
    {
        
        $validateData = $request;
        $data = new Holiday;
        $data->name = $validateData['name'];
        $data->description=$request->description;
        $data->date = $validateData['date'];
        $data->category_id = $validateData['category'];
         $data->type_id = $validateData['type'];
        $data->status = $validateData['type_status'];
        $data->created_by = Auth::user()->id;
        $data->save();
        return back()->with('message','Holiday saved Successfully');
    }
     public function editHoliday ($id)
     {
         $leaveCat = LeaveCategory::orderBy('name','ASC')->get();
         $leaveType = LeaveType::orderBy('name','ASC')->get();
         $decodeId = Crypt::decrypt($id);
         $data = Holiday::find($decodeId);
         return view( 'holiday.edit-holiday',['leaveType'=>$leaveType,'leaveCat'=>$leaveCat,'data' => $data, 'id'=>$id]);
     }

    

     public function updateHoliday(Request $request,$id)
    {
        $decodeId = Crypt::decrypt($id);
        $validateData = $request;
 
        $data =  Holiday::find($decodeId);
        $data->name = $validateData['name'];
        $data->description=$request->description;
        $data->date = $validateData['date'];
        $data->category_id = $validateData['category'];
          $data->type_id = $validateData['type'];
        $data->status = $validateData['status'];
        $data->updated_by = Auth::user()->id;
        $data->update();
        return redirect('create-leave-setup')->with('message','Holiday updated Successfully');
    }

    public function deleteHoliday(string $id)
    {
        Holiday::findOrFail($id)->delete();
        return redirect('create-leave-setup')->with('message','Holiday  deleted successfully');
    
    }
}
