<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;
use App\Models\Employees;
use Illuminate\Support\Facades\DB;


class EmployeesController extends Controller {

/**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        //$data['employees']	=	Employees::join('companies','employees.company_id','=','companies.id')->paginate(5);
	$data['employees']	=	DB::table('employees')
	    	->leftJoin('companies', 'employees.company_id', '=', 'companies.id') //Join the parent table
	    	->get();
	//echo "\r\n <br/> empRes : \r\n <br/><pre>"; print_r($data);
        return view('employees.index', $data);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create() {
	$data['companies']      =       Companies::get(["name", "id"]);
        return view('employees.create', $data);
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
		'company_id'	=>	'required',
            	'employee_name' => 'required',
            	'employee_email' => 'required',
		'employee_mobile'	=>	'required',
            	'employee_address' => 'required',
		'file' => 'required|mimes:jpg,jpeg,png|max:2048',
        ]);
	try {
		$lastID	=	Employees::create($request->post());
		$lastInsertID = $lastID->id;
		echo "\r\n <br/> LAST INSERT ID FOR EMP IS : " . $lastInsertID;
		$compRes	=	Employees::find($lastInsertID);

	        if($request->file()) {
        		$fileName	=	time().'_'.$request->file->getClientOriginalName();
	        	$filePath	=	$request->file('file')->storeAs('uploads/employees/', $fileName, 'public');
            		$compRes->employee_photo	=	time().'_'.$request->file->getClientOriginalName();
            		$compRes->employee_photo_path	=	'/storage/' . $filePath;
            		$compRes->save();
        	}
	} catch(Exception $e) {
		echo "\r\n <br/> ERROR IN  CAPTURING EMPLOYEE DATA " . $e->getMessage();
	}


        return redirect()->route('employees.index')->with('success','Employees has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\employees  $employees
    * @return \Illuminate\Http\Response
    */
    public function show(Employees $employees)
    {
        return view('employees.show',compact('employees'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Employees  $employees
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
	$data['employees']	=	Employees::findOrFail($id);
	$data['companies']      =       Companies::get(["name", "id"]);
 	return view('employees.edit', $data);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\employees  $employees
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Employees $employees)
    {
        $request->validate([
	 	'company_id'    =>      'required',
                'employee_name' => 'required',
                'employee_email' => 'required',
                'employee_mobile'       =>      'required',
                'employee_address' => 'required',
                'file' => 'required|mimes:jpg,jpeg,png|max:2048',
        ]);

	$empRes	=	Employees::findOrFail($request->employeeID);

	try {

		if(!(empty($empRes))) {
			$empRes->company_id	=	$request->company_id;
			$empRes->employee_name	=       $request->employee_name;
			$empRes->employee_email	=       $request->employee_email;
			$empRes->employee_mobile	=       $request->employee_mobile;
			$empRes->employee_address	=       $request->employee_address;
			$empRes->save();
			echo "\r\n <br/> GIRISH HERE AFTER SAVING OTHER SET WITHOUT IMAGE";
			//Logic for updating the file / photo if updated.
			if($request->file()) {
				//unlink existing photo
				if(!(empty($empRes->employee_photo))) {
					echo "\r\n <br/> EXISITNG PHOTO : " . $empRes->employee_photo;
					if(\Storage::exists('upload/employees/'.$empRes->employee_photo)){
    						\Storage::delete('upload/employees/'.$empRes->employee_photo);
					} /*else {
    						dd('File not found.');
  					}*/
				}

        	                $fileName       =	time().'_'.$request->file->getClientOriginalName();
                	        $filePath	=	$request->file('file')->storeAs('uploads/employees/', $fileName, 'public');
                        	$empRes->employee_photo	=	 time().'_'.$request->file->getClientOriginalName();
                        	$empRes->employee_photo_path	=       '/storage/' . $filePath;
                        	$empRes->save();
 				echo "\r\n <br/> GIRISH HERE AFTER SAVING WITH IMAGE";
                	}

			return redirect()->route('employees.index')->with('success','Employees Has Been updated successfully');
		}
	} catch(Exception $e) {
		echo "\r\n <br/> ERROR IN UPDATING " . $e->getMessage();
	}
	}

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Employees  $employees
    * @return \Illuminate\Http\Response
   */
    public function destroy(Employees $employees)
    {
        $employees->delete();
        return redirect()->route('employees.index')->with('success','Employees has been deleted successfully');
    }
}
