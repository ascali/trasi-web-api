
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
            'email'=> $email,
            'password'=> $password,
            'activation'=> 1,
            'created_by'=> $username,
            'updated_by'=> $username
        ]);
        if ($register) {
            $res['success'] = true;
            $res['message'] = 'Success register!';
            return response($res);
        }else{
            $res['success'] = false;
            $res['message'] = 'Failed to register!';
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
        $res['success'] = false;
        $res['message'] = 'Cannot find user!';
        return response($res);
      }else{
        $res['success'] = true;
        $res['message'] = $user;
        return response($res);
      }
    }
