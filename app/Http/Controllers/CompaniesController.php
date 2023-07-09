<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $companies = Companies::orderBy('id','desc')->paginate(5);
        return view('companies.index', compact('companies'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('companies.create');
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
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
		    'file' => 'required|mimes:jpg,jpeg,png|max:2048',
		    'website'=>'required',
        ]);

        $lastID	=	Companies::create($request->post());
        $lastInsertID = $lastID->id;
        $compRes	=	Companies::find($lastInsertID);

        if($request->file()) {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads/companies/', $fileName, 'public');
            $compRes->logo_name = time().'_'.$request->file->getClientOriginalName();
            $compRes->logo = '/storage/' . $filePath;
            $compRes->save();
        }

        return redirect()->route('companies.index')->with('success','Company has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function show(Company $company)
    {
        return view('companies.show',compact('companies'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
	$data['companies']	=	Companies::findOrFail($id);
        return view('companies.edit', $data);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Companies $company)
    {
        $request->validate([
		    'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'file' => 'mimes:jpg,jpeg,png|max:2048',
            'website'=>'required',
        ]);

        $compRes	=	Companies::findOrFail($request->companyID);

        try {

            if(!(empty($compRes))) {
                $compRes->name	=       $request->name;
                $compRes->email	=       $request->email;
                $compRes->website	=       $request->website;
                $compRes->address	=       $request->address;
                $compRes->save();
                //Logic for updating the file / photo if updated.
                if($request->file()) {
                    //unlink existing photo
                    if(!(empty($compRes->photo))) {
                        if(\Storage::exists('upload/companies/'.$compRes->photo)){
                                \Storage::delete('upload/companies/'.$compRes->photo);
                        } /*else {
                                dd('File not found.');
                        }*/
                    }

                    $fileName       =	time().'_'.$request->file->getClientOriginalName();
                    $filePath	=	$request->file('file')->storeAs('uploads/companies/', $fileName, 'public');
                    $compRes->logo_name	=	 time().'_'.$request->file->getClientOriginalName();
                    $compRes->logo	=	'/storage/' . $filePath;
                    $compRes->save();
                }

                return redirect()->route('companies.index')->with('success','Company has been updated successfully');
            }
        } catch(Exception $e) {
            echo "\r\n <br/> ERROR IN UPDATING " . $e->getMessage();
        }
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success','Company has been deleted successfully');
    }

	/**
	* Unlinking the logo / photo workflow
	*/

	public function unLinkImage(Request $req) {
		//fetch record from table
		$compRes	=	Companies::findOrFail($req->id);

		if(!(empty($compRes))) {
			echo "\r\n <br/> remove the specified logo / photo ";print_r($req);
		}
	}
}
