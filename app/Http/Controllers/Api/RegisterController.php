<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;
   
class RegisterController extends BaseController
{
	/**
	 * Register api
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function register(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'firstname' => 'required',
			'email' => 'required|email',
			'password' => 'required'
		]);
   
		if($validator->fails()){
			return $this->sendError('Validation Error.', $validator->errors());       
		}
   
		$input = $request->all();
		$input['password'] = bcrypt($input['password']);
		$user = User::create($input);
		$success['token'] =  $user->createToken('MyApp')->plainTextToken;
		$success['firstname'] =  $user->firstname;
		$success['lastname'] =  $user->lastname;
   
		return $this->sendResponse($success, 'User register successfully.');
	}
   
	/**
	 * Login api
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function login(Request $request)
	{
		if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
			$user = Auth::user(); 
			$success['token'] =  $user->createToken('MyApp')->plainTextToken; 
			$success['firstname'] =  $user->firstname;
   
			return $this->sendResponse($success, 'User login successfully.');
		} 
		else{ 
			return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
		} 
	}
	public function users(Request $request)
	{
		$a = User::all();
		print_r($a);
	}
}