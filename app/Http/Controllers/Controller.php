<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// use PHPMailer\PHPMailer\SMTP;


class Controller extends BaseController
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }
    
    public function index(Request $request){
    	return view('login');
    }

    public function login(Request $request){
    	return view('login');
    }

    public function register(Request $request){
    	return view('register');
    }

    public function dashboard(Request $request){
    	$data['modules'] = 'dashboard';
		$data['ishtml'] = 'modules.dashboard.dashboard';
    	return view($data['ishtml'], $data);
    }

    public function role(Request $request){
    	$data['modules'] = 'role';
		$data['ishtml'] = 'modules.role.role';
    	return view($data['ishtml'], $data);
    }

    public function user(Request $request){
    	$data['modules'] = 'user';
		$data['ishtml'] = 'modules.user.user';
    	return view($data['ishtml'], $data);
    }

    public function complaint(Request $request){
    	$data['modules'] = 'complaint';
		$data['ishtml'] = 'modules.complaint.complaint';
    	return view($data['ishtml'], $data);
    }

    public function maps(Request $request){
    	$data['modules'] = 'maps';
		$data['ishtml'] = 'modules.maps.maps';
    	return view($data['ishtml'], $data);
    }

    public function news(Request $request){
    	$data['modules'] = 'news';
		$data['ishtml'] = 'modules.news.news';
    	return view($data['ishtml'], $data);
    }

    public function report(Request $request){
    	$data['modules'] = 'report';
		$data['ishtml'] = 'modules.report.report';
    	return view($data['ishtml'], $data);
    }

    public function forget_password(Request $request){
        $data['modules'] = 'forget_password';
        $data['ishtml'] = 'modules.user.forget_password';
        return view($data['ishtml'], $data);
    }

    public function send_email_forget_password(Request $request){
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
            $mail->setFrom('trasi.polindra@gmail.com', 'No Reply');
            $mail->addAddress('buatapapun3@gmail.com', 'John Doe'); // Add a recipient

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body    = 'This is the HTML message body <b><font color=red>in bold!</font></b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            // echo 'Message has been sent';
            $res['status'] = true;
            $res['data'] = 'Email reset password has been sent!';
            return response($res);
        } catch (Exception $e) {
            // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            $res['status'] = false;
            $res['data'] = 'Message was not sent. Mailer error: ' . $mail->ErrorInfo;
            return response($res);
        }
    }
}
