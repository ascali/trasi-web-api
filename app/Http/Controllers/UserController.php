<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Register new user
     *
     * @param $request Request
     */
    public function register(Request $request)
    {
      $this->validate($request, [
        'username' => 'required|unique:users',
        'longname' => 'required',
        'email'    => 'required|email|unique:users',
        'nik'    => 'required|unique:users',
        'password' => 'required'
      ]);

        $hasher = app()->make('hash');
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $hasher->make($request->input('password'));
        $longname = $request->input('longname');
        $nik = $request->input('nik');
        $register = User::create([
            'nik'=> $nik,
            'username'=> $username,
            'longname'=> $longname,
            'email' => $request->input('email'),
            'password'=> $password,
            'gender' => $request->input('gender'),
            'pob' => $request->input('pob'),
            'dob' => $request->input('dob'),
            'phone' => $request->input('phone'),
            'role_id'=>$request->input('role_id'),
            'activation'=> 0,
            'created_by'=> $username,
            'updated_by'=> $username
        ]);
        if ($register) {
            $res['status'] = true;
            $res['data'] = [];
            return response($res);
        }else{
            $res['status'] = false;
            $res['data'] = [];
            return response($res);
        }
    }
    /**
     * Get user by id
     *
     * URL /user/{id}
     */
    public function get_user(Request $request, $id)
    {
      $user = User::where('user_id', $id)->get();
      if ($user == "[]") {
        $res['status'] = false;
        $res['data'] = [];
        return response($res);
      }else{
        $res['status'] = true;
        $res['data'] = $user;
        return response($res);
      }
    }

    //CRUD
    public function user_all(Request $request)
    {
      $user = User::where('role_id', 3)->get();
      if ($user == "[]") {
        $res['status'] = false;
        $res['data'] = [];
        return response($res);
      }else{
      $res['status'] = true;
      $res['data'] = $user;
      return response($res);
      }
    }

    public function update(Request $request)
    {
      $id = $request->input('user_id');
      // $hasher = app()->make('hash');
      $this->validate($request, [
        /*'nik'      => 'required',
        'username' => 'required',
        'longname' => 'required',*/
        // 'password' => 'required',
        /*'gender'   => 'required',
        'pob'      => 'required',
        'dob'      => 'required',
        'email'    => 'required',
        'phone'    => 'required',
        'activation' => 'required',
        'role_id' => 'required',*/
        'updated_by'  => 'required'
      ]);
      $users = User::find($id);
      if ($users !== null) {
        $users->update([
          'nik' => $request->input('nik'),
          'username' => $request->input('username'),
          'longname' => $request->input('longname'),
          // 'password' => $hasher->make($request->input('password')),
          'gender' => $request->input('gender'),
          'pob' => $request->input('pob'),
          'dob' => $request->input('dob'),
          'email' => $request->input('email'),
          'phone' => $request->input('phone'),
          'role_id' => $request->input('role_id'),
          'activation' => $request->input('activation'),
          'updated_by' => $request->input('updated_by')
        ]);
        $res['status'] = true;
        $res['data'] = 'Success update '.$request->input('email');
        return response($res);
      }else{
        $res['status'] = false;
        $res['data'] = [];
        return response($res);
      }
    }
    /**
     * Delete dataRole by id
     */
    public function delete(Request $request, $id)
    {
      $users =User::find($id);
      if ($users->delete($id)) {
        $res['status'] = true;
        $res['data'] = [];
        return response($res);
      }
    }

    /*CREATE USER*/

    public function create(Request $request)
    {
      $this->validate($request, [
        'nik'      => 'required|unique:users',
        'username' => 'required',
        'longname' => 'required',
        'password' => 'required',
        'email'    => 'required|unique:users',
        // 'gender'   => 'required',
        // 'pob'      => 'required',
        // 'dob'      => 'required',
        // 'phone'    => 'required',
        'role_id' => 'required',
        'activation' => 'required',
        'updated_by'  => 'required'
      ]);

      $hasher = app()->make('hash');
      $username = $request->input('username');
      $email = $request->input('email');
      $password = $hasher->make('password');
      $longname = $request->input('longname');
      $nik = $request->input('nik');

      $create = User::create([
          'nik'=> $nik,
          'username'=> $username,
          'longname'=> $longname,
          'email'=> $email,
          'password'=> $password,
          'gender' => $request->input('gender'),
          'pob' => $request->input('pob'),
          'dob' => $request->input('dob'),
          'phone' => $request->input('phone'),
          'role_id' => $request->input('role_id'),
          'last_position' => 'Unknown',
          'activation'=> $request->input('activation'),
          'created_by'=> $request->input('updated_by'),
          'updated_by'=> $request->input('updated_by')
      ]);
      if ($create) {
          $res['status'] = true;
          $res['data'] = [];
          return response($res);
      }else{
          $res['status'] = false;
          $res['data'] = [];
          return response($res);
      }
    }

    public function last_position(Request $request, $id)
    {
      // $id = $request->input('user_id');
      $users = User::find($id);
      if ($users !== null) {
        $users->update([
          'current_latitude' => $request->input('current_latitude'),
          'current_longitude' => $request->input('current_longitude'),
          'last_position' => $request->input('last_position'),
          'updated_by' => $request->input('updated_by')
        ]);
        $res['status'] = true;
        $res['data'] = [];
        return response($res);
      }else{
        $res['status'] = false;
        $res['data'] = [];
        return response($res);
      }
    }
}
