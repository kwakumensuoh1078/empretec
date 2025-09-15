<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffLeave extends Model
{
    protected $table = 'staff_leave';

    protected $fillable =[
        'staff_id',
        'leave_type',
        'start_date',
        'end_date',
        'duration',
        'days_used',
        'caretaker_id',
        'remarks',
        'resumption_date',
        'emergency_number',
        'emergency_contact_name',
        'relationship',
        'leave_entitlement',
        'created_by',
        's_status',
        'reject_reason',
        'replace',
        'hod_reason',
        'hod_date',
        'hr_date',
        'hr_reason',
        'rv_reason',
        'rv_date',
        'sup_id',
        'ahr_date',
        'hr_seen',
        'approved_days',
        'updated_by'
        
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class,'staff_id');
    }

    public function leaveType(){
        return $this->belongsTo(LeaveType::class,'leave_type');
    }

    public function caretaker(){
        return $this->belongsTo(Staff::class,'caretaker_id');
    }
}
