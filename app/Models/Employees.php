<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Companies;

class Employees extends Model
{
    	use HasFactory;
	protected $fillable = ['company_id', 'employee_name', 'employee_email', 'employee_mobile', 'employee_photo', 'employee_address'];


	public function companies()
	{
    		return $this->belongsTo(Companies::class, 'id');
	}
}
