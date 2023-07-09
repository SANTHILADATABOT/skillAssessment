<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\Models\User;
use App\Models\Sites;
use App\Models\PortalSites;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use App\Libraries\GeneralFunctions;
use App\Models\Vehicles;
use App\Models\Locations;

class ApiController extends Controller {
    protected $genFn;

    public function __construct() {
        $this->genFn    =   new GeneralFunctions();
    }

    public function register(Request $request) {
    	//Validate data
        $data   =   $request->only('name', 'email', 'password');
        $validator  =    Validator::make($data, [
            'name'  =>   'required|string',
            'email' =>  'required|email|unique:users',
            'password'  =>  'required|string|min:6|max:50'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, create new user
        $user   =   User::create([
                            'name'  =>   $request->name,
                            'email' =>  $request->email,
                            'password'  =>  bcrypt($request->password)]);

        //User created, return success response
        return response()->json(['success' => true, 'message' => 'User created successfully', 'data' => $user], Response::HTTP_OK);
    }
 
    public function authenticate(Request $request) {
        $credentials    =   $request->only('email', 'password');

        //valid credential
        $validator  =   Validator::make($credentials, [
                                                    'email' => 'required|email',
                                                    'password' => 'required|string|min:6|max:50']);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is validated
        //Crean token
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['success' => false, 'message' => 'Login credentials are invalid.',], 400);
            }
        } catch (JWTException $e) {
    	    return $credentials;
            return response()->json(['success' => false, 'message' => 'Could not create token.', ], 500);
        }

 		//Token created, return with success response and jwt token
        //Save the token into the table.
        // Get user_token with the generated token..
        return response()->json(['success' => true, 'token' => $token,]);
    }

    public function logout(Request $request) {
        //valid credential
        $validator = Validator::make($request->only('token'), ['token' => 'required']);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

		//Request is validated, do logout
        try {
            JWTAuth::invalidate($request->token);
 
            return response()->json([
                'success' => true,
                'message' => 'User has been logged out'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, user cannot be logged out'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function get_user(Request $request) {
        $this->validate($request, ['token' => 'required']);
        $user   =   JWTAuth::authenticate($request->token);
        return response()->json(['user' => $user]);
    }

    public function doPortalWiseDumpingProcess() {
        $retStat    =   0;
        $siteRes = new Sites();

        if (!(empty($siteRes))) {
            foreach($siteRes::All() as $s) {
                try {
                    //$chkPortalTbl   =   'SELECT COUNT(*) AS totRec FROM '.str_replace('_transaction', '_weighment_outward_ticket', $s->weighment_table);
                    $chkPortalTbl   =   new PortalSites();
                    $tblName    =   str_replace('_transaction', '_weighment_outward_ticket', $s->weighment_table);
                    $chkPortalRes   =   $chkPortalTbl::getPortalDetails($tblName);
                    
                } catch(Exception $e) {
                    echo "\r\n <br/> error : " . $e->getMessage();
                }
            }

            $retStat    =   1;
        }

        return $retStat;
    }

    //Retrieve Companies via API.
    public function get_CompanyDetails(Request $request) {
        $this->validate($request, ['token' => 'required']);
        $user   =   JWTAuth::authenticate($request->token);

        if(!(empty($user))) {
            //return response()->json(['success' => true, 'message' => 'Portal Details stored successfully',], Response::HTTP_OK);
        }
    }
}