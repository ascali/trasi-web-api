<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Role;
class RoleController extends Controller
{
    /**
     * Create a new auth instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * Get all data from roles
     */
    public function index(Request $request)
    {
      $roles = new Role;
      $res['status'] = true;
      $res['data'] = $roles->all();
      return response($res);
    }
    /**
     * Insert database forRole
     * Url : /roles
     */
    public function create(Request $request)
    {
      $this->validate($request, [
        'rolename' => 'required|unique:roles',
        'updated_by' => 'required'
      ]);
      $roles = new Role;
      $roles->fill([
        // 'role_id' => $request->input('role_id');
        'rolename' => $request->input('rolename'),
        'created_by' => $request->input('updated_by'),
        'updated_by' => $request->input('updated_by'),
      ]);
      if($roles->save()){
        $res['status'] = true;
        $res['data'] = 'Success add new roles!';
        return response($res);
      }
    }
    /**
     * Get one dataRole by id
     * Url : /roles/{id}
     */
    public function read(Request $request, $id)
    {
      $roles =Role::where('role_id',$id)->first();
      if ($roles !== null) {
        $res['status'] = true;
        $res['data'] = $roles;
        return response($res);
      }else{
        $res['status'] = false;
        $res['data'] = [];
        return response($res);
      }
    }
    /**
     * Update dataRole by ud
     */
    public function update(Request $request)
    {
      $this->validate($request, [
        'rolename' => 'required',
        'updated_by' => 'required'
      ]);
      $id = $request->input('role_id');
      $roles = Role::find($id);
      if ($roles !== null) {
        $roles->update([
          'rolename' => $request->input('rolename'),
          'updated_by' => $request->input('updated_by'),
        ]);
        $res['status'] = true;
        $res['data'] = 'Success update '.$request->input('rolename');
        return response($res);
      }else{
        $res['status'] = false;
        $res['data'] = 'Please fill name roles!';
        return response($res);
      }
    }
    /**
     * Delete dataRole by id
     */
    public function delete(Request $request, $id)
    {
      $roles =Role::find($id);
      if ($roles->delete($id)) {
          $res['status'] = true;
          $res['data'] = 'Success delete roles!';
          return response($res);
      }
    }
}