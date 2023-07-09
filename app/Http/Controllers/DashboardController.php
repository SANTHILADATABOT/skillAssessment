<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;
use App\Models\Employees;

class DashboardController extends Controller
{
     /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct(){
    }

    public function index()
    {
        $data['companies']  =   Companies::orderBy('id','desc')->count();
        $data['employees']  =   Employees::orderBy('id','desc')->count();
        return view('dashboard.index', $data);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function mainDashboard() {
        return view('dashboard\mainDashboard');
    }
}
