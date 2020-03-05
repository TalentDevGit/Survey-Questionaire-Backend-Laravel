<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\UserData;

class UserController extends Controller
{
    //
    protected $username = "";
    protected $ip_addr = "";
    protected $isAdmin = true;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        // $this->middleware('auth');
    }
    public function getUserIpAddr(){
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';    
        return $ipaddress;
    }
    public function getUserInfo(){
        // $userInfo = Auth::user();
        $user = Array();

        $user['isAdmin'] = /*$this->isAdmin = $userInfo->role_id == 1 ? true : false*/ true;
        $user['ip_addr'] = $this->getUserIpAddr();
        $user['username'] = /*$userInfo->username*/'';

        return (object)$user;
    }
    public function index() {
        // $user = $this->getUserInfo();

        $users_count = DB::table('userdatas')->count();
        $users = UserData::all()->toArray();

        return view('user.index', ['url' => 'dashboard', 'users' => $users, 'users_count' => $users_count]);

        //return view('user.create', ['url' => 'users']);
    }
    public function create() {
        // echo 'create';

        return view('user.create', ['url' => 'users']);
    }
    public function store(Request $request) {
        // echo 'store';


        $user = new UserData([
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => md5($request['password']),
            'fullname' => $request['fullname'],
            'phone' => $request['phone'],
            'role_id' => $request['role_id']
        ]);
        
        $user->save();

        return 'OK';
    }
    public function show($id) {
        // echo 'show';
        $user = UserData::find($id);

        return view('user.show', ['url' => 'users', 'user' => $user]);
    }
    public function edit($id) {
        // echo 'edit';
        $user = UserData::find($id);

        return view('user.edit', ['url' => 'users', 'user' => $user]);
    }
    public function update(Request $request, $id) {
        // echo 'update';

        $validator = Validator::make($request->all(), [
            'username'=>'unique:users',
            'email'=>'unique:users',
            'role_id'=>'integer',
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $user = UserData::find($id);
        $user->username = $request->get('username');
        $user->email = $request->get('email_address');
        $user->password = Hash::make($request->get('password'));
        $user->fullname = $request->get('fullname');
        $user->phone = $request->get('phone');
        $user->role_id = $request->get('role_id');
        $user->save();

        echo "<script language='javascript'> window.location.href = '../' </script>";
    }
    public function destroy($id) {
        // echo 'destroy';
        $user = UserData::findOrFail($id);
        $user->delete();

        return redirect()->back();
    }
    // show more details
    public function more($type) {
        // echo 'show';
        $user = $this->getUserInfo();

        $users_count = DB::table('users')->count();
        if ($type == 0) {
            $users = UserData::all()->toArray();
            return view('user.index', ['url' => 'users', 'users' => $users, 'users_count' => $users_count, 'offers_count' => $offers_count, 'profiles_count' => $profiles_count]);
        }
    }
}
