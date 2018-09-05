<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
// use PHPMailer\PHPMailer\SMTP;

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

    public function send_email_forget_password(Request $request)
    {
        $this->validate($request, ['email' => 'required', 'via' => 'required']);
        $hasher = app()->make('hash');
        $email = $request->input('email');
        $via = $request->input('via');
        $login = User::where('email', $email)->first();
        if (!$login) {
            $res['status'] = false;
            $res['data'] = 'Your email did not found or incorrect!';
            return response($res);
        } else {
            $api_token = sha1(time());
            $create_token = User::where('user_id', $login->user_id)->update([
                'api_token' => $api_token,
                'via' => $via]
            );
            if ($create_token) {
                $login = User::where('user_id', $login->user_id)->first();
                $api_token = $api_token;
                
                $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
                try {
                    //Server settings
                    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = 'trasi.polindra@gmail.com';                 // SMTP username
                    $mail->Password = 'trasi!Polindra18';                           // SMTP password
                    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 465;                                    // TCP port to connect to

                    //Recipients
                    $mail->setFrom('trasi.polindra@gmail.com', 'TRASI POLINDRA - No Reply');
                    $mail->addAddress($email, $login->username.' '.$login->longname); // Add a recipient

                    //Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Here is link to reset password';
                    $mail->Body    = 'This is the link to reset your password <b><font color=red><a href="'.url('/').'/reset_password?id='.$login->user_id.'&api_token='.$api_token.'" target="_blank">Reset Password</font></b> <br><br><br> Ignore this, if you are';

                    $mail->send();
                    // echo 'Message has been sent';
                    $res['status'] = true;
                    $res['data'] = 'Email reset password has been sent, check your email!';
                    return response($res);
                } catch (Exception $e) {
                    // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                    $res['status'] = false;
                    $res['data'] = 'Message was not sent. Mailer error: ' . $mail->ErrorInfo;
                    return response($res);
                }
            } else {
                $res['status'] = false;
                $res['data'] = 'Your email did not found or incorrect!';
                return response($res);
            }
        }

    }

}