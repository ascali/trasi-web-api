<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Laravel\Lumen\Routing\Controller as BaseController;

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
}
