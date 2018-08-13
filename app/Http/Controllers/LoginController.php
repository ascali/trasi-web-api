<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    /**
     * Index login controller
     *
     * When user success login will retrive callback as api_token
     */
    public function login(Request $request)
    {
    	$this->validate($request, [
	        'email'    => 'required',
	        'password' => 'required',
	        'via' => 'required'
    	]);
        $hasher = app()->make('hash');
        $email = $request->input('email');
        $password = $request->input('password');
        $via = $request->input('via');
        $login = User::where('email', $email)->first();
        if (!$login) {
            $res['status'] = false;
            $res['data'] = 'Your email or password incorrect!';
            return response($res);
        }else{
            if ($hasher->check($password, $login->password)) {
                $api_token = sha1(time());
                $create_token = User::where('user_id', $login->user_id)->update([
                			'api_token' => $api_token,
                            'via' => $via]);
                if ($create_token) {
                	$login = User::where('user_id', $login->user_id)->first();
                    $res['status'] = true;
                    $res['api_token'] = $api_token;
                    $res['data'] = $login;
                    return response($res);
                }
            }else{
                $res['status'] = true;
                $res['data'] = 'You email or password incorrect!';
                return response($res);
            }
        }
    }
}