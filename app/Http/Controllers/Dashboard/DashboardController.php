<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Applicationform;
use App\Models\CertificateApp;
use App\Models\Formsale;
use App\Models\PermitApp;
use App\Models\PermitApproval;
use App\Models\PermitRegistration;
use App\Models\Region;
use App\Models\RenewApp;
use App\Models\UsrUserLog;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return ['auth'];
    }

    public function index(){

    

        return view ('dashboard',[
            
        ]);
    }

    public function logoutAuthenticationProcess(){
        
        Auth::logout();

        $updateLogs = UsrUserLog::find((int)session('userLogId'));
        $updateLogs->logout_date = Carbon::now();
        $updateLogs->update();

        session()->forget('userLogId');

        return redirect('/');

    }
}