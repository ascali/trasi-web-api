<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
/*$app->get('/', function () use ($app) {
  $res['success'] = true;
  $res['result'] = "Hello there welcome to trasi web api using lumen Polindra!";
  return response($res);
});*/
$app->get('/key', function() {
    return str_random(32);
});

$app->get('/', 'Controller@index');
$app->get('/login', 'Controller@login');
$app->get('/register', 'Controller@register');

$app->get('/dashboard', 'Controller@dashboard');
$app->get('/role', 'Controller@role');
$app->get('/user', 'Controller@user');
$app->get('/complaint', 'Controller@complaint');
$app->get('/news', 'Controller@news');
$app->get('/maps', 'Controller@maps');
$app->get('/report', 'Controller@report');

$app->get('/tes', function () use ($app) {
    return view('template.pusher');
});

$app->get('/tesp', 'ComplaintController@pusher');

$app->get('/forget_password', 'Controller@forget_password');
// page form reset_password
$app->get('/reset_password', 'Controller@reset_password');

// api sent email reset pass
$app->get('/email/forget_password', 'LoginController@send_email_forget_password');

$app->group(['prefix' => 'api/v1'], function () use ($app) {
$app->get('/', function () use ($app) {
  $res['success'] = true;
  $res['result'] = "Hello there welcome to trasi web api using lumen Polindra!";
  return response($res);
});

/* module login api aka get user api key, register aka create user, view user by id*/
$app->post('/login', 'LoginController@login');
$app->post('/register', 'UserController@register');

/* module role */
$app->get('/role/all', 'RoleController@index');
$app->post('/role/create', 'RoleController@create');
$app->get('/role/{id}', 'RoleController@read');
$app->post('/role/update', 'RoleController@update');
$app->post('/role/delete/{id}', 'RoleController@delete');

/* Module User */
$app->get('/user/all', ['middleware' => 'auth', 'uses' => 'UserController@user_all']);
$app->get('/user/{id}', ['middleware' => 'auth', 'uses' => 'UserController@get_user']);
$app->get('/user/role/{id}', ['middleware' => 'auth', 'uses' => 'UserController@get_user_role']);
$app->post('/user/create', ['middleware' => 'auth', 'uses' => 'UserController@create']);
$app->post('/user/update', ['middleware' => 'auth', 'uses' => 'UserController@update']);
$app->post('/user/delete/{id}', ['middleware' => 'auth', 'uses' => 'UserController@delete']);
$app->post('/user/last_position/{id}', ['middleware' => 'auth', 'uses' => 'UserController@last_position']);

/* module Complaint*/
$app->get('/complaint/all', 'ComplaintController@get_complaint');
$app->get('/complaint/all/{id}', 'ComplaintController@get_complaint_user_id');
$app->get('/complaint/{id}', 'ComplaintController@get_complaint_id');
$app->post('/complaint/sos_complaint', 'ComplaintController@sos_complaint');
$app->post('/complaint/just_complaint', 'ComplaintController@just_complaint');
$app->post('/complaint/update', 'ComplaintController@update');

/* module news */
$app->get('/news/all', 'NewsController@index');
$app->post('/news/create', 'NewsController@create');
$app->get('/news/{id}', 'NewsController@read');
$app->post('/news/update', 'NewsController@update');
$app->post('/news/delete/{id}', 'NewsController@delete');

});