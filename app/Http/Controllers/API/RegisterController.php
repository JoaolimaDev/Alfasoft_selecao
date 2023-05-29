<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends BaseController
{
    
    public function register(Request $request)

    {

        try {

            $validator = Validator::make($request->all(), [

                'name' => 'required',
    
                'email' => 'required|email',
    
                'password' => 'required',
    
                'c_password' => 'required|same:password',

                'telefone'  => 'required'
    
            ]);
    
       
    
            if($validator->fails()){
    
                return $this->sendError('Validation Error.', $validator->errors(), 400);       
    
            }
    
       
    
            $input = $request->all();
    
            $input['password'] = bcrypt($input['password']);
    
    
            $user = User::create($input);
    
            $success['token'] =  $user->createToken('MyApp')->accessToken;
    
            $success['name'] =  $user->name;
        
           
        
            return $this->sendResponse($success, 'User register successfully.');
        
            

        } catch (\Throwable $th) {
            
            return $this->sendError('Bad Request.', ['error'=>$th], 400);
        }


    }

    public function login(Request $request)

    {

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 

            $user = Auth::user(); 

            $success['token'] =  $user->createToken('Custom_Token')-> accessToken; 

            $success['name'] =  $user->name;



            return $this->sendResponse($success['token'], 'User login successfully.');


            

        } 

        else{ 

            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised'], 400);

        } 

    }


}
