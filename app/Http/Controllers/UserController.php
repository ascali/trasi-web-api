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
        $password = $hasher->make($request->input('password'));
        $username = $request->input('username');
        $email = $request->input('email');
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

    public function get_user_role(Request $request, $id)
    {
      $user = User::where('role_id', $id)->get();
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

    public function userImage(Request $request, $id)
    {
      $target_dir = "assets/images/";
      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      // Check if image file is a actual image or fake image
      if(isset($_POST["submit"])) {
          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if($check !== false) {
              $res['data'] = "File is an image - " . $check["mime"] . ".";
              $uploadOk = 1;
          } else {
              $res['data'] = "File is not an image.";
              $uploadOk = 0;
          }
      }
      // Check if file already exists
      if (file_exists($target_file)) {
          $res['data'] = "Sorry, file already exists.";
          $uploadOk = 0;
      }
      // Check file size
      if ($_FILES["fileToUpload"]["size"] > 500000) {
          $res['data'] = "Sorry, your file is too large.";
          $uploadOk = 0;
      }
      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
          $res['data'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk = 0;
      }
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
          $res['data'] = "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
      } else {
          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
              $res['data'] = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
          } else {
              $res['data'] = "Sorry, there was an error uploading your file.";
          }
      }
      $res['status'] = true;
      // $res['data'] = [];
      return response($res);
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
