<?php

namespace App\Http\Controllers\Firm;

use App\Models\Region;
use App\Models\Country;
use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Routing\Controllers\HasMiddleware;

class LocationSetupController extends Controller implements HasMiddleware
{
       public static function middleware(): array
    {
        return ['auth'];
    }

    public function index(){
        $regions = Region::orderBy('name','ASC')->get();
        $countries = Country::orderBy('countries_name','ASC')->get();
        $districts = District::orderBy('name','ASC')->get();
        return view('location.setup',compact('regions','countries','districts'));
    }

    public function createRegion(Request $request){
         $validateData = $request;

        $validateData->validate([
            'name' => 'required',
            'status' => 'required',
            'country_id' => 'required'
        ]);

        $data = new Region;
        $data->name = $validateData['name'];
        $data->description=$request->description;
        $data->status = $validateData['status'];
        $data->country_id = $validateData['country_id'];
        $data->save();
        return back()->with('message','Region saved Successfully');

    }

    public function editRegionView($id){
        $decodeId = Crypt::decrypt($id);
        $data = Region::findOrFail($decodeId);
        $countries = Country::orderBy('countries_name','ASC')->get();
        return view('location.region-edit',[
            'data' => $data,
            'id' => $id,
            'countries' => $countries
        ]);
    }

    public function updateRegion(Request $request,$id){
        $decodeId = Crypt::decrypt($id);
        $validateData = $request;

        $validateData->validate([
            'name' => 'required',
            'status' => 'required',
            'country_id' => 'required'
        ]);
         
        $data =  Region::findOrFail($decodeId);
        $data->name = $validateData['name'];
        $data->description=$request->description;
        $data->status = $validateData['status'];
        $data->country_id = $validateData['country_id'];
        $data->update();
        return redirect('location-setup')->with('message','Region updated Successfully');
    }

    public function deleteRegion(string $id)
    {
        Region::findOrFail($id)->delete();
        return redirect('location-setup')->with('message','Region  deleted successfully');
    }

    public function createDistrict(Request $request){
        $validateData = $request;

        $validateData->validate([
            'name' => 'required',
            'status' => 'required',
            'region_id' => 'required'
        ]);

        $data = new District;
        $data->name = $validateData['name'];
        $data->status = $validateData['status'];
        $data->region_id = $validateData['region_id'];
        $data->save();
        return back()->with('message','District saved Successfully');

    }

    public function editDistrictView($id){
        $decodeId = Crypt::decrypt($id);
        $data = District::findOrFail($decodeId);
        $regions = Region::orderBy('name','ASC')->get();
        return view('location.district-edit',[
            'data' => $data,
            'id' => $id,
            'regions' => $regions
        ]);
    }

    public function updateDistrict(Request $request,$id){
        $decodeId = Crypt::decrypt($id);
        $validateData = $request;

        $validateData->validate([
            'name' => 'required',
            'status' => 'required',
            'region_id' => 'required'
        ]);
         
        $data =  District::findOrFail($decodeId);
        $data->name = $validateData['name'];
        $data->status = $validateData['status'];
        $data->region_id = $validateData['region_id'];
        $data->update();
        return redirect('location-setup')->with('message','District updated Successfully');
    }

    public function deleteDistrict(string $id)
    {
        District::findOrFail($id)->delete();
        return redirect('location-setup')->with('message','District  deleted successfully');
    }

}
