<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\KValidator;

class Users extends Controller
{

    protected $user;
    protected $validator;

    public function __construct(User $user) {
        $this->user = $user;
        $this->validator = new KValidator;
        $this->validator->rules = $this->user->rules;
    }


    public function index($username) {
        $this->user = User::where('username', $username)->get();
        if(!empty($this->user)) {
            return response()->json([
                'status' => '200',
                'data' => $this->user
            ]);
        }
        else {
            return 'User not Found';
        }
    }


    public function login(Request $request) {
        if (!$this->validator->validate($request->all(), $this->user->login_rules))
            return $this->validator->errors();
        
        $credentials = [
            'email_address' => $request->input('email_address'), 
            'password' => $request->input('password')
        ];

        if (Auth::attempt($credentials)) {
            return response(Auth::user(), 200);
        }

        else {
            return response('Incorrect email or password', 403);
        }
        
    }


    public function logout() {
        Auth::logout();
        return response('Logout Successful!', 200);
    }


    public function store(Request $request) {
        if (!$this->validator->validate($request->all()))
            return response($this->validator->errors(), 403);

        $this->user->email_address = $request->email_address;
        $this->user->username = $request->input('username');
        $this->user->date_of_birth = $request->input('date_of_birth');
        $this->user->password = Hash::make($request->password);
        $this->user->created = date('Y-m-d h:i:s');
        $this->user->updated = date('Y-m-d h:i:s');
        $this->user->forget_password = 0;
        $this->user->city_id = $request->input('city_id');
        $this->user->user_status_id = 'verified'; //temporary. add email check if time is with us
        $this->user->save();
        $path = public_path().'//users/' . $this->user->email_address;
        File::makeDirectory($path, $mode = 0777, true, true);
        return response('Registration was successful!', 200);
    }


    public function update(Request $request, $username) {
        $this->user->update_rules['username'] = str_replace('{id}', $username, $this->user->update_rules['username']);
        if (!$this->validator->validate($request->all(), $this->user->update_rules))
            return $this->validator->errors();
        $this->user = User::find(Auth::user()->user_id);
        $this->user->username = $request->input('username');
        $this->user->date_of_birth = $request->input('date_of_birth');
        $this->user->updated = date('Y-m-d h:i:s');
        $this->user->city_id = $request->input('city_id');
        $this->user->save();
        return \KHelper::json_helper('200', 'Update successful!', null);
    }

    public function get($key) {
        return $this->user->find($key);
    }

    public function deleteDirectory($email) {
        $path = public_path().'//users/' . $email;
        return var_dump(File::deleteDirectory($path));
    }
}
