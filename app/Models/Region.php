<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'regions';
    public $timestamps = false;

    public function country()
    {
        return $this->belongsTo(Country::class,'country_id');
    }
    public function getCertificateCount(){

        return CertificateApp::where('region',''.$this->id)->get()->count();
    }

     public function getApprovedCertificateCount(){

        return CertificateApp::where([['region',''.$this->id],['status','Approved']])->get()->count();
    }


     public function getPermitCount(){

        return PermitApp::where('region',''.$this->id)->get()->count();
    }

     public function getApprovedPermitCount(){

        return PermitApp::where([['region',''.$this->id],['status','vettingApproved']])->get()->count();
    }
    	public function reg()
{
    return $this->hasMany(Incident::class, 'region_id');
}
}
